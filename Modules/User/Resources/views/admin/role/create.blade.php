@extends('admin::layouts.master')

@section('app-content')
    <div class="row justify-content-center">
        <div class="col-6">
            <x-alert-error-message/>

            <form action="{{ route('admin.user.role.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="tile">
                    <h3 class="tile-title">สร้างรายการใหม่</h3>
                    <div class="tile-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>ชื่อบทบาท</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="ระบุชื่อสิทธิ์การใช้งาน">
                                <x-error-message title="name"/>
                            </div>
                            <div class="form-group col-md-6">
                                <label>ชื่อที่แสดง</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="display_name" value="{{ old('display_name') }}" placeholder="ระบุชื่อที่แสดง">
                                <x-error-message title="display_name"/>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <label>สิทธิ์การใช้งาน</label>
                                <ul>
                                @foreach($permissions as $permission)
                                    <li>
                                        <label>
                                        {{ $permission['prefix'] }}
                                        </label>
                                        <ul class="list-unstyled">
                                            @foreach($permission['method'] as $method)
                                                <li class="d-inline-block pl-4">
                                                    <label>
                                                        <input type="checkbox" name="permission[]" value="{{ $method['id'] }}">
                                                        {{ $method['name'] }}
                                                    </label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                </ul>
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