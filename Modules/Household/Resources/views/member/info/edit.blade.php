@extends('home::layouts.master')

@section('app-content')
    <div class="row justify-content-center" ng-controller="infoController">
        <div class="col-10">
            <x-alert-error-message/>

            <form action="{{ route('member.household.info.update',[request()->store,  $result->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="tile">
                    <h2 class="tile-title">ข้อมูลครัวเรือน</h2>
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-4">
                                        <label class="red-start">จังหวัด</label>
                                        <select name="HOUSEHOLD_INFO_PROVINCE" class="form-control @error('HOUSEHOLD_INFO_PROVINCE') is-invalid @enderror" ng-model="HOUSEHOLD_INFO_PROVINCE" ng-change="getAmphures(HOUSEHOLD_INFO_PROVINCE)">
                                            <option value="">เลือกจังหวัด</option>
                                            <option value="75">ยะลา</option>
                                            <option value="76">นราธิวาส</option>
                                            <option value="74">ปัตตานี</option>
                                            @foreach($provinces as $value)
                                                <option value="{{ $value->id }}">{{ $value->name_th }}</option>
                                            @endforeach
                                        </select>
                                        <x-error-message title="HOUSEHOLD_INFO_PROVINCE"/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="red-start">อำเภอ</label>
                                        <select name="HOUSEHOLD_INFO_AMPHURE" id="amphure" class="form-control @error('HOUSEHOLD_INFO_AMPHURE') is-invalid @enderror" ng-model="HOUSEHOLD_INFO_AMPHURE" ng-change="getDistricts(HOUSEHOLD_INFO_AMPHURE)">
                                            <option value="">เลือกอำเภอ</option>
                                            <option value="{% value.id %}" ng-repeat="value in amphures">{% value.name_th %}</option>
                                        </select>
                                        <x-error-message title="HOUSEHOLD_INFO_AMPHURE"/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="red-start">ตำบล</label>
                                        <select name="HOUSEHOLD_INFO_DISTRICT" id="district" class="form-control @error('HOUSEHOLD_INFO_DISTRICT') is-invalid @enderror" ng-model="HOUSEHOLD_INFO_DISTRICT">
                                            <option value="">เลือกตำบล</option>
                                            <option value="{% value.id %}" ng-repeat="value in districts">{% value.name_th %}</option>
                                        </select>
                                        <x-error-message title="HOUSEHOLD_INFO_DISTRICT"/>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-2">
                                        <label class="red-start">หมู่ที่</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_MOO') is-invalid @enderror" name="HOUSEHOLD_INFO_MOO" value="{{ $result->HOUSEHOLD_INFO_MOO }}" placeholder="หมู่ที่"/>
                                        <x-error-message title="HOUSEHOLD_INFO_MOO"/>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="red-start">ชื่อหมู่บ้าน</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_VIL_NAME') is-invalid @enderror" name="HOUSEHOLD_INFO_VIL_NAME" value="{{ $result->HOUSEHOLD_INFO_VIL_NAME }}" placeholder="ชื่อหมู่บ้าน"/>
                                        <x-error-message title="HOUSEHOLD_INFO_VIL_NAME"/>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>ชื่อชุมชน</label>
                                        <input style='margin-top: -13px;' type="text" class="form-control @error('HOUSEHOLD_INFO_COMMU_NAME') is-invalid @enderror" name="HOUSEHOLD_INFO_COMMU_NAME" value="{{ $result->HOUSEHOLD_INFO_COMMU_NAME }}" placeholder="ชื่อชุมชน"/>
                                        <x-error-message title="HOUSEHOLD_INFO_COMMU_NAME"/>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-2">
                                        <label>บ้านเลขที่</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_ADDRESS') is-invalid @enderror" name="HOUSEHOLD_INFO_ADDRESS" value="{{ $result->HOUSEHOLD_INFO_ADDRESS }}" placeholder="บ้านเลขที่"/>
                                        <x-error-message title="HOUSEHOLD_INFO_ADDRESS"/>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>รหัสประจำบ้าน</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_HOUSE_CODE') is-invalid @enderror" name="HOUSEHOLD_INFO_HOUSE_CODE" value="{{ $result->HOUSEHOLD_INFO_HOUSE_CODE }}" placeholder="รหัสประจำบ้าน"/>
                                        <x-error-message title="HOUSEHOLD_INFO_HOUSE_CODE"/>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>กรณีไม่มีบ้านเลขที่ บ้านใกล้เคียงเลขที่</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_HOUSE_NEAR') is-invalid @enderror" name="HOUSEHOLD_INFO_HOUSE_NEAR" value="{{ $result->HOUSEHOLD_INFO_HOUSE_NEAR }}" placeholder="xxxx-xxxxxx-x"/>
                                        <x-error-message title="HOUSEHOLD_INFO_HOUSE_NEAR"/>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-6">
                                        <label>ซอย</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_SOI') is-invalid @enderror" name="HOUSEHOLD_INFO_SOI" value="{{ $result->HOUSEHOLD_INFO_SOI }}" placeholder="ซอย"/>
                                        <x-error-message title="HOUSEHOLD_INFO_SOI"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>ถนน</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_ROAD') is-invalid @enderror" name="HOUSEHOLD_INFO_ROAD" value="{{ $result->HOUSEHOLD_INFO_ROAD }}" placeholder="ถนน"/>
                                        <x-error-message title="HOUSEHOLD_INFO_ROAD"/>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-6">
                                        <label class="red-start">พิกัดบ้าน (ละติจูด)</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_LOCAL_LAT') is-invalid @enderror" name="HOUSEHOLD_INFO_LOCAL_LAT" value="{{ $result->HOUSEHOLD_INFO_LOCAL_LAT }}" placeholder="ละติจูด"/>
                                        <x-error-message title="HOUSEHOLD_INFO_LOCAL_LAT"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="red-start">พิกัดบ้าน (ลองติจูด)</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_LOCAL_LONG') is-invalid @enderror" name="HOUSEHOLD_INFO_LOCAL_LONG" value="{{ $result->HOUSEHOLD_INFO_LOCAL_LONG }}" placeholder="ลองติจูด"/>
                                        <x-error-message title="HOUSEHOLD_INFO_LOCAL_LONG"/>
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