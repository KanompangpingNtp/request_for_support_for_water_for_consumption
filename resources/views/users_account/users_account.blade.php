@extends('layout.users_account_layout')
@section('account_layout')

<!-- Success Message -->
@if ($message = Session::get('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: '{{ $message }}',
    })
</script>
@endif

<div class="container">
    <h3 class="text-center">กรอกข้อมูล</h3>
    <form action="{{ route('FormCreate')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- ฟอร์มหลัก (Form Data) -->
        <div class="card">
            <div class="card-header">
                ข้อมูลหลัก
            </div>
            <div class="card-body">
                <div class="mb-3 col-md-3">
                    <label for="guest_location" class="form-label">กรอกที่</label>
                    <input type="text" class="form-control" id="guest_location" name="guest_location" required>
                </div>
                <div class="mb-3 col-md-2">
                    <label for="request_date" class="form-label">วันที่กรอกแบบฟอร์ม</label>
                    <input type="date" class="form-control" id="request_date" name="request_date" required>
                </div>
               <div class="row">
                <div class="col-md-2 mb-3">
                    <label for="guest_salutation" class="form-label">คำนำหน้า</label>
                    <select class="form-select" id="guest_salutation" name="guest_salutation" required>
                        <option value="" disabled {{ $user->userDetails->salutation ? '' : 'selected' }}>เลือกคำนำหน้า</option>
                        <option value="นาย" {{ $user->userDetails->salutation == 'นาย' ? 'selected' : '' }}>นาย</option>
                        <option value="นาง" {{ $user->userDetails->salutation == 'นาง' ? 'selected' : '' }}>นาง</option>
                        <option value="นางสาว" {{ $user->userDetails->salutation == 'นางสาว' ? 'selected' : '' }}>นางสาว</option>
                    </select>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="guest_name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" id="guest_name" name="guest_name" value="{{ $user->name }}">
                </div>
                <div class="mb-3 col-md-1">
                    <label for="guest_age" class="form-label">อายุ</label>
                    <input type="number" class="form-control" id="guest_age" name="guest_age" value="{{ $user->userDetails->age }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="guest_occupation" class="form-label">อาชีพ</label>
                    <input type="text" class="form-control" id="guest_occupation" name="guest_occupation" value="{{ $user->userDetails->occupation }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="guest_phone" class="form-label">เบอร์ติดต่อ</label>
                    <input type="text" class="form-control" id="guest_phone" name="guest_phone" value="{{ $user->userDetails->phone }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="guest_house_number" class="form-label">บ้านเลขที่</label>
                    <input type="text" class="form-control" id="guest_house_number" name="guest_house_number" value="{{ $user->userDetails->house_number }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="guest_village" class="form-label">หมู่ที่</label>
                    <input type="text" class="form-control" id="guest_village" name="guest_village" value="{{ $user->userDetails->village }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="guest_subdistrict" class="form-label">ตำบล</label>
                    <input type="text" class="form-control" id="guest_subdistrict" name="guest_subdistrict" value="{{ $user->userDetails->subdistrict }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="guest_district" class="form-label">อำเภอ</label>
                    <input type="text" class="form-control" id="guest_district" name="guest_district" value="{{ $user->userDetails->district }}">
                </div>
               </div>
            </div>
        </div>

        <!-- ฟอร์มรายละเอียดการใช้น้ำ (Form Detail) -->
        <div class="card mt-4">
            <div class="card-header">
                รายละเอียดการใช้น้ำ
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">ประเภทการใช้น้ำ</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="utilities" id="detail_type_utilities" name="detail_type[]">
                        <label class="form-check-label" for="detail_type_utilities">
                            อุปโภค
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="consume" id="detail_type_consume" name="detail_type[]">
                        <label class="form-check-label" for="detail_type_consume">
                            บริโภค
                        </label>
                    </div>
                </div>

                <div class="mb-3 col-md-4">
                    <label for="detail_request_date" class="form-label">วันที่ส่งน้ำ</label>
                    <input type="date" class="form-control" id="detail_request_date" name="detail_request_date" required>
                </div>
                <div class="mb-3 col-md-3">
                    <label for="capacity" class="form-label">จำนวนน้ำ</label>
                    <div class="d-flex align-items-center">
                        <input type="number" step="0.01" class="form-control" id="capacity" name="capacity" required>
                        <span class="ms-2">ลิตร</span>
                    </div>
                </div>
                <div class="mb-3 col-md-4">
                    <label for="detail_use_water_to" class="form-label">ใช้น้ำเพื่อ</label>
                    <input type="text" class="form-control" id="detail_use_water_to" name="detail_use_water_to">
                </div>
                <div class="row">
                    <div class="mb-3 col-md-4">
                        <label for="detail_location" class="form-label">ที่ตั้ง</label>
                        <input type="text" class="form-control" id="detail_location" name="detail_location">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="detail_village" class="form-label">หมู่ที่</label>
                        <input type="text" class="form-control" id="detail_village" name="detail_village">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="detail_subdistrict" class="form-label">ตำบล</label>
                        <input type="text" class="form-control" id="detail_subdistrict" name="detail_subdistrict">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="detail_district" class="form-label">อำเภอ</label>
                        <input type="text" class="form-control" id="detail_district" name="detail_district">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="detail_province" class="form-label">จังหวัด</label>
                        <input type="text" class="form-control" id="detail_province" name="detail_province">
                    </div>
                </div>
            </div>
        </div>

        <!-- ฟอร์มสำหรับการแนบไฟล์ -->
        <div class="card mt-4">
            <div class="card-header">
                แนบไฟล์ (ถ้ามี)
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="attachments" class="form-label">เลือกไฟล์</label>
                    <input type="file" class="form-control" id="attachments" name="attachments[]" multiple>
                </div>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-primary">ส่งข้อมูล</button>
        </div>
    </form>
</div>


@endsection
