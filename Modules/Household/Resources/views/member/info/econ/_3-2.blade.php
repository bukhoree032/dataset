<div class="row">
    <div class="form-group col-md-6">
        <label class="red-start">1. ที่อยู่อาศัย(ตอบได้มากว่า 1 ข้อ)</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_HOUSE_LIST') is-invalid @enderror" id="input-HOUSE_LIST">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_2_1() as $index => $value)
                <div class="row">
                    <div class="col-md-6">
                        <input type="checkbox" name="HOUSEHOLD_ECON_HOUSE_LIST[{{ $index }}]" class="input-HOUSE_LIST" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_HOUSE_LIST.$index")) checked @endif />
                        {{ $value['label'] }}
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="HOUSEHOLD_ECON_HOUSE_NO[{{ $index }}]" placeholder="ขนาด/จำนวน/ปริมาณ" style="width: 100%; margin-top: 5px;" value="{{ old('HOUSEHOLD_ECON_HOUSE_NO.$index') }}" />
                    </div>
                </div>
                @endforeach
            </ul>
            <x-error-message title="HOUSEHOLD_ECON_HOUSE_LIST" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">2. ที่ดินทำกิน(ตอบได้มากว่า 1 ข้อ)</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_LAND') is-invalid @enderror" id="input-LAND">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_2_2() as $index => $value)
                <li>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox" name="HOUSEHOLD_ECON_LAND[{{ $index }}]" class="input-LAND" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_LAND.$index")) checked @endif />
                            {{ $value['label'] }}
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="HOUSEHOLD_ECON_LAND_SIZE[{{ $index }}]" placeholder="ขนาด/จำนวน/ปริมาณ" value="{{ old('HOUSEHOLD_ECON_LAND_SIZE.$index') }}" />
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <x-error-message title="HOUSEHOLD_ECON_LAND" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">
            3. สถานที่ตั้งของบ้านและที่ดินทำกิน(ตอบได้มากว่า 1 ข้อ)
        </label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_AREA_LIST') is-invalid @enderror" id="input-AREA_LIST">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_2_3() as $index => $value)
                <li>
                    @if ($index==0)
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox" name="HOUSEHOLD_ECON_AREA_LIST[{{ $index }}]" value="{{ $value['label'] }}" class="input-AREA_LIST" data-label="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_AREA_LIST.$index")) checked @endif /> {{ $value['label'] }}
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="HOUSEHOLD_ECON_AREA_NO[{{ $index }}][0]" style="width: 100%" placeholder="ขนาด/จำนวน/ปริมาณ" value="{{ old('HOUSEHOLD_ECON_AREA_NO.$index.0') }}" />
                        </div>
                    </div>
                    @endif
                    @if ($index==1)
                    <div class="row">
                        <div class="col-md-12">
                            <input type="checkbox" name="HOUSEHOLD_ECON_AREA_LIST[{{ $index }}]" value="{{ $value['label'] }}" class="input-AREA_LIST" data-label="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_AREA_LIST.$index")) checked @endif /> {{ $value['label'] }}
                        </div>
                        <div class="col-md-6">
                            - บ้าน <input type="text" name="HOUSEHOLD_ECON_AREA_NO[{{ $index }}][1]" style="width: 100%" placeholder="หลัง/ไร่/งาน/ตารางวา" value="{{ old('HHOUSEHOLD_ECON_AREA_NO.$index.1') }}" />
                        </div>
                        <div class="col-md-6">
                            - ที่ดินทำกิน <input type="text" name="HOUSEHOLD_ECON_AREA_NO[{{ $index }}][2]" style="width: 100%" placeholder="นา/ไร่/สวน/ฟาร์ม" value="{{ old('HOUSEHOLD_ECON_AREA_NO.$index.2') }}" />
                        </div>
                    </div>
                    @endif
                    @if ($index==2)
                        <div class="row">
                            <div class="col-md-12">
                                <input type="checkbox" name="HOUSEHOLD_ECON_AREA_LIST[{{ $index }}]" value="{{ $value['label'] }}" class="input-AREA_LIST" data-label="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_AREA_LIST.$index")) checked @endif /> {{ $value['label'] }}
                            </div>
                        </div>
                    @endif
                </li>
                @endforeach
            </ul>
            <x-error-message title="HOUSEHOLD_ECON_AREA_LIST" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">
            4. เครื่องมือ/เครื่องจักรในการประกอบอาชีพ(ตอบได้มากว่า 1 ข้อ)
        </label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_EQUIPMENT_TYPE') is-invalid @enderror" id="input-EQUIPMENT_TYPE">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_2_4() as $index => $value)
                <li style="margin-top: 5px;">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox" name="HOUSEHOLD_ECON_EQUIPMENT_TYPE[{{ $index }}]" class="input-EQUIPMENT_TYPE" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_EQUIPMENT_TYPE.$index")) checked @endif />
                            {{ $value['label'] }}
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="HOUSEHOLD_ECON_EQUIPMENT_NUM[{{ $index }}]" placeholder="ขนาด/จำนวน/ปริมาณ" value="{{ old('HOUSEHOLD_ECON_EQUIPMENT_NUM.$index') }}" />
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <x-error-message title="HOUSEHOLD_ECON_EQUIPMENT_TYPE" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">
            5. ยานพาหนะ(ตอบได้มากว่า 1 ข้อ)
        </label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_VEHICLE_TYPE') is-invalid @enderror" id="input-VEHICLE_TYPE">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_2_5() as $index => $value)
                <li style="margin-top: 5px;">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox" name="HOUSEHOLD_ECON_VEHICLE_TYPE[{{ $index }}]" class="input-VEHICLE_TYPE" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_VEHICLE_TYPE.$index")) checked @endif />
                            {{ $value['label'] }}
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="HOUSEHOLD_ECON_VEHICLE_NUM[{{ $index }}]" placeholder="ขนาด/จำนวน/ปริมาณ" value="{{ old('HOUSEHOLD_ECON_VEHICLE_NUM.$index') }}" />
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            <x-error-message title="HOUSEHOLD_ECON_VEHICLE_TYPE" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">
            6. อุปกรณ์สื่อสาร(ตอบได้มากว่า 1 ข้อ)
        </label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_COM_DEVICE_TYPE') is-invalid @enderror" id="input-COM_DEVICE_TYPE">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_2_6() as $index => $value)
                <li style="margin-top: 5px;">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox" name="HOUSEHOLD_ECON_COM_DEVICE_TYPE[{{ $index }}]" class="input-COM_DEVICE_TYPE" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_COM_DEVICE_TYPE.$index")) checked @endif />
                            {{ $value['label'] }}
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="HOUSEHOLD_ECON_COM_DEVICE_NUM[{{ $index }}]" placeholder="ขนาด/จำนวน/ปริมาณ" value="{{ old('HOUSEHOLD_ECON_COM_DEVICE_NUM.$index') }}" />
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
            <x-error-message title="HOUSEHOLD_ECON_COM_DEVICE_TYPE" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">
            7. สัตว์เลี้ยง(ตอบได้มากว่า 1 ข้อ)
        </label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_PET_CATEG') is-invalid @enderror" id="input-PET_CATEG">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_2_7() as $index => $value)
                <li style="margin-top: 5px;">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="checkbox" name="HOUSEHOLD_ECON_PET_CATEG[{{ $index }}]" class="input-PET_CATEG" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_PET_CATEG.$index")) checked @endif />
                            {{ $value['label'] }}
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="HOUSEHOLD_ECON_PET_NUM[{{ $index }}]" placeholder="ขนาด/จำนวน/ปริมาณ" value="{{ old('HOUSEHOLD_ECON_PET_NUM.$index') }}" />
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
            <x-error-message title="HOUSEHOLD_ECON_PET_CATEG" />
        </div>
    </div>
</div>