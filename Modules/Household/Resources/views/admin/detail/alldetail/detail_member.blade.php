<div class="tile">
    <div class="tile-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @php $row_true = '0';  @endphp
            @foreach($resultMember as $valueMember)
            @php $row_true++;  @endphp
                <li class="nav-item">
                    <a class="nav-link @if($row_true=='1') active @endif" id="pills-member_{{ $valueMember->id }}-tab" data-toggle="pill" href="#pills-member_{{ $valueMember->id }}" role="tab" aria-controls="pills-member_{{ $valueMember->id }}" aria-selected="@if($row_true=='1') true @else false @endif">{{ $valueMember->HOUSEHOLD_MEMBER_NAME }} {{ $valueMember->HOUSEHOLD_MEMBER_SURNAME }}</a>
                </li>
            @endforeach
        </ul>
        
        <div class="tab-content" id="pills-tabContent">
            @php $row_true = '0';  @endphp
            @foreach($resultMember as $valueMember)
            @php $row_true++;  @endphp
                <div class="tab-pane fade @if($row_true=='1') show active @endif" id="pills-member_{{ $valueMember->id }}" role="tabpanel" aria-labelledby="pills-member_{{ $valueMember->id }}-tab">
                    <hr>
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label><b>ชื่อ นามสกุล :</b> {{ $valueMember->HOUSEHOLD_MEMBER_PNAME }}{{ $valueMember->HOUSEHOLD_MEMBER_NAME }} {{ $valueMember->HOUSEHOLD_MEMBER_SURNAME }}</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label><b>อายุ :</b> {{ $valueMember->HOUSEHOLD_MEMBER_AGE }} </label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label><b>เพศ :</b> {{ $valueMember->HOUSEHOLD_MEMBER_SEX }} </label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label><b>ส่วนสูง :</b> {{ $valueMember->HOUSEHOLD_MEMBER_HEIGHT }} ซม.</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label><b>น้ำหนัก :</b> {{ $valueMember->HOUSEHOLD_MEMBER_WEIGHT }} กก.</label>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label><b>วัน/เดือน/ปีเกิด :</b> {{ $valueMember->HOUSEHOLD_MEMBER_DOB }}</label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label><b>สัญชาติ :</b> {{ $valueMember->HOUSEHOLD_MEMBER_NATIONALITY }} </label>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label><b>ศาสนา :</b> {{ $valueMember->HOUSEHOLD_MEMBER_RELIGION }} </label>
                                    </div>
                                </div>

                                <!-- ส่วนที่ 1 -->
                                <div>
                                    <h3 class="tile-title">ข้อมูลทั่วไป</h3>
                                    <hr>
                                    @if(isset($valueMember->householdMemberGeneral))
                                        @include('household::Admin.detail.alldetail.detail_1')
                                    @endif
                                </div>
                                <!-- ส่วนที่ 1 -->

                                <!-- ส่วนที่ 2 -->
                                <div>
                                    <h3 class="tile-title">ข้อมูลด้านสุขภาพ</h3>
                                    <hr>
                                    @if(isset($valueMember->householdMemberHealth))
                                        @include('household::Admin.detail.alldetail.detail_2')
                                    @endif
                                </div>
                                <!-- ส่วนที่ 2 -->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>