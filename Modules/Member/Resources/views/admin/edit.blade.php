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
        
        <form action="{{ route('admin.member.update', $result->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}    
            <div class="tile">
                <h3 class="tile-title">แก้ไขรายการ</h3>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>ชื่อผู้ใช้งาน</label>
                                    <input type="text" name="username" class="form-control" placeholder="ระบุชื่อผู้ใช้งาน" value="{{ $result->username }}" disabled>
                                    <x-error-message title="username"/>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>รหัสผ่าน</label>
                                    <a href="{{ route('admin.member.change-password.edit', $result->id) }}" class="btn btn-outline-info btn d-block"><i class="fas fa-key"></i> แก้ไขรหัสผ่าน</a>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>อีเมล์</label>
                                    <input type="text" name="email" class="form-control" placeholder="ระบุอีเมล์" value="{{ $result->email }}" disabled>
                                    <x-error-message title="email"/>
                                </div>
                            </div>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>ชื่อ-นามสกุล</label>
                                    <input type="text" name="name" class="form-control" placeholder="ระบุชื่อ" value="{{ $result->name }}">
                                    <x-error-message title="name"/>
                                </div>
                                <div class="form-group col-md-2">
                                    <label><abbr data-toggle="tooltip" data-placement="top" title="ชื่อที่แสดงให้คนทั่วไปได้เห็น">ชื่อเล่น</abbr></label>
                                    <input type="text" name="nickname" class="form-control" placeholder="ระบุชื่อเล่น" value="{{ $result->nickname }}">
                                    <x-error-message title="nickname"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>ที่อยู่</label>
                                    <input type=" text" name="address" class="form-control" placeholder="ระบุที่อยู่" value="{{ $result->address }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label>เมือง</label>
                                    <input type="text" name="city" class="form-control" placeholder="ระบุเมือง" value="{{ $result->city }}">
                                </div>
                                <div class="form-group col-md-4">
                                    <label>จังหวัด</label>
                                    <select name="province_id" class="form-control">
                                        <option value="">-เลือก-</option>
                                        @foreach ($provinces as  $province)
                                        <option value="{{ $province->id }}" @if($result->province_id == $province->id) selected @endif >{{ $province->name_th }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>รหัสไปรษณีย์</label>
                                    <input type="text" name="zip_code" class="form-control" placeholder="ระบุ" value="{{ $result->zip_code }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="tile">
                                <h3 class="tile-title">ภาพโปรไฟล์</h3>
                                <div class="tile-body">
                                    <div class="avatar-container">
                                        <div class="avatar-container-img">
                                            <img id="avatar-img" src="{{ Storage::url("member/crop/".$result->avatar) }}" class="rounded-circle" width="160" height="160">
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
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle fa-fw"></i>บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-light"><i class="fa fa-times-circle fa-fw"></i>ยกเลิก</button>

                    @if (session('message'))
                    <div class="alert alert-success mt-2">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>
@endsection