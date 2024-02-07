<div class="tile-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-row">
                <div class="col-md-12 mb-6">
                    <label>1. ด้านอาชีพ/รายได้</label>
                    <textarea name="HOUSEHOLD_COMUNICAT_OCCUP" class="form-control" rows="10" placeholder="ข้อเสนอแนะ">{{ $result->HOUSEHOLD_COMUNICAT_OCCUP }}</textarea>
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
                    <label>2. ด้านการศึกษา</label>
                    <textarea name="HOUSEHOLD_COMUNICAT_STUDY" class="form-control" rows="10" placeholder="ข้อเสนอแนะ">{{ $result->HOUSEHOLD_COMUNICAT_STUDY }}</textarea>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-12 mb-6">
                    <label>3. ด้านสังคม</label>
                    <textarea name="HOUSEHOLD_COMUNICAT_SOCIETY" class="form-control" rows="10" placeholder="ข้อเสนอแนะ">{{ $result->HOUSEHOLD_COMUNICAT_SOCIETY }}</textarea>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-12 mb-6">
                    <label>4. ด้านอื่นๆ</label>
                    <textarea name="HOUSEHOLD_COMUNICAT_OTHER" class="form-control" rows="10" placeholder="ข้อเสนอแนะ">{{ $result->HOUSEHOLD_COMUNICAT_OTHER }}</textarea>
                </div>
            </div>

        </div>
    </div>
</div>