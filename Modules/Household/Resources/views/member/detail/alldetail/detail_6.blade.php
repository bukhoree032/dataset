<div class="tile-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-row">
                <div class="col-md-12 mb-6">
                    <label><b>1. ช่องทางการสื่อสารของครัวเรือน(การสื่อสารของคนในครัวเรือนที่สื่อสารระหว่างคนในครอบครัวญาติพี่น้อง เพื่อนบ้าน และชุมชน) </b></label>
                    @php $row=0; @endphp
                    @foreach($result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_OCCUP_ID as $index => $value)
                        @php $row++; @endphp
                        @if($value!="อื่นๆ")
                            {{ $row.".".$value }}<br>
                        @else
                            {{ $row.".".$value }} ( {{ $result->householdInfo->householdCommunicat->HOUSEHOLD_COMUNICAT_OCCUP_ID_OTHER }} )<br>
                        @endif
                    @endforeach
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-md-12 mb-6">
                    <label><b>2. ข้อเสนอแนะ</b></label>
                    {{ $result->householdInfo->householdCommunicat->SUGGESTION }}
                </div>
            </div>

        </div>
    </div>
</div>