@extends('home::layouts.master')

@section('app-content')
    <div class="row justify-content-center">
        <div class="col-10">
            <x-alert-error-message/>
            <form action="{{ route('member.household.help.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="tile">
                    <h3 class="tile-title">แก้ไขการช่วยเหลือ</h3>
                    <div class="tile-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <input type="hidden" class="form-control" name="HE_ID" value="{{$lists->id}}"/>
                                    
                                    <div class="form-group col-md-12 mb-12">
                                        <label class="red-start">ชื่อ - นามสกุลผู้รับ</label>
                                        <input type="text" class="form-control @error('HE_NAME') is-invalid @enderror" name="HE_NAME" value="{{$lists->HE_NAME}}" placeholder="ชื่อผู้ได้รับ"/>
                                        <x-error-message title="HE_NAME"/>
                                    </div>
                                    {{-- <div class="form-group col-md-6 mb-6">
                                        <label class="red-start">ปี่ที่ได้รับ</label>
                                        <input type="text" class="form-control @error('HE_YEAR') is-invalid @enderror" name="HE_YEAR" value="{{$lists->HE_YEAR}}" placeholder="ปี่ที่ได้รับ"/>
                                        <x-error-message title="HE_YEAR"/>
                                    </div> --}}
                                    
                                    <div class="form-group col-md-6 mb-6">
                                        <label class="red-start">ปี่ที่ได้รับ</label>
                                        <select name="HE_YEAR" class="form-control @error('HE_YEAR') is-invalid @enderror">
                                            <option value="">เลือกปี่ที่ได้รับ</option>
                                            @for($i = '2565'; $i < date('Y')+543; $i++)
                                                <option value="{{$i}}" @if($lists->HE_YEAR == $i) selected  @endif>ปี {{$i}}</option>
                                            @endfor
                                            <option value="{{$i}}" @if($lists->HE_YEAR == $i) selected  @endif>ปี {{$i}}</option>
                                        </select>
                                        <x-error-message title="HOUSEHOLD_INFO_PROVINCE"/>
                                    </div>

                                    <div class="form-group col-md-6 mb-6">
                                        <label class="red-start">วันที่ได้รับ</label>
                                        <input type="date" class="form-control @error('HE_DATE') is-invalid @enderror" name="HE_DATE" value="{{$lists->HE_DATE}}" placeholder="วันเดิอนปีที่ได้รับ"/>
                                        <x-error-message title="HE_DATE"/>
                                    </div>
                                    <div class="form-group col-md-12 mb-12">
                                        <label class="red-start">ได้รับการสนับสนุน (องค์ความรู้)</label>
                                        <textarea placeholder="ได้รับการสนับสนุน (องค์ความรู้)" class="form-control" name="HE_RECEIVE_KNOW" value="{{ old('HE_RECEIVE_KNOW') }}">{{$lists->HE_RECEIVE_KNOW}}</textarea>
                                    </div>
                                    <div class="form-group col-md-12 mb-12">
                                        <label class="red-start">ได้รับการสนับสนุน (วัสดุ/อุปกรณ์/งบประมาณ)</label>
                                        <textarea placeholder="ได้รับการสนับสนุน (วัสดุ/อุปกรณ์/งบประมาณ)" class="form-control" name="HE_RECEIVE" value="{{ old('HE_RECEIVE') }}">{{$lists->HE_RECEIVE}}</textarea>
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

