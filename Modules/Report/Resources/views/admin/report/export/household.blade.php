<table>
    <tr>
        <td align="center"><strong>รหัสแบบสอบถาม</strong></td>
        <td align="center"><strong>จังหวัด</strong></td>
        <td align="center"><strong>เขต/อำเภอ</strong></td>
        <td align="center"><strong>แขวง/ตำบล</strong></td>
        <td align="center"><strong>หมู่ที่</strong></td>
        <td align="center"><strong>ชื่อหมู่บ้าน</strong></td>
        <td align="center"><strong>ชื่อชุมชน</strong></td>
        <td align="center"><strong>บ้านเลขที่</strong></td>
        <td align="center"><strong>รหัสประจำบ้าน</strong></td>
        <td align="center"><strong>กรณีไม่มีบ้านเลขที่ บ้านใกล้เคียงเลขที่</strong></td>
        <td align="center"><strong>ซอย</strong></td>
        <td align="center"><strong>ถนน</strong></td>
        <td align="center"><strong>ละติจูด</strong></td>
        <td align="center"><strong>ลองติจูด</strong></td>
        <td align="center"><strong>ภาพถ่ายแผนที่</strong></td>
        <td align="center"><strong>ภาพบ้านครัวเรือน1</strong></td>
        <td align="center"><strong>ภาพบ้านครัวเรือน2</strong></td>
        <td align="center"><strong>ภาพบ้านครัวเรือน3</strong></td>
    </tr>
    <tr>
        <td align="center"><strong>PROVINCE</strong></td>
        <td align="center"><strong>DISTRICT</strong></td>
        <td align="center"><strong>TAMBON</strong></td>
        <td align="center"><strong>MOO</strong></td>
        <td align="center"><strong>VIL_NAME</strong></td>
        <td align="center"><strong>COMMU_NAME</strong></td>
        <td align="center"><strong>ADDRESS</strong></td>
        <td align="center"><strong>HOUSE_CODE</strong></td>
        <td align="center"><strong>HOUSE_NEAR</strong></td>
        <td align="center"><strong>SOI</strong></td>
        <td align="center"><strong>ROAD</strong></td>
        <td align="center"><strong>LOCAL_LAT</strong></td>
        <td align="center"><strong>LOCAL_LONG</strong></td>
    </tr>
    @foreach($data as $key => $value)
    <tr>
        <td>{{ $value->STORE_FORM_NUMBER }}</td>
        <td>{{ $value->name_th_jangwat }}</td>
        <td>{{ $value->name_th_am }}</td>
        <td>{{ $value->name_th_dis }}</td>
        <td>{{ $value->HOUSEHOLD_INFO_MOO }}</td>
        <td>{{ $value->HOUSEHOLD_INFO_VIL_NAME }}</td>
        <td>{{ $value->HOUSEHOLD_INFO_COMMU_NAME }}</td>
        <td>{{ $value->HOUSEHOLD_INFO_ADDRESS }}</td>
        <td>{{ $value->HOUSEHOLD_INFO_HOUSE_CODE }}</td>
        <td>{{ $value->HOUSEHOLD_INFO_HOUSE_NEAR }}</td>
        <td>{{ $value->HOUSEHOLD_INFO_SOI }}</td>
        <td>{{ $value->HOUSEHOLD_INFO_ROAD }}</td>
        <td>{{ $value->HOUSEHOLD_INFO_LOCAL_LAT }}</td>
        <td>{{ $value->HOUSEHOLD_INFO_LOCAL_LONG }}</td>
    </tr>
    @endforeach
</table>