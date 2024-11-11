<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;
use App\Models\FormDetail;
use App\Models\FormAttachment;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Reply;

class UserAccountController extends Controller
{
    //
    public function userAccountFormsIndex()
    {
        $user = User::with('userDetails')->find(Auth::id());

        return view('users_account.users_account', compact('user'));
    }

    public function userRecordForm()
    {
        $forms = Form::with(['user', 'replies'])
            ->where('user_id', Auth::id())
            ->get();

        // ส่งข้อมูลไปยัง view
        return view('users_account_record.users_account_record', compact('forms'));
    }

    public function userShowFormEdit($id)
    {
        $form = Form::with(['formAttachments', 'formDetails'])->findOrFail($id);

        // ส่งข้อมูลไปยัง View
        return view('users_account_edit_form.users_account_edit_form', compact('form'));
    }

    public function updateUserForm(Request $request, $id)
    {
        // ตรวจสอบข้อมูลที่กรอก
        $request->validate([
            'guest_location' => 'required|string|max:255',
            'request_date' => 'required|date',
            'guest_salutation' => 'nullable|string|max:255',
            'guest_name' => 'nullable|string|max:255',
            'guest_age' => 'nullable|integer',
            'guest_occupation' => 'nullable|string|max:255',
            'guest_phone' => 'nullable|string|max:15',
            'guest_house_number' => 'nullable|string|max:255',
            'guest_village' => 'nullable|string|max:255',
            'guest_subdistrict' => 'nullable|string|max:255',
            'guest_district' => 'nullable|string|max:255',

            // สำหรับ form details
            'detail_type' => 'required|array|min:1',
            'detail_type.*' => 'in:utilities,consume',
            'detail_request_date' => 'required|date',
            'capacity' => 'required|numeric|min:0',
            'detail_use_water_to' => 'nullable|string|max:255',
            'detail_location' => 'nullable|string|max:255',
            'detail_village' => 'nullable|string|max:255',
            'detail_subdistrict' => 'nullable|string|max:255',
            'detail_district' => 'nullable|string|max:255',
            'detail_province' => 'nullable|string|max:255',

            // สำหรับไฟล์แนบ
            'attachments.*' => 'nullable|file|mimes:jpeg,png,pdf,docx|max:10240', // ขนาดไฟล์ไม่เกิน 10MB
        ]);

        // หาข้อมูลฟอร์มที่ต้องการอัปเดต
        $form = Form::findOrFail($id);

        // อัปเดตข้อมูลฟอร์ม
        $form->update([
            'guest_location' => $request->guest_location,
            'request_date' => $request->request_date,
            'guest_salutation' => $request->guest_salutation,
            'guest_name' => $request->guest_name,
            'guest_age' => $request->guest_age,
            'guest_occupation' => $request->guest_occupation,
            'guest_phone' => $request->guest_phone,
            'guest_house_number' => $request->guest_house_number,
            'guest_village' => $request->guest_village,
            'guest_subdistrict' => $request->guest_subdistrict,
            'guest_district' => $request->guest_district,
        ]);

        // อัปเดตข้อมูลใน form details
        $formDetails = FormDetail::firstOrCreate(['form_id' => $form->id]);
        $formDetails->update([
            'detail_type' => implode(',', $request->detail_type), // แปลงอาร์เรย์เป็น string
            'detail_request_date' => $request->detail_request_date,
            'capacity' => $request->capacity,
            'detail_use_water_to' => $request->detail_use_water_to,
            'detail_location' => $request->detail_location,
            'detail_village' => $request->detail_village,
            'detail_subdistrict' => $request->detail_subdistrict,
            'detail_district' => $request->detail_district,
            'detail_province' => $request->detail_province,
        ]);


        // อัปเดตไฟล์ที่แนบมา
        if ($request->hasFile('attachments')) {
            // ลบไฟล์เก่าออกจากที่เก็บ
            $oldAttachments = FormAttachment::where('form_id', $form->id)->get();
            foreach ($oldAttachments as $attachment) {
                // ลบไฟล์จาก storage
                Storage::disk('public')->delete($attachment->file_path);
                // ลบข้อมูลจากฐานข้อมูล
                $attachment->delete();
            }

            foreach ($request->file('attachments') as $file) {
                // สร้างชื่อไฟล์ที่ไม่ซ้ำกัน
                $filename = time() . '_' . $file->getClientOriginalName();

                // เก็บไฟล์ใน public/storage/attachments
                $path = $file->storeAs('attachments', $filename, 'public'); // ใช้ disk ที่ระบุเป็น 'public'

                // สร้างบันทึกข้อมูลใน FormAttachment
                FormAttachment::create([
                    'form_id' => $form->id,
                    'file_path' => $path,
                    'file_type' => $file->getClientOriginalExtension(),
                ]);
            }
        }

        return redirect()->back()->with('success', 'ข้อมูลถูกอัปเดตเรียบร้อยแล้ว');
    }

    public function exportUserPDF($id)
    {
        $form = Form::with('formDetails')->find($id);  // ดึงข้อมูลฟอร์มพร้อมกับรายการที่ยืม

        // สร้าง instance ของ DomPDF ผ่าน facade Pdf
        $pdf = Pdf::loadView('admin_export_pdf.admin_export_pdf', compact('form'))
                ->setPaper('A4', 'portrait');

        // ส่งไฟล์ PDF ไปยังเบราว์เซอร์
        return $pdf->stream('แบบคำขอร้องทั่วไป' . $form->id . '.pdf');
    }

    public function userReply(Request $request, $formId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // dd($request);
        // dd(auth()->id());

        Reply::create([
            'form_id' => $formId,
            'user_id' => auth()->id(),
            'reply_text' => $request->message,
        ]);

        return redirect()->back()->with('success', 'ตอบกลับสำเร็จแล้ว!');
    }
}
