@extends('home::layouts.master')

@section('app-content')
    <div class="row justify-content-center">
        <div class="col-10">
            <x-alert-error-message/>

            <form action="{{ route('member.household.store.update', [$result->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="tile">
                    <h3 class="tile-title">ผู้รับผิดชอบจัดเก็บข้อมูล</h3>
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-row">
                                    <div class="col-md-2 mb-2">
                                        <label class="red-start">เก็บข้อมูลครั้งที่</label>
                                        <select name="STORE_FORM_ROUND" class="form-control @error('STORE_FORM_ROUND') is-invalid @enderror" ng-model="STORE_FORM_ROUND" ng-change="getAmphures(STORE_FORM_ROUND)">
                                            <option value="">เลือกครั้งที่เก็บข้อมูล</option>
                                            <option value="1">ครั้งที่ 1</option>
                                            <option value="2">ครั้งที่ 2</option>
                                            <option value="3">ครั้งที่ 3</option>
                                            <option value="4">ครั้งที่ 4</option>
                                            <option value="5">ครั้งที่ 5</option>
                                        </select>
                                        <x-error-message title="STORE_FORM_ROUND"/>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="red-start">หมายเลขแบบสอบถาม</label>
                                        <input type="text" class="form-control @error('STORE_FORM_NUMBER') is-invalid @enderror" name="STORE_FORM_NUMBER" value="{{ $result->STORE_FORM_NUMBER }}" placeholder="หมายเลขแบบสอบถาม"/>
                                        <x-error-message title="STORE_FORM_NUMBER"/>
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="red-start">วันที่สอบถาม</label>
                                        <input type="date" class="form-control @error('STORE_DATE') is-invalid @enderror" name="STORE_DATE" value="{{ $result->STORE_DATE }}" placeholder="วันที่สอบถาม"/>
                                        <x-error-message title="STORE_DATE"/>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="red-start">เวลา</label>
                                        <input type="time" class="form-control @error('STORE_TIME') is-invalid @enderror" name="STORE_TIME" value="{{ $result->STORE_TIME }}" placeholder="เวลา"/>
                                        <x-error-message title="STORE_TIME"/>
                                    </div>
                                    <div class="col-md-2 mb-2">
                                        <label class="red-start">ถึง</label>
                                        <input type="time" class="form-control @error('STORE_TO_TIME') is-invalid @enderror" name="STORE_TO_TIME" value="{{ $result->STORE_TO_TIME }}" placeholder="ถึง"/>
                                        <x-error-message title="STORE_TO_TIME"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-4 mb-3">
                                        <label class="red-start">ผู้เก็บข้อมูล</label>
                                        <input type="text" class="form-control @error('STORE_COLLECTOR') is-invalid @enderror" name="STORE_COLLECTOR" value="{{ $result->STORE_COLLECTOR }}" placeholder="ผู้เก็บข้อมูล"/>
                                        <x-error-message title="STORE_COLLECTOR"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="red-start">ผู้ตรวจข้อมูล</label>
                                        <input type="text" class="form-control" name="STORE_CHECK" value="{{ $result->STORE_CHECK }}" placeholder="ผู้ตรวจข้อมูล"/>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="red-start">ผู้บันทึกข้อมูล</label>
                                        <input type="text" class="form-control" name="STORE_SAVE" value="{{ $result->STORE_SAVE }}" placeholder="ผู้บันทึกข้อมูล"/>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <div class="card mw-100">
                                            <div class="card-body">
                                                <h5 class="card-title">ผู้ให้ข้อมูล</h5>
                                                <div class="form-row">
                                                    <div class="col-md-4 mb-3">
                                                        <label class="red-start">คนที่ 1</label>
                                                        <input type="text" class="form-control @error('STORE_PERSON.0') is-invalid @enderror" name="STORE_PERSON[0]" value="{{ $result->STORE_PERSON[0] }}" placeholder="คนที่ 1"/>
                                                        <x-error-message title="STORE_PERSON.0"/>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label>คนที่ 2</label>
                                                        <input style='margin-top: -13px;' type="text" class="form-control" name="STORE_PERSON[1]" value="{{ $result->STORE_PERSON[1] }}" placeholder="คนที่ 2"/>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label>คนที่ 3</label>
                                                        <input style='margin-top: -13px;' type="text" class="form-control" name="STORE_PERSON[2]" value="{{ $result->STORE_PERSON[1] }}" placeholder="คนที่ 3"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
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

