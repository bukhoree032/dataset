@extends('home::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-10">
        <x-alert-error-message/>
        
        <form action="{{ route('member.household.info.member.step1-save',[$store_id, $info_id, $member_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tile">
                <h3 class="tile-title">ส่วนที่ 1 ข้อมูลทั่วไปของสมาชิกครัวเรือน</h3>
                <div class="tile-body">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home1" role="tabpanel" aria-labelledby="pills-home1-tab">
                                            <!-- ความสามารถเฉพาะ ( ตอบได้มากกว่า 1 ข้อ ) -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <b>1.1.1 ความสามารถเฉพาะ (ตอบได้มากกว่า 1ข้อ)</b>
                                                    <div class="my-dropdown dropdown-check-list" tabindex="100" style="width: 100%;">
                                                        <span class="anchor form-control @error('HOUSEHOLD_MEMBER_GENERAL_SKILL') is-invalid @enderror" style="width: 100%;" id="input-SKILL">-เลือก-</span>
                                                        <ul class="items" style="width: 100%;">
                                                            @foreach(__jobs1_1_1() as $index => $value) 
                                                            <li>
                                                                <input type="checkbox" name="HOUSEHOLD_MEMBER_GENERAL_SKILL[{{ $index }}]" class="input-SKILL" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_MEMBER_GENERAL_SKILL.$index")) checked @endif />
                                                                {{ $value['label'] }}
                                                            </li>
                                                            @endforeach
                                                            <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_MEMBER_GENERAL_SKILL_OTHER" value="{{ old('HOUSEHOLD_MEMBER_GENERAL_SKILL_OTHER') }}" style="width: 100%;"></textarea>
                                                        </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_SKILL"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <b>
                                                        1.1.2 ภาษาพูด ( ตอบได้มากกว่า 1 ข้อ )<br />
                                                        
                                                    </b>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="my-dropdown dropdown-check-list" tabindex="100" style="width: 100%;">
                                                                <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG') is-invalid @enderror style="width: 100%;" id="input-NATIONAL_LANG">ภาษาราชการ/ประจำชาติ</span>
                                                                <ul class="items" style="width: 100%;">
                                                                    @foreach(__jobs1_1_2() as $index => $value) 
                                                                    <li>
                                                                        <input type="checkbox" name="HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG[{{ $index }}]" class="input-NATIONAL_LANG" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG.$index")) checked @endif/>
                                                                        {{ $value['label'] }}
                                                                    </li>
                                                                    @endforeach
                                                                    <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_MEMBER_GENERAL_NATIONAL_OTHER" value="{{ old('HOUSEHOLD_MEMBER_GENERAL_NATIONAL_OTHER') }}" style="width: 100%;"></textarea>
                                                                </ul>
                                                                <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_NATIONAL_LANG"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                                <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG') is-invalid @enderror" style="width: 100%;" id="input-LOCAL_LANG">ภาษาประจำท้องถิ่น/ชาติพันธุ์</span>
                                                                <ul class="items" style="width: 100%;">
                                                                    @foreach(__jobs1_1_3() as $index => $value)
                                                                    <li>
                                                                        <input type="checkbox" name="HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG[{{ $index }}]" class="input-LOCAL_LANG" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG.$index")) checked @endif>
                                                                        {{ $value['label'] }}
                                                                    </li>
                                                                    @endforeach
                                                                    <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_MEMBER_GENERAL_LOCAL_OTHER" value="{{ old('HOUSEHOLD_MEMBER_GENERAL_LOCAL_OTHER') }}" style="width: 100%;"></textarea>
                                                                </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_LOCAL_LANG"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <b>1.1.3 สถานภาพสมรส</b>
                                                    <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                        <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_STATUS') is-invalid @enderror style="width: 100%;" id="input-STATUS">-เลือก-</span>
                                                        <ul class="items" style="width: 100%;">
                                                            @foreach(__jobs1_1_4() as $index => $value)
                                                            <li>
                                                                <input type="radio" name="HOUSEHOLD_MEMBER_GENERAL_STATUS" class="input-STATUS" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_STATUS")) checked @endif/>
                                                                {{ $value['label'] }}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_STATUS"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <b>1.1.4 การศึกษา</b>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                                <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS') is-invalid @enderror style="width: 100%;" id="input-EDU_STATUS">สถานะการศึกษา</span>
                                                                <ul class="items" style="width: 100%;">
                                                                    @foreach(__jobs1_1_5() as $index => $value)
                                                                    <li>
                                                                        <input type="radio" name="HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS" class="input-EDU_STATUS" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS")) checked @endif/>
                                                                        {{ $value['label'] }}
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_EDU_STATUS"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                                <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL') is-invalid @enderror style="width: 100%;" id="input-EDU_LEVEL">ระดับการศึกษา</span>
                                                                <ul class="items" style="width: 100%;">
                                                                    @foreach(__jobs1_1_6() as $index => $value) 
                                                                    <li>
                                                                        <input type="radio" name="HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL" class="input-EDU_LEVEL" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL")) checked @endif/>
                                                                        {{ $value['label'] }}
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_EDU_LEVEL"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-md-12"><b>1.1.5 ความสามารถในการอ่านออกเขียนได้และการคิดคำนวณเบื้องต้นได้</b></div>
                                                <div class="col-md-4">
                                                    <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                        <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL') is-invalid @enderror style="width: 100%;" id="input-READING_LEVEL">การอ่าน</span>
                                                        <ul class="items" style="width: 100%;">
                                                            @foreach(__jobs1_1_7() as $index => $value)
                                                            <li>
                                                                <input type="radio" name="HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL" class="input-READING_LEVEL" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL")) checked @endif/>
                                                                {{ $value['label'] }}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_READING_LEVEL"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                        <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL') is-invalid @enderror style="width: 100%;" id="input-WRITING_LEVEL">การเขียน</span>
                                                        <ul class="items" style="width: 100%;">
                                                            @foreach(__jobs1_1_8() as $index => $value) 
                                                            <li>
                                                                <input type="radio" name="HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL" class="input-WRITING_LEVEL" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL")) checked @endif/>
                                                                {{ $value['label'] }}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_WRITING_LEVEL"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                        <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL') is-invalid @enderror style="width: 100%;" id="input-CAL_LEVEL">การคิดคำนวณ</span>
                                                        <ul class="items" style="width: 100%;">
                                                            @foreach(__jobs1_1_9() as $index => $value)
                                                            <li>
                                                                <input type="radio" name="HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL" class="input-CAL_LEVEL" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL")) checked @endif/>
                                                                {{ $value['label'] }}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_CAL_LEVEL"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <b>1.1.6 ความเกี่ยวข้องกับหัวหน้าครัวเรือน</b>
                                                    <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                        <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD') is-invalid @enderror style="width: 100%;" id="input-RELATIN_HEAD">-เลือก-</span>
                                                        <ul class="items" style="width: 100%;">
                                                            @foreach(__jobs1_1_10() as $index => $value)
                                                            <li>
                                                                <input type="radio" name="HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD" class="input-RELATIN_HEAD" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD")) checked @endif/>
                                                                {{ $value['label'] }}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_RELATIN_HEAD"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <b>1.1.7 การอยู่อาศัยในครัวเรือน</b>
                                                    <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                        <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS') is-invalid @enderror style="width: 100%;" id="input-LIVING_STATUS">-เลือก-</span>
                                                        <ul class="items" style="width: 100%;">
                                                            @foreach(__jobs1_1_11() as $index => $value) 
                                                            <li>
                                                                <input type="radio" name="HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS" class="input-LIVING_STATUS" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS")) checked @endif/>
                                                                {{ $value['label'] }}
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_LIVING_STATUS"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <br />
                                            <div class="row" >
                                                <div class="col-md-4">
                                                    <b>
                                                        1.2.1 อาชีพหลัก<br />
                                                         ( ตอบได้เพียง 1 ข้อ )
                                                    </b>
                                                    <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                        <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID') is-invalid @enderror style="width: 100%;" id="input-OCCUP_ID">-เลือก-</span>
                                                        <ul class="items" style="width: 100%;"> 
                                                            @php $row = 0 @endphp
                                                            @foreach(__jobs1_2_1() as $index => $value) 
                                                            @php $row++ @endphp
                                                            <li>
                                                                <input type="radio" name="HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID" class="input-OCCUP_ID" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID")) checked @endif/>
                                                                {{ $value['label'] }}
                                                                    @if ($row == 1 || $row == 13 ||$row == 14 ||$row == 15 ||$row == 16 ||$row == 17 ||$row == 18) 

                                                                    @else
                                                                        <br />
                                                                        <input type="text" name="HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS{{ $value['id'] }}" value="{{ old('HOUSEHOLD_MEMBER_GENERAL_OCCUP_DETAILS.$id') }}" style="width: 60%;" placeholder="กรณี เลือกตัวเลือกข้อที่ {{ $value['id'] }}" />
                                                                    @endif
                                                            </li>
                                                            @endforeach
                                                            <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID_OTHER" value="{{ old('HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID_OTHER') }}" style="width: 100%;"></textarea>
                                                        </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_OCCUP_ID"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <b>
                                                        1.2.2 อาชีพเสริม<br />
                                                        ( ตอบได้มากกว่า 1 ข้อ )
                                                    </b>
                                                    <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                        <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID') is-invalid @enderror style="width: 100%;" id="input-OCCUP_SUB_ID">-เลือก-</span>
                                                        <ul class="items" style="width: 100%;">
                                                            @php $row = 0 @endphp
                                                            @foreach(__jobs1_2_2() as $index => $value) 
                                                            @php $row++ @endphp
                                                                
                                                            <li>
                                                                <input
                                                                    type="checkbox"
                                                                    name="HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID[{{ $value['id'] }}]"
                                                                    class="input-OCCUP_SUB_ID"
                                                                    data-label="{{ $value['label'] }}"
                                                                    value="{{ $value['label'] }}"
                                                                    @if(old("HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID.$index")) checked @endif
                                                                />
                                                                {{ $value['label'] }}
                                                                @if ($row == 1 || $row == 13 ) 

                                                                @else
                                                                <br />
                                                                <input type="text" name="HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS[{{ $value['id'] }}]"  value="{{ old('HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_DETAILS.$index') }}" style="width: 60%;" placeholder="กรณี เลือกตัวเลือกข้อที่ {{ $value['id'] }}" />
                                                                @endif
                                                            </li>
                                                            @endforeach
                                                            <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID_OTHER" value="{{ old('HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID_OTHER') }}" style="width: 100%;"></textarea>
                                                        </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_OCCUP_SUB_ID"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <b>
                                                        1.2.3 พื้นที่การทำงานของอาชีพหลัก<br />
                                                        ( ตอบได้เพียง 1 ข้อ )
                                                    </b>
                                                    <div class="dropdown-check-list" tabindex="100" style="width: 100%;">
                                                        <span class="anchor form-control  @error('HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP') is-invalid @enderror style="width: 100%;" id="input-AREA_OCCUP">-เลือก-</span>
                                                        <ul class="items" style="width: 100%;">
                                                            @foreach(__jobs1_2_3() as $index => $value) 
                                                            <li>
                                                                <input type="radio" name="HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP" class="input-AREA_OCCUP" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}"  @if(old("HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP")) checked @endif/>
                                                                 {{ $value['label'] }}
                                                            </li>
                                                            @endforeach
                                                            <!-- <textarea placeholder="กรณีอื่น" name="AREA_OCCUP_OTHER" style="width: 100%"></textarea> -->
                                                        </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_GENERAL_AREA_OCCUP"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-fw fas fa-check-circle"></i>บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-light"><i class="fa-fw fas fa-times-circle"></i>ยกเลิก</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script-content')
    <script type="text/javascript">
        $(function(){
            selectCheckList($('.input-SKILL '), $('#input-SKILL'), 'เลือก');
            selectCheckList($('.input-NATIONAL_LANG '), $('#input-NATIONAL_LANG'), 'ภาษาราชการ/ประจำชาติ');
            selectCheckList($('.input-LOCAL_LANG '), $('#input-LOCAL_LANG'), 'ภาษาประจำท้องถิ่น/ชาติพันธุ์');
            selectCheckList($('.input-STATUS '), $('#input-STATUS'), 'เลือก');
            selectCheckList($('.input-EDU_STATUS '), $('#input-EDU_STATUS'), 'สถานะการศึกษา');
            selectCheckList($('.input-EDU_LEVEL '), $('#input-EDU_LEVEL'), 'ระดับการศึกษา');
            selectCheckList($('.input-READING_LEVEL '), $('#input-READING_LEVEL'), 'การอ่าน');
            selectCheckList($('.input-WRITING_LEVEL '), $('#input-WRITING_LEVEL'), 'การเขียน');
            selectCheckList($('.input-CAL_LEVEL '), $('#input-CAL_LEVEL'), 'การคิดคำนวณ');
            selectCheckList($('.input-RELATIN_HEAD '), $('#input-RELATIN_HEAD'), 'เลือก');
            selectCheckList($('.input-LIVING_STATUS '), $('#input-LIVING_STATUS'), 'เลือก');
            selectCheckList($('.input-OCCUP_ID '), $('#input-OCCUP_ID'), 'เลือก');
            selectCheckList($('.input-OCCUP_SUB_ID '), $('#input-OCCUP_SUB_ID'), 'เลือก');
            selectCheckList($('.input-AREA_OCCUP '), $('#input-AREA_OCCUP'), 'เลือก');
        });
    </script>
@endsection