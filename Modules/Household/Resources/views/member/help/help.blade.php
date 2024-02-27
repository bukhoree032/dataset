@extends('home::layouts.master')

@section('app-content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title">
            ข้อมูลช่วยเหลือ
        </h3>
        <p>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus-circle fa-fw"></i>สร้างรายการ
            </button>
            <a class="btn btn-secondary" href="{{ url()->current() }}"><i class="fas fa-sync fa-fw"></i>Refresh </a>
        </p>
    </div>

    @include('household::member.help.create')

    <div class="tile-body">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th class="text-nowrap text-center">#</th>
                    <th class="text-nowrap text-center">ปี</th>
                    <th class="text-nowrap text-center">หมายเลขฯ</th>
                    <th class="text-nowrap text-center">ชื่อ - นามสกุล</th>
                    <th class="text-nowrap text-center">ช่วยเหลือ</th>
                    <th class="text-nowrap text-center">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lists as $index => $value)
                <tr>
                    <td width="1">{{ $lists->firstItem() + $index }}</td>
                    <td class="text-center">{{ $value->HE_YEAR }}</td>
                    <td class="text-center">{{ $value->HE_ID }}</td>
                    <td class="text-center">{{ $value->HE_NAME }}</td>
                    <td class="text-center">{{ $value->HE_RECEIVE }}</td>
                    <td width="1">
                        <div class="option-link">
                            <form method="POST" action="{{ route('member.household.help.destroy', $value->id) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                {{-- <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#Modal_Edit{{$value->id}}">
                                    แก้ไข
                                </button> --}}
                                {{-- <a type="button" href="{{ route('member.household.store.detail', $value->id) }}" class="btn btn-sm btn-success">
                                    ดูรายละเอียด
                                </a> --}}
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('ท่านต้องการลบรายการนี้ใช่หรือไม่ ?')">
                                    ยกเลิก
                                </button>
                            </form> 
                        </div>
                    </td>
                </tr>
                
                {{-- @include('household::member.help.edit') --}}

                @endforeach
            </tbody>
        </table>
    </div>
    <div class="tile-footer">
        {{ $lists->render()  }}
    </div>
</div>

@endsection