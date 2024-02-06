
@extends('home::layouts.master')

@section('app-content')

<div class="row justify-content-center" ng-controller="infoController">
    <div class="col-10">
        <div class="tile">
            <form action="{{ route('member.household.info.member.update', [request()->store, $result->household_info_id,  $result->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label class="red-start">คำนำหน้าชื่อ </label>
                        <select class="form-control" name="HOUSEHOLD_MEMBER_PNAME" id="" required>
                            <option value="{{ $result->HOUSEHOLD_MEMBER_PNAME }}" selected="selected">{{ $result->HOUSEHOLD_MEMBER_PNAME }}</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="เด็กชาย">เด็กชาย</option>
                            <option value="เด็กหญิง">เด็กหญิง</option>
                        </select>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label class="red-start">ชื่อ </label>
                        <input type="text" class="form-control" name="HOUSEHOLD_MEMBER_NAME" id="validationCustom17" placeholder="ชื่อ" value="{{ $result->HOUSEHOLD_MEMBER_NAME }}" required>
                        <div class="invalid-feedback">
                            จำเป็นต้องกรอก
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="red-start">นามสกุล </label>
                        <input type="text" class="form-control" name="HOUSEHOLD_MEMBER_SURNAME" id="validationCustom19" placeholder="นามสกุล" value="{{ $result->HOUSEHOLD_MEMBER_SURNAME }}" required>
                        <div class="invalid-feedback">
                            จำเป็นต้องกรอก
                        </div>
                    </div>
                </div>
                <!-- <div class="form-row" style="margin-top: -25px;"> -->
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="red-start">วัน/เดือน/ปีเกิด </label>
                        <input type="date" class="form-control" name="HOUSEHOLD_MEMBER_DOB" id="validationCustom20" placeholder="วัน/เดือน/ปีเกิด" value="{{ $result->HOUSEHOLD_MEMBER_DOB }}" required>
                        <div class="invalid-feedback">
                            จำเป็นต้องกรอก
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="red-start">เลขประจำตัวประชาชน</label>
                        <input type="number" class="form-control" name="HOUSEHOLD_MEMBER_CITIZENNUMBER" id="validationCustom21" placeholder="เลขประจำตัวประชาชน" value="{{ $result->HOUSEHOLD_MEMBER_CITIZENNUMBER }}" required>
                        <div class="invalid-feedback">
                            จำเป็นต้องกรอก
                        </div>
                    </div>
                    {{-- <div class="col-md-4 mb-2">
                        <label class="red-start">น้ำหนัก(กก.) </label>
                        <input type="number" class="form-control" name="HOUSEHOLD_MEMBER_WEIGHT" id="validationCustom22" placeholder="น้ำหนัก(กก.)" value="{{ $result->HOUSEHOLD_MEMBER_WEIGHT }}" required>
                        <div class="invalid-feedback">
                            จำเป็นต้องกรอก
                        </div>
                    </div> --}}
                </div>
                {{-- <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label class="red-start">สัญชาติ </label>
                        <input type="text" class="form-control" name="HOUSEHOLD_MEMBER_NATIONALITY" id="validationCustom23" placeholder="สัญชาติ" value="{{ $result->HOUSEHOLD_MEMBER_NATIONALITY }}" required>
                        <div class="invalid-feedback">
                            จำเป็นต้องกรอก
                        </div>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label class="red-start">ศาสนา </label>
                        <select class="form-control" name="HOUSEHOLD_MEMBER_RELIGION" id="validationCustom24" value="{{ $result->HOUSEHOLD_MEMBER_RELIGION }}" required>
                            <option value="{{ $result->HOUSEHOLD_MEMBER_RELIGION }}" selected>{{ $result->HOUSEHOLD_MEMBER_RELIGION }}</option>
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
                </div> --}}
                <div class="tile-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-fw fas fa-check-circle"></i>บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-light"><i class="fa-fw fas fa-times-circle"></i>ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection