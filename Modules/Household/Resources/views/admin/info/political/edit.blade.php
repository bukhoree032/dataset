@extends('admin::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-8">
        <x-alert-error-message />

        <form action="{{ route('admin.household.info.political.update',[request()->store, $result->household_info_id,  $result->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="tile">
                <h3 class="tile-title">ส่วนที่ 5 ข้อมูลด้านการเมืองการปกครอง (ตอบได้มากกว่า 1 ข้อ)</h3>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group col-md-12">
                                <label>1. สมาชิกในครัวเรือนของท่านมีส่วนร่วมในกิจกรรมของชุมชน</label>
                                <div class="dropdown-check-list form-control" tabindex="100" style="margin-top: 21px;">
                                    <span class="anchor   @error('HOUSEHOLD_POLITICAL_COM_ELEC') is-invalid @enderror" id="input-COM_ELEC_"> เลือก </span>
                                    <ul class="items">
                                        @foreach(__jobs5_1() as $index => $value)
                                        <li>
                                            <input type="checkbox" name="HOUSEHOLD_POLITICAL_COM_ELEC[{{ $index }}]" class="input-COM_ELEC_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_POLITICAL_COM_ELEC[$index]) && ($result->HOUSEHOLD_POLITICAL_COM_ELEC[$index] == $value['label'])) checked @endif/>
                                            {{ $value['label'] }}
                                        </li>
                                        @endforeach
                                        <li>
                                            <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_POLITICAL_COM_ELEC_OTHER">{{ $result->HOUSEHOLD_POLITICAL_COM_ELEC_OTHER }}</textarea>
                                        </li>
                                    </ul>
                                    <x-error-message title="HOUSEHOLD_POLITICAL_COM_ELEC" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p class="pb-0 mb-0">2. กรณีพิพาทของสมาชิกในครัวเรือน</p>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>2.1 ความขัดแย้งในครัวเรือน</label>
                                    <div class="dropdown-check-list form-control" tabindex="100">
                                        <span class="anchor   @error('HOUSEHOLD_POLITICAL_HH_CONFLICT') is-invalid @enderror" id="input-HH_CONFLICT"> เลือก </span>
                                        <ul class="items">
                                            @foreach(__jobs5_2() as $index => $value)
                                            <li>
                                                <input type="radio" name="HOUSEHOLD_POLITICAL_HH_CONFLICT" class="input-HH_CONFLICT" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_POLITICAL_HH_CONFLICT) && ($result->HOUSEHOLD_POLITICAL_HH_CONFLICT == $value['label'])) checked @endif/>
                                                {{ $value['label'] }}
                                            </li>
                                            @endforeach
                                        </ul>
                                        <x-error-message title="HOUSEHOLD_POLITICAL_COM_ELEC" />
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>2.2 ความขัดแย้งกับบุคคลอื่น</label>
                                    <div class="dropdown-check-list form-control" tabindex="100">
                                        <span class="anchor   @error('HOUSEHOLD_POLITICAL_CONFLICT_OTHER') is-invalid @enderror" id="input-CONFLICT_OTHER"> เลือก </span>
                                        <ul class="items">
                                            @foreach(__jobs5_2() as $index => $value)
                                            <li>
                                                <input type="radio" name="HOUSEHOLD_POLITICAL_CONFLICT_OTHER" class="input-CONFLICT_OTHER" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_POLITICAL_CONFLICT_OTHER) && ($result->HOUSEHOLD_POLITICAL_CONFLICT_OTHER == $value['label'])) checked @endif/>
                                                {{ $value['label'] }}
                                            </li>
                                            @endforeach
                                        </ul>
                                        <x-error-message title="HOUSEHOLD_POLITICAL_COM_ELEC" />
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
    $(function () {
            selectCheckList($(".input-COM_ELEC_ "), $("#input-COM_ELEC_"), "เลือก");
            selectCheckList($(".input-HH_CONFLICT "), $("#input-HH_CONFLICT"), "เลือก");
            selectCheckList($(".input-CONFLICT_OTHER "), $("#input-CONFLICT_OTHER"), "เลือก");
            selectCheckList($(".input-OCCUP_ID "), $("#input-OCCUP_ID"), "เลือก");
        });
</script>
@endsection