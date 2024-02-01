<table>
    <tr>
        <td align="center"><strong>รหัสแบบสอบถาม</strong></td>
        <td align="center"><strong>ช่องทางการสื่อสารของครัวเรือน</strong></td>
    </tr>
    <tr>
        <td align="center"><strong>COMMU_ID</strong></td>
        <td align="center"><strong>CHANNEL</strong></td>
    </tr>
    @foreach($data as $key => $value)
    
        @foreach($value->HOUSEHOLD_COMUNICAT_OCCUP_ID as $key_OCCUP => $value_OCCUP)
            <tr>
                @php $key_OCCUP++ @endphp
                <td>{{ $value->STORE_FORM_NUMBER }}</td>
                <td>{{ $key_OCCUP }}</td>
            </tr>
        @endforeach
    @endforeach
</table>