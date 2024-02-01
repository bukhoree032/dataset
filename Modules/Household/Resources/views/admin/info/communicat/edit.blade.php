@extends('admin::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-8">
        <x-alert-error-message />

        <form action="{{ route('admin.household.info.communicat.update',[request()->store, $result->household_info_id,  $result->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="tile">
                <h3 class="tile-title">ส่วนที่ 6 ข้อมูลด้านการสื่อสารภายในครัวเรือน (ตอบได้มากกว่า 1 ข้อ)</h3>
                <div class="tile-body">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>1. ช่องทางการสื่อสารของครัวเรือน(การสื่อสารของคนในครัวเรือนที่สื่อสารระหว่างคนในครอบครัวญาติพี่น้อง เพื่อนบ้าน และชุมชน)</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor @error('HOUSEHOLD_COMUNICAT_OCCUP_ID') is-invalid @enderror" id="input-OCCUP_ID">เลือก</span>
                                <ul class="items">
                                    @foreach(__jobs6() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_COMUNICAT_OCCUP_ID[{{$index}}]" class="input-OCCUP_ID" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(isset($result->HOUSEHOLD_COMUNICAT_OCCUP_ID[$index]) && ($result->HOUSEHOLD_COMUNICAT_OCCUP_ID[$index] == $value['id'])) checked @endif/>
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                    <li>
                                        <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_COMUNICAT_OCCUP_ID_OTHER">{{ $result->HOUSEHOLD_COMUNICAT_OCCUP_ID_OTHER }}</textarea>
                                    </li>
                                </ul>
                                <x-error-message title="HOUSEHOLD_COMUNICAT_OCCUP_ID" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>2. ข้อเสนอแนะ</label>
                            <textarea name="SUGGESTION" class="form-control" rows="10" placeholder="ข้อเสนอแนะ">{{ $result->SUGGESTION }}</textarea>
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

@section('script-content')
<script type="text/javascript">
    $(function () {
            selectCheckList($(".input-OCCUP_ID "), $("#input-OCCUP_ID"), "เลือก");
        });
</script>
@endsection