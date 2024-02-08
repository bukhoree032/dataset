<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>รับจ้างทั่วไป</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_GENERAL }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>เกษตร</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_AGRI }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>ปศุสัตว์</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_LIVESTOCK }}<br>
    </div>
    
    <div class="col-md-4 mb-3">
        <label><b>ประมง</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_FISHING }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>อื่นๆ ระบุ</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_OCCU_OTHER }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>ลูก/หลาน</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_CHILD }}<br>
    </div>
    
    <div class="col-md-4 mb-3">
        <label><b>สวัสดิการรัฐ</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_WELFARE }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>อื่นๆ ระบุ</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_OTHER_REVENUE }}<br>
    </div>
    <div class="col-md-12 mb-3">
        <label><b>หมายเหตุ</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_NOTE_REVENUE }}<br>
    </div>
</div>