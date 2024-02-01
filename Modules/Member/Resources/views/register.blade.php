@extends('home::layouts.master')

@section('app-content')
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-3">
            <form id="selectDateValidateForm" method="POST" action="{{ route('member.register') }}">
                @csrf
                <div class="tile">
                    <h3 class="tile-title text-center">
                        ลงทะเบียน
                    </h3>
                    <div class="tile-body">
                        <div class="form-group">
                            <label>ชื่อผู้ใช้งาน</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ @old('username') }}"  name="username" placeholder="ระบุชื่อผู้ใช้งาน">
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
                        <div class="form-group">
                            <label>ชื่อ-สกุล</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ @old('name') }}" name="name" placeholder="ระบุชื่อ-สกุล">
                            <x-error-message title="name"/>
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control @error('tel') is-invalid @enderror" value="{{ @old('tel') }}" name="tel" placeholder="ระบุเบอร์โทรศัพท์">
                            <x-error-message title="tel"/>
                        </div>
                        <div class="form-group">
                            <label>ชื่อหน่วยงาน</label>
                            <input type="text" class="form-control @error('agency') is-invalid @enderror" value="{{ @old('agency') }}" name="agency" placeholder="ระบุชื่อหน่วยงาน">
                            <x-error-message title="agency"/>
                        </div>
                        <div class="form-group">
                            <label>จังหวัด</label>
                            <select name="province_id" class="form-control @error('province_id') is-invalid @enderror">
                                <option value="">-เลือก-</option>
                                @foreach ($provinces as  $province)
                                <option value="{{ $province->id }}" @if(@old('province_id') == $province->id) selected @endif >{{ $province->name_th }}</option>
                                @endforeach
                            </select>
                            <x-error-message title="province_id"/>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button type="submit" class="btn btn-primary">ลงทะเบียน</button>
                        <button type="reset" class="btn btn-secondary">ยกเลิก</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection