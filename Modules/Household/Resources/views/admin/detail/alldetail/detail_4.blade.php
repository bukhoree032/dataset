<div class="tile-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label><b>1. การถ่ายเทอากาศ/แสงสว่างภายในบ้าน</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_WLIGHT as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>2. ความสะอาดภายในบ้าน</b> </label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_CLEAN as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>3. ความปลอดภัย/มั่นคงของบ้านเรือน</b>  </label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_SAFE as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label><b>4. การจัดการขยะ</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_BIN as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>5. การดูแลรักษาบริเวณภายนอกบ้าน</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_H_ENVI as $index => $value)
                        @php $row++; @endphp
                        @if($value!="อื่นๆ (ระบุ)")
                            {{ $row.".".$value }}<br>
                        @else
                            {{ $row.".อื่นๆ" }} ( {{ $resultEnviro->HOUSEHOLD_ENVIR_H_ENVI_OTHER }} )<br>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>6. การจัดการมลพิษหรือมลภาวะต่างๆ</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_TOXIC as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label><b>7. การจัดการน้ำสำหรับการอุปโภคและบริโภค</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_WATER as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label><b>7.1 มีการบริโภค (น้ำกิน) ที่สะอาดเพียงพอตลอดปี</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_DRINKING as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>7.2 มีภาชนะเก็บกักน้ำอุปโภค(น้ำกิน) สะอาด มีฝาปิด และรักษาความสะอาดอย่างสม่ำเสมอ</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_CONTAINER as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>7.3 จัดบริเวณให้มีที่ประกอบอาหาร และมีน้ำสะอาดในการบริโภค(น้ำกิน)</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_COOKING as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label><b>7.4 มีการบริโภค(น้ำใช้) ที่สะอาดเพียงพอตลอดปี</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_WATER_USED as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>7.5 มีภาชนะเก็บกักน้ำอุปโภค(น้ำใช้) สะอาด มีฝาปิด และรักษาความสะอาดอย่างสม่ำเสมอ</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_CONTAINER_USED as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>7.6 จัดบริเวณให้มีที่ประกอบอาหาร และมีน้ำสะอาดในการอุปโภค(น้ำใช้)</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_AREA as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label><b>8. การเข้าร่วมกิจกรรมของสมาชิกในครัวเรือนในการรักษาสิ่งแวดล้อมในชุมชน</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_ENV_ACT as $index => $value)
                        @php $row++; @endphp
                        @if($value!="อื่นๆ (ระบุ)")
                            {{ $row.".".$value }}<br>
                        @else
                            {{ $row.".อื่นๆ" }} ( {{ $result->HouseholdEnviro->HouseholdEnviro->HOUSEHOLD_ENVIR_ENV_ACT_OTHER }} )<br>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="form-row">
                <label><b>9. การจัดการพลังงานและอนุรักษ์พลังงาน</b></label>
                <div class="col-md-6 mb-3">
                    <label><b>9.1 การมีไฟฟ้าใช้ในครัวเรือน</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_ELECTRIC as $index => $value)
                        @php $row++; @endphp
                        {{ $row.".".$value }}<br>
                    @endforeach
                </div>
                <div class="col-md-6 mb-3">
                    <label><b>9.2 การอนุรักษ์พลังงาน</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_CONSERV as $index => $value)
                        @php $row++; @endphp
                        @if($value!="อื่นๆ (ระบุ)")
                            {{ $row.".".$value }}<br>
                        @else
                            {{ $row.".อื่นๆ" }} ( {{ $resultEnviro->HOUSEHOLD_ENVIR_CONSERV_OTHER }} )<br>
                        @endif
                    @endforeach
                </div>
            </div>
            
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label><b>10. ปัญหาภัยพิบัติที่ส่งผลกระทบกับครัวเรือน</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_DISASTER as $index => $value)
                        @php $row++; @endphp
                        @if($value!="อื่นๆ (ระบุ)")
                            {{ $row.".".$value }}<br>
                        @else
                            {{ $row.".อื่นๆ" }} ( {{ $resultEnviro->HOUSEHOLD_ENVIR_AREA_OCCUP_OTHER }} )<br>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-6 mb-3">
                    <label><b>11. การจัดการปัญหาภัยพิบัติที่ส่งผลกระกับครัวเรือน</b></label>
                    @php $row=0; @endphp
                    @foreach($resultEnviro->HOUSEHOLD_ENVIR_SOLUTION as $index => $value)
                        @php $row++; @endphp
                        @if($value!="อื่นๆ (ระบุ)")
                            {{ $row.".".$value }}<br>
                        @else
                            {{ $row.".อื่นๆ" }} ( {{ $resultEnviro->HOUSEHOLD_ENVIR_SOLUTION_OTHER }} )<br>
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>