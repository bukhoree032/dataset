@extends('admin::layouts.master')

@section('app-content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h3 class="title">
            ข้อมูลรายการ
        </h3>
        <p>
            <a class="btn btn-outline-success" href="{{ route('admin.report.dataset.export-xlxs') }}{{ $query_string }}"><i class="fas fa-file-excel fa-fw"></i>ส่งออกรายงาน (*.xlxs) </a>
            <a class="btn btn-secondary" href="{{ url()->current() }}"><i class="fas fa-sync fa-fw"></i>Refresh </a>
        </p>
    </div>
    <div class="tile-body">
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">#</th>
                        <th class="text-nowrap text-center">ผู้เก็บข้อมูล</th>
                        <th class="text-nowrap text-center">ผู้ตรวจข้อมูล</th>
                        <th class="text-nowrap text-center">ผู้บันทึกข้อมูล</th>
                        <th class="text-nowrap text-center">สร้างเมื่อ</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($lists as $index => $value)
                    <tr>
                        <td width="1">{{ $lists->firstItem() + $index }}</td>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->STORE_CHECK }}</td>
                        <td>{{ $value->STORE_SAVE }}</td>
                        <td width="1" class="text-nowrap text-center">{{ $value->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="tile-footer">
        {{ $lists->render()  }}
    </div>
</div>
@endsection