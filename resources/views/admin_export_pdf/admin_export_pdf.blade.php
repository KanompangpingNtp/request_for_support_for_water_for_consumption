<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'sarabun';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: 'sarabun', sans-serif;
            font-size: 18px;
            margin-left: 80px;
            margin-right: 20px;
            line-height: 8px;
        }

        h3 {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .underline {
            text-decoration: underline;
            display: inline-block;
            width: auto;
        }

        .content-section {
            margin-bottom: 20px;
        }

        .content-section p {
            line-height: 2;
            margin: 0;
        }

        .signature-section {
            margin-top: 30px;
        }

        .signature-line {
            display: inline-block;
            width: 300px;
            border-bottom: 1px solid #000;
            margin-top: 20px;
        }

        .note {
            margin-top: 50px;
        }

        .note p {
            margin: 5px 0;
        }

        .officer-note {
            border: 1px solid #000;
            padding: 10px;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .officer-note-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 12px;
        }

        .dotted-line {
            border-bottom: 1px dotted #000;
            width: 100%;
            height: 20px;
            margin-bottom: 5px;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 20px;
        }

        .column {
            width: 48%;
        }

        .column p {
            margin: 10px 0;
        }

        span.fullname {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 200px;
            color: blue;
        }

        span.fullname_2 {
            border-bottom: 1px dashed;
            padding-left: 30px;
            padding-right: 30px;
            color: blue;
        }

        span.age {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 50px;
            color: blue;
        }

        span.occupation {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.house_no {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 20px;
            color: blue;
        }

        span.house_no_1 {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 150px;
            color: blue;
        }


        span.village_no {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        span.alley {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 40px;
            color: blue;
        }

        span.road {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 80px;
            color: blue;
        }

        span.sub_district {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        span.district {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 20px;
            color: blue;
        }

        span.province {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.phone {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.submission {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 20px;
            color: blue;
            overflow-wrap: break-word;
        }

        span.document_count {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        span.location {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 20px;
            color: blue;
        }

        span.day {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 5px;
            color: blue;
        }

        span.month {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 5px;
            color: blue;
        }

        span.year {
            border-bottom: 1px dashed;
            padding-left: 5px;
            padding-right: 5px;
            color: blue;
        }

        span.submission_name {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 10px;
            color: blue;
        }

        span.item {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.nationality {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 80px;
            color: blue;
        }

        span.detail_form_lastday {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 100px;
            color: blue;
        }

        span.fullname_3 {
            border-bottom: 1px dashed;
            padding-left: 40px;
            padding-right: 40px;
            color: blue;
        }

        span.detail_tax_size {
            border-bottom: 1px dashed;
            padding-left: 10px;
            padding-right: 90px;
            color: blue;
            word-wrap: break-word;
            white-space: normal;
            max-width: 100%;
        }

    </style>
    <title>PDF Report</title>
</head>
<body>

    @php
    use Carbon\Carbon;

    $thaiMonths = [
    'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
    'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
    ];
    $date = Carbon::parse($form->created_at);
    $day = $date->format('d');
    $month = $thaiMonths[$date->month - 1];
    $year = $date->year + 543; // เพิ่ม 543 เพื่อให้เป็นปี พ.ศ.
    @endphp

    @php
    // กำหนดชื่อเดือนในภาษาไทย
    $thaiMonths = [
    'มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน',
    'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'
    ];

    // แปลง start_date เป็นวัน เดือน ปี ภาษาไทย
    $startDate = Carbon::parse($form->start_date);
    $startDay = $startDate->format('d'); // วันที่
    $startMonth = $thaiMonths[$startDate->month - 1]; // เดือน
    $startYear = $startDate->year + 543; // ปี พุทธศักราช (เพิ่ม 543 ปี)
    @endphp

    <div class="container">
        <br>
        <br>
        <h3>คำร้องขอสนับสนุนน้ำอุปโภค-บริโภค</h3>
        <p class="right">เขียนที่ <span class="location">{{ $form->guest_location }}</span> </p>
        <p class="right">วันที่<span class="day">{{ $day }}</span>เดือน<span class="month">{{ $month }}</span>พ.ศ.<span class="year"> {{ $year }}</span></p>

        <p>เรื่อง ขอรับการสนับสนุนน้ำอุปโภค - บริโภค</p>
        <p>เรียน นายกองค์การบริหารส่วนตำบลทัพริก</p>

        <p style="margin-left: 55px;">ด้วยข้าพเจ้า<span class="fullname">{{ $form->guest_salutation }}&nbsp;{{ $form->guest_name }}</span> อายุ <span class="age">{{ $form->guest_age }}</span>ปี</p>
        <p>อยู่บ้านเลขที่<span class="house_no">{{ $form->guest_house_number }}</span>หมู่ที่<span class="village_no">{{ $form->guest_village }}</span>ตำบล<span class="sub_district">{{ $form->guest_subdistrict }}</span>อำเภอ<span class="district">{{ $form->guest_district }}</span>จังหวัดสระแก้ว</p>
        <p>เบอร์โทรศัพท์ที่สามารถติดต่อได้<span class="phone">{{ $form->guest_phone }}</span>มีความประสงค์ขอรับการสนับสนุนน้ำ</p>
        <p>
            @if(in_array('utilities', explode(',', $form->formDetails->first()->detail_type)))
            <input type="checkbox" checked disabled> อุปโภค
            @else
            <input type="checkbox" disabled> อุปโภค
            @endif

            @if(in_array('consume', explode(',', $form->formDetails->first()->detail_type)))
            <input type="checkbox" checked disabled> บริโภค
            @else
            <input type="checkbox" disabled> บริโภค
            @endif

            เพื่อ<span class="submission">{{ $form->formDetails->first()->detail_use_water_to }}</span>จำนวน<span class="submission_name">{{ $form->formDetails->first()->capacity }}</span>ลิตร
        </p>
        <p>โดยให้ทางองค์การบริหารส่วนตำบลทับพริกนำส่งน้ำในวันที่<span class="day">{{ $startDay  }}</span>เดือน<span class="month">{{ $startMonth  }}</span>พ.ศ.<span class="year"> {{ $startYear  }}</span></p>
        <p>ณ<span class="house_no_1">{{ $form->formDetails->first()->detail_location }}</span>หมู่ที่<span class="village_no">{{ $form->formDetails->first()->detail_village }}</span>ตำบล<span class="sub_district">{{ $form->formDetails->first()->detail_subdistrict }}</span></p>
        <p>อำเภอ<span class="district">{{ $form->formDetails->first()->detail_district }}</span>จังหวัด<span class="district">{{ $form->formDetails->first()->detail_province }}</span></p>

        <p style="margin-left: 55px;">จึงเรียนเพื่อโปรดทราบและพิจารณาดำเนินการต่อไป</p>

        <div style="text-align: center;">
            <p>(ลงชื่อ)<span class="fullname_2">{{ $form->guest_salutation }}&nbsp;{{ $form->guest_name }}</span>ผู้ยื่นคำร้อง <br> </p>
            <p>(<span class="fullname_2">{{ $form->guest_name }}</span>)</p>
            <p>ตำแหน่ง.......................................................</p>
            <p style="margin-top: 30px">(ลงชื่อ).........................................................</p>
            <p>(นายวรนารท สุททิชื่น)</p>
            <p>ตำแหน่ง เจ้าหน้าที่งานป้องกันและบรรเทาสาธารณภัยปฏิบัติงาน</p>
        </div>

        <table style="width: 100%; margin-top: 10px;">
            <tr>
                <!-- คอลัมน์ซ้าย -->
                <td style="width: 50%; vertical-align: top;">
                    <p>เรียน ปลัดองค์การบริหารส่วนตำบลทับพริก</p>
                    <p><input type="checkbox"> เห็นควรอนุญาต <br> <input type="checkbox"> ไม่เห็นควรอนุญาต............................ </p>

                    <div style="text-align: center;">
                        <p>(นายชัยยง ศรีกะชา)</p>
                        <p>หัวหน้าสำนักปลัด</p>
                    </div>
                </td>

                <!-- คอลัมน์ขวา -->
                <td style="width: 50%; vertical-align: top;">
                    <p>เรียน ปลัดองค์การบริหารส่วนตำบลทับพริก</p>
                    <p><input type="checkbox"> เห็นควรอนุญาต <br> <input type="checkbox"> ไม่เห็นควรอนุญาต............................ </p>

                    <div style="text-align: center;">
                        <p>(นางภัทรวดี ธนะโรจชูเดช)</p>
                        <p>ปลัดองค์การบริหารส่วนตำบลทับพริก</p>
                    </div>
                </td>
            </tr>
        </table>

        <p>ความเห็นนายกองค์การบริหารส่วนตำบลทับพริก</p>
        <div style="text-align: center;">
            <p><input type="checkbox"> อนุญาต <input type="checkbox" style="margin-left: 100px;"> ไม่เห็นควรอนุญาต............................ </p>
            <p>(นางรัตนากร พุฒเส็ง)</p>
            <p>นายกองค์การบริหารส่วนตำบลทับพริก</p>
        </div>
    </div>
</body>


</html>
