@extends('admin::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-10">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        
        <form action="{{ route('admin.member.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tile">
                <h3 class="tile-title">สร้างรายการใหม่</h3>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>ชื่อผู้ใช้งาน</label>
                                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="ระบุชื่อผู้ใช้งาน">
                                    <x-error-message title="username"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>รหัสผ่าน</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="ระบุรหัสผ่าน">
                                    <x-error-message title="password"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>อีเมล์</label>
                                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="ระบุอีเมล์">
                                    <x-error-message title="email"/>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>ชื่อ-นามสกุล</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="ระบุชื่อ">
                                    <x-error-message title="name"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label><abbr data-toggle="tooltip" data-placement="top" title="ชื่อที่แสดงให้คนทั่วไปได้เห็น">ชื่อเล่น</abbr></label>
                                    <input type="text" name="nickname" class="form-control @error('nickname') is-invalid @enderror" value="{{ old('nickname') }}" placeholder="ระบุชื่อเล่น">
                                    <x-error-message title="nickname"/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>ตำแหน่ง</label>
                                    <input type="text" name="position" class="form-control" value="{{ old('position') }}" placeholder="ระบุตำแหน่ง">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>ที่อยู่</label>
                                    <input type=" text" name="address" class="form-control" value="{{ old('address') }}" placeholder="ระบุที่อยู่">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label>เมือง</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}" placeholder="ระบุเมือง">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>จังหวัด</label>
                                    <select name="province_id" class="form-control">
                                        <option value="">-เลือก-</option>
                                        @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" @if(old('province_id') == $province->id) selected @endif >{{ $province->name_th }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>รหัสไปรษณีย์</label>
                                    <input type="text" name="zip_code" class="form-control" value="{{ old('zip_code') }}" placeholder="ระบุ">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="tile">
                                <h3 class="tile-title">ภาพโปรไฟล์</h3>
                                <div class="tile-body">
                                    <div class="avatar-container">
                                        <div class="avatar-container-img">
                                            <img id="avatar-img" src="{{ asset('assets/images/user2-160x160.jpg') }}" class="rounded-circle" width="160" height="160">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <p class="help-block">ไฟล์ต้องมีขนาดไม่เกิน 200 x 200 pixel.</p>
                                        @error('cover')
                                        <span class="d-block text-danger text-sm">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <input type="file" name="cover" id="avatar" accept="image/*" class="d-none">
                                        <button type="button" onclick="$('#avatar').trigger('click');" class="btn btn-outline-secondary"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span> เลือกรูปภาพ...</button>
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