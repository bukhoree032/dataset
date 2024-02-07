@extends('home::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-8">
        <x-alert-error-message />

        <form action="{{ route('member.household.info.communicat.store',[$store_id, $info_id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="tile">
                <h3 class="tile-title">ส่วนที่ 6 ข้อมูลด้านการสื่อสารภายในครัวเรือน (ตอบได้มากกว่า 1 ข้อ)</h3>
                <div class="tile-body">
                    {{-- <div class="row">
                        <div class="form-group col-md-12">
                            <label>1. ช่องทางการสื่อสารของครัวเรือน(การสื่อสารของคนในครัวเรือนที่สื่อสารระหว่างคนในครอบครัวญาติพี่น้อง เพื่อนบ้าน และชุมชน)</label>
                            <div class="dropdown-check-list form-control" tabindex="100">
                                <span class="anchor @error('HOUSEHOLD_COMUNICAT_OCCUP_ID') is-invalid @enderror" id="input-OCCUP_ID">เลือก</span>
                                <ul class="items">
                                    @foreach(__jobs6() as $index => $value)
                                    <li>
                                        <input type="checkbox" name="HOUSEHOLD_COMUNICAT_OCCUP_ID[{{$index}}]" class="input-OCCUP_ID" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_COMUNICAT_OCCUP_ID.$index")) checked @endif />
                                        {{ $value['label'] }}
                                    </li>
                                    @endforeach
                                    <li>
                                        <textarea placeholder="กรณีอื่น" name="HOUSEHOLD_COMUNICAT_OCCUP_ID_OTHER" value="{{ old('HOUSEHOLD_COMUNICAT_OCCUP_ID_OTHER') }}"></textarea>
                                    </li>
                                </ul>
                                <x-error-message title="HOUSEHOLD_COMUNICAT_OCCUP_ID" />
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>1. ด้านอาชีพ/รายได้</label>
                            <textarea name="HOUSEHOLD_COMUNICAT_OCCUP" class="form-control" rows="10" placeholder="ข้อเสนอแนะ">{{ old('HOUSEHOLD_COMUNICAT_OCCUP') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>2. ด้านการศึกษา</label>
                            <textarea name="HOUSEHOLD_COMUNICAT_STUDY" class="form-control" rows="10" placeholder="ข้อเสนอแนะ">{{ old('HOUSEHOLD_COMUNICAT_STUDY') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>3. ด้านสังคม</label>
                            <textarea name="HOUSEHOLD_COMUNICAT_SOCIETY" class="form-control" rows="10" placeholder="ข้อเสนอแนะ">{{ old('HOUSEHOLD_COMUNICAT_SOCIETY') }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>4. ด้านอื่นๆ</label>
                            <textarea name="HOUSEHOLD_COMUNICAT_OTHER" class="form-control" rows="10" placeholder="ข้อเสนอแนะ">{{ old('HOUSEHOLD_COMUNICAT_OTHER') }}</textarea>
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