<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>1. ที่อยู่อาศัย</b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_2_1() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_HOUSE_LIST[$index]) && ($resultEcon->HOUSEHOLD_ECON_HOUSE_LIST[$index] == $value['id'] || $resultEcon->HOUSEHOLD_ECON_HOUSE_LIST[$index] == $value['label'] || $resultEcon->HOUSEHOLD_ECON_HOUSE_LIST[$index] == $value['label']))
                @php $row++; @endphp
                {{ $row.".".$value['label'] }} ( {{ $resultEcon->HOUSEHOLD_ECON_HOUSE_NO[$index] }} )<br>
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>2. ที่ดินทำกิน</b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_2_2() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_LAND[$index]) && ($resultEcon->HOUSEHOLD_ECON_LAND[$index] == $value['id'] || $resultEcon->HOUSEHOLD_ECON_HOUSE_LIST[$index] == $value['label']))
                @php $row++; @endphp
                {{ $row.".".$value['label'] }} ( {{ $resultEcon->HOUSEHOLD_ECON_LAND_SIZE[$index] }} )<br>
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>3. สถานที่ตั้งของบ้านและที่ดินทำกิน</b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_2_3() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_AREA_LIST[$index]) && ($resultEcon->HOUSEHOLD_ECON_AREA_LIST[$index] == $value['id']))
                @php $row++; @endphp
                @if($value['label'] != "พื้นที่อยู่แยกกับที่ดินทำกิน")
                    {{ $row.".".$value['label'] }} ( {{ $resultEcon->HOUSEHOLD_ECON_AREA_NO[0][0] }} )<br>
                @else
                    {{ $row.".".$value['label'] }} ( บ้าน {{ $resultEcon->HOUSEHOLD_ECON_AREA_NO[1][1] }} / ที่ดินทำกิน {{ $resultEcon->HOUSEHOLD_ECON_AREA_NO[1][2] }})<br>
                @endif
            @endif
            @if(isset($resultEcon->HOUSEHOLD_ECON_AREA_LIST[$index]) && ($resultEcon->HOUSEHOLD_ECON_AREA_LIST[$index] == $value['label']))
                @php $row++; @endphp
                @if($value['label'] != "พื้นที่อยู่แยกกับที่ดินทำกิน")
                    {{ $row.".".$value['label'] }} ( {{ $resultEcon->HOUSEHOLD_ECON_AREA_NO[0][0] }} )<br>
                @else
                    {{ $row.".".$value['label'] }} ( บ้าน {{ $resultEcon->HOUSEHOLD_ECON_AREA_NO[1][1] }} / ที่ดินทำกิน {{ $resultEcon->HOUSEHOLD_ECON_AREA_NO[1][2] }})<br>
                @endif
            @endif
        @endforeach
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>4. เครื่องมือ/เครื่องจักรในการประกอบอาชีพ </b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_2_4() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_EQUIPMENT_TYPE[$index]) && ($resultEcon->HOUSEHOLD_ECON_EQUIPMENT_TYPE[$index] == $value['id'] || $resultEcon->HOUSEHOLD_ECON_HOUSE_LIST[$index] == $value['label']))
                @php $row++; @endphp
                {{ $row.".".$value['label'] }} ( {{ $resultEcon->HOUSEHOLD_ECON_EQUIPMENT_NUM[$index] }} )<br>
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>5. ยานพาหนะ</b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_2_5() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_VEHICLE_TYPE[$index]) && ($resultEcon->HOUSEHOLD_ECON_VEHICLE_TYPE[$index] == $value['id'] || $resultEcon->HOUSEHOLD_ECON_HOUSE_LIST[$index] == $value['label']))
                @php $row++; @endphp
                {{ $row.".".$value['label'] }} ( {{ $resultEcon->HOUSEHOLD_ECON_VEHICLE_NUM[$index] }} )<br>
            @endif
        @endforeach
    </div>
    <div class="col-md-4 mb-3">
        <label><b>6. อุปกรณ์สื่อสาร</b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_2_6() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_COM_DEVICE_TYPE[$index]) && ($resultEcon->HOUSEHOLD_ECON_COM_DEVICE_TYPE[$index] == $value['id'] || $resultEcon->HOUSEHOLD_ECON_HOUSE_LIST[$index] == $value['label']))
                @php $row++; @endphp
                {{ $row.".".$value['label'] }} ( {{ $resultEcon->HOUSEHOLD_ECON_COM_DEVICE_NUM[$index] }} )<br>
            @endif
        @endforeach
    </div>
</div>
<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>7. สัตว์เลี้ยง </b></label>
        @php $row=0; @endphp
        @foreach(__jobs_3_2_6() as $index => $value)
            @if(isset($resultEcon->HOUSEHOLD_ECON_PET_CATEG[$index]) && ($resultEcon->HOUSEHOLD_ECON_PET_CATEG[$index] == $value['id'] || $resultEcon->HOUSEHOLD_ECON_HOUSE_LIST[$index] == $value['label']))
                @php $row++; @endphp
                {{ $row.".".$value['label'] }} ( {{ $resultEcon->HOUSEHOLD_ECON_PET_NUM[$index] }} )<br>
            @endif
        @endforeach
    </div>
</div>