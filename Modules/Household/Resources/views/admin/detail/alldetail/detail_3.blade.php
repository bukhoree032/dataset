<div class="tile">
    <div class="tile-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-econ_3_1-tab" data-toggle="pill" href="#pills-econ_3_1" role="tab" aria-controls="pills-econ_3_1" aria-selected="true">3.1 รายรับ ของครัวเรือน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-econ_3_2-tab" data-toggle="pill" href="#pills-econ_3_2" role="tab" aria-controls="pills-econ_3_2" aria-selected="false">3.2 ทรัพย์และสิ่งอำนวยความสะดวกของครัวเรือน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-econ_3_3-tab" data-toggle="pill" href="#pills-econ_3_3" role="tab" aria-controls="pills-econ_3_3" aria-selected="false">3.3 ภาระหนี้สิน การออม และปัญหาเศรษฐกิจของครัวเรือน</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!-- ข้อมูลทั่มไป -->
            <div class="tab-pane fade show active" id="pills-econ_3_1" role="tabpanel" aria-labelledby="pills-step_info-tab">
                @if(isset($resultEcon))
                    <div class="bs-example">
                        <h3 style="margin-top: -25px;">รายรับ</h3>
                        @include('household::admin.detail.alldetail.detail_3_1_1')
                    </div>
                    <div class="bs-example">
                        <h3 style="margin-top: -25px;">รายจ่าย</h3>
                        @include('household::admin.detail.alldetail.detail_3_1_2')
                    </div>
                @endif
            </div>
            <!-- ข้อมูลทั่มไป -->

            <!-- ข้อมูลทั่มไป -->
            <div class="tab-pane fade show" id="pills-econ_3_2" role="tabpanel" aria-labelledby="pills-step_info-tab">
                @if(isset($resultEcon))
                    @include('household::admin.detail.alldetail.detail_3_2')
                @endif
            </div>
            <!-- ข้อมูลทั่มไป -->

            <!-- ข้อมูลทั่มไป -->
            <div class="tab-pane fade show" id="pills-econ_3_3" role="tabpanel" aria-labelledby="pills-step_info-tab">
                @if(isset($resultEcon))
                    @include('household::admin.detail.alldetail.detail_3_3')
                @endif
            </div>
            <!-- ข้อมูลทั่มไป -->
        </div>
    </div>
</div>