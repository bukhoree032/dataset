<div class="tile-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-row">
                <div class="col-md-12 mb-6">
                    <label><b>1. ด้านอาชีพ/รายได้ </b></label>
                    
                    {{ $result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_OCCUP }}
                    {{-- @php $row=0; @endphp
                    @foreach($result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_OCCUP_ID as $index => $value)
                        @php $row++; @endphp
                        @if($value!="อื่นๆ")
                            {{ $row.".".$value }}<br>
                        @else
                            {{ $row.".".$value }} ( {{ $result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_OCCUP_ID_OTHER }} )<br>
                        @endif
                    @endforeach --}}
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-12 mb-6">
                    <label><b>2. ด้านการศึกษา</b></label>
                    {{ $result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_STUDY }}
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-6">
                    <label><b>3. ด้านสังคม</b></label>
                    {{ $result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_SOCIETY }}
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-6">
                    <label><b>4. ด้านอื่นๆ</b></label>
                    {{ $result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_OTHER }}
                </div>
            </div>

        </div>
    </div>
</div>