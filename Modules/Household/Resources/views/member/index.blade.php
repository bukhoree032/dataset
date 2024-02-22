@extends('home::layouts.master')

@section('app-content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title">
            ข้อมูลรายการ
        </h3>
        <p>
            <a class="btn btn-primary" href="{{ route('member.household.store.create', $id) }}"><i class="fa fa-plus-circle fa-fw"></i>สร้างรายการ
            </a>
            <a class="btn btn-secondary" href="{{ url()->current() }}"><i class="fas fa-sync fa-fw"></i>Refresh </a>
        </p>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th class="text-nowrap text-center">#</th>
                    <th class="text-nowrap text-center">เก็บข้อมูล</th>
                    <th class="text-nowrap text-center">หมายเลขฯ</th>
                    <th class="text-nowrap text-center">ผู้เก็บข้อมูล</th>
                    <th class="text-nowrap text-center">ผู้ตรวจข้อมูล</th>
                    <th class="text-nowrap text-center">ผู้บันทึกข้อมูล</th>
                    <th class="text-nowrap text-center">วันที่สอบถาม</th>
                    <th class="text-nowrap text-center">สถานะ</th>
                    <th class="text-nowrap text-center">สร้างเมื่อ</th>
                    <th class="text-nowrap text-center">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lists as $index => $value)
                <tr>
                    <td width="1">{{ $lists->firstItem() + $index }}</td>
                    <td>ครั้งที่ {{ $value->STORE_FORM_ROUND }}</td>
                    <td>{{ $value->STORE_FORM_NUMBER }}</td>
                    <td>{{ $value->STORE_COLLECTOR }}</td>
                    <td>{{ $value->STORE_CHECK }}</td>
                    <td>{{ $value->STORE_SAVE }}</td>
                    <td width="1" class="text-nowrap text-center">{{ $value->STORE_DATE }}</td>
                    <td width="1" class="text-nowrap text-center">{{ $value->created_at }}</td>
                    <td width="1" class="text-nowrap text-center">
                        <div class="d-inline ml-2">
                            @if(isset($approveds[$value->id]['info']))
                            @if($approveds[$value->id]['info'] == true)
                            <i class="fas fa-check-square text-success"></i>
                            @else
                            <i class="far fa-square"></i>
                            @endif
                            @else
                            <i class="far fa-square"></i>
                            @endif

                            <i class="fas fa-puzzle-piece" data-toggle="tooltip" title="ข้อมูลครัวเรือน"></i>
                        </div>
                        <div class="d-inline ml-2">
                            @if(isset($approveds[$value->id]['member']))
                            @if($approveds[$value->id]['member'] == true)
                            <i class="fas fa-check-square text-success"></i>
                            @else
                            <i class="far fa-square"></i>
                            @endif
                            @else
                            <i class="far fa-square"></i>
                            @endif

                            <i class="fas fa-heartbeat" data-toggle="tooltip" title="ข้อมูลสุขภาพ"></i>
                        </div>
                        <div class="d-inline ml-2">
                            @if(isset($approveds[$value->id]['econ']))
                            @if($approveds[$value->id]['econ'] == true)
                            <i class="fas fa-check-square text-success"></i>
                            @else
                            <i class="far fa-square"></i>
                            @endif
                            @else
                            <i class="far fa-square"></i>
                            @endif

                            <i class="fas fa-chart-line" data-toggle="tooltip" title="ข้อมูลด้านเศรษฐกิจ"></i>
                        </div>
                        <div class="d-inline ml-2">
                            @if(isset($approveds[$value->id]['enviro']))
                            @if($approveds[$value->id]['enviro'] == true)
                            <i class="fas fa-check-square text-success"></i>
                            @else
                            <i class="far fa-square"></i>
                            @endif
                            @else
                            <i class="far fa-square"></i>
                            @endif

                            <i class="fas fa-feather-alt" data-toggle="tooltip" title="ข้อมูลด้านสิ่งแวดล้อม"></i>
                        </div>
                        <div class="d-inline ml-2">
                            @if(isset($approveds[$value->id]['political']))
                            @if($approveds[$value->id]['political'] == true)
                            <i class="fas fa-check-square text-success"></i>
                            @else
                            <i class="far fa-square"></i>
                            @endif
                            @else
                            <i class="far fa-square"></i>
                            @endif

                            <i class="fas fa-balance-scale" data-toggle="tooltip" title="ข้อมูลด้านการเมืองการปกครอง"></i>
                        </div>
                        <div class="d-inline ml-2">
                            @if(isset($approveds[$value->id]['communicate']))
                            @if($approveds[$value->id]['communicate'] == true)
                            <i class="fas fa-check-square text-success"></i>
                            @else
                            <i class="far fa-square"></i>
                            @endif
                            @else
                            <i class="far fa-square"></i>
                            @endif

                            <i class="fas fa-comments" data-toggle="tooltip" title="ข้อมูลด้านการสื่อสารภายในครัวเรือน"></i>
                        </div>
                    </td>
                    <td width="1">
                        <div class="option-link">
                            <form method="POST" action="{{ route('member.household.store.destroy', $value->id) }}">
                                <div class="btn-group btn-group-sm" role="group">
                                    <a class="btn btn-sm btn-info" href="{{ route('member.household.store.edit', [$value->id]) }}" data-toggle="tooltip">
                                        แก้ไขข้อมูล</a>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button class="btn btn-info btn-group-sm dropdown-toggle" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            @isset($value->householdInfo->id)
                                                    <a class="dropdown-item" href="{{ route('member.household.info.edit', [$value->id, $value->householdInfo->id]) }}"><i class="fas fa-puzzle-piece"></i> ข้อมูลครัวเรือน</a>
                                            @else
                                                    <a class="dropdown-item" href="{{ route('member.household.info.store', [$value->id]) }}"><i class="fas fa-puzzle-piece"></i> ข้อมูลครัวเรือน</a>
                                            @endisset
                                            
                                            @isset($value->householdInfo->id)
                                                <a class="dropdown-item" href="{{ route('member.household.info.member.index', [$value->id, $value->householdInfo->id]) }}"><i class="fas fa-users"></i> สมาชิกในครัวเรือน</a>
                                            @else
                                                <a class="dropdown-item" href="{{ route('member.household.info.store', [$value->id]) }}"><i class="fas fa-users"></i> สมาชิกในครัวเรือน</a>
                                            @endisset

                                            @isset($value->householdInfo->id)
                                                {{-- edit/info_id--}}
                                                @isset($value->householdInfo->HouseholdEcon->id)
                                                    <a class="dropdown-item" href="{{ route('member.household.info.econ.edit', [$value->id, $value->householdInfo->id, $value->householdInfo->HouseholdEcon->id]) }}"><i class="fas fa-chart-line"></i> ส่วนที่ 3</a>
                                                @else
                                                    <a class="dropdown-item" href="{{ route('member.household.info.econ.create', [$value->id, $value->householdInfo->id]) }}"><i class="fas fa-chart-line"></i> ส่วนที่ 3</a>
                                                @endisset
                                            @else
                                                <a class="dropdown-item" href="{{ route('member.household.info.store', [$value->id]) }}"><i class="fas fa-chart-line"></i> ส่วนที่ 3</a>
                                            @endisset
                                            
                                            @isset($value->householdInfo->id)
                                                {{-- edit/info_id--}}
                                                @isset($value->householdInfo->HouseholdEnviro->id)
                                                    <a class="dropdown-item" href="{{ route('member.household.info.enviro.edit', [$value->id, $value->householdInfo->id, $value->householdInfo->HouseholdEnviro->id]) }}"><i class="fas fa-feather-alt"></i> ส่วนที่ 4</a>
                                                @else
                                                    <a class="dropdown-item" href="{{ route('member.household.info.enviro.create', [$value->id, $value->householdInfo->id]) }}"><i class="fas fa-feather-alt"></i> ส่วนที่ 4</a>
                                                @endisset
                                            @else
                                                <a class="dropdown-item" href="{{ route('member.household.info.store', [$value->id]) }}"><i class="fas fa-feather-alt"></i> ส่วนที่ 4</a>
                                            @endisset

                                            @isset($value->householdInfo->id)
                                                {{-- edit/info_id--}}
                                                @isset($value->householdInfo->HouseholdPolitical->id)
                                                    <a class="dropdown-item" href="{{ route('member.household.info.political.edit', [$value->id, $value->householdInfo->id, $value->householdInfo->HouseholdPolitical->id]) }}"><i class="fas fa-balance-scale"></i> ส่วนที่ 5</a>
                                                @else
                                                    <a class="dropdown-item" href="{{ route('member.household.info.political.create', [$value->id, $value->householdInfo->id]) }}"><i class="fas fa-balance-scale"></i> ส่วนที่ 5</a>
                                                @endisset
                                            @else
                                                <a class="dropdown-item" href="{{ route('member.household.info.store', [$value->id]) }}"><i class="fas fa-balance-scale"></i> ส่วนที่ 5</a>
                                            @endisset
                                            
                                            @isset($value->householdInfo->id)
                                                {{-- edit/info_id--}}
                                                @isset($value->householdInfo->HouseholdCommunicat->id)
                                                    <a class="dropdown-item" href="{{ route('member.household.info.communicat.edit', [$value->id, $value->householdInfo->id, $value->householdInfo->HouseholdCommunicat->id]) }}"><i class="fas fa-comments"></i> ส่วนที่ 6</a>
                                                @else
                                                    <a class="dropdown-item" href="{{ route('member.household.info.communicat.create', [$value->id, $value->householdInfo->id]) }}"><i class="fas fa-comments"></i> ส่วนที่ 6</a>
                                                @endisset
                                            @else
                                                <a class="dropdown-item" href="{{ route('member.household.info.store', [$value->id]) }}"><i class="fas fa-comments"></i> ส่วนที่ 6</a>
                                            @endisset


                                        </div>
                                    </div>
                                </div>
                                @csrf
                                {{ method_field('DELETE') }}
                                <a type="button" href="{{ route('member.household.store.detail', $value->id) }}" class="btn btn-sm btn-success">
                                    ดูรายละเอียด
                                </a>
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('ท่านต้องการลบรายการนี้ใช่หรือไม่ ?')">
                                    ยกเลิก
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tile-footer">
        {{ $lists->render()  }}
    </div>
</div>
@endsection