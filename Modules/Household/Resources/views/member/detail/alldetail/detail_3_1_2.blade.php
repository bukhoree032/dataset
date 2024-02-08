<div class="form-row">
    <div class="col-md-4 mb-3">
        <label><b>อาหาร</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_FOOD }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>ค่าน้ำ</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_WATER }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>ค่าไฟ</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_ELECTRICITY }}<br>
    </div>
    
    <div class="col-md-4 mb-3">
        <label><b>ค่าโทรศัพท์</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_TEL }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>ค่าอินเตอร์เน็ต</b></b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_INTERNET }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>การศึกษา</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_STUDY }}<br>
    </div>
    
    <div class="col-md-4 mb-3">
        <label><b>ค่ารักษาพยาบาล</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_NURSE }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>ประกันภัยต่างๆ</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_INSURANCE }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>ด้านสังคม</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_SOCIETY }}<br>
    </div>
    
    <div class="col-md-4 mb-3">
        <label><b>บันเทิงท่องเที่ยว</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_TRAVEL }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>เสี่ยงโชค</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_RISK }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>เหล้า บุหรี่</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_ALCOHOL }}<br>
    </div>

    
    <div class="col-md-4 mb-3">
        <label><b>หนี้สิน</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_DEBT }}<br>
    </div>
    <div class="col-md-4 mb-3">
        <label><b>อื่นๆ ระบุ</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_OTHER_EXPENSES }}<br>
    </div>

    <div class="col-md-12 mb-3">
        <label><b>หมายเหตุ</b> </label>
        {{ $resultEcon->HOUSEHOLD_ECON_NOTE_EXPENSES }}<br>
    </div>
</div>