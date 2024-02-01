@extends('admin::layouts.master')

@section('app-content')
<div class="row">
    <div class="col-md-5">
        <form action="{{ route('admin.setting.meta.update', $meta->id) }}" method="POST">
            @csrf
            {{ method_field('PUT') }}   
            <div class="tile">
                <h3 class="tile-title">ปรับปรุงรายการ</h3>
                <div class="tile-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="control-label">หัวเว็บไซต์</label>
                            <input type="text" class="form-control" name="title" value="{{ $meta->title }}" placeholder="ระบุหัวเว็บไซต์">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="control-label">คำอธิบายเว็บไซต์</label>
                            <input type="text" class="form-control" name="description" value="{{ $meta->description }}" placeholder="ระบุคำอธิบายเว็บไซต์">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="control-label">คำค้นหา</label>
                            <input type="text" class="form-control" name="keywords" value="{{ $meta->keywords }}" placeholder="ระบุคำค้นหา">
                        </div>
                    </div>
                </div>
                <div class="tile-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-check-circle fa-fw"></i>บันทึกข้อมูล</button>
                    <button type="reset" class="btn btn-light"><i class="fas fa-times-circle fa-fw"></i>ยกเลิก</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-7">
        <div class="tile">
            <div class="tile-body">
                <p><strong>หัวเว็บไซต์ (Title) :</strong> แสดงส่วนหัวของ Browser.</p>
                <p><strong>คำอธิบายเว็บไซต์ (Description):</strong> คำอธิบายเกี่ยวกับเว็บไซต์ของคุณ.</p>
                <p><strong>คำค้นหา (Keyword) :</strong> คำสำคัญในเว็บไซต์คุณ ควรมี (,) คั่น ไม่ควรเกิน 5 คำ ตัวอย่าง เช่น เว็บสำเร็จรูป, ทำเว็บไซต์.</p>
                <p style="text-align:center;">
                    <img width="100%" border="0" src="{{ site_asset_common_img_url('meta-help.jpg') }}">
                </p>
            </div>
        </div>
    </div>
</div>
@endsection