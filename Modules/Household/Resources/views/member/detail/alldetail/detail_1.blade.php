<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>1. ความสามารถเฉพาะ </b></label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_SKILL as $index => $value)
            @php $row++; @endphp
            @if($value!="21.อื่นๆ (ระบุ)")
                {{ $row.".".$value }}<br>
            @else
                {{ $row.".อื่นๆ" }} ( {{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_SKILL_OTHER }} )<br>
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>2.1 ภาษาพูด ( ภาษาราชการ/ประจำชาติ ) </b></label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG as $index => $value)
            @php $row++; @endphp
            @if($value!="21.อื่นๆ (ระบุ)")
                {{ $row.".".$value }}<br>
            @else
                {{ $row.".อื่นๆ" }} ( {{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_NATIONAL_OTHER }} )<br>
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>2.2 ภาษาพูด ( ภาษาประจำท้องถิ่น/ชาติพันธุ์ ) </b></label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG as $index => $value)
            @php $row++; @endphp
            @if($value!="21.อื่นๆ (ระบุ)")
                {{ $row.".".$value }}<br>
            @else
                {{ $row.".อื่นๆ" }} ( {{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_LOCAL_OTHER }} )<br>
            @endif
        @endforeach
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>3. สถานภาพสมรส</b> </label>
        1.{{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_STATUS }}
    </div>
    <div class="col-md-4 mb-3">
        <label><b>4.1 การศึกษา ( สถานะการศึกษา ) </b></label>
        1.{{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS }}
    </div>
    <div class="col-md-4 mb-3">
        <label><b>2.2 การศึกษา ( ระดับการศึกษา ) </b></label>
        1.{{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL }}
    </div>
</div>
<div class="form-row">
        <label><b>5. ความสามารถในการอ่านออกเขียนได้และการคิดคำนวณเบื้องต้นได้ </b></label>
    <div class="col-md-4 mb-3">
        <label><b>5.1 การอ่าน</b> </label> 
        1.{{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL }}
    </div>
    <div class="col-md-4 mb-3">
        <label><b>5.2 การเขียน</b> </label> 
        1.{{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL }}
    </div>
    <div class="col-md-4 mb-3">
        <label><b>5.3 การคิดคำนวณ</b> </label> 
        1.{{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD }}
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>6. ความเกี่ยวข้องกับหัวหน้าครัวเรือน</b> </label>
        1.{{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD }}
    </div>
    <div class="col-md-4 mb-3">
        <label><b>7. การอยู่อาศัยในครัวเรือน</b> </label> 
        1.{{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS }}
    </div>
</div>

<div class="form-row">
    <label><b>ข้อมูลการประกอบอาชีพ </b></label>
    <div class="col-md-4 mb-3">
        <label><b>1.  อาชีพหลัก</b> </label> 
        @if($value!="18.อื่นๆ (ระบุ)")
            1.{{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID }} ({{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS}})
        @else
            {{ $row.".อื่นๆ" }} ( {{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID_OTHER }} )<br>
        @endif
    </div>
    <div class="col-md-4 mb-3">
        <label><b>2. อาชีพเสริม</b> </label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID as $index => $value)
            @php $row++; @endphp
            @if($value!="13.อื่นๆ (ระบุ)")
                {{ $row.".".$value }}
                @if(isset($valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS[$index])) ( {{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS[$index] }} ) @endif<br>
            @else
                {{ $row.".อื่นๆ" }} ( {{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID_OTHER }} )<br>
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>3. พื้นที่การทำงานของอาชีพหลัก</b> </label> 
        1.{{ $valueMember->householdMemberGeneral->HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP }}
    </div>
</div>