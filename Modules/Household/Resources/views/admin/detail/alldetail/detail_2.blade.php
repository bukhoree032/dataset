<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>ข้อมูลพฤติกรรมเสี่ยงของสมาชิกครัวเรือน</b> </label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_RISK as $index => $value)
            @php $row++; @endphp
            {{ $row.".".$value }}<br>
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>2. ข้อมูลภาวะเสี่ยงจากการประกอบอาชีพของสมาชิกครัวเรือน</b> </label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP as $index => $value)
            @php $row++; @endphp
            {{ $row.".".$value }}<br>
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>3. ข้อมูลผู้ที่ต้องการได้รับการช่วยเหลือดูแลในครัวเรือน</b> </label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_HCARE as $index => $value)
            @php $row++; @endphp
            {{ $row.".".$value }}<br>
        @endforeach
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>4. ข้อมูลภาวะฉุกเฉินที่ต้องได้รับการรักษา</b> </label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_EMERGENCY as $index => $value)
            @php $row++; @endphp
            {{ $row.".".$value }}<br>
        @endforeach
    </div>
</div>
<div class="form-row">
        <label><b>5. ข้อมูลการเจ็บป่วยเรื้อรัง การดูแลรักษาเมื่อมีภาวการณ์เจ็บป่วย ปัญหาและความต้องการในการดูแลรักษาสุขภาพ และสภาวะการเจ็บป่วยในปัจจุบัน</b> </label>
    <div class="col-md-4 mb-3">
        <label><b>5.1 ข้อมูลการเจ็บป่วยเรื้อรัง</b> </label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS as $index => $value)
            @php $row++; @endphp
            @if($value!="24.อื่นๆ (ระบุ)")
                {{ $row.".".$value }} <br>
            @else
                {{ $row.".อื่นๆ" }} ( {{ $valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS_OTHER }} )<br>
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>5.2 ข้อมูลผู้ให้การดูแล</b> </label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_ as $index => $value)
            @php $row++; @endphp
            @if($value!="12.อื่นๆ (ระบุ)")
                {{ $row.".".$value }} 
                @if(isset($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index])) ( {{ $valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index] }} ) @endif<br>
            @else
                {{ $row.".อื่นๆ" }} ( {{ $valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index] }} )<br>
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>5.3 ข้อมูลแนวทางการดูแลรักษาเมื่อมีภาวะเจ็บป่วย</b> </label>
            @if($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_W_CARE != "9.อื่นๆ (ระบุ)")
                1.{{ $valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_W_CARE }}<br>
            @else
                1.{{ "อื่นๆ" }} ( {{ $valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_W_CARE_OTHER }} )<br>
            @endif
    </div>
</div>
<div class="form-row">
    <label><b>6. ข้อมูลปัญหาและสภาวะจากการเจ็บป่วยเรื้อรังในปัจจุบัน</b> </label>
    <div class="col-md-4 mb-3">
        <label><b>6.1 ข้อมูลปัญหาการดูแลสุขภาพจากการเจ็บป่วยเรื้อรังในปัจจุบัน</b> </label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_ as $index => $value)
            @php $row++; @endphp
            @if($value!="12.อื่นๆ (ระบุ)")
                {{ $row.".".$value }} 
                @if(isset($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index])) ( {{ $valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index] }} ) @endif<br>
            @else
                {{ $row.".อื่นๆ" }} ( {{ $valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index] }} )<br>
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>6.2 ข้อมูลสภาวะการเจ็บป่วยเรื้อรังในปัจจุบัน</b> </label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_ as $index => $value)
            @php $row++; @endphp
            @if($value!="12.อื่นๆ (ระบุ)")
                {{ $row.".".$value }} 
                @if(isset($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index])) ( {{ $valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index] }} ) @endif<br>
            @else
                {{ $row.".อื่นๆ" }} ( {{ $valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index] }} )<br>
            @endif
        @endforeach
    </div>
</div>
<div class="form-row">
    <label><b>7. ข้อมูลสิทธิและสวัสดิการในการรักษาพยาบาล</b> </label>
    <div class="col-md-4 mb-3">
        <label><b>7.1 ข้อมูลสิทธิและสวัสดิการในการรักษาพยาบาล</b> </label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_BENEFIT as $index => $value)
            @php $row++; @endphp
            {{ $row.".".$value }} <br>
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>ข้อมูลการใช้สิทธิในการรักษาพยาบาล</b> </label>
        @php $row=0; @endphp
        @foreach($valueMember->householdMemberHealth->HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE as $index => $value)
            @php $row++; @endphp
            {{ $row.".".$value }} <br>
        @endforeach
    </div>
</div>