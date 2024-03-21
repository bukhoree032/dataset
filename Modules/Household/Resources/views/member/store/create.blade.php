@extends('home::layouts.master')

@section('app-content')
    {{-- <div class="row justify-content-center"> --}}
    <div class="row justify-content-center" ng-controller="infoController"> 
        <div class="col-10">
            <x-alert-error-message/>

            <form action="{{ route('member.household.store.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="tile">
                    <h2 class="tile-title">ข้อมูลครัวเรือน</h2>
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-row mb-3">
                                    
                                    <input type="hidden" class="form-control @error('STORE_FORM_NUMBER') is-invalid @enderror" name="STORE_FORM_ROUND" value="1" placeholder="HC"/>
                                    
                                    <input type="hidden" class="form-control" name="HOUSE_ID" value="{{$result->id}}"/>
                                    <div class="col-md-3 mb-3">
                                        <label class="red-start">HC</label>
                                        <input type="text" class="form-control @error('STORE_FORM_NUMBER') is-invalid @enderror" name="STORE_FORM_NUMBER" value="{{ $result->H_ID }}" placeholder="HC" readonly/>
                                        <x-error-message title="STORE_FORM_NUMBER"/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="red-start">จังหวัด</label>
                                        <select name="HOUSEHOLD_INFO_PROVINCE" class="form-control @error('HOUSEHOLD_INFO_PROVINCE') is-invalid @enderror" ng-model="HOUSEHOLD_INFO_PROVINCE" ng-change="getAmphures(HOUSEHOLD_INFO_PROVINCE)" required>
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
                                    <div class="form-group col-md-3">
                                        <label class="red-start">อำเภอ</label>
                                        <select name="HOUSEHOLD_INFO_AMPHURE" id="amphure" class="form-control @error('HOUSEHOLD_INFO_AMPHURE') is-invalid @enderror" ng-model="HOUSEHOLD_INFO_AMPHURE" ng-change="getDistricts(HOUSEHOLD_INFO_AMPHURE)" required>
                                            <option value="">เลือกอำเภอ</option>
                                            <option value="{% value.id %}" ng-repeat="value in amphures">{% value.name_th %}</option>
                                        </select>
                                        <x-error-message title="HOUSEHOLD_INFO_AMPHURE"/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="red-start">ตำบล</label>
                                        <select name="HOUSEHOLD_INFO_DISTRICT" id="district" class="form-control @error('HOUSEHOLD_INFO_DISTRICT') is-invalid @enderror" ng-model="HOUSEHOLD_INFO_DISTRICT" required>
                                            <option value="">เลือกตำบล</option>
                                            <option value="{% value.id %}" ng-repeat="value in districts">{% value.name_th %}</option>
                                        </select>
                                        <x-error-message title="HOUSEHOLD_INFO_DISTRICT"/>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-2">
                                        <label class="red-start">หมู่ที่</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_MOO') is-invalid @enderror" name="HOUSEHOLD_INFO_MOO" value="{{ $result->H_MOO }}" placeholder="หมู่ที่"/>
                                        <x-error-message title="HOUSEHOLD_INFO_MOO"/>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label class="red-start">ชื่อหมู่บ้าน</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_VIL_NAME') is-invalid @enderror" name="HOUSEHOLD_INFO_VIL_NAME" value="{{ $result->H_VILLAGE }}" placeholder="ชื่อหมู่บ้าน"/>
                                        <x-error-message title="HOUSEHOLD_INFO_VIL_NAME"/>
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label>ชื่อชุมชน</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_COMMU_NAME') is-invalid @enderror" name="HOUSEHOLD_INFO_COMMU_NAME" value="{{ $result->H_VILLAGE }}" placeholder="ชื่อชุมชน"/>
                                        <x-error-message title="HOUSEHOLD_INFO_COMMU_NAME"/>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-1">
                                        <label>บ้านเลขที่</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_ADDRESS') is-invalid @enderror" name="HOUSEHOLD_INFO_ADDRESS" value="{{ $result->H_HOUSE_NUMBER }}" placeholder="บ้านเลขที่"/>
                                        <x-error-message title="HOUSEHOLD_INFO_ADDRESS"/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>รหัสประจำบ้าน</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_HOUSE_CODE') is-invalid @enderror" name="HOUSEHOLD_INFO_HOUSE_CODE" value="{{ old('HOUSEHOLD_INFO_HOUSE_CODE') }}" placeholder="รหัสประจำบ้าน"/>
                                        <x-error-message title="HOUSEHOLD_INFO_HOUSE_CODE"/>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>เลขประจำตัวประชาชน(เจ้าบ้าน)</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_CITIZENNUMBER') is-invalid @enderror" name="HOUSEHOLD_INFO_CITIZENNUMBER" value="{{ old('HOUSEHOLD_INFO_CITIZENNUMBER') }}" placeholder="เลขประจำตัวประชาชน"/>
                                        <x-error-message title="HOUSEHOLD_INFO_CITIZENNUMBER"/>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>กรณีไม่มีบ้านเลขที่ บ้านใกล้เคียงเลขที่</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_HOUSE_NEAR') is-invalid @enderror" name="HOUSEHOLD_INFO_HOUSE_NEAR" value="{{ old('HOUSEHOLD_INFO_HOUSE_NEAR') }}" placeholder="xxxx-xxxxxx-x"/>
                                        <x-error-message title="HOUSEHOLD_INFO_HOUSE_NEAR"/>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-6">
                                        <label>ซอย</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_SOI') is-invalid @enderror" name="HOUSEHOLD_INFO_SOI" value="{{ old('HOUSEHOLD_INFO_SOI') }}" placeholder="ซอย"/>
                                        <x-error-message title="HOUSEHOLD_INFO_SOI"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>ถนน</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_ROAD') is-invalid @enderror" name="HOUSEHOLD_INFO_ROAD" value="{{ old('HOUSEHOLD_INFO_ROAD') }}" placeholder="ถนน"/>
                                        <x-error-message title="HOUSEHOLD_INFO_ROAD"/>
                                    </div>
                                </div>
                                <div class="form-row mb-3">
                                    <div class="form-group col-md-6">
                                        <label class="red-start">พิกัดบ้าน (ละติจูด)</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_LOCAL_LAT') is-invalid @enderror" name="HOUSEHOLD_INFO_LOCAL_LAT" value="{{ old('HOUSEHOLD_INFO_LOCAL_LAT') }}" placeholder="ละติจูด"/>
                                        <x-error-message title="HOUSEHOLD_INFO_LOCAL_LAT"/>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="red-start">พิกัดบ้าน (ลองติจูด)</label>
                                        <input type="text" class="form-control @error('HOUSEHOLD_INFO_LOCAL_LONG') is-invalid @enderror" name="HOUSEHOLD_INFO_LOCAL_LONG" value="{{ old('HOUSEHOLD_INFO_LOCAL_LONG') }}" placeholder="ลองติจูด"/>
                                        <x-error-message title="HOUSEHOLD_INFO_LOCAL_LONG"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <h3 class="tile-title">ผู้รับผิดชอบจัดเก็บข้อมูล</h3>
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-row">
                                    {{-- <div class="col-md-3 mb-3">
                                        <label class="red-start">HC</label>
                                        <input type="text" class="form-control @error('STORE_FORM_NUMBER') is-invalid @enderror" name="STORE_FORM_NUMBER" value="{{ old('STORE_FORM_NUMBER') }}" placeholder="HC"/>
                                        <x-error-message title="STORE_FORM_NUMBER"/>
                                    </div> --}}
                                    <div class="col-md-4 mb-3">
                                        <label class="red-start">วันที่สอบถาม</label>
                                        <input type="date" class="form-control @error('STORE_DATE') is-invalid @enderror" name="STORE_DATE" value="{{ old('STORE_DATE') }}" placeholder="วันที่สอบถาม"/>
                                        <x-error-message title="STORE_DATE"/>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="red-start">เวลา (ตัวอย่าง : 09.25)</label>
                                        <input type="text" class="form-control @error('STORE_TIME') is-invalid @enderror" name="STORE_TIME" value="{{ old('STORE_TIME') }}" placeholder="เวลา"/>
                                        <x-error-message title="STORE_TIME"/>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <label class="red-start">ถึง (ตัวอย่าง : 14.00)</label>
                                        <input type="text" class="form-control @error('STORE_TO_TIME') is-invalid @enderror" name="STORE_TO_TIME" value="{{ old('STORE_TO_TIME') }}" placeholder="ถึง"/>
                                        <x-error-message title="STORE_TO_TIME"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="red-start">ผู้เก็บข้อมูล</label>
                                        <input type="text" class="form-control @error('STORE_COLLECTOR') is-invalid @enderror" name="STORE_COLLECTOR" value="{{ old('STORE_COLLECTOR') }}" placeholder="ผู้เก็บข้อมูล"/>
                                        <x-error-message title="STORE_COLLECTOR"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="red-start">ผู้ตรวจข้อมูล</label>
                                        <input type="text" class="form-control" name="STORE_CHECK" value="{{ old('STORE_CHECK') }}" placeholder="ผู้ตรวจข้อมูล"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="red-start">ผู้บันทึกข้อมูล</label>
                                        <input type="text" class="form-control" name="STORE_SAVE" value="{{ Auth::guard('member')->user()->name }}" placeholder="ผู้บันทึกข้อมูล"/>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control @error('STORE_PERSON.0') is-invalid @enderror" name="STORE_PERSON[0]" value="{{ Auth::guard('member')->user()->name }}" placeholder="คนที่ 1"/>
                                <input type="hidden" class="form-control" name="STORE_PERSON[1]" value="{{ old('STORE_PERSON.1') }}" placeholder="คนที่ 2"/>
                                <input type="hidden" class="form-control" name="STORE_PERSON[2]" value="{{ old('STORE_PERSON.2') }}" placeholder="คนที่ 3"/>
                                {{-- <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <div class="card mw-100">
                                            <div class="card-body">
                                                <h5 class="card-title">ผู้ให้ข้อมูล</h5>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label class="red-start">คนที่ 1</label>
                                                        <input type="text" class="form-control @error('STORE_PERSON.0') is-invalid @enderror" name="STORE_PERSON[0]" value="{{ old('STORE_PERSON.0') }}" placeholder="คนที่ 1"/>
                                                        <x-error-message title="STORE_PERSON.0"/>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label>คนที่ 2</label>
                                                        <input type="text" class="form-control" name="STORE_PERSON[1]" value="{{ old('STORE_PERSON.1') }}" placeholder="คนที่ 2"/>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label>คนที่ 3</label>
                                                        <input type="text" class="form-control" name="STORE_PERSON[2]" value="{{ old('STORE_PERSON.2') }}" placeholder="คนที่ 3"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                
                            </div>
                        </div>
                        <div class="tile-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa-fw fas fa-check-circle"></i>บันทึกข้อมูล
                            </button>
                            <button type="reset" class="btn btn-light"><i class="fa-fw fas fa-times-circle"></i>ยกเลิก
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
    
@endsection