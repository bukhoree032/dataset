@extends('admin::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-10">
        <x-alert-error-message/>
        
        <form action="{{ route('admin.household.info.member.step2_update',[request()->store, request()->info, request()->member,  $result->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="tile">
                <h3 class="tile-title">ส่วนที่ 2 ข้อมูลด้านสุขภาพ</h3>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-12">
                          <div class="card mb-2">
                               <div class="card-body">
                                     <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home2" role="tabpanel" aria-labelledby="pills-home2-tab">
                                           <!-- ความสามารถเฉพาะ ( ตอบได้มากกว่า 1 ข้อ ) -->
                                           <div class="form-row">
                                              <div class="col-md-4 mb-3">
                                                 <label><b>2.1 ข้อมูลพฤติกรรมเสี่ยงของสมาชิกครัวเรือน<br>(ตอบได้มากว่า 1 ข้อ)</b></label>
                                                 <div class="dropdown-check-list" tabindex="100" style="width: 100%">
                                                    <span class="anchor form-control @error('HOUSEHOLD_MEMBER_HEALTH_RISK') is-invalid @enderror" style="width: 100%" id="input-RISK">เลือก</span>
                                                    <ul class="items" style="width: 100%">
                                                       @foreach(__jobs_2_1() as $index => $value) 
                                                       <li><input type="checkbox" name="HOUSEHOLD_MEMBER_HEALTH_RISK[{{ $index }}]" class="input-RISK" data-label="{{ $value['label'] }}"  value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_MEMBER_HEALTH_RISK[$index]) && ($result->HOUSEHOLD_MEMBER_HEALTH_RISK[$index] == $value['label'])) checked @endif/> {{ $value['label'] }}</li>
                                                       @endforeach
                                                    </ul>
                                                   <x-error-message title="HOUSEHOLD_MEMBER_HEALTH_RISK"/>
                                                </div>
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                 <label><b>2.2 ข้อมูลภาวะเสี่ยงจากการประกอบอาชีพของสมาชิกครัวเรือน <br>(ตอบได้มากว่า 1 ข้อ)</b></label>
                                                 <div class="dropdown-check-list" tabindex="100" style="width: 100%">
                                                    <span class="anchor form-control @error('HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP') is-invalid @enderror" style="width: 100%" id="input-RISK_OCCUP">เลือก</span>
                                                    <ul  class="items" style="width: 100%">
                                                       @foreach(__jobs_2_2() as $index => $value) 
                                                       <li><input type="checkbox" name="HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP[{{ $index }}]" class="input-RISK_OCCUP" data-label="{{ $value['label'] }}"  value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP[$index]) && ($result->HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP[$index] == $value['label'])) checked @endif/> {{ $value['label'] }} </li>
                                                       @endforeach
                                                    </ul>
                                                   <x-error-message title="HOUSEHOLD_MEMBER_HEALTH_RISK_OCCUP"/>
                                                </div>
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                 <label ><b>2.3 ข้อมูลผู้ที่ต้องการได้รับการช่วยเหลือดูแลในครัวเรือน <br>(ตอบได้มากว่า 1 ข้อ)</b></label>
                                                 <div class="dropdown-check-list" tabindex="100" style="width: 100%">
                                                    <span class="anchor form-control @error('HOUSEHOLD_MEMBER_HEALTH_HCARE') is-invalid @enderror" style="width: 100%" id="input-HCARE_">เลือก</span>
                                                    <ul class="items" style="width: 100%">
                                                       @foreach(__jobs_2_3() as $index => $value) 
                                                       <li><input type="checkbox" name="HOUSEHOLD_MEMBER_HEALTH_HCARE[{{ $index }}]" class="input-HCARE_" data-label="{{ $value['label'] }}"  value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_MEMBER_HEALTH_HCARE[$index]) && ($result->HOUSEHOLD_MEMBER_HEALTH_HCARE[$index] == $value['label'])) checked @endif/> {{ $value['label'] }} </li>
                                                       @endforeach
                                                    </ul>
                                                   <x-error-message title="HOUSEHOLD_MEMBER_HEALTH_HCARE"/>
                                                </div>
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                 <label ><b>2.4 ข้อมูลภาวะฉุกเฉินที่ต้องได้รับการรักษา  <br>(ตอบได้มากว่า 1 ข้อ)</b></label>
                                                 <div class="dropdown-check-list" tabindex="100" style="width: 100%">
                                                    <span class="anchor form-control @error('HOUSEHOLD_MEMBER_HEALTH_EMERGENCY') is-invalid @enderror" style="width: 100%" id="input-EMERGENCY">เลือก</span>
                                                    <ul class="items" style="width: 100%">
                                                       @foreach(__jobs_2_4() as $index => $value) 
                                                       <li><input type="checkbox" name="HOUSEHOLD_MEMBER_HEALTH_EMERGENCY[{{ $index }}]" class="input-EMERGENCY" data-label="{{ $value['label'] }}"  value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_MEMBER_HEALTH_EMERGENCY[$index]) && ($result->HOUSEHOLD_MEMBER_HEALTH_EMERGENCY[$index] == $value['label'])) checked @endif/> {{ $value['label'] }} </li>
                                                       @endforeach
                                                    </ul>
                                                   <x-error-message title="HOUSEHOLD_MEMBER_HEALTH_EMERGENCY"/>
                                                </div>
                                              </div>
                                              <div class="col-md-12 mb-12">
                                                 <label ><b>2.5 ข้อมูลการเจ็บป่วยเรื้อรัง การดูแลรักษาเมื่อมีภาวการณ์เจ็บป่วย ปัญหาและความต้องการในการดูแลรักษาสุขภาพ และสภาวะการเจ็บป่วยในปัจจุบัน   (ตอบได้มากว่า 1 ข้อ)</b></label>
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                 <label >2.5.1 ข้อมูลการเจ็บป่วยเรื้อรัง  <br>(ตอบได้มากว่า 1 ข้อ)</label>
                                                 <div class="dropdown-check-list" tabindex="100" style="width: 100%">
                                                    <span class="anchor form-control @error('HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS') is-invalid @enderror" style="width: 100%" id="input-C_ILLNESS">เลือก</span>
                                                    <ul class="items" style="width: 100%">
                                                       @foreach(__jobs_2_5_1() as $index => $value) 
                                                       <li><input type="checkbox" name="HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS[{{ $index }}]" class="input-C_ILLNESS" data-label="{{ $value['label'] }}"  value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS[$index]) && ($result->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS[$index] == $value['label'])) checked @endif/> {{ $value['label'] }} </li>
                                                       @endforeach
                                                       <textarea style="width: 100%" placeholder="กรณีอื่น ๆ" name="HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS_OTHER">{{ $result->HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS_OTHER }}</textarea>
                                                    </ul>
                                                   <x-error-message title="HOUSEHOLD_MEMBER_HEALTH_C_ILLNESS"/>
                                                </div>
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                 <label >2.5.2 ข้อมูลผู้ให้การดูแล  <br>(ตอบได้มากว่า 1 ข้อ)</label>
                                                 <div class="dropdown-check-list" tabindex="100" style="width: 100%">
                                                    <span class="anchor form-control @error('HOUSEHOLD_MEMBER_HEALTH_CARER_') is-invalid @enderror" style="width: 100%" id="input-CARER_">เลือก</span>
                                                    <ul class="items" style="width: 100%">
                                                       @foreach(__jobs_2_5_2() as $index => $value) 
                                                       <li>
                                                          <input type="checkbox" name="HOUSEHOLD_MEMBER_HEALTH_CARER_[{{ $index }}]" value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_MEMBER_HEALTH_CARER_[$index]) && ($result->HOUSEHOLD_MEMBER_HEALTH_CARER_[$index] == $value['label'])) checked @endif/> {{ $value['label'] }}
                                                            @if ($value['id']==10) 
                                                          <input type="" name="HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[{{ $index }}]" value="{{ $result->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index] }}" placeholder="ระบุ กรณีตัวเลือกข้อ 10" style="width: 100%">
                                                            @endif
                                                            @if ($value['id']==11) 
                                                          <input type="" name="HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[{{ $index }}]" value="{{ $result->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index] }}" placeholder="ระบุ กรณีตัวเลือกข้อ 11" style="width: 100%">
                                                            @else
                                                            @endif
                                                       </li>
                                                       @endforeach
                                                       <textarea style="width: 100%" placeholder="กรณีอื่น ๆ" name="HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[{{ $index }}]">{{ $result->HOUSEHOLD_MEMBER_HEALTH_CARER_OTHER[$index] }}</textarea>
                                                    </ul>
                                                        <x-error-message title="HOUSEHOLD_MEMBER_HEALTH_CARER_"/>
                                                    </div>
                                                 
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                 <label >2.5.3 ข้อมูลแนวทางการดูแลรักษาเมื่อมีภาวะเจ็บป่วย  <br>(ตอบได้ 1 ข้อ)</label>
                                                 <div class="dropdown-check-list" tabindex="100" style="width: 100%">
                                                    <span class="anchor form-control @error('HOUSEHOLD_MEMBER_HEALTH_W_CARE') is-invalid @enderror" style="width: 100%" id="input-W_CARE">เลือก</span>
                                                    <ul class="items" style="width: 100%">
                                                       @foreach(__jobs_2_5_3() as $index => $value) 
                                                       <li><input type="radio" id="male{{ $value['id'] }}" name="HOUSEHOLD_MEMBER_HEALTH_W_CARE" class="input-W_CARE" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_MEMBER_HEALTH_W_CARE) && ($result->HOUSEHOLD_MEMBER_HEALTH_W_CARE == $value['label'])) checked @endif/> {{ $value['label'] }} </li>
                                                       @endforeach
                                                       <textarea style="width: 100%" placeholder="กรณีอื่น ๆ" name="HOUSEHOLD_MEMBER_HEALTH_W_CARE_OTHER">{{ $result->HOUSEHOLD_MEMBER_HEALTH_W_CARE_OTHER }}</textarea>
                                                    </ul>
                                                   <x-error-message title="HOUSEHOLD_MEMBER_HEALTH_W_CARE"/>
                                                </div>
                                              </div>
                                              <div class="col-md-12 mb-12">
                                                 <label ><b>2.6  ข้อมูลปัญหาและสภาวะจากการเจ็บป่วยเรื้อรังในปัจจุบัน</b></label>
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                 <label >2.6.1 ข้อมูลปัญหาการดูแลสุขภาพจากการเจ็บป่วยเรื้อรังในปัจจุบัน <br> (ตอบได้มากว่า 1 ข้อ)</label>
                                                 <div id="list2_8" class="dropdown-check-list" tabindex="100" style="width: 100%">
                                                    <span class="anchor form-control @error('HOUSEHOLD_MEMBER_HEALTH_P_CARE') is-invalid @enderror" style="width: 100%" id="input-P_CARE">เลือก</span>
                                                    <ul id="items2_8" class="items" style="width: 100%">
                                                       @foreach(__jobs_2_6_1() as $index => $value) 
                                                       <li><input type="checkbox" name="HOUSEHOLD_MEMBER_HEALTH_P_CARE[{{ $index }}]" class="input-P_CARE" data-label="{{ $value['label'] }}"  value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_MEMBER_HEALTH_P_CARE[$index]) && ($result->HOUSEHOLD_MEMBER_HEALTH_P_CARE[$index] == $value['label'])) checked @endif/> {{ $value['label'] }} </li>
                                                       @endforeach
                                                       <textarea style="width: 100%" placeholder="กรณีอื่น ๆ" name="HOUSEHOLD_MEMBER_HEALTH_P_CARE_OTHER">{{ $result->HOUSEHOLD_MEMBER_HEALTH_P_CARE_OTHER }}</textarea>
                                                    </ul>
                                                   <x-error-message title="HOUSEHOLD_MEMBER_HEALTH_P_CARE"/>
                                                </div>
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                 <label >2.6.2 ข้อมูลสภาวะการเจ็บป่วยเรื้อรังในปัจจุบัน <br> (ตอบได้มากว่า 1 ข้อ)</label>
                                                 <div class="dropdown-check-list" tabindex="100" style="width: 100%">
                                                    <span class="anchor form-control @error('HOUSEHOLD_MEMBER_HEALTH_ILLNESS') is-invalid @enderror" style="width: 100%" id="input-ILLNESS">เลือก</span>
                                                    <ul class="items" style="width: 100%">
                                                       @foreach(__jobs_2_6_2() as $index => $value) 
                                                       <li><input type="checkbox" name="HOUSEHOLD_MEMBER_HEALTH_ILLNESS[{{ $index }}]" class="input-ILLNESS" data-label="{{ $value['label'] }}"  value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_MEMBER_HEALTH_ILLNESS[$index]) && ($result->HOUSEHOLD_MEMBER_HEALTH_ILLNESS[$index] == $value['label'])) checked @endif/> {{ $value['label'] }} </li>
                                                       @endforeach
                                                    </ul>
                                                   <x-error-message title="HOUSEHOLD_MEMBER_HEALTH_ILLNESS"/>
                                                </div>
                                              </div>
                                              <div class="col-md-12 mb-12">
                                                 <label ><b>2.7 ข้อมูลสิทธิและสวัสดิการในการรักษาพยาบาล</b></label>
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                 <label >2.7.1 ข้อมูลสิทธิและสวัสดิการในการรักษาพยาบาล <br> (ตอบได้มากว่า 1 ข้อ)</label>
                                                 <div class="dropdown-check-list" tabindex="100" style="width: 100%">
                                                    <span class="anchor form-control @error('HOUSEHOLD_MEMBER_HEALTH_BENEFIT') is-invalid @enderror" style="width: 100%" id="input-BENEFIT">เลือก</span>
                                                    <ul class="items" style="width: 100%">
                                                       @foreach(__jobs_2_7_1() as $index => $value) 
                                                       <li><input type="checkbox" name="HOUSEHOLD_MEMBER_HEALTH_BENEFIT[{{ $index }}]" class="input-BENEFIT" data-label="{{ $value['label'] }}"  value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_MEMBER_HEALTH_BENEFIT[$index]) && ($result->HOUSEHOLD_MEMBER_HEALTH_BENEFIT[$index] == $value['label'])) checked @endif/> {{ $value['label'] }} </li>
                                                       @endforeach
                                                    </ul>
                                                   <x-error-message title="HOUSEHOLD_MEMBER_HEALTH_BENEFIT"/>
                                                </div>
                                              </div>
                                              <div class="col-md-4 mb-3">
                                                 <label >2.7.2 ข้อมูลการใช้สิทธิในการรักษาพยาบาล<br>  (ตอบได้มากว่า 1 ข้อ)</label>
                                                 <div class="dropdown-check-list" tabindex="100" style="width: 100%">
                                                    <span class="anchor form-control @error('HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE') is-invalid @enderror" style="width: 100%" id="input-BENEFIT_TYPE">เลือก</span>
                                                    <ul class="items" style="width: 100%">
                                                       @foreach(__jobs_2_7_2() as $index => $value) 
                                                       <li><input type="checkbox" name="HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE[{{ $index }}]" class="input-BENEFIT_TYPE" data-label="{{ $value['label'] }}"  value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE[$index]) && ($result->HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE[$index] == $value['label'])) checked @endif/> {{ $value['label'] }} </li>
                                                       @endforeach
                                                    </ul>
                                                   <x-error-message title="HOUSEHOLD_MEMBER_HEALTH_BENEFIT_TYPE"/>
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
            selectCheckList($('.input-RISK '), $('#input-RISK'), 'เลือก');
            selectCheckList($('.input-RISK_OCCUP '), $('#input-RISK_OCCUP'), 'เลือก');
            selectCheckList($('.input-HCARE_ '), $('#input-HCARE_'), 'เลือก');
            selectCheckList($('.input-EMERGENCY '), $('#input-EMERGENCY'), 'เลือก');
            selectCheckList($('.input-C_ILLNESS '), $('#input-C_ILLNESS'), 'เลือก');
            selectCheckList($('.input-CARER_ '), $('#input-CARER_'), 'เลือก');
            selectCheckList($('.input-W_CARE '), $('#input-W_CARE'), 'เลือก');
            selectCheckList($('.input-P_CARE '), $('#input-P_CARE'), 'เลือก');
            selectCheckList($('.input-ILLNESS '), $('#input-ILLNESS'), 'เลือก');
            selectCheckList($('.input-BENEFIT '), $('#input-BENEFIT'), 'เลือก');
            selectCheckList($('.input-BENEFIT_TYPE '), $('#input-BENEFIT_TYPE'), 'เลือก');
        });
    </script>
@endsection