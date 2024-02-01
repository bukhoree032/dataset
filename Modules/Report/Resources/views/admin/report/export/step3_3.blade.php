<table>
<tr>
</tr>
<tr>
        <td align="center"><strong>COMMU_ID</strong></td>
        <td align="center"><strong>DEPT_AMOUNT</strong></td>
        <td align="center"><strong>DEPT_FROM_TYPE1</strong></td>
        <td align="center"><strong>DEPT_FROM_TYPE2</strong></td>
        <td align="center"><strong>DEPT_FROM_TYPE3</strong></td>
        <td align="center"><strong>DEPT_FROM_TYPE4</strong></td>
        <td align="center"><strong>DEPT_FROM_TYPE5</strong></td>
        <td align="center"><strong>SPECIAL_FIN_1</strong></td>
        <td align="center"><strong>SPECIAL_FIN_2</strong></td>
        <td align="center"><strong>SPECIAL_FIN_3</strong></td>
        <td align="center"><strong>SPECIAL_FIN_4</strong></td>
        <td align="center"><strong>SPECIAL_FIN_5</strong></td>
        <td align="center"><strong>COMM_BANK_1</strong></td>
        <td align="center"><strong>COMM_BANK_2</strong></td>
        <td align="center"><strong>COMM_BANK_3</strong></td>
        <td align="center"><strong>COMM_BANK_4</strong></td>
        <td align="center"><strong>COMM_BANK_5</strong></td>
        <td align="center"><strong>NONBANK_1</strong></td>
        <td align="center"><strong>NONBANK_2</strong></td>
        <td align="center"><strong>NONBANK_3</strong></td>
        <td align="center"><strong>NONBANK_4</strong></td>
        <td align="center"><strong>NONBANK_5</strong></td>
        <td align="center"><strong>COMMU_FUND_1</strong></td>
        <td align="center"><strong>COMMU_FUND_2</strong></td>
        <td align="center"><strong>COMMU_FUND_3</strong></td>
        <td align="center"><strong>COMMU_FUND_4</strong></td>
        <td align="center"><strong>COMMU_FUND_5</strong></td>
        <td align="center"><strong>SHARK_LOAN_1</strong></td>
        <td align="center"><strong>SHARK_LOAN_2</strong></td>
        <td align="center"><strong>SHARK_LOAN_3</strong></td>
        <td align="center"><strong>SHARK_LOAN_4</strong></td>
        <td align="center"><strong>SHARK_LOAN_5</strong></td>
        <td align="center"><strong>H_SAVING_1</strong></td>
        <td align="center"><strong>H_SAVING_2</strong></td>
        <td align="center"><strong>H_SAVING_3</strong></td>
        <td align="center"><strong>H_SAVING_4</strong></td>
        <td align="center"><strong>H_SAVING_5</strong></td>
        <td align="center"><strong>OCCUP_PROBLEM_1</strong></td>
        <td align="center"><strong>OCCUP_PROBLEM_2</strong></td>
        <td align="center"><strong>OCCUP_PROBLEM_3</strong></td>
        <td align="center"><strong>OCCUP_PROBLEM_4</strong></td>
        <td align="center"><strong>OCCUP_PROBLEM_5</strong></td>
        <td align="center"><strong>LIVING_PROBLEM_1</strong></td>
        <td align="center"><strong>LIVING_PROBLEM_2</strong></td>
        <td align="center"><strong>LIVING_PROBLEM_3</strong></td>
        <td align="center"><strong>LIVING_PROBLEM_4</strong></td>
        <td align="center"><strong>LIVING_PROBLEM_5</strong></td>
    </tr>
    @foreach($data as $key => $value)
        <tr>
            <td>{{ $value->STORE_FORM_NUMBER }}</td>
            
            <td>{{ $value->HOUSEHOLD_DEPT_AMOUNT }}</td>

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ECON_DEPT_FROM_TYPE as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ECON_SPECIAL_FIN_ as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ECON_COMM_BANK_ as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ECON_NONBANK_ as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ECON_COMMU_FUND_ as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ECON_H_SAVING_ as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ECON_OCCUP_PROBLEM_ as $key_loop => $value_loop)
                @php $row++; @endphp
                @php $key_loop++; @endphp
                <td>{{ $key_loop }}</td>
            @endforeach
            @for($i=$row; $i<=4; $i++)
                <td></td>
            @endfor

            @php $row='0'; @endphp
            @foreach($value->HOUSEHOLD_ECON_LIVING_PROBLEM_ as $key_loop => $value_loop)
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