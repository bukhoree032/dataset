<div class="form-row">
    <div class="col-md-12 mb-2">
        <label><b>1. ค่าใช้จ่ายประกอบอาชีพ ได้แก่ ค่าใช้จ่ายประกอบอาชีพ, ซื้อสินทรัพย์ถาวร เป็นต้น</b></label>
    </div>
    <div class="col-md-6 mb-2">
        <div class="tile-body">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">ต่อเดือน</th>
                        <th class="text-nowrap text-center">ต่อปี</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[1]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[1]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-2">
        <label><b>2. ค่าอาหาร ได้แก่ อาหารสด/แห้ง, อาหารสำเร็จจากร้านค้า, น้ำดื่ม/นม/ น้ำอัดลม/ กาแฟ, ขนมขบเคี้ยว, ค่าขนมลูกไปโรงเรียน, เครื่องดื่มชูกำลัง/ เหล้า/เบียร์, เชื้อเพลิงหุงต้ม เป็นต้น</b></label>
    </div>
    <div class="col-md-6 mb-2">
        <div class="tile-body">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">ต่อเดือน</th>
                        <th class="text-nowrap text-center">ต่อปี</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[2]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[2]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-2">
        <label><b>3. ค่าเสื้อผ้า/เครื่องแต่งกาย ได้แก่ เสื้อผ้า เครื่องแต่งกาย, ค่าใช้จ่ายเสริมสวย, ซื้อทองเครื่องประดับ เป็นต้น</b></label>
    </div>
    <div class="col-md-6 mb-2">
        <div class="tile-body">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">ต่อเดือน</th>
                        <th class="text-nowrap text-center">ต่อปี</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[3]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[3]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-2">
        <label><b>4. ค่ายา-สุขภาพอนามัย ได้แก่ ยารักษาโรค, ค่ารักษาพยาบาล, ยาสูบ บุหรี่, เบี้ยประกันชีวิต เป็นต้น</b></label>
    </div>
    <div class="col-md-6 mb-2">
        <div class="tile-body">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">ต่อเดือน</th>
                        <th class="text-nowrap text-center">ต่อปี</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[4]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[4]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-2">
        <label><b>5. ค่าที่อยู่อาศัยและเครื่องใช้ภายในบ้าน ได้แก่ เงินสด/ดาวน์ ซื้อหรือเช่า ที่ดิน, เงินสด/ผ่อน ชื้อเครื่องใช้ ในบ้าน, ของใช้ประจำวัน, ค่าไฟฟ้า/ประปา โทรศัพท์, ค่าภาษีต่าง ๆ เป็นต้น</b></label>
    </div>
    <div class="col-md-6 mb-2">
        <div class="tile-body">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">ต่อเดือน</th>
                        <th class="text-nowrap text-center">ต่อปี</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[5]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[5]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-2">
        <label><b>6. ค่าใช้จ่ายเพื่อการลงทุน สังคม พักผ่อน ได้แก่ ฝากธนาคาร ออกเงินกู้, จ่ายดอกเบี้ย ผ่อนใช้หนี้, ทำบุญ/บริจาค ช่วยซอง/จัดงาน, ใช้จ่ายเพื่อ การพักผ่อน, ส่งไปให้ญาติ ที่อยู่ที่อื่น, เสี่ยงโชค เป็นต้น</b></label>
    </div>
    <div class="col-md-6 mb-2">
        <div class="tile-body">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">ต่อเดือน</th>
                        <th class="text-nowrap text-center">ต่อปี</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[6]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[6]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-2">
        <label><b>7. ค่าใช้จ่ายในการศึกษา/เรียนรู้ ได้แก่ ค่าเทอม/เรียนพิเศษ, อุปกรณ์เรียน /ชุดนักเรียน, หนังสีอพิมพ์/นิตยสาร เป็นต้น</b></label>
    </div>
    <div class="col-md-6 mb-2">
        <div class="tile-body">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">ต่อเดือน</th>
                        <th class="text-nowrap text-center">ต่อปี</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[7]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[7]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-12 mb-2">
        <label><b>8. ค่าใช้จ่าย อื่น ๆ</b></label>
    </div>
    <div class="col-md-6 mb-2">
        <div class="tile-body">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">ต่อเดือน</th>
                        <th class="text-nowrap text-center">ต่อปี</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[8]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($ECON_EXP_SUM[8]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>