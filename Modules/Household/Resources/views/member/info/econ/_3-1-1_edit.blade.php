<div class="row">
    <div class="col-md-6">
        <div class="row">
            <div class="form-group col-md-6">
                <label class="red-start">1. เงินเดือน/ค่าจ้าง(ต่อปี) </label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_INCOME_TYPE.1') is-invalid @enderror" name="HOUSEHOLD_ECON_INCOME_TYPE[1]" value="{{ $result->HOUSEHOLD_ECON_INCOME_TYPE[1] }}" />
                <x-error-message title="HOUSEHOLD_ECON_INCOME_TYPE[1]" />
            </div>
            <div class="form-group col-md-6">
                <label>เลือกเดือนเดือนที่ไม่ได้รายได้</label>
                <div class="dropdown-check-list form-control" tabindex="100">
                    <span class="anchor " id="input-INCOME1" data-label="">เลือกเดือน</span>
                    <ul class="items">
                        @foreach(__jobs_m() as $index => $value)
                        <li>
                            <input type="checkbox" name="HOUSEHOLD_ECON_INCOME[1][{{ $index }}]" class="input-INCOME1" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_INCOME[1][$index]) && ($result->HOUSEHOLD_ECON_INCOME[1][$index] == $value['id'])) checked @endif/>
                            {{ $value['label'] }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="form-group col-md-6">
                <label class="red-start">2. รายรับจากการทำการทำการเกษตร(ต่อปี)</label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_INCOME_TYPE.2') is-invalid @enderror" name="HOUSEHOLD_ECON_INCOME_TYPE[2]" value="{{ $result->HOUSEHOLD_ECON_INCOME_TYPE[2] }}" />
                <x-error-message title="HOUSEHOLD_ECON_INCOME_TYPE[2]" />
            </div>
            <div class="form-group col-md-6">
                <label>เลือกเดือนเดือนที่ไม่ได้รายได้</label>
                <div class="dropdown-check-list form-control" tabindex="100">
                    <span class="anchor" id="input-INCOME2">เลือกเดือน</span>
                    <ul class="items">
                        @foreach(__jobs_m() as $index => $value)
                        <li>
                            <input type="checkbox" name="HOUSEHOLD_ECON_INCOME[2][{{ $index }}]" class="input-INCOME2" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_INCOME[2][$index]) && ($result->HOUSEHOLD_ECON_INCOME[2][$index] == $value['id'])) checked @endif/>
                            {{ $value['label'] }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="form-group col-md-6">
                <label class="red-start">3. รายได้จากการประกอบธุรกิจ/ค้าขาย(ต่อปี)</label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_INCOME_TYPE.3') is-invalid @enderror" name="HOUSEHOLD_ECON_INCOME_TYPE[3]" value="{{ $result->HOUSEHOLD_ECON_INCOME_TYPE[3] }}" />
                <x-error-message title="HOUSEHOLD_ECON_INCOME_TYPE[3]" />
            </div>
            <div class="form-group col-md-6">
                <label>เลือกเดือนเดือนที่ไม่ได้รายได้</label>
                <div class="dropdown-check-list form-control" tabindex="100">
                    <span class="anchor " id="input-INCOME3">เลือกเดือน</span>
                    <ul class="items">
                        @foreach(__jobs_m() as $index => $value)
                        <li>
                            <input type="checkbox" name="HOUSEHOLD_ECON_INCOME[3][{{ $index }}]" class="input-INCOME3" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_INCOME[3][$index]) && ($result->HOUSEHOLD_ECON_INCOME[3][$index] == $value['id'])) checked @endif/>
                            {{ $value['label'] }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="form-group col-md-6">
                <label class="red-start">4. รายได้จากทรัพย์สิน(ต่อปี)</label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_INCOME_TYPE.4') is-invalid @enderror" name="HOUSEHOLD_ECON_INCOME_TYPE[4]" value="{{ $result->HOUSEHOLD_ECON_INCOME_TYPE[4] }}" />
                <x-error-message title="HOUSEHOLD_ECON_INCOME_TYPE[4]" />
            </div>
            <div class="form-group col-md-6">
                <label>เลือกเดือนเดือนที่ไม่ได้รายได้</label>
                <div class="dropdown-check-list form-control" tabindex="100">
                    <span class="anchor " id="input-INCOME4">เลือกเดือน</span>
                    <ul class="items">
                        @foreach(__jobs_m() as $index => $value)
                        <li>
                            <input type="checkbox" name="HOUSEHOLD_ECON_INCOME[4][{{ $index }}]" class="input-INCOME4" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_INCOME[4][$index]) && ($result->HOUSEHOLD_ECON_INCOME[4][$index] == $value['id'])) checked @endif/>
                            {{ $value['label'] }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            <div class="form-group col-md-6">
                <label class="red-start">5. รายได้จากแหล่งอื่นๆ(ต่อปี)</label>
                <input type="text" class="form-control @error('HOUSEHOLD_ECON_INCOME_TYPE.5') is-invalid @enderror" name="HOUSEHOLD_ECON_INCOME_TYPE[5]" value="{{ $result->HOUSEHOLD_ECON_INCOME_TYPE[5] }}" />
                <x-error-message title="HOUSEHOLD_ECON_INCOME_TYPE[5]" />
            </div>
            <div class="form-group col-md-6">
                <label>เลือกเดือนเดือนที่ไม่ได้รายได้</label>
                <div class="dropdown-check-list form-control" tabindex="100">
                    <span class="anchor " id="input-INCOME5">เลือกเดือน</span>
                    <ul class="items">
                        @foreach(__jobs_m() as $index => $value)
                        <li>
                            <input type="checkbox" name="HOUSEHOLD_ECON_INCOME[5][{{ $index }}]" class="input-INCOME5" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_INCOME[5][$index]) && ($result->HOUSEHOLD_ECON_INCOME[5][$index] == $value['id'])) checked @endif/>
                            {{ $value['label'] }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>