<div class="row">
    <div class="col-md-12">
        <b>1. ภาวะหนี้สินของครัวเรือน<br /></b>
    </div>
    <div class="col-md-4">
        <label class="red-start">จำนวนเงิน</label> <input name="HOUSEHOLD_DEPT_AMOUNT" class="form-control @error('HOUSEHOLD_ECON_EXP_SUM[1]') is-invalid @enderror" type="text" placeholder="ตัวอย่าง 50000" />
        <x-error-message title="HOUSEHOLD_ECON_EXP_SUM[1]" />
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">สาเหตุของหนี้สิน</label>
        <div class="dropdown-check-list  form-control" tabindex="100">
            <span class="anchor @error('HOUSEHOLD_ECON_DEPT_FROM_TYPE') is-invalid @enderror" id="input-DEPT_FROM_TYPE">-- สาเหตุของหนี้สิน --</span>
            <ul class="items">
                @foreach(__jobs_3_3_1() as $index => $value)
                <li style="margin-top: 5px;">
                    <input type="checkbox" name="HOUSEHOLD_ECON_DEPT_FROM_TYPE[{{ $index }}]" class="input-DEPT_FROM_TYPE" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_DEPT_FROM_TYPE.$index")) checked @endif />
                    {{ $value['label'] }}
                    @if ($value['id']==12)
                    <textarea placeholder="กรณีอื่น ๆ" name="HOUSEHOLD_ECON_DEPT_FROM_TYPE_OTHER[{{ $index }}]">{{ old("HOUSEHOLD_ECON_DEPT_FROM_TYPE_OTHER.$index") }}</textarea>
                    @else
                    @endif

                </li>
                @endforeach
            </ul>
            <x-error-message title="HOUSEHOLD_ECON_DEPT_FROM_TYPE" />
        </div>
    </div>
    <div class="col-md-12">
        <b>2. แหล่งเงินกู้ของครอบครัวเรือน</b><br />
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">2.1 สถาบันเงินเฉพาะกิจ</label>
        <div class="dropdown-check-list  form-control" tabindex="100">
            <span class="anchor @error('HOUSEHOLD_ECON_SPECIAL_FIN_') is-invalid @enderror" id="input-SPECIAL_FIN_">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_3_2_1() as $index => $value)
                <li style="margin-top: 5px;">
                    <input type="checkbox" name="HOUSEHOLD_ECON_SPECIAL_FIN_[{{ $index }}]" class="input-SPECIAL_FIN_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_SPECIAL_FIN_.$index")) checked @endif />
                    {{ $value['label'] }}
                </li>
                @endforeach
            </ul>
            <x-error-message title="HOUSEHOLD_ECON_SPECIAL_FIN_" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">2.2 ธนาคารพาณิชย์</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_COMM_BANK_') is-invalid @enderror" id="input-COMM_BANK_">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_3_2_2() as $index => $value)
                <li style="margin-top: 5px;">
                    <input type="checkbox" name="HOUSEHOLD_ECON_COMM_BANK_[{{ $index }}]" class="input-COMM_BANK_" data-label="{{ $value['label'] }} " value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_COMM_BANK_.$index")) checked @endif />
                    {{ $value['label'] }}
                </li>
                @if ($value['id']==8)
                <textarea placeholder="กรณีอื่น ๆ" name="HOUSEHOLD_ECON_COMM_BANK_OTHER[{{ $index }}]" >{{ old("HOUSEHOLD_ECON_COMM_BANK_OTHER.$index") }}</textarea>
                @else
                @endif
                @endforeach

            </ul>
            <x-error-message title="HOUSEHOLD_ECON_COMM_BANK_" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">2.3 สถาบันการเงินที่ไม่ใช่ธนาคาร</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_NONBANK_') is-invalid @enderror" id="input-NONBANK_">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_3_2_3() as $index => $value)
                <li style="margin-top: 5px;">
                    <input type="checkbox" name="HOUSEHOLD_ECON_NONBANK_[{{ $index }}]" class="input-NONBANK_" data-label="{{ $value['label'] }} " value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_NONBANK_.$index")) checked @endif />
                    {{ $value['label'] }}
                    @if ($value['id']==1)
                    <input type="text" name="HOUSEHOLD_ECON_NONBANK_OTHER[{{ $index }}]" placeholder="ระบุ กรณีตัวเลือกข้อ 1" value="{{ old("HOUSEHOLD_ECON_NONBANK_OTHER.$index") }}" />
                    @else
                    @endif
                    @if ($value['id']==3)
                    <textarea placeholder="กรณีอื่น ๆ" name="HOUSEHOLD_ECON_NONBANK_OTHER[{{ $index }}]">{{ old("HOUSEHOLD_ECON_NONBANK_OTHER.$index") }}</textarea>
                    @else
                    @endif

                </li>
                @endforeach

            </ul>
            <x-error-message title="HOUSEHOLD_ECON_NONBANK_" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">2.4 กองทุนของหมู่บ้าน/ชุมชน</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_COMMU_FUND_') is-invalid @enderror" id="input-COMMU_FUND_">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_3_2_4() as $index => $value)
                <li style="margin-top: 5px;">
                    <input type="checkbox" name="HOUSEHOLD_ECON_COMMU_FUND_[{{ $index }}]" class="input-COMMU_FUND_" data-label="{{ $index }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_COMMU_FUND_.$index")) checked @endif />
                    {{ $value['label'] }}
                </li>
                @if ($value['id']==10)
                <textarea placeholder="กรณีอื่น ๆ" name="HOUSEHOLD_ECON_COMMU_FUND_OTHER[{{ $index }}]">{{ old("HOUSEHOLD_ECON_COMMU_FUND_OTHER.$index") }}</textarea>
                @else

                @endif
                @endforeach

            </ul>
            <x-error-message title="HOUSEHOLD_ECON_COMMU_FUND_" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">2.5 เงินกู้นอกระบบ</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_SHARK_LOAN_') is-invalid @enderror" id="input-SHARK_LOAN_">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_3_2_5() as $index => $value)
                <li style="margin-top: 5px;">
                    <input type="checkbox" name="HOUSEHOLD_ECON_SHARK_LOAN_[{{ $index }}]" class="input-SHARK_LOAN_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_SHARK_LOAN_.$index")) checked @endif />
                    {{ $value['label'] }}
                </li>
                @endforeach
            </ul>
            <x-error-message title="HOUSEHOLD_ECON_SHARK_LOAN_" />
        </div>
    </div>
    <div class="col-md-12">
        <br />
        <label class="red-start">3. การออมของครัวเรือน</label>
    </div>
    <div class="form-group col-md-6">
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_H_SAVING_') is-invalid @enderror" id="input-H_SAVING_">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_3_3() as $index => $value)
                <li style="margin-top: 5px;">
                    <input type="checkbox" name="HOUSEHOLD_ECON_H_SAVING_[{{ $index }}]" class="input-H_SAVING_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_H_SAVING_.$index")) checked @endif />
                    {{ $value['label'] }}
                    @if ($value['id']==6)
                    <input type="text" name="HOUSEHOLD_ECON_H_SAVING_OTHER[{{ $index }}]" placeholder="ระบุ กรณีตัวเลือกข้อ 6" value="{{ old("HOUSEHOLD_ECON_H_SAVING_OTHER.$index") }}" />

                    @endif
                </li>
                @if ($value['id']==15)
                <textarea placeholder="กรณีอื่น ๆ" name="HOUSEHOLD_ECON_H_SAVING_OTHER[{{ $index }}]">{{ old("HOUSEHOLD_ECON_H_SAVING_OTHER.$index") }}</textarea>
                @else

                @endif
                @endforeach

            </ul>
            <x-error-message title="HOUSEHOLD_ECON_H_SAVING_" />
        </div>
    </div>
    <div class="col-md-12">
        <b>4. ปัญหาด้านเศรษฐกิจในครัวเรือน<br /></b>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">4.1 การประกอบอาชีพ</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_OCCUP_PROBLEM_') is-invalid @enderror" id="input-OCCUP_PROBLEM_">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_3_4_1() as $index => $value)
                <li style="margin-top: 5px;">
                    <input type="checkbox" name="HOUSEHOLD_ECON_OCCUP_PROBLEM_[{{ $index }}]" class="input-OCCUP_PROBLEM_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_OCCUP_PROBLEM_.$index")) checked @endif />
                    {{ $value['label'] }}
                </li>
                @if ($value['id']==7)
                <textarea placeholder="กรณีอื่น ๆ" name="HOUSEHOLD_ECON_OCCUP_PROBLEM_OTHER[{{ $index }}]">{{ old("HOUSEHOLD_ECON_OCCUP_PROBLEM_OTHER.$index") }}</textarea>
                @else
                @endif
                @endforeach
            </ul>
            <x-error-message title="HOUSEHOLD_ECON_OCCUP_PROBLEM_" />
        </div>
    </div>
    <div class="form-group col-md-6">
        <label class="red-start">4.2 การดำรงชีวิต</label>
        <div class="dropdown-check-list form-control" tabindex="100">
            <span class="anchor  @error('HOUSEHOLD_ECON_LIVING_PROBLEM_') is-invalid @enderror" id="input-LIVING_PROBLEM_">เลือก</span>
            <ul class="items">
                @foreach(__jobs_3_3_4_2() as $index => $value)
                <li style="margin-top: 5px;">
                    <input type="checkbox" name="HOUSEHOLD_ECON_LIVING_PROBLEM_[{{ $index }}]" class="input-LIVING_PROBLEM_" data-label="{{ $value['label'] }}" value="{{ $value['label'] }}" @if(old("HOUSEHOLD_ECON_LIVING_PROBLEM_.$index")) checked @endif />
                    {{ $value['label'] }}
                </li>
                @if ($value['id']==5)
                <textarea placeholder="กรณีอื่น ๆ" name="HOUSEHOLD_ECON_LIVING_PROBLEM_OTHER[{{ $index }}]">{{ old("HOUSEHOLD_ECON_LIVING_PROBLEM_OTHER.$index") }}</textarea>
                @else
                @endif
                @endforeach

            </ul>
            <x-error-message title="HOUSEHOLD_ECON_LIVING_PROBLEM_" />
        </div>
    </div>
</div>