@extends('home::layouts.master')

@section('app-content')
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-10">
        <x-alert-error-message />
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="tile">
                <div class="tile-body">
                    <div class="card mb-2">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-step_info-tab" data-toggle="pill" href="#pills-step_info" role="tab" aria-controls="pills-step_info" aria-selected="true">ข้อมูลทั่วไป</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-step_member-tab" data-toggle="pill" href="#pills-step_member" role="tab" aria-controls="pills-step_member" aria-selected="false">สมาชิกในครัวเรือน</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-step3-tab" data-toggle="pill" href="#pills-step3" role="tab" aria-controls="pills-step3" aria-selected="false">ส่วนที่ 3</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-step4-tab" data-toggle="pill" href="#pills-step4" role="tab" aria-controls="pills-step4" aria-selected="false">ส่วนที่ 4</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-step5-tab" data-toggle="pill" href="#pills-step5" role="tab" aria-controls="pills-step5" aria-selected="false">ส่วนที่ 5</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-step6-tab" data-toggle="pill" href="#pills-step6" role="tab" aria-controls="pills-step6" aria-selected="false">
                                        ส่วนที่ 6
                                    </a>
                                </li>
                            </ul>

                            
                            <div class="tab-content" id="pills-tabContent">
                                <!-- ข้อมูลทั่มไป -->
                                <div class="tab-pane fade show active" id="pills-step_info" role="tabpanel" aria-labelledby="pills-step_info-tab">
                                    <div class="tile-title-w-btn">
                                        <h3 class="title">ผู้รับผิดชอบจัดเก็บข้อมูล</h3>
                                    </div>
                                    <hr>
                                    @if(isset($result->householdInfo))
                                        @include('household::member.detail.alldetail.detail_info')
                                    @endif
                                </div>
                                <!-- ข้อมูลทั่มไป -->
                                
                                <!-- ข้อมูลสมาชิก -->
                                <div class="tab-pane fade" id="pills-step_member" role="tabpanel" aria-labelledby="pills-step_member-tab">
                                    @if(isset($resultMember))
                                        @include('household::member.detail.alldetail.detail_member')
                                    @endif
                                </div>
                                <!-- ข้อมูลสมาชิก -->

                                <!-- ส่วนที่่ 3 -->
                                <div class="tab-pane fade" id="pills-step3" role="tabpanel" aria-labelledby="pills-step3-tab">
                                    @if(isset($resultEcon))
                                        @include('household::member.detail.alldetail.detail_3')
                                    @endif
                                </div>
                                <!-- ส่วนที่่ 3 -->

                                <!-- ส่วนที่่ 4 -->
                                <div class="tab-pane fade" id="pills-step4" role="tabpanel" aria-labelledby="pills-step4-tab">
                                    <div class="tile-title-w-btn">
                                        <h3 class="title">ข้อมูลด้านสิ่งแวดล้อม</h3>
                                    </div>
                                    <hr>
                                    @if(isset($resultEnviro))
                                        @include('household::member.detail.alldetail.detail_4')
                                    @endif
                                </div>
                                <!-- ส่วนที่่ 4 -->
                                
                                <!-- ส่วนที่่ 5 -->
                                <div class="tab-pane fade" id="pills-step5" role="tabpanel" aria-labelledby="pills-step5-tab">
                                    <div class="tile-title-w-btn">
                                        <h3 class="title">ข้อมูลด้านการเมืองการปกครอง</h3>
                                    </div>
                                    <hr>
                                    @if(isset($result->householdInfo->householdPolitical))
                                        @include('household::member.detail.alldetail.detail_5')
                                    @endif
                                </div>
                                <!-- ส่วนที่่ 5 -->

                                <!-- ส่วนที่่ 6 -->
                                <div class="tab-pane fade" id="pills-step6" role="tabpanel" aria-labelledby="pills-step6-tab">
                                    <div class="bs-example">
                                        <div class="tile-title-w-btn">
                                            <h3 class="title">ข้อมูลด้านการสื่อสารภายในครัวเรือน</h3>
                                        </div>
                                        <hr>
                                        @if(isset($result->householdInfo->householdCommunicat))
                                            @include('household::member.detail.alldetail.detail_6')
                                        @endif
                                    </div>
                                </div>
                                <!-- ส่วนที่่ 6 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection