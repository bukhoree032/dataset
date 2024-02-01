@extends('admin::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-10">
        <x-alert-error-message/>

        <form action="{{ route('admin.article.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tile">
                <h3 class="tile-title">สร้างรายการใหม่</h3>
                <div class="tile-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>หัวข้อ</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="ระบุหัวข้อ">
                            <x-error-message title="title"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ลิงค์เชื่อมโยง</label>
                            <input type="text" name="url" class="form-control" placeholder="ระบุลิงค์เชื่อมโยง" value="{{ old('url') }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label>การแสดง (Target)</label>
                            <select name="target" class="form-control">
                                <option value="">-เลือก-</option>
                                <option value="_parent" @if(old('target') == "_parent") selected @endif>_parent (เปิดหน้าต่างที่เป็นหน้าต่างระดับ Parent)</option>
                                <option value="_blank" @if(old('target') == "_blank") selected @endif>_blank (เปิดหน้าต่างใหม่ทุกครั้ง)</option>
                                <option value="_self" @if(old('target') == "_self") selected @endif>_self (เปิดหน้าต่างเดิม)</option>
                                <option value="_top" @if(old('target') == "_top") selected @endif>_top (เปิดหน้าต่างในระดับบนสุด)</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>วันที่เขียน</label>
                            <div class="input-group">
                                <input class="form-control datepicker @error('date') is-invalid @enderror" type="text" name="date" value="{{ old('date') }}" placeholder="ระบุวันที่">
                                <div class="input-group-append"><span class="input-group-text"><i class="fa fa-calendar"></i></span></div>
                                <x-error-message title="date"/>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label>เขียนโดย</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ old('author') }}" placeholder="ระบุผู้เขียน">
                            <x-error-message title="author"/>
                        </div>
                        <div class="form-group col-md-5">
                            <label>หน้าปก</label>
                            <input type="file" name="cover" class="form-control @error('cover') is-invalid @enderror krajee-input" data-msg-placeholder="เลือกไฟล์หน้าปก" accept="image/*">
                            <small class="form-text text-muted">ขนาดรูปภาพที่เหมาะสม 1200 x 630 pixel (กว้าง x สูง) ภาพจะถูก crop อัตโนมัติ</small>
                            <x-error-message title="cover"/>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>รายละเอียด</label>
                            <textarea class="form-control" name="details" id="details" rows="8" placeholder="ระบุรายละเอียด...">{{ old('details') }}</textarea>
                            {!! ckeditor_advanced_url('details') !!}
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