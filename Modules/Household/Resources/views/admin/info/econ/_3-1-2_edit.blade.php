<div class="row">
    <div class="form-group col-md-6">
        <label class="red-start">1. ค่าใช้จ่ายประกอบอาชีพ ได้แก่ ค่าใช้จ่ายประกอบอาชีพ, ซื้อสินทรัพย์ถาวร เป็นต้น(ต่อปี)</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_EXP_SUM.1') is-invalid @enderror" name="HOUSEHOLD_ECON_EXP_SUM[1]" value="{{ $result->HOUSEHOLD_ECON_EXP_SUM[1] }}" />
        <x-error-message title="HOUSEHOLD_ECON_EXP_SUM[1]" />
    </div>
    <div class="form-group col-md-3">
        <label>เลือกเดือนเดือนที่ไม่ได้รายจ่าย</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor " id="input-INCOME5">เลือกเดือน</span>
            <ul class="items">
                @foreach(__jobs_m() as $index => $value)
                <li>
                    <input type="checkbox" name="HOUSEHOLD_ECON_EXP[1][{{ $index }}]" class="input-EXP1" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_EXP[1][$index]) && ($result->HOUSEHOLD_ECON_EXP[1][$index] == $value['id'])) checked @endif/>
                    {{ $value['label'] }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label class="red-start">2. ค่าอาหาร ได้แก่ อาหารสด/แห้ง, อาหารสำเร็จจากร้านค้า, น้ำดื่ม/นม/ น้ำอัดลม/ กาแฟ, ขนมขบเคี้ยว, ค่าขนมลูกไปโรงเรียน, เครื่องดื่มชูกำลัง/ เหล้า/เบียร์, เชื้อเพลิงหุงต้ม เป็นต้น(ต่อปี)</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_EXP_SUM.2') is-invalid @enderror" name="HOUSEHOLD_ECON_EXP_SUM[2]" value="{{ $result->HOUSEHOLD_ECON_EXP_SUM[2] }}" />
        <x-error-message title="HOUSEHOLD_ECON_EXP_SUM[2]" />
    </div>
    <div class="form-group col-md-3">
        <label>เลือกเดือนเดือนที่ไม่ได้รายจ่าย</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor " id="input-INCOME5">เลือกเดือน</span>
            <ul class="items">
                @foreach(__jobs_m() as $index => $value)
                <li>
                    <input type="checkbox" name="HOUSEHOLD_ECON_EXP[2][{{ $index }}]" class="input-EXP2" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_EXP[2][$index]) && ($result->HOUSEHOLD_ECON_EXP[2][$index] == $value['id'])) checked @endif/>
                    {{ $value['label'] }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label class="red-start">3. ค่าเสื้อผ้า/เครื่องแต่งกาย ได้แก่ เสื้อผ้า เครื่องแต่งกาย, ค่าใช้จ่ายเสริมสวย, ซื้อทองเครื่องประดับ เป็นต้น(ต่อปี)</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_EXP_SUM.3') is-invalid @enderror" name="HOUSEHOLD_ECON_EXP_SUM[3]" value="{{ $result->HOUSEHOLD_ECON_EXP_SUM[3] }}" />
        <x-error-message title="HOUSEHOLD_ECON_EXP_SUM[3]" />
    </div>
    <div class="form-group col-md-3">
        <label>เลือกเดือนเดือนที่ไม่ได้รายจ่าย</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor " id="input-INCOME5">เลือกเดือน</span>
            <ul class="items">
                @foreach(__jobs_m() as $index => $value)
                <li>
                    <input type="checkbox" name="HOUSEHOLD_ECON_EXP[3][{{ $index }}]" class="input-EXP3" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_EXP[3][$index]) && ($result->HOUSEHOLD_ECON_EXP[3][$index] == $value['id'])) checked @endif/>
                    {{ $value['label'] }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label class="red-start">4. ค่ายา-สุขภาพอนามัย ได้แก่ ยารักษาโรค, ค่ารักษาพยาบาล, ยาสูบ บุหรี่, เบี้ยประกันชีวิต เป็นต้น(ต่อปี)</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_EXP_SUM.4') is-invalid @enderror" name="HOUSEHOLD_ECON_EXP_SUM[4]" value="{{ $result->HOUSEHOLD_ECON_EXP_SUM[4] }}" />
        <x-error-message title="HOUSEHOLD_ECON_EXP_SUM[4]" />
    </div>
    <div class="form-group col-md-3">
        <label>เลือกเดือนเดือนที่ไม่ได้รายจ่าย</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor " id="input-INCOME5">เลือกเดือน</span>
            <ul class="items">
                @foreach(__jobs_m() as $index => $value)
                <li>
                    <input type="checkbox" name="HOUSEHOLD_ECON_EXP[4][{{ $index }}]" class="input-EXP4" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_EXP[4][$index]) && ($result->HOUSEHOLD_ECON_EXP[4][$index] == $value['id'])) checked @endif/>
                    {{ $value['label'] }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label class="red-start">5. ค่าที่อยู่อาศัยและเครื่องใช้ภายในบ้าน ได้แก่ เงินสด/ดาวน์ ซื้อหรือเช่า ที่ดิน, เงินสด/ผ่อน ชื้อเครื่องใช้ ในบ้าน, ของใช้ประจำวัน, ค่าไฟฟ้า/ประปา โทรศัพท์, ค่าภาษีต่าง ๆ เป็นต้น(ต่อปี)</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_EXP_SUM.5') is-invalid @enderror" name="HOUSEHOLD_ECON_EXP_SUM[5]" value="{{ $result->HOUSEHOLD_ECON_EXP_SUM[5] }}" />
        <x-error-message title="HOUSEHOLD_ECON_EXP_SUM[5]" />
    </div>
    <div class="form-group col-md-3">
        <label>เลือกเดือนเดือนที่ไม่ได้รายจ่าย</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor " id="input-INCOME5">เลือกเดือน</span>
            <ul class="items">
                @foreach(__jobs_m() as $index => $value)
                <li>
                    <input type="checkbox" name="HOUSEHOLD_ECON_EXP[5][{{ $index }}]" class="input-EXP5" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_EXP[5][$index]) && ($result->HOUSEHOLD_ECON_EXP[5][$index] == $value['id'])) checked @endif/>
                    {{ $value['label'] }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label class="red-start">6. ค่าใช้จ่ายเพื่อการลงทุน สังคม พักผ่อน ได้แก่ ฝากธนาคาร ออกเงินกู้, จ่ายดอกเบี้ย ผ่อนใช้หนี้, ทำบุญ/บริจาค ช่วยซอง/จัดงาน, ใช้จ่ายเพื่อ การพักผ่อน, ส่งไปให้ญาติ ที่อยู่ที่อื่น, เสี่ยงโชค เป็นต้น(ต่อปี)</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_EXP_SUM.6') is-invalid @enderror" name="HOUSEHOLD_ECON_EXP_SUM[6]" value="{{ $result->HOUSEHOLD_ECON_EXP_SUM[6] }}" />
        <x-error-message title="HOUSEHOLD_ECON_EXP_SUM[6]" />
    </div>
    <div class="form-group col-md-3">
        <label>เลือกเดือนเดือนที่ไม่ได้รายจ่าย</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor " id="input-INCOME5">เลือกเดือน</span>
            <ul class="items">
                @foreach(__jobs_m() as $index => $value)
                <li>
                    <input type="checkbox" name="HOUSEHOLD_ECON_EXP[6][{{ $index }}]" class="input-EXP6" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_EXP[6][$index]) && ($result->HOUSEHOLD_ECON_EXP[6][$index] == $value['id'])) checked @endif/>
                    {{ $value['label'] }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label class="red-start">7. ค่าใช้จ่ายในการศึกษา/เรียนรู้ ได้แก่ ค่าเทอม/เรียนพิเศษ, อุปกรณ์เรียน /ชุดนักเรียน, หนังสีอพิมพ์/นิตยสาร เป็นต้น(ต่อปี)</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_EXP_SUM.7') is-invalid @enderror" name="HOUSEHOLD_ECON_EXP_SUM[7]" value="{{ $result->HOUSEHOLD_ECON_EXP_SUM[7] }}" />
        <x-error-message title="HOUSEHOLD_ECON_EXP_SUM[7]" />
    </div>
    <div class="form-group col-md-3">
        <label>เลือกเดือนเดือนที่ไม่ได้รายจ่าย</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor " id="input-INCOME5">เลือกเดือน</span>
            <ul class="items">
                @foreach(__jobs_m() as $index => $value)
                <li>
                    <input type="checkbox" name="HOUSEHOLD_ECON_EXP[7][{{ $index }}]" class="input-EXP7" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_EXP[7][$index]) && ($result->HOUSEHOLD_ECON_EXP[7][$index] == $value['id'])) checked @endif/>
                    {{ $value['label'] }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-6">
        <label class="red-start">8. ค่าใช้จ่าย อื่น ๆ(ต่อปี)</label>
        <input type="text" class="form-control @error('HOUSEHOLD_ECON_EXP_SUM.8') is-invalid @enderror" name="HOUSEHOLD_ECON_EXP_SUM[8]" value="{{ $result->HOUSEHOLD_ECON_EXP_SUM[8] }}" />
        <x-error-message title="HOUSEHOLD_ECON_EXP_SUM[8]" />
    </div>
    <div class="form-group col-md-3">
        <label>เลือกเดือนเดือนที่ไม่ได้รายจ่าย</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor " id="input-INCOME5">เลือกเดือน</span>
            <ul class="items">
                @foreach(__jobs_m() as $index => $value)
                <li>
                    <input type="checkbox" name="HOUSEHOLD_ECON_EXP[8][{{ $index }}]" class="input-EXP8" data-label="{{ $value['label'] }}" value="{{ $value['id'] }}" @if(isset($result->HOUSEHOLD_ECON_EXP[8][$index]) && ($result->HOUSEHOLD_ECON_EXP[8][$index] == $value['id'])) checked @endif/>
                    {{ $value['label'] }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>