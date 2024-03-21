@extends('admin::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-8">
        <x-alert-error-message />

        <form action="{{ route('admin.household.info.enviro.store',[$store_id, $info_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tile">
                <h3 class="tile-title">ส่วนที่ 4 ข้อมูลด้านสิ่งแวดล้อม (ตอบได้มากกว่า 1 ข้อ)</h3>
                <div class="tile-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>1. การถ่ายเทอากาศ/แสงสว่างภายในบ้าน</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor @error('HOUSEHOLD_ENVIR_WLIGHT') is-invalid @enderror" id="input-WLIGHT_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_1() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_WLIGHT[{{ $index }}]" class="input-WLIGHT_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_WLIGHT.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_WLIGHT" />
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>2. ความสะอาดภายในบ้าน</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_CLEAN') is-invalid @enderror" id="input-CLEAN_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_2() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_CLEAN[{{ $index }}]" class="input-CLEAN_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_CLEAN.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_CLEAN" />
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>3. ความปลอดภัย/มั่นคงของบ้านเรือน</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_SAFE') is-invalid @enderror" id="input-SAFE_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_3() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_SAFE[{{ $index }}]" class="input-SAFE_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_SAFE.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_SAFE" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>4. การจัดการขยะ</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_BIN') is-invalid @enderror" id="input-BIN_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_4() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_BIN[{{ $index }}]" class="input-BIN_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_BIN.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_BIN" />
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>5. การดูแลรักษาบริเวณภายนอกบ้าน</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_H_ENVI') is-invalid @enderror" id="input-H_ENVI_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_5() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_H_ENVI[{{ $index }}]" class="input-H_ENVI_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_H_ENVI.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                    <li>
                                        <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_ENVIR_H_ENVI_OTHER" value="{{ old('HOUSEHOLD_MEMBER_GENERAL_SKILL_OTHER') }}"></textarea>
                                    </li>
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_H_ENVI" />
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>6. การจัดการมลพิษหรือมลภาวะต่างๆ</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_TOXIC') is-invalid @enderror" id="input-TOXIC_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_6() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_TOXIC[{{ $index }}]" class="input-TOXIC_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_TOXIC.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_TOXIC" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>7. การจัดการน้ำสำหรับการอุปโภคและบริโภค</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_WATER') is-invalid @enderror" id="input-WATER_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_7() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_WATER[{{ $index }}]" class="input-WATER_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_WATER.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_WATER" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>7.1 มีการบริโภค (น้ำกิน) ที่สะอาดเพียงพอตลอดปี</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_DRINKING') is-invalid @enderror" id="input-DRINKING_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_7_1() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_DRINKING[{{ $index }}]" class="input-DRINKING_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_DRINKING.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_DRINKING" />
                            </div>
                        </div>
                        {{-- <div class="form-group col-md-4">
                            <label>7.2 มีภาชนะเก็บกักน้ำอุปโภค(น้ำกิน) สะอาด มีฝาปิด และรักษาความสะอาดอย่างสม่ำเสมอ</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_CONTAINER') is-invalid @enderror" id="input-CONTAINER"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_7_2() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_CONTAINER[{{ $index }}]" class="input-CONTAINER" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_CONTAINER.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_CONTAINER" />
                            </div>
                        </div> --}}
                        <div class="form-group col-md-4">
                            <label>7.2 จัดบริเวณให้มีที่ประกอบอาหาร และมีน้ำสะอาดในการบริโภค(น้ำกิน)</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_COOKING') is-invalid @enderror" id="input-COOKING_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_7_3() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_COOKING[{{ $index }}]" class="input-COOKING_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_COOKING.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_COOKING" />
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>7.3 มีการบริโภค(น้ำใช้) ที่สะอาดเพียงพอตลอดปี</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_WATER_USED') is-invalid @enderror" id="input-WATER_USED_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_7_1() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_WATER_USED[{{ $index }}]" class="input-WATER_USED_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_WATER_USED.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_WATER_USED" />
                            </div>
                        </div>
                        {{-- <div class="form-group col-md-4">
                            <label>7.5 มีภาชนะเก็บกักน้ำอุปโภค(น้ำใช้) สะอาด มีฝาปิด และรักษาความสะอาดอย่างสม่ำเสมอ</label>
                            <div class="dropdown-check-list  form-control" tabindex="100">
                                <span class="anchor  @error('HOUSEHOLD_ENVIR_CONTAINER_USED') is-invalid @enderror" id="input-CONTAINER_USED"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_7_2() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_CONTAINER_USED[{{ $index }}]" class="input-CONTAINER_USED" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_CONTAINER_USED.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_CONTAINER_USED" />
                            </div>
                        </div> --}}
                        <div class="form-group col-md-4">
                            <label>7.4 จัดบริเวณให้มีที่ประกอบอาหาร และมีน้ำสะอาดในการอุปโภค(น้ำใช้)</label>
                            <div class="dropdown-check-list  form-control" tabindex="100">
                                <span class="anchor  @error('HOUSEHOLD_ENVIR_AREA') is-invalid @enderror" id="input-AREA_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_7_3() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_AREA[{{ $index }}]" class="input-AREA_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_AREA.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_AREA" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>8. การเข้าร่วมกิจกรรมของสมาชิกในครัวเรือนในการรักษาสิ่งแวดล้อมในชุมชน</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor @error('HOUSEHOLD_ENVIR_ENV_ACT') is-invalid @enderror" id="input-ENV_ACT_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_8() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_ENV_ACT[{{ $index }}]" class="input-ENV_ACT_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_ENV_ACT.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                    <li>
                                        <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_ENVIR_ENV_ACT_OTHER" value="{{ old('HOUSEHOLD_ENVIR_ENV_ACT_OTHER') }}"></textarea>
                                    </li>
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_ENV_ACT" />
                            </div>
                        </div>
                    </div>
                    <p class="pb-0 mb-0">9. การจัดการพลังงานและอนุรักษ์พลังงาน</p>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>9.1 การมีไฟฟ้าใช้ในครัวเรือน</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_ELECTRIC') is-invalid @enderror" id="input-ELECTRIC_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_9_1() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_ELECTRIC[{{ $index }}]" class="input-ELECTRIC_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_ELECTRIC.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_ELECTRIC" />
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>9.2 การอนุรักษ์พลังงาน</label>
                            <div class="dropdown-check-list  form-control" tabindex="100">
                                <span class="anchor  @error('HOUSEHOLD_ENVIR_CONSERV') is-invalid @enderror" id="input-CONSERV_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_9_2() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_CONSERV[{{ $index }}]" class="input-CONSERV_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_CONSERV.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                    <li>
                                        <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_ENVIR_CONSERV_OTHER" value="{{ old('HOUSEHOLD_ENVIR_CONSERV_OTHER') }}"></textarea>
                                    </li>
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_CONSERV" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label> 10. ปัญหาภัยพิบัติที่ส่งผลกระทบกับครัวเรือน</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_DISASTER') is-invalid @enderror" id="input-DISASTER_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_10() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_DISASTER[{{ $index }}]" class="input-DISASTER_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_DISASTER.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                    <li>
                                        <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_ENVIR_AREA_OCCUP_OTHER" value="{{ old('HOUSEHOLD_ENVIR_AREA_OCCUP_OTHER') }}"></textarea>
                                    </li>
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_DISASTER" />
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>11. การจัดการปัญหาภัยพิบัติที่ส่งผลกระกับครัวเรือน</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor   @error('HOUSEHOLD_ENVIR_SOLUTION') is-invalid @enderror" id="input-SOLUTION_"> เลือก </span>
                                <ul class="items">
                                    @foreach(__jobs4_11() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_ENVIR_SOLUTION[{{ $index }}]" class="input-SOLUTION_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ENVIR_SOLUTION.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                    <li>
                                        <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_ENVIR_SOLUTION_OTHER" value="{{ old('HOUSEHOLD_ENVIR_SOLUTION_OTHER') }}"></textarea>
                                    </li>
                                </ul>
                                <x-error-message title="HOUSEHOLD_ENVIR_SOLUTION" />
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
            selectCheckList($(".input-WLIGHT_ "), $("#input-WLIGHT_"), "เลือก");
            selectCheckList($(".input-CLEAN_ "), $("#input-CLEAN_"), "เลือก");
            selectCheckList($(".input-SAFE_ "), $("#input-SAFE_"), "เลือก");
            selectCheckList($(".input-BIN_ "), $("#input-BIN_"), "เลือก");
            selectCheckList($(".input-H_ENVI_ "), $("#input-H_ENVI_"), "เลือก");
            selectCheckList($(".input-TOXIC_ "), $("#input-TOXIC_"), "เลือก");
            selectCheckList($(".input-WATER_ "), $("#input-WATER_"), "เลือก");
            selectCheckList($(".input-DRINKING_ "), $("#input-DRINKING_"), "เลือก");
            selectCheckList($(".input-CONTAINER "), $("#input-CONTAINER"), "เลือก");
            selectCheckList($(".input-COOKING_ "), $("#input-COOKING_"), "เลือก");
            selectCheckList($(".input-WATER_USED_ "), $("#input-WATER_USED_"), "เลือก");
            selectCheckList($(".input-CONTAINER_USED "), $("#input-CONTAINER_USED"), "เลือก");
            selectCheckList($(".input-AREA_ "), $("#input-AREA_"), "เลือก");
            selectCheckList($(".input-ENV_ACT_ "), $("#input-ENV_ACT_"), "เลือก");
            selectCheckList($(".input-ELECTRIC_ "), $("#input-ELECTRIC_"), "เลือก");
            selectCheckList($(".input-CONSERV_ "), $("#input-CONSERV_"), "เลือก");
            selectCheckList($(".input-DISASTER_ "), $("#input-DISASTER_"), "เลือก");
            selectCheckList($(".input-SOLUTION_ "), $("#input-SOLUTION_"), "เลือก");
        });
</script>
@endsection