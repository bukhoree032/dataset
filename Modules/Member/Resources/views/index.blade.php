@extends('home::layouts.master')

@section('app-content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-3">
            <form id="selectDateValidateForm" method="POST" action="{{ route('member.login') }}">
                @csrf
                <div class="tile">
                    <h3 class="tile-title text-center mb-2">
                        เข้าสู่ระบบ
                    </h3>
                    <p class="m-0 mb-3 p-0 text-center ">
                        สามารถเข้าสู่ระบบด้วย
                    </p>
                    <div class="tile-body">
                        <div class="form-group">
                            <label>ชื่อผู้ใช้งาน</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"  name="username" placeholder="ระบุชื่อผู้ใช้งาน">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-user-circle"></i></span>
                                </div>
                                <x-error-message title="username"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>รหัสผ่าน</label>
                            <div class="input-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="ระบุรหัสผ่าน">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-key"></i></span>
                                </div>
                                <x-error-message title="password"/>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer d-flex justify-content-between">
                        <div>
                            <button type="submit" class="btn btn-primary">เข้าสู่ระบบ</button>
                            <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                        </div>

                        <a href="{{ route('member.register') }}" class="btn btn-outline-info">ลงทะเบียน</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection