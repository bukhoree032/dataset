<div class="tile-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label><b>เก็บข้อมูล :</b> ครั้งที่ {{ $value->STORE_FORM_ROUND }} </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>หมายเลขแบบสอบถาม :</b> {{ $result->STORE_FORM_NUMBER }} </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>วันที่สอบถาม :</b> {{ $result->STORE_DATE }} </label>
                </div>
                <!-- <div class="col-md-3 mb-3">
                    <label><b>เวลา :</b> {{ $result->STORE_TIME }} </label>
                </div>
                <div class="col-md-3 mb-3">
                    <label><b>ถึง :</b> {{ $result->STORE_TO_TIME }} </label>
                </div> -->
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label><b>ผู้เก็บข้อมูล :</b> {{ $result->STORE_COLLECTOR }} </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>ผู้ตรวจข้อมูล :</b> {{ $result->STORE_CHECK }} </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>ผู้บันทึกข้อมูล :</b> {{ $result->STORE_SAVE }} </label>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <h5 class="card-title">ผู้ให้ข้อมูล</h5>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label><b>คนที่ 1 :</b> {{ $result->STORE_PERSON[0] }} </label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label><b>คนที่ 2 :</b> {{ $result->STORE_PERSON[1] }} </label>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label><b>คนที่ 3 :</b> {{ $result->STORE_PERSON[2] }} </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- ส่วนที่ ข้อมูลครัวเรือน -->
            <h3 class="tile-title">ข้อมูลครัวเรือน</h3>
            <hr>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label><b>จังหวัด :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_PROVINCE }} </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>อำเภอ :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_AMPHURE }} </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>ตำบล :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_DISTRICT }} </label>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label><b>หมู่ที่ :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_MOO }} </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>ชื่อหมู่บ้าน :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_VIL_NAME }} </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>ชื่อชุมชน :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_COMMU_NAME }} </label>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label><b>บ้านเลขที่ :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_ADDRESS }} </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>รหัสประจำบ้าน :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_HOUSE_CODE }} </label>
                </div>
                <div class="col-md-4 mb-3">
                    <label><b>บ้านใกล้เคียงเลขที่ :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_HOUSE_NEAR }} </label>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label><b>ซอย :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_SOI }} </label>
                </div>
                <div class="col-md-6 mb-3">
                    <label><b>ถนน :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_ROAD }} </label>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label><b>พิกัดบ้าน (ละติจูด) :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_LOCAL_LAT }} </label>
                </div>
                <div class="col-md-6 mb-3">
                    <label><b>พิกัดบ้าน (ลองติจูด) :</b> {{ $result->householdInfo->HOUSEHOLD_INFO_LOCAL_LONG }} </label>
                </div>
            </div>
            <!-- ส่วนที่ ข้อมูลครัวเรือน -->

        </div>
    </div>
</div>