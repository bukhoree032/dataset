<div class="row">
    <div class="form-group col-md-4">
        <label class="red-start">อาหาร</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_FOOD') is-invalid @enderror" name="HOUSEHOLD_ECON_FOOD" value="{{ $result->HOUSEHOLD_ECON_FOOD }}" />
        <x-error-message title="HOUSEHOLD_ECON_FOOD" />
    </div>
    <div class="form-group col-md-4">
        <label class="red-start">ค่าน้ำ</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_WATER') is-invalid @enderror" name="HOUSEHOLD_ECON_WATER" value="{{ $result->HOUSEHOLD_ECON_WATER }}" />
        <x-error-message title="HOUSEHOLD_ECON_WATER" />
    </div>
    <div class="form-group col-md-4">
        <label class="red-start">ค่าไฟ</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_ELECTRICITY') is-invalid @enderror" name="HOUSEHOLD_ECON_ELECTRICITY" value="{{ $result->HOUSEHOLD_ECON_ELECTRICITY }}" />
        <x-error-message title="HOUSEHOLD_ECON_ELECTRICITY" />
    </div>
    
    <div class="form-group col-md-4">
        <label class="red-start">ค่าโทรศัพท์</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_TEL') is-invalid @enderror" name="HOUSEHOLD_ECON_TEL" value="{{ $result->HOUSEHOLD_ECON_TEL }}" />
        <x-error-message title="HOUSEHOLD_ECON_TEL" />
    </div>
    <div class="form-group col-md-4">
        <label class="red-start">ค่าอินเตอร์เน็ต</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_INTERNET') is-invalid @enderror" name="HOUSEHOLD_ECON_INTERNET" value="{{ $result->HOUSEHOLD_ECON_INTERNET }}" />
        <x-error-message title="HOUSEHOLD_ECON_INTERNET" />
    </div>
    <div class="form-group col-md-4">
        <label class="red-start">การศึกษา</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_STUDY') is-invalid @enderror" name="HOUSEHOLD_ECON_STUDY" value="{{ $result->HOUSEHOLD_ECON_STUDY }}" />
        <x-error-message title="HOUSEHOLD_ECON_STUDY" />
    </div>
    
    <div class="form-group col-md-4">
        <label class="red-start">ค่ารักษาพยาบาล</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_NURSE') is-invalid @enderror" name="HOUSEHOLD_ECON_NURSE" value="{{ $result->HOUSEHOLD_ECON_NURSE }}" />
        <x-error-message title="HOUSEHOLD_ECON_NURSE" />
    </div>
    <div class="form-group col-md-4">
        <label class="red-start">ประกันภัยต่างๆ</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_INSURANCE') is-invalid @enderror" name="HOUSEHOLD_ECON_INSURANCE" value="{{ $result->HOUSEHOLD_ECON_INSURANCE }}" />
        <x-error-message title="HOUSEHOLD_ECON_INSURANCE" />
    </div>
    <div class="form-group col-md-4">
        <label class="red-start">ด้านสังคม</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_SOCIETY') is-invalid @enderror" name="HOUSEHOLD_ECON_SOCIETY" value="{{ $result->HOUSEHOLD_ECON_SOCIETY }}" />
        <x-error-message title="HOUSEHOLD_ECON_SOCIETY" />
    </div>
    
    <div class="form-group col-md-4">
        <label class="red-start">บันเทิงท่องเที่ยว</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_TRAVEL') is-invalid @enderror" name="HOUSEHOLD_ECON_TRAVEL" value="{{ $result->HOUSEHOLD_ECON_TRAVEL }}" />
        <x-error-message title="HOUSEHOLD_ECON_TRAVEL" />
    </div>
    <div class="form-group col-md-4">
        <label class="red-start">เสี่ยงโชค</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_RISK') is-invalid @enderror" name="HOUSEHOLD_ECON_RISK" value="{{ $result->HOUSEHOLD_ECON_RISK }}" />
        <x-error-message title="HOUSEHOLD_ECON_RISK" />
    </div>
    <div class="form-group col-md-4">
        <label class="red-start">เหล้า บุหรี่</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_ALCOHOL') is-invalid @enderror" name="HOUSEHOLD_ECON_ALCOHOL" value="{{ $result->HOUSEHOLD_ECON_ALCOHOL }}" />
        <x-error-message title="HOUSEHOLD_ECON_ALCOHOL" />
    </div>
    
    <div class="form-group col-md-4">
        <label class="red-start">หนี้สิน</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_DEBT') is-invalid @enderror" name="HOUSEHOLD_ECON_DEBT" value="{{ $result->HOUSEHOLD_ECON_DEBT }}" />
        <x-error-message title="HOUSEHOLD_ECON_DEBT" />
    </div>
    <div class="form-group col-md-4">
        <label class="red-start">อื่นๆ ระบุ</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_OTHER_EXPENSES') is-invalid @enderror" name="HOUSEHOLD_ECON_OTHER_EXPENSES" value="{{ $result->HOUSEHOLD_ECON_OTHER_EXPENSES }}" />
        <x-error-message title="HOUSEHOLD_ECON_OTHER_EXPENSES" />
    </div>
            
    <div class="form-group col-md-12">
        <label class="red-start">หมายเหตุ </label>
            <textarea placeholder="หมายเหตุ" class="form-control" name="HOUSEHOLD_ECON_NOTE_EXPENSES">{{ $result->HOUSEHOLD_ECON_NOTE_EXPENSES }}</textarea>
    </div>
</div>