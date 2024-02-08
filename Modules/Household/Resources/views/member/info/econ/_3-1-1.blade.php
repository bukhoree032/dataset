<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="form-group col-md-4">
                <label class="red-start">1. รับจ้างทั่วไป </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_GENERAL') is-invalid @enderror" name="HOUSEHOLD_ECON_GENERAL" value="{{ old('HOUSEHOLD_ECON_GENERAL') }}" />
                <x-error-message title="HOUSEHOLD_ECON_GENERAL" />
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">2. เกษตร </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_AGRI') is-invalid @enderror" name="HOUSEHOLD_ECON_AGRI" value="{{ old('HOUSEHOLD_ECON_AGRI') }}" />
                <x-error-message title="HOUSEHOLD_ECON_AGRI" />
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">3. ปศุสัตว์ </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_LIVESTOCK') is-invalid @enderror" name="HOUSEHOLD_ECON_LIVESTOCK" value="{{ old('HOUSEHOLD_ECON_LIVESTOCK') }}" />
                <x-error-message title="HOUSEHOLD_ECON_LIVESTOCK" />
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">4. ประมง </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_FISHING') is-invalid @enderror" name="HOUSEHOLD_ECON_FISHING" value="{{ old('HOUSEHOLD_ECON_FISHING') }}" />
                <x-error-message title="HOUSEHOLD_ECON_FISHING" />
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">5. อื่นๆ ระบุ </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_OCCU_OTHER') is-invalid @enderror" name="HOUSEHOLD_ECON_OCCU_OTHER" value="{{ old('HOUSEHOLD_ECON_OCCU_OTHER') }}" />
                <x-error-message title="HOUSEHOLD_ECON_OCCU_OTHER" />
            </div>
            <div class="form-group col-md-4">
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">6. ลูก/หลาน </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_CHILD') is-invalid @enderror" name="HOUSEHOLD_ECON_CHILD" value="{{ old('HOUSEHOLD_ECON_CHILD') }}" />
                <x-error-message title="HOUSEHOLD_ECON_CHILD" />
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">7. สวัสดิการรัฐ </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_WELFARE') is-invalid @enderror" name="HOUSEHOLD_ECON_WELFARE" value="{{ old('HOUSEHOLD_ECON_WELFARE') }}" />
                <x-error-message title="HOUSEHOLD_ECON_WELFARE" />
            </div>
            <div class="form-group col-md-4">
                <label class="red-start">8. อื่นๆ ระบุ </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_OTHER_REVENUE') is-invalid @enderror" name="HOUSEHOLD_ECON_OTHER_REVENUE" value="{{ old('HOUSEHOLD_ECON_OTHER_REVENUE') }}" />
                <x-error-message title="HOUSEHOLD_ECON_OTHER_REVENUE" />
            </div>
            
            <div class="form-group col-md-12">
                <label class="red-start">หมายเหตุ </label>
                    <textarea placeholder="หมายเหตุ" class="form-control" name="HOUSEHOLD_ECON_NOTE_REVENUE">{{ old('HOUSEHOLD_ECON_NOTE_REVENUE') }}</textarea>
            </div>
        </div>
    </div>
</div>