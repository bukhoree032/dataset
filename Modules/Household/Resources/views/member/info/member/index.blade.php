@extends('home::layouts.master')

@section('app-content')
    <div class="tile">
        <div class="tile-title-w-btn">
            <h3 class="title">
                ข้อมูลสมาชิกในครัวเรือน
            </h3>
            <p>
                <!-- <a class="btn btn-primary" href="{{ route('member.household.store.create') }}"><i class="fa fa-plus-circle fa-fw"></i>เพิ่มสมาชิก</a> -->
                <a class="btn btn-primary"  href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fa fa-plus-circle fa-fw"></i>เพิ่มสมาชิก</a>
                {{--<a class="btn btn-outline-success" href="{{ route('member.household.index') }}{{ $query_string }}"><i class="fas fa-file-pdf fa-fw"></i>ส่งออกรายงาน (*.PDF) </a>--}}
                <a class="btn btn-secondary" href="{{ url()->current() }}"><i class="fas fa-sync fa-fw"></i>Refresh </a>
            </p>
        </div>
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                    <tr>

                        <th class="text-nowrap text-center">คนที่</th>
                        <th class="text-nowrap text-center">ชื่อ-นามสกุล</th>
                        <th class="text-nowrap text-center">เพศ</th>
                        <th class="text-nowrap text-center">อายุ</th>
                        <th class="text-nowrap text-center">วัน/เดือน/ปี เกิด</th>
                        <th class="text-nowrap text-center">สัญชาติ</th>
                        <th class="text-nowrap text-center">ศาสนา</th>
                        <th class="text-nowrap text-center">ดำเนินการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $row=0 @endphp
                    @foreach($lists as $value)
                    @php $row++ @endphp
                        <tr>
                            <td width="{{ $row }}">{{ $row }}</td>
                            <td>{{ $value->HOUSEHOLD_MEMBER_PNAME }}{{ $value->HOUSEHOLD_MEMBER_NAME }} {{ $value->HOUSEHOLD_MEMBER_SURNAME }}</td>
                            <td>{{ $value->HOUSEHOLD_MEMBER_SEX }}</td>
                            <td>{{ $value->HOUSEHOLD_MEMBER_AGE }}</td>
                            <td>{{ $value->HOUSEHOLD_MEMBER_DOB }}</td>
                            <td>{{ $value->HOUSEHOLD_MEMBER_NATIONALITY }}</td>
                            <td>{{ $value->HOUSEHOLD_MEMBER_RELIGION }} </td>
                            <td width="13%">
                                <!-- <a href="{{ route('member.household.info.member.step1',[$store_id, $info_id, $value->id]) }}" class="btn btn-sm btn-info">ข้อมูลเพิ่มเติม</a>
                                <a href="#" class="btn btn-sm btn-info">แก้ไข</a> -->

                                <div class="option-link">
                                        <div class="btn-group btn-group-sm" role="group">


                                            @isset($value->householdMemberGeneral->id)
                                                <a class="btn btn-sm btn-info" href="{{ route('member.household.info.member.step1_edit', [$store_id, $info_id, $value->id, $value->householdMemberGeneral->id]) }}" data-toggle="tooltip">แก้ไขข้อมูลส่วนที่ 1</a>
                                            @else
                                                <a class="btn btn-sm btn-info" href="{{ route('member.household.info.member.step1', [$store_id, $info_id, $value->id]) }}" data-toggle="tooltip">ข้อมูลส่วนที่ 1</a>
                                            @endisset
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button class="btn btn-info btn-group-sm dropdown-toggle" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    @isset($value->householdMemberHealth->id)
                                                        <a class="dropdown-item" href="{{ route('member.household.info.member.step2_edit', [$store_id, $info_id, $value->id, $value->householdMemberHealth->id]) }}" data-toggle="tooltip"><i class="fas fa-users"></i> แก้ไขข้อมูลส่วนที่ 2</a>
                                                    @else
                                                        <a class="dropdown-item" href="{{ route('member.household.info.member.step2', [$store_id, $info_id, $value->id]) }}" data-toggle="tooltip"><i class="fas fa-users"></i> ข้อมูลส่วนที่ 2</a>
                                                    @endisset
                                                </div>
                                            </div>
                                        </div>

                                        @isset($value->HouseholdEcon->id)
                                            @php $id_Econ = $value->HouseholdEcon->id; @endphp
                                        @endisset
                                        @isset($value->householdEnviro->id)
                                            @php $id_Enviro = $value->householdEnviro->id; @endphp
                                        @endisset
                                        @isset($value->householdPolitical->id)
                                            @php $id_Political = $value->householdPolitical->id; @endphp
                                        @endisset
                                        @isset($value->householdCommunicat->id)
                                            @php $id_Communicat = $value->householdCommunicat->id; @endphp
                                        @endisset
                                        @csrf
                                        <a href="{{ route('member.household.info.member.edit',[$store_id, $info_id, $value->id]) }}" class="btn btn-sm btn-info">แก้ไขสมาชิก</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
       

        <div class="tile-footer">
            @isset($id_Econ)
                <a href="{{ route('member.household.info.econ.edit',[$store_id, $info_id, $id_Econ]) }}" class="btn btn-secondary">แก้ไขข้อมูลครัวเรือน ส่วนที่ 3</a>
            @else
                <a href="{{ route('member.household.info.econ.create',[$store_id, $info_id]) }}" class="btn btn-secondary">ข้อมูลครัวเรือน ส่วนที่ 3</a>
            @endisset
            @isset($id_Enviro)
                <a href="{{ route('member.household.info.enviro.edit',[$store_id, $info_id, $id_Enviro]) }}" class="btn btn-secondary">แก้ไขข้อมูลด้านสิ่งแวดล้อม ส่วนที่ 4</a>
            @else
                <a href="{{ route('member.household.info.enviro.create',[$store_id, $info_id]) }}" class="btn btn-secondary">ข้อมูลด้านสิ่งแวดล้อม ส่วนที่ 4</a>
            @endisset
            @isset($id_Political)
                <a href="{{ route('member.household.info.political.edit',[$store_id, $info_id, $id_Political]) }}" class="btn btn-secondary">แก้ไขข้อมูลด้านการเมืองการปกครอง ส่วนที่ 5</a>
            @else
                <a href="{{ route('member.household.info.political.create',[$store_id, $info_id]) }}" class="btn btn-secondary">ข้อมูลด้านการเมืองการปกครอง ส่วนที่ 5</a>
            @endisset
            @isset($id_Communicat)
                <a href="{{ route('member.household.info.communicat.edit',[$store_id, $info_id, $id_Communicat]) }}" class="btn btn-secondary">แก้ไขข้อมูลด้านการสื่อสารภายในครัวเรือน ส่วนที่ 6</a>
            @else
                <a href="{{ route('member.household.info.communicat.create',[$store_id, $info_id]) }}" class="btn btn-secondary">ข้อมูลด้านการสื่อสารภายในครัวเรือน ส่วนที่ 6</a>
            @endisset
        </div>
    </div>

    <form action="{{ route('member.household.info.member.store', [$store_id, $info_id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มสมาชิกครัวเรือน</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label class="red-start">คำนำหน้าชื่อ </label>
                                <select class="form-control" name="HOUSEHOLD_MEMBER_PNAME" id="" required>
                                    <option value="" selected="selected">--เลือกคำนำหน้า--</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="เด็กชาย">เด็กชาย</option>
                                    <option value="เด็กหญิง">เด็กหญิง</option>
                                </select>
                            </div>
                            <div class="col-md-5 mb-3">
                                <label class="red-start">ชื่อ </label>
                                <input type="text" class="form-control" name="HOUSEHOLD_MEMBER_NAME" id="validationCustom17" placeholder="ชื่อ" required>
                                <div class="invalid-feedback">
                                    จำเป็นต้องกรอก
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="red-start">นามสกุล </label>
                                <input type="text" class="form-control" name="HOUSEHOLD_MEMBER_SURNAME" id="validationCustom19" placeholder="นามสกุล" required>
                                <div class="invalid-feedback">
                                    จำเป็นต้องกรอก
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-row" style="margin-top: -25px;"> -->
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="red-start">วัน/เดือน/ปีเกิด </label>
                                <input type="date" class="form-control" name="HOUSEHOLD_MEMBER_DOB" id="validationCustom20" placeholder="วัน/เดือน/ปีเกิด" required>
                                <div class="invalid-feedback">
                                    จำเป็นต้องกรอก
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="red-start">ส่วนสูง(ซม.) </label>
                                <input type="number" class="form-control" name="HOUSEHOLD_MEMBER_HEIGHT" id="validationCustom21" placeholder="ส่วนสูง(ซม.)" required>
                                <div class="invalid-feedback">
                                    จำเป็นต้องกรอก
                                </div>
                            </div>
                            <div class="col-md-4 mb-2">
                                <label class="red-start">น้ำหนัก(กก.) </label>
                                <input type="number" class="form-control" name="HOUSEHOLD_MEMBER_WEIGHT" id="validationCustom22" placeholder="น้ำหนัก(กก.)" required>
                                <div class="invalid-feedback">
                                    จำเป็นต้องกรอก
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label class="red-start">สัญชาติ </label>
                                <input type="text" class="form-control" name="HOUSEHOLD_MEMBER_NATIONALITY" id="validationCustom23" placeholder="สัญชาติ" required>
                                <div class="invalid-feedback">
                                    จำเป็นต้องกรอก
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label class="red-start">ศาสนา </label>
                                <select class="form-control" name="HOUSEHOLD_MEMBER_RELIGION" id="validationCustom24" required>
                                    <option value="" selected>-เลือก-</option>
                                    <option value="ศาสนาอิสลาม">ศาสนาอิสลาม</option>
                                    <option value="ศาสนาพุทธ">ศาสนาพุทธ</option>
                                    <option value="ศาสนาคริสต์">ศาสนาคริสต์</option>
                                    <option value="ศาสนายิว">ศาสนายิว</option>
                                    <option value="ศาสนาซิกข์">ศาสนาซิกข์</option>
                                </select>
                                <div class="invalid-feedback">
                                    จำเป็นต้องกรอก
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    
@endsection