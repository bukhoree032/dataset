<div class="tile-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-row">
                <div class="col-md-12 mb-6">
                    <label><b>1. สมาชิกในครัวเรือนของท่านมีส่วนร่วมในกิจกรรมของชุมชน</b></label>
                    @php $row=0; @endphp
                    @foreach($result->householdInfo->householdPolitical->HOUSEHOLD_POLITICAL_COM_ELEC as $index => $value)
                        @php $row++; @endphp
                        @if($value!="อื่นๆ (ระบุ)")
                            {{ $row.".".$value }}<br>
                        @else
                            {{ $row.".อื่นๆ" }} ( {{ $result->householdInfo->householdPolitical->HOUSEHOLD_POLITICAL_COM_ELEC_OTHER }} )<br>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-12">
                    <label><b>2. กรณีพิพาทของสมาชิกในครัวเรือน</b></label>
                </div>
                <div class="col-md-6 mb-6">
                    <label><b>2.1 ความขัดแย้งในครัวเรือน</b></label>
                    1.{{ $result->householdInfo->householdPolitical->HOUSEHOLD_POLITICAL_HH_CONFLICT }}
                </div>
                <div class="col-md-5 mb-6">
                    <label><b>2.2 ความขัดแย้งกับบุคคลอื่น</b></label>
                    1.{{ $result->householdInfo->householdPolitical->HOUSEHOLD_POLITICAL_CONFLICT_OTHER }}
                </div>
            </div>

        </div>
    </div>
</div>