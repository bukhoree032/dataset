<table>
<tr>
</tr>
<tr>
        <td align="center"><strong>COMMU_ID</strong></td>
        <td align="center"><strong>NO_FAMILY</strong></td>
        <td align="center"><strong>RISK1</strong></td>
        <td align="center"><strong>RISK2</strong></td>
        <td align="center"><strong>RISK3</strong></td>
        <td align="center"><strong>RISK4</strong></td>
        <td align="center"><strong>RISK5</strong></td>
        <td align="center"><strong>RISK_OCCUP1</strong></td>
        <td align="center"><strong>RISK_OCCUP2 </strong></td>
        <td align="center"><strong>RISK_OCCUP3 </strong></td>
        <td align="center"><strong>RISK_OCCUP4 </strong></td>
        <td align="center"><strong>RISK_OCCUP5 </strong></td>
        <td align="center"><strong>HCARE_1</strong></td>
        <td align="center"><strong>HCARE_2</strong></td>
        <td align="center"><strong>HCARE_3</strong></td>
        <td align="center"><strong>HCARE_4</strong></td>
        <td align="center"><strong>HCARE_5</strong></td>
        <td align="center"><strong>EMERGENCY1</strong></td>
        <td align="center"><strong>EMERGENCY2</strong></td>
        <td align="center"><strong>EMERGENCY3</strong></td>
        <td align="center"><strong>EMERGENCY4</strong></td>
        <td align="center"><strong>EMERGENCY5</strong></td>
        <td align="center"><strong>C_ILLNESS1</strong></td>
        <td align="center"><strong>C_ILLNESS2</strong></td>
        <td align="center"><strong>C_ILLNESS3</strong></td>
        <td align="center"><strong>C_ILLNESS4</strong></td>
        <td align="center"><strong>C_ILLNESS5</strong></td>
        <td align="center"><strong>CARER_1</strong></td>
        <td align="center"><strong>CARER_2</strong></td>
        <td align="center"><strong>CARER_3</strong></td>
        <td align="center"><strong>CARER_4</strong></td>
        <td align="center"><strong>CARER_5</strong></td>
        <td align="center"><strong>W_CARE1</strong></td>
        <td align="center"><strong>W_CARE2</strong></td>
        <td align="center"><strong>W_CARE3</strong></td>
        <td align="center"><strong>W_CARE4</strong></td>
        <td align="center"><strong>W_CARE5</strong></td>
        <td align="center"><strong>P_CARE1</strong></td>
        <td align="center"><strong>P_CARE2</strong></td>
        <td align="center"><strong>P_CARE3</strong></td>
        <td align="center"><strong>P_CARE4</strong></td>
        <td align="center"><strong>P_CARE5</strong></td>
        <td align="center"><strong>ILLNESS</strong></td>
        <td align="center"><strong>BENEFIT1</strong></td>
        <td align="center"><strong>BENEFIT2</strong></td>
        <td align="center"><strong>BENEFIT3</strong></td>
        <td align="center"><strong>BENEFIT4</strong></td>
        <td align="center"><strong>BENEFIT5</strong></td>
        <td align="center"><strong>BENEFIT_TYPE1</strong></td>
        <td align="center"><strong>BENEFIT_TYPE2</strong></td>
        <td align="center"><strong>BENEFIT_TYPE3</strong></td>
        <td align="center"><strong>BENEFIT_TYPE4</strong></td>
        <td align="center"><strong>BENEFIT_TYPE5</strong></td>
        
    </tr>
    @foreach($data as $key => $value)
        <tr>
            <td>{{ $value->STORE_FORM_NUMBER }}</td>
            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_MEMBER_HEALTH_RISK as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=5; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_MEMBER_HEALTH_HCARE as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_MEMBER_HEALTH_EMERGENCY as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_MEMBER_HEALTH_CARER_ as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            <td>{{ $value->HOUSEHOLD_MEMBER_HEALTH_W_CARE }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_MEMBER_HEALTH_P_CARE as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_MEMBER_HEALTH_ILLNESS as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_MEMBER_HEALTH_BENEFIT as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor
            

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor
            
        </tr>
    @endforeach
</table>