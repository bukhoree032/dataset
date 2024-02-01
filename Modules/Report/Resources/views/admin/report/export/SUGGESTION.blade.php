<table>
    <tr>
        <td align="center"><strong>รหัสแบบสอบถาม</strong></td>
        <td align="center"><strong>รายการข้อมูลเพิ่มเติม</strong></td>
    </tr>
    <tr>
        <td align="center"><strong>COMMU_ID</strong></td>
        <td align="center"><strong>OTHER</strong></td>
    </tr>
    @foreach($data as $key => $value)
    <tr>
        <td>{{ $value->STORE_FORM_NUMBER  }}</td>
        <td>{{ $value->SUGGESTION  }}</td>
    </tr>
    @endforeach
</table>