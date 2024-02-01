@extends('admin::layouts.master')

@section('app-content')
@csrf
{{ method_field('PUT') }}

<form action="{{ route('admin.dashboard.index_search') }}" method="post"enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <div class="row">
        <div class="col-md-2 mb-2">
            <input type="date" class="form-control" name="DATE"/>
            <x-error-message title="DATE"/>
        </div>
        <div class="col-md-2 mb-2">
            <input type="date" class="form-control" name="TODATE"/>
            <x-error-message title="TODATE"/>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-sm btn-success">ค้นหา</button>
        </div>
    </div>
</form>
<br>
<div class="row">
<!-- @php $sum = $listHouseholdAll['stores'] @endphp
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
</h3> -->
<div class="col-md-6">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="title">สรุปครัวเรือน ( {{ $householdSum }} ครัวเรือน )</h3>
                <div class="btn-group">
                    <input type="hidden" id="householdSum" value="{{ $householdSum }}" >
                    <input type="hidden" id="householdYala" value="{{ $householdYala }}" >
                    <input type="hidden" id="householdNara" value="{{ $householdNara }}" >
                    <input type="hidden" id="householdPat" value="{{ $householdPat }}" >
                    <input type="hidden" id="householdOther" value="{{ $householdOther }}" >
                    <a class="btn btn-primary btn-sm" href="#" id="downloadMyLine" download="ChartImage.jpg"><i class="fas fa-download"></i></a>
                </div>
            </div>
			<div class="chart-area">
				<canvas id="chartHousehold"></canvas>
			</div>
        </div>
    </div>
	<div class="col-md-6">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="title">สรุปสมาชิกในครัวเรือน ( {{ $MemberSum }} คน )</h3>
                <div class="btn-group">
                    <input type="hidden" id="MemberSum" value="{{ $MemberSum }}" >
                    <input type="hidden" id="MemberYala" value="{{ $MemberYala }}" >
                    <input type="hidden" id="MemberNara" value="{{ $MemberNara }}" >
                    <input type="hidden" id="MemberPat" value="{{ $MemberPat }}" >
                    <input type="hidden" id="MemberOther" value="{{ $MemberOther }}" >
                    <a class="btn btn-primary btn-sm" href="#" id="downloadMyLine" download="ChartImage.jpg"><i class="fas fa-download"></i></a>
                </div>
            </div>
			<div class="chart-area">
				<canvas id="chartMember"></canvas>
			</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="title">สรุปอำเภอ ( {{ $AMPHURESum }} คน )</h3>
                <div class="btn-group">
                    <input type="hidden" id="AMPHURESum" value="{{ $AMPHURESum }}" >
                    <input type="hidden" id="AMPHUREYala" value="{{ $AMPHUREYala }}" >
                    <input type="hidden" id="AMPHURENara" value="{{ $AMPHURENara }}" >
                    <input type="hidden" id="AMPHUREPat" value="{{ $AMPHUREPat }}" >
                    <input type="hidden" id="AMPHUREOther" value="{{ $AMPHUREOther }}" >
                    <a class="btn btn-primary btn-sm" href="#" id="downloadMyLine" download="ChartImage.jpg"><i class="fas fa-download"></i></a>
                </div>
            </div>
			<div class="chart-area">
				<canvas id="chartAmpher"></canvas>
			</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="title">สรุปตำบล ( {{ $DISTRICTSum }} คน )</h3>
                <div class="btn-group">
                    <input type="hidden" id="DISTRICTSum" value="{{ $DISTRICTSum }}" >
                    <input type="hidden" id="DISTRICTYala" value="{{ $DISTRICTYala }}" >
                    <input type="hidden" id="DISTRICTNara" value="{{ $DISTRICTNara }}" >
                    <input type="hidden" id="DISTRICTPat" value="{{ $DISTRICTPat }}" >
                    <input type="hidden" id="DISTRICTOther" value="{{ $DISTRICTOther }}" >
                    <a class="btn btn-primary btn-sm" href="#" id="downloadMyLine" download="ChartImage.jpg"><i class="fas fa-download"></i></a>
                </div>
            </div>
			<div class="chart-area">
				<canvas id="chartDistricts"></canvas>
			</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="tile">
            <div class="tile-title-w-btn">
                <!-- <h3 class="title">สรุปหมู่บ้าน ( 0 คน )</h3> -->
                <div class="btn-group">
                    <input type="hidden" id="MooSum" value="0" >
                    <input type="hidden" id="MooYala" value="0" >
                    <input type="hidden" id="MooNara" value="0" >
                    <input type="hidden" id="MooPat" value="0" >
                    <input type="hidden" id="MooOther" value="0" >
                    <a class="btn btn-primary btn-sm" href="#" id="downloadMyLine" download="ChartImage.jpg"><i class="fas fa-download"></i></a>
                </div>
            </div>
			<div class="chart-area">
				<canvas id=""></canvas>
			</div>
        </div>
    </div>
    
	<!-- <div class="col-md-6">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="title">สรุปตำบล</h3>
                <div class="btn-group">
                    <a class="btn btn-primary btn-sm" href="#" id="downloadMyLine" download="ChartImage.jpg"><i class="fas fa-download"></i></a>
                </div>
            </div>
			<div class="chart-area">
				<canvas id="chartmu"></canvas>
			</div>
        </div>
    </div>
	<div class="col-md-6">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="title">สรุปอำเภอ</h3>
                <div class="btn-group">
                    <a class="btn btn-primary btn-sm" href="#" id="downloadMyLine" download="ChartImage.jpg"><i class="fas fa-download"></i></a>
                </div>
            </div>
			<div class="chart-area">
				<canvas id="chartdist"></canvas>
			</div>
        </div>
    </div> -->
</div>

@endsection