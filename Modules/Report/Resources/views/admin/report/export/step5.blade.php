<table>
    <tr>
        <td align="center"><strong>รหัสแบบสอบถาม</strong></td>
        <td align="center"><strong>รายการ</strong></td>
        <td align="center"><strong>จำนวน</strong></td>
        <td align="center"><strong>1 ความขัดแย้งในครัวเรือน</strong></td>
        <td align="center"><strong>2 ความขัดแย้งกับบุคคลอื่น</strong></td>
    </tr>
    <tr>
        <td align="center"><strong>COMMU_ID</strong></td>
        <td align="center"><strong>COM_ELEC_1</strong></td>
        <td align="center"><strong>COM_ELEC_2</strong></td>
        <td align="center"><strong>HH_CONFLICT</strong></td>
        <td align="center"><strong>CONFLICT_OTHER</strong></td>
    </tr>
    @foreach($data as $key => $value)
    
        @foreach($value->HOUSEHOLD_POLITICAL_COM_ELEC as $key_COM_ELEC => $value_COM_ELEC)
            <tr>
                <td>{{ $value->STORE_FORM_NUMBER }}</td>
    
                <td>{{ $key_COM_ELEC }}</td>
                <td></td>
            </tr>
        @endforeach
    @endforeach
</table>