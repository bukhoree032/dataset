
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ช่วยเหลือ</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <form action="{{ route('member.household.help.help') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                    <div class="col-md-12">
                        <div class="row">
                            <input type="hidden" class="form-control" name="HE_ID" value="{{$id}}"/>
                            
                            <div class="form-group col-md-12 mb-12">
                                <label class="red-start">ชื่อ - นามสกุลผู้รับ</label>
                                <input type="text" class="form-control @error('HE_NAME') is-invalid @enderror" name="HE_NAME" value="" placeholder="ชื่อผู้ได้รับ"/>
                                <x-error-message title="HE_NAME"/>
                            </div>
                            {{-- <div class="form-group col-md-6 mb-6">
                                <label class="red-start">ปี่ที่ได้รับ</label>
                                <input type="text" class="form-control @error('HE_YEAR') is-invalid @enderror" name="HE_YEAR" value="" placeholder="ปี่ที่ได้รับ"/>
                                <x-error-message title="HE_YEAR"/>
                            </div> --}}
                            <div class="form-group col-md-6 mb-6">
                                <label class="red-start">ปี่ที่ได้รับ</label>
                                <select name="HE_YEAR" class="form-control @error('HE_YEAR') is-invalid @enderror">
                                    <option value="">เลือกปี่ที่ได้รับ</option>
                                    @for($i = '2567'; $i <= date('Y')+544; $i++)
                                        <option value="{{$i}}">ปี {{$i}}</option>
                                    @endfor
                                    {{-- <option value="{{$i}}">ปี {{$i}}</option> --}}
                                </select>
                                <x-error-message title="HOUSEHOLD_INFO_PROVINCE"/>
                            </div>

                            <div class="form-group col-md-6 mb-6">
                                <label class="red-start">วันที่ได้รับ</label>
                                <input type="date" class="form-control @error('HE_DATE') is-invalid @enderror" name="HE_DATE" value="" placeholder="วันเดิอนปีที่ได้รับ"/>
                                <x-error-message title="HE_DATE"/>
                            </div>
                            <div class="form-group col-md-12 mb-12">
                                <label class="red-start">ได้รับการสนับสนุน (องค์ความรู้)</label>
                                <textarea placeholder="ได้รับการสนับสนุน (องค์ความรู้)" class="form-control" name="HE_RECEIVE_KNOW" value="{{ old('HE_RECEIVE_KNOW') }}"></textarea>
                            </div>
                            <div class="form-group col-md-12 mb-12">
                                <label class="red-start">ได้รับการสนับสนุน (วัสดุ/อุปกรณ์/งบประมาณ)</label>
                                <textarea placeholder="ได้รับการสนับสนุน (วัสดุ/อุปกรณ์/งบประมาณ)" class="form-control" name="HE_RECEIVE" value="{{ old('HE_RECEIVE') }}"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
        </form> 
        </div>
    </div>
</div>