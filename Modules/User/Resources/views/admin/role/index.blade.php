@extends('admin::layouts.master')

@section('app-content')
    <div class="tile">
        <div class="tile-title-w-btn">
            <h3 class="title">ข้อมูลรายการ</h3>
            <p>
                @can($permission_prefix.'-create')
                <a class="btn btn-primary icon-btn" href="{{ route('admin.user.role.create') }}"><i class="fa fa-plus-circle fa-fw"></i>สร้างรายการ </a>
                @endcan
                    <a class="btn btn-warning icon-btn" href="{{ route('admin.user.role.synce') }}"><i class="fas fa-random fa-fw"></i>Sync </a>
                <a class="btn btn-secondary icon-btn" href="{{ url()->current() }}"><i class="fas fa-sync fa-fw"></i>Refresh </a>
            </p>
        </div>
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-hover table-sm">
                    <thead>
                    <tr>
                        <th scope="col" class="text-nowrap text-center">ลำดับที่</th>
                        <th scope="col" class="text-nowrap text-center">ชื่อสิทธิ์การใช้งาน</th>
                        <th scope="col" class="text-nowrap text-center">สร้างเมื่อ</th>
                        <th scope="col" class="text-nowrap text-center">จัดการ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($lists as $index => $value)
                        <tr>
                            <td width="1">{{ $lists->firstItem() + $index }}</td>
                            <td class="text-nowrap">{{ $value->name }}</td>
                            <td width="100" class="text-nowrap">{{ $value->created_at }}</td>
                            <td width="1" class="text-center">
                                <div class="option-link">
                                    <form method="POST" action="{{ route('admin.user.role.destroy', $value->id) }}">
                                        @can($permission_prefix.'-edit')
                                        <a class="btn btn-sm btn-info" href="{{ route('admin.user.role.edit', [$value->id]) }}"> แก้ไข</a>
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
    </div>
@endsection
