<div class="form-row">
    <label><b>1. ภาวะหนี้สินของครัวเรือน </b></label>
    <div class="col-md-4 mb-3">
        <label><b>1.1 จำนวนเงิน</b></label>
        {{ $resultEcon->HOUSEHOLD_DEPT_AMOUNT }}
    </div>
    <div class="col-md-4 mb-3">
        <label><b>1.2 สาเหตุของหนี้สิน ( ภาษาราชการ/ประจำชาติ ) </b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_3_1() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_DEPT_FROM_TYPE[$index]) && ($resultEcon->HOUSEHOLD_ECON_DEPT_FROM_TYPE[$index] == $value['id']))
                @php $row++; @endphp
                @if($value['label'] != "12.อื่นๆ (ระบุ)")
                    {{ $row.".".$value['label'] }}<br>
                @else
                    {{ $row.".อื่นๆ" }} ( {{ $resultEcon->HOUSEHOLD_ECON_DEPT_FROM_TYPE_OTHER[$index] }} )<br>
                @endif
            @endif
        @endforeach
    </div>
</div>
<div class="form-row">
    <label><b>2. แหล่งเงินกู้ของครอบครัวเรือน </b></label>
    <div class="col-md-4 mb-3">
        <label><b>2.1 สถาบันเงินเฉพาะกิจ</b> </label>
        @php $row=0; @endphp
        @foreach(__jobs_3_3_2_1() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_SPECIAL_FIN_[$index]) && ($resultEcon->HOUSEHOLD_ECON_SPECIAL_FIN_[$index] == $value['id']))
                @php $row++; @endphp
                {{ $row.".".$value['label'] }}
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>2.2 ธนาคารพาณิชย์</b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_3_2_2() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_COMM_BANK_[$index]) && ($resultEcon->HOUSEHOLD_ECON_COMM_BANK_[$index] == $value['id']))
                @php $row++; @endphp
                @if($value['label'] != "8.อื่นๆ (ระบุ)…..")
                    {{ $row.".".$value['label'] }}<br>
                @else
                    {{ $row.".อื่นๆ" }} ( {{ $resultEcon->HOUSEHOLD_ECON_COMM_BANK_OTHER[$index] }} )<br>
                @endif
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>2.3 สถาบันการเงินที่ไม่ใช่ธนาคาร</b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_3_2_3() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_NONBANK_[$index]) && ($resultEcon->HOUSEHOLD_ECON_NONBANK_[$index] == $value['id']))
                @php $row++; @endphp
                @if($value['label'] != "8.อื่นๆ (ระบุ)…..")
                    {{ $row.".".$value['label'] }}<br>
                @else
                    {{ $row.".อื่นๆ" }} ( {{ $resultEcon->HOUSEHOLD_ECON_NONBANK_OTHER[$index] }} )<br>
                @endif
            @endif
        @endforeach
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>2.4 กองทุนของหมู่บ้าน/ชุมชน</b> </label> 
        @php $row=0; @endphp
        @foreach(__jobs_3_3_2_4() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_COMMU_FUND_[$index]) && ($resultEcon->HOUSEHOLD_ECON_COMMU_FUND_[$index] == $value['id']))
                @php $row++; @endphp
                @if($value['label'] != "8.อื่นๆ (ระบุ)…..")
                    {{ $row.".".$value['label'] }}<br>
                @else
                    {{ $row.".อื่นๆ" }} ( {{ $resultEcon->HOUSEHOLD_ECON_COMMU_FUND_OTHER[$index] }} )<br>
                @endif
            @endif
        @endforeach
    </div><div class="col-md-4 mb-3">
        <label><b>2.5 เงินกู้นอกระบบ</b> </label> 
        @php $row=0; @endphp
        @foreach(__jobs_3_3_2_5() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_SHARK_LOAN_[$index]) && ($resultEcon->HOUSEHOLD_ECON_SHARK_LOAN_[$index] == $value['id']))
                @php $row++; @endphp
                    {{ $row.".".$value['label'] }}<br>
            @endif
        @endforeach
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>3. การออมของครัวเรือน</b> </label>
        @php $row=0; @endphp
        @foreach(__jobs_3_3_3() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_H_SAVING_[$index]) && ($resultEcon->HOUSEHOLD_ECON_H_SAVING_[$index] == $value['id']))
                @php $row++; @endphp
                @if($value['label'] == "6.สหกรณ์ (ระบุ)........")
                    {{ $row.".".$value['label'] }} ( {{ $resultEcon->HOUSEHOLD_ECON_H_SAVING_OTHER[$index] }} )<br>
                @elseif($value['label'] == "15.อื่นๆ (ระบุ)…….")
                    {{ $row.".อื่นๆ" }} ( {{ $resultEcon->HOUSEHOLD_ECON_H_SAVING_OTHER[$index] }} )<br>
                @else
                    {{ $row.".".$value['label'] }}<br>
                @endif
            @endif
        @endforeach
    </div>
</div>
<div class="form-row">
    <label><b>4. ปัญหาด้านเศรษฐกิจในครัวเรือน </b> </label>
    <div class="col-md-4 mb-3">
        <label><b>4.1 ปัญหาด้านเศรษฐกิจในครัวเรือน </b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_3_4_1() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_OCCUP_PROBLEM_[$index]) && ($resultEcon->HOUSEHOLD_ECON_OCCUP_PROBLEM_[$index] == $value['id']))
                @php $row++; @endphp
                @if($value['label'] != "7.อื่นๆ (ระบุ)........")
                    {{ $row.".".$value['label'] }}<br>
                @else
                    {{ $row.".อื่นๆ" }} ( {{ $resultEcon->HOUSEHOLD_ECON_OCCUP_PROBLEM_OTHER[$index] }} )<br>
                @endif
            @endif
        @endforeach
    </div><div class="col-md-4 mb-3">
        <label><b>4.2 ปัญหาด้านเศรษฐกิจในครัวเรือน </b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_3_4_2() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_LIVING_PROBLEM_[$index]) && ($resultEcon->HOUSEHOLD_ECON_LIVING_PROBLEM_[$index] == $value['id']))
                @php $row++; @endphp
                @if($value['label'] != "5.อื่นๆ(ระบุ)")
                    {{ $row.".".$value['label'] }}<br>
                @else
                    {{ $row.".อื่นๆ" }} ( {{ $resultEcon->HOUSEHOLD_ECON_LIVING_PROBLEM_OTHER[$index] }} )<br>
                @endif
            @endif
        @endforeach
    </div>
</div>