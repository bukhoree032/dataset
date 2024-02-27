
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                            <div class="form-group col-md-12 mb-12">
                                <label class="red-start">ได้รับ</label>
                                <input type="text" class="form-control @error('HE_RECEIVE') is-invalid @enderror" name="HE_RECEIVE" value="" placeholder="สิ่งที่ได้รับ"/>
                                <x-error-message title="HE_RECEIVE"/>
                            </div>
                            <div class="form-group col-md-6 mb-6">
                                <label class="red-start">ปี่ที่ได้รับ</label>
                                <input type="text" class="form-control @error('HE_YEAR') is-invalid @enderror" name="HE_YEAR" value="" placeholder="ปีช่วยเหลือ"/>
                                <x-error-message title="HE_YEAR"/>
                            </div>
                            <div class="form-group col-md-6 mb-6">
                                <label class="red-start">วันที่ได้รับ</label>
                                <input type="date" class="form-control @error('HE_DATE') is-invalid @enderror" name="HE_DATE" value="" placeholder="วันเดิอนปีที่ได้รับ"/>
                                <x-error-message title="HE_DATE"/>
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
