@extends('home::layouts.master')

@section('app-content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title">
            ข้อมูลรายการ
        </h3>
            {{-- <a class="btn btn-secondary" href="{{ url()->current() }}"><i class="fas fa-sync fa-fw"></i>Refresh </a> --}}
            <form action="{{ route('member.household.house.search') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
                <div class="row">
                    <div class="col-md-7" >
                        <input type="text" class="form-control" name="search" value="" placeholder="คำค้นหา"/>
                    </div>
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-search"></i>ค้นหา
                        </button>
                    </div>
                </div>
            </form>
            {{-- <a class="btn btn-secondary" href="{{ url()->current() }}"><i class="fas fa-sync fa-fw"></i>Refresh </a> --}}
       
    </div>
    <div class="tile-body">
        <table class="table table-hover table-sm">
            <thead>
                <tr>
                    <th class="text-nowrap text-center">#</th>
                    <th class="text-nowrap text-center">ปี</th>
                    <th class="text-nowrap text-center">HC</th>
                    <th class="text-nowrap text-center">ชื่อ - นามสกุล</th>
                    <th class="text-nowrap text-center">บ้านเลขที่</th>
                    <th class="text-nowrap text-center">หมู่</th>
                    <th class="text-nowrap text-center">ตำบล</th>
                    <th class="text-nowrap text-center">อำเภอ</th>
                    <th class="text-nowrap text-center">จังหวัด</th>
                    <th class="text-nowrap text-center">เบอร์โทรศัพท์</th>
                    <th class="text-nowrap text-center">กิจกรรม</th>
                    <th class="text-nowrap text-center">ดำเนินการ</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($lists))
                    @php $data = $lists; @endphp
                @else
                    @php $data = $data; @endphp
                @endif
                @foreach ($data as $index => $value)
                <tr>
                    @if(empty($lists))
                    <td width="1">{{ $index+1 }}</td>
                    @else
                    <td width="1">{{ $data->firstItem() + $index }}</td>
                    @endif
                    <td>{{ $value->H_YEAR }}</td>
                    <td>{{ $value->H_ID }}</td>
                    <td>{{ $value->H_NAME }}</td>
                    <td>{{ $value->H_HOUSE_NUMBER }}</td>
                    <td>{{ $value->H_MOO }}</td>
                    <td>{{ $value->H_DISTRICT }}</td>
                    <td>{{ $value->H_AMPHURE }}</td>
                    <td>{{ $value->H_PROVINCE }}</td>
                    <td>{{ $value->H_TEL }}</td>
                    <td class="text-nowrap text-center">{{ $value->H_ACTIVITY }}</td>
                    <td width="1">
                        <div class="option-link">
                            <form method="POST" action="{{ route('member.household.store.destroy', $value->id) }}">
                                @csrf
                                {{ method_field('DELETE') }}
                                <a type="button" href="{{ route('member.household.help', $value->id) }}" class="btn btn-sm btn-success">
                                    ข้อมูลช่วยเหลือ
                                </a>
                                <a type="button" href="{{ route('member.household.house', $value->id) }}" class="btn btn-sm btn-info">
                                    ข้อมูลครัวเรือน
                                </a>
                                {{-- <a type="button" href="{{ route('member.household.store.detail', $value->id) }}" class="btn btn-sm btn-success">
                                    ดูรายละเอียด
                                </a> --}}
                                {{-- <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('ท่านต้องการลบรายการนี้ใช่หรือไม่ ?')">
                                    ยกเลิก
                                </button> --}}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    @if(empty($lists))
    
    @else
        <div class="tile-footer">
            {{ $lists->render()  }}
        </div>
    @endif
</div>
@endsection