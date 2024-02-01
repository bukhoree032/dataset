<div class="form-row">
    <div class="col-md-6 mb-2">
        <label><b>1. เงินเดือน/ค่าจ้าง</b></label>
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
                        <td class="text-nowrap text-center" width="1">{{ number_format($INCOME_TYPE[1]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($INCOME_TYPE[1]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6 mb-2">
        <label><b>2. รายรับจากการทำการทำการเกษตร</b></label>
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
                        <td class="text-nowrap text-center" width="1">{{ number_format($INCOME_TYPE[2]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($INCOME_TYPE[2]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-2">
        <label><b>3. รายได้จากการประกอบธุรกิจ/ค้าขาย</b></label>
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
                        <td class="text-nowrap text-center" width="1">{{ number_format($INCOME_TYPE[3]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($INCOME_TYPE[3]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-6 mb-2">
        <label><b>4. รายได้จากทรัพย์สิน</b></label>
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
                        <td class="text-nowrap text-center" width="1">{{ number_format($INCOME_TYPE[4]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($INCOME_TYPE[4]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="form-row">
    <div class="col-md-6 mb-2">
        <label><b>5. รายได้จากแหล่งอื่นๆ</b></label>
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
                        <td class="text-nowrap text-center" width="1">{{ number_format($INCOME_TYPE[5]/12) }}</td>
                        <td class="text-nowrap text-center" width="1">{{ number_format($INCOME_TYPE[5]) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>