@extends('admin::layouts.master')

@section('app-content')
<div class="tile" ng-controller="memberPayController">
    <div class="tile-title-w-btn">
        @php $sum = $listHouseholdAll['stores'] @endphp
        @php $sumnotpay = 0 @endphp
        @php $sumpay = 0 @endphp
        @foreach ($listHouseholdAll['members'] as $index => $value)
            @php
                $sumpay += $value->pay;
            @endphp
        @endforeach
        @php $sumnotpay += $listHouseholdAll['stores']-$sumpay @endphp
        <h3 class="title">
            ข้อมูลรายการ {{ $sum }} รายการ {{ $sum*20 }}บาท  ( ยังไม่จ่าย : {{ $sumnotpay }}ชุด/{{ $sumnotpay*20 }}บาท | จ่ายแล้ว : {{ $sumpay }}ชุด/{{ $sumpay*20 }}บาท )
        </h3>
        <p>
            @can($permission_prefix.'-create')
            <a class="btn btn-primary icon-btn" href="{{ route('admin.member.create') }}"><i class="fa fa-plus-circle fa-fw"></i>สร้างรายการ </a>
            @endcan
            <a class="btn btn-secondary icon-btn" href="{{ url()->current() }}"><i class="fas fa-sync fa-fw"></i>Refresh </a>
        </p>
    </div>
    <div class="tile-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">#</th>
                        <th class="text-nowrap text-center">ชื่อผู้ใช้งาน</th>
                        <th class="text-nowrap text-center">ชื่อ-สกุล</th>
                        <th class="text-nowrap text-center">ชื่อเล่น</th>
                        {{-- <th class="text-nowrap text-center">ตำแหน่ง</th> --}}
                        <th class="text-nowrap text-center">เบอร์โทรศัพท์</th>
                        <th class="text-nowrap text-center">ที่อยู่อีเมล์</th>
                        <th class="text-nowrap text-center">จำนวนที่กรอกข้อมูล</th>
                        <th class="text-nowrap text-center">เคลียยอดเงินแล้ว</th>
                        <th class="text-nowrap text-center">สร้างเมื่อ</th>
                        <th class="text-nowrap text-center">ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $index => $value)
                    <tr>
                        <td width="1">{{ $lists->firstItem() + $index }}</td>
                        <td>{{ $value->username }}</td>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->nickname }}</td>
                        {{-- <td>{{ $value->position }}</td> --}}
                        <td>{{ $value->tel }}</td>
                        <td>{{ $value->email }}</td>
                        <td class="text-center">{{ $value->store->count()-$value->pay }}</td>
                        <td class="text-center">{{ $value->pay }}</td>
                        <!-- <td class="text-center">{{ $value->store->count()-$value->pay }}ชุด/{{ ($value->store->count()-$value->pay)*20 }}บาท</td> -->
                        <!-- @if($value->pay == '')
                        <td class="text-center">0/0</td>
                        @else
                        <td class="text-center">{{ $value->pay }}ชุด/{{ $value->pay*20 }}บาท</td>
                        @endif -->
                        <td width="1" class="text-nowrap text-center">{{ $value->created_at }}</td>
                        <td width="1">
                            <div class="option-link">

                                <form method="POST" action="{{ route('admin.member.destroy', $value->id) }}">
                                    <!-- @can($permission_prefix.'-edit') -->
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a class="btn btn-success btn-group-sm btn-sm dropdown-toggle" href="" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">เคลียร์ยอดเงิน</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#" data-action="{{ route('admin.member.pay', $value->id) }}" ng-click="pay($event, {{ $value->store->count()-$value->pay  }})"><i class="fas fa-money-bill"></i> จ่ายเงิน</a>
                                            <a class="dropdown-item" href="{{ route('admin.household', [$value->id]) }}"><i class="fas fa-address-book"></i> ข้อมูลการกรอก</a>
                                        </div>
                                    </div>
                                    <!-- @endcan -->
                                    @can($permission_prefix.'-edit')
                                    <a class="btn btn-sm btn-info" href="{{ route('admin.member.edit', [$value->id]) }}"> แก้ไข</a>
                                    @endcan
                                    @can($permission_prefix.'-delete')
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('ท่านต้องการลบรายการนี้ใช่หรือไม่ ?')">ยกเลิก</button>
                                    @endcan
                                </form>
                            </div>
                        </td>
                    </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
<div class="tile-footer">
    {{ $lists->render()  }}
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">เคลียร์ยอดเงิน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form-pay" action="#" method="POST">
                {{-- <form action="{{ route('admin.member.pay', 31) }}" method="POST"> --}}
                @csrf
                {{ method_field('PUT') }}
                <div class="modal-body">
                    <p>จำนวนชุดแบบสอบถาม</p>
                    <input class="form-control" type="text" name="pay" value="50">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">จ่ายเงิน</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
</div>



@endsection

@section('script-content')
<script>
    'use strict'
    app.controller("memberPayController", function ($scope, $window, BASE_URL) {
        $scope.pay = function(event, pay){
            event.preventDefault();

            angular.element('#form-pay').attr('action',event.target.dataset.action);
            angular.element('input[name="pay"]').val(pay); 
            angular.element('#exampleModalCenter').modal({
                keyboard: false,
                backdrop: 'static'
            });
        }
    });
</script>
@endsection