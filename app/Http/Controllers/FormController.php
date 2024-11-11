<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Form;
use App\Models\FormDetail;
use App\Models\FormAttachment;

class FormController extends Controller
{
    //
    public function FormIndex()
    {
        return view('users_form.users_form');
    }

    public function FormCreate(Request $request)
    {
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


        // Save form data
        $form = Form::create([
            'user_id' => Auth::id(),
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
            'status' => 1,  // Default status
        ]);

        // Save form details
        FormDetail::create([
            'form_id' => $form->id,
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

        // Handle file attachments
        if ($request->hasFile('attachments')) {
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

        return redirect()->back()->with('success', 'ข้อมูลถูกส่งเรียบร้อยแล้ว');
    }
}
