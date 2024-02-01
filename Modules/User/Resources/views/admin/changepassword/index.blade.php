@extends('admin::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-4">
        <x-alert-error-message/>

        <form action="{{ route('admin.user.change-password.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}    
            <div class="tile">
                <h3 class="tile-title">เปลี่ยนรหัสผ่าน #{{ $user->username }}</h3>
                <div class="tile-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>รหัสผ่านใหม่</label>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="ระบุรหัสผ่าน">
                                    <x-error-message title="password"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa-fw fas fa-check-circle"></i>ยืนยันการแก้ไขรหัสผ่าน</button>
                    <button type="reset" class="btn btn-light"><i class="fa-fw fas fa-times-circle"></i>ยกเลิก</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection