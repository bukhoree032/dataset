<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="form-group col-md-4">
                <label class="red-start">รับจ้างทั่วไป </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_GENERAL') is-invalid @enderror" name="HOUSEHOLD_ECON_GENERAL" value="{{ $result->HOUSEHOLD_ECON_GENERAL }}" />
                <x-error-message title="HOUSEHOLD_ECON_GENERAL" />
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">เกษตร </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_AGRI') is-invalid @enderror" name="HOUSEHOLD_ECON_AGRI" value="{{ $result->HOUSEHOLD_ECON_AGRI }}" />
                <x-error-message title="HOUSEHOLD_ECON_AGRI" />
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">ปศุสัตว์ </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_LIVESTOCK') is-invalid @enderror" name="HOUSEHOLD_ECON_LIVESTOCK" value="{{ $result->HOUSEHOLD_ECON_LIVESTOCK }}" />
                <x-error-message title="HOUSEHOLD_ECON_LIVESTOCK" />
            </div>

            
            <div class="form-group col-md-4">
                <label class="red-start">ประมง </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_FISHING') is-invalid @enderror" name="HOUSEHOLD_ECON_FISHING" value="{{ $result->HOUSEHOLD_ECON_FISHING }}" />
                <x-error-message title="HOUSEHOLD_ECON_FISHING" />
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">อื่นๆ ระบุ </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_OCCU_OTHER') is-invalid @enderror" name="HOUSEHOLD_ECON_OCCU_OTHER" value="{{ $result->HOUSEHOLD_ECON_OCCU_OTHER }}" />
                <x-error-message title="HOUSEHOLD_ECON_OCCU_OTHER" />
            </div>
            <div class="form-group col-md-4">
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">ลูก/หลาน </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_CHILD') is-invalid @enderror" name="HOUSEHOLD_ECON_CHILD" value="{{ $result->HOUSEHOLD_ECON_CHILD }}" />
                <x-error-message title="HOUSEHOLD_ECON_CHILD" />
            </div>

            
            <div class="form-group col-md-4">
                <label class="red-start">สวัสดิการรัฐ </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_WELFARE') is-invalid @enderror" name="HOUSEHOLD_ECON_WELFARE" value="{{ $result->HOUSEHOLD_ECON_WELFARE }}" />
                <x-error-message title="HOUSEHOLD_ECON_WELFARE" />
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">อื่นๆ ระบุ </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_OTHER_REVENUE') is-invalid @enderror" name="HOUSEHOLD_ECON_OTHER_REVENUE" value="{{ $result->HOUSEHOLD_ECON_OTHER_REVENUE }}" />
                <x-error-message title="HOUSEHOLD_ECON_OTHER_REVENUE" />
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">หมายเหตุ </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_NOTE_REVENUE') is-invalid @enderror" name="HOUSEHOLD_ECON_NOTE_REVENUE" value="{{ $result->HOUSEHOLD_ECON_NOTE_REVENUE }}" />
                <x-error-message title="HOUSEHOLD_ECON_NOTE_REVENUE" />
            </div>
        </div>
    </div>
</div>