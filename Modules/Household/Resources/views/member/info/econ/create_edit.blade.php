@extends('home::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-8">
        <x-alert-error-message />
        <form action="{{ route('member.household.info.econ.update',[request()->store, $result->household_info_id,  $result->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="tile">
                <h3 class="tile-title">ส่วนที่ 3 ข้อมูลด้านเศรษฐกิจ</h3>
                <div class="tile-body">
                    <div class="card mb-2">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home3-tab" data-toggle="pill" href="#pills-home3" role="tab" aria-controls="pills-home3" aria-selected="true">3.1 รายรับ ของครัวเรือน </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-profile3-tab" data-toggle="pill" href="#pills-profile3" role="tab" aria-controls="pills-profile3" aria-selected="false">3.2 ทรัพย์และสิ่งอำนวยความสะดวกของครัวเรือน </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-contact3-tab" data-toggle="pill" href="#pills-contact3" role="tab" aria-controls="pills-contact3" aria-selected="false">
                                        3.3 ภาระหนี้สิน การออม และปัญหาเศรษฐกิจของครัวเรือน
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home3" role="tabpanel" aria-labelledby="pills-home3-tab">
                                    <div class="bs-example">
                                        <p>รายรับ</p>
                                        @include('household::member.info.econ._3-1-1_edit')
                                    </div>
                                    <div class="bs-example">
                                        <p>รายจ่าย</p>
                                        @include('household::member.info.econ._3-1-2_edit')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile3" role="tabpanel" aria-labelledby="pills-profile3-tab">
                                    <div class="bs-example">
                                        <p>ทรัพย์และสิ่งอำนวยความสะดวกของครัวเรือน</p>
                                        @include('household::member.info.econ._3-2_edit')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact3" role="tabpanel" aria-labelledby="pills-contact3-tab">
                                    <div class="bs-example">
                                        <p>ภาระหนี้สิน การออม และปัญหาเศรษฐกิจของครัวเรือน</p>
                                        @include('household::member.info.econ._3-3_edit')
                                    </div>
                                    <button type="submit" class="btn btn-primary"><i class="fa-fw fas fa-check-circle"></i>บันทึกข้อมูล</button>
                                    <button type="reset" class="btn btn-light"><i class="fa-fw fas fa-times-circle"></i>ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script-content')
<script type="text/javascript">
    $(function(){
            selectCheckList($(".input-INCOME1"), $("#input-INCOME1"), "เลือกเดือนที่ไม่ได้รายได้");
            selectCheckList($(".input-INCOME2"), $("#input-INCOME2"), "เลือกเดือนที่ไม่ได้รายได้");
            selectCheckList($(".input-INCOME3"), $("#input-INCOME3"), "เลือกเดือนที่ไม่ได้รายได้");
            selectCheckList($(".input-INCOME4"), $("#input-INCOME4"), "เลือกเดือนที่ไม่ได้รายได้");
            selectCheckList($(".input-INCOME5"), $("#input-INCOME5"), "เลือกเดือนที่ไม่ได้รายได้");
            selectCheckList($(".input-EXP1"), $("#input-EXP1"), "เลือกเดือนที่ไม่มีรายจ่าย");
            selectCheckList($(".input-EXP2"), $("#input-EXP2"), "เลือกเดือนที่ไม่มีรายจ่าย");
            selectCheckList($(".input-EXP3"), $("#input-EXP3"), "เลือกเดือนที่ไม่มีรายจ่าย");
            selectCheckList($(".input-EXP4"), $("#input-EXP4"), "เลือกเดือนที่ไม่มีรายจ่าย");
            selectCheckList($(".input-EXP5"), $("#input-EXP5"), "เลือกเดือนที่ไม่มีรายจ่าย");
            selectCheckList($(".input-EXP6"), $("#input-EXP6"), "เลือกเดือนที่ไม่มีรายจ่าย");
            selectCheckList($(".input-EXP7"), $("#input-EXP7"), "เลือกเดือนที่ไม่มีรายจ่าย");
            selectCheckList($(".input-EXP8"), $("#input-EXP8"), "เลือกเดือนที่ไม่มีรายจ่าย");
            selectCheckList($(".input-HOUSE_LIST"), $("#input-HOUSE_LIST"), "เลือก");
            selectCheckList($(".input-LAND"), $("#input-LAND"), "เลือก");
            selectCheckList($(".input-AREA_LIST"), $("#input-AREA_LIST"), "เลือก");
            selectCheckList($(".input-EQUIPMENT_TYPE"), $("#input-EQUIPMENT_TYPE"), "เลือก");
            selectCheckList($(".input-VEHICLE_TYPE"), $("#input-VEHICLE_TYPE"), "เลือก");
            selectCheckList($(".input-COM_DEVICE_TYPE"), $("#input-COM_DEVICE_TYPE"), "เลือก");
            selectCheckList($(".input-PET_CATEG"), $("#input-PET_CATEG"), "เลือก");
            selectCheckList($(".input-DEPT_FROM_TYPE"), $("#input-DEPT_FROM_TYPE"), "สาเหตุของหนี้สิน");
            selectCheckList($(".input-SPECIAL_FIN_"), $("#input-SPECIAL_FIN_"), "เลือก");
            selectCheckList($(".input-COMM_BANK_"), $("#input-COMM_BANK_"), "เลือก");
            selectCheckList($(".input-NONBANK_"), $("#input-NONBANK_"), "เลือก");
            selectCheckList($(".input-COMMU_FUND_"), $("#input-COMMU_FUND_"), "เลือก");
            selectCheckList($(".input-SHARK_LOAN_"), $("#input-SHARK_LOAN_"), "เลือก");
            selectCheckList($(".input-H_SAVING_"), $("#input-H_SAVING_"), "เลือก");
            selectCheckList($(".input-OCCUP_PROBLEM_"), $("#input-OCCUP_PROBLEM_"), "เลือก");
            selectCheckList($(".input-LIVING_PROBLEM_"), $("#input-LIVING_PROBLEM_"), "เลือก");
        });
</script>
@endsection