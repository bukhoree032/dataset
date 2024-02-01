@extends('admin::layouts.master')

@section('app-content')

<div class="tile">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="title">
                    ข้อมูลครัวเรือน {{ $co }} ครัวเรือน
                </h3>   
            </div>
        </div>
        <form action="{{ route('admin.household.show.search') }}" method="post"enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-1">
                    <select name="HOUSEHOLD_INFO_PROVINCE" id="PROVINCE" class="form-control @error('HOUSEHOLD_INFO_PROVINCE') is-invalid @enderror" style="width: 122%;">
                        <option value="9998"  selected="selected">-- จังหวัด --</option>
                        <option value="75">ยะลา</option>
                        <option value="76">นราธิวาส</option>
                        <option value="74">ปัตตานี</option>
                        @foreach ($provinces as $index => $value)
                            <option value="{{$provinces[$index]->id}}">{{$provinces[$index]->name_th}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-1">
                    <select class="form-control" id="AMPHURE" name="HOUSEHOLD_INFO_AMPHURE" style="width: 122%;">   
                        <option value="9998" selected="selected">-- อำเภอ --</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <select class="form-control" id="DISTRICT" name="HOUSEHOLD_INFO_DISTRICT" style="width: 122%;">   
                        <option value="9998" selected="selected">-- ตำบล --</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" class="btn btn-sm btn-success">ค้นหา</button>
                </div>
            </div>
        </form>
    <div class="tile-body" style="margin-top: 30px">
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th class="text-nowrap text-center">#</th>
                        <th class="text-nowrap text-center">เก็บข้อมูล</th>
                        <th class="text-nowrap text-center">หมายเลขฯ</th>
                        <th class="text-nowrap text-center">ชื่อ-นามสกุล</th>
                        <th class="text-nowrap text-center">จังหวัด</th>
                        <th class="text-nowrap text-center">อำเภอ</th>
                        <th class="text-nowrap text-center">ตำบล</th>	
                        <th class="text-nowrap text-center">วันที่สอบถาม</th>
                        <th class="text-nowrap text-center">สร้างเมื่อ</th>
                        <th class="text-nowrap text-center">สถานะ</th>
                        <th class="text-nowrap text-center">ดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $index => $value)
                    <tr>
                        <td width="1">{{ $lists->firstItem() + $index }}</td>
                        
                        <td>ครั้งที่ {{ $value->STORE_FORM_ROUND }}</td>
                        <td>{{ $value->STORE_FORM_NUMBER }}</td>
                        <td>{{ $value->STORE_PERSON[0] }}</td>
                        
                        @isset($value->name_pro)
                            <td>{{ $value->name_pro }}</td>
                        @else
                            <td></td>    
                        @endisset

                        @isset($value->name_am)
                            <td>{{ $value->name_am }}</td>
                        @else
                            <td></td>    
                        @endisset

                        @isset($value->name_dis)
                            <td>{{ $value->name_dis }}</td>
                        @else
                            <td></td>    
                        @endisset
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
                                <form method="POST" action="{{ route('admin.household.store.destroy', $value->id) }}">
                                    
                                @csrf
                                {{ method_field('DELETE') }}
                                <a type="button" href="{{ route('admin.household.store.detail', $value->id) }}" class="btn btn-sm btn-success">
                                    ดูรายละเอียด
                                </a>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('#PROVINCE').change(function(){
    var id = this.value;
    if(id != ''){
        $.ajax({
            url: "{{ route('admin.household.AMPHURE') }}",
            method: "post",
            data: {
            id: id,
            "_token": "{{ csrf_token() }}",
            },
            success:function(data)
            {
            if(data == ''){
                var layout = '<option value="9998" selected>-- อำเภอ --</option>';
            }else{
                var layout = '<option value="9998" selected>-- อำเภอ --</option>';
                  $.each(data,function(key,value){
                    layout += '<option value='+value.id+'>'+value.name_th+'</option>';
                  });
            }
            $('#AMPHURE').html(layout);
        }
        })
    }
});
$('#AMPHURE').change(function(){
    var id = this.value;
    if(id != ''){
        $.ajax({
            url: "{{ route('admin.household.DISTRICT') }}",
            method: "post",
            data: {
            id: id,
            "_token": "{{ csrf_token() }}",
            },
            success:function(data)
            {
            if(data == ''){
                var layout = '<option value="9998" selected>-- ตำบล --</option>';
            }else{
                var layout = '<option value="9998" selected>-- ตำบล --</option>';
                  $.each(data,function(key,value){
                    layout += '<option value='+value.id+'>'+value.name_th+'</option>';
                  });
            }
            $('#DISTRICT').html(layout);
        }
        })
    }
});

$('#category').change(function(){
    var id = this.value;
    if(id != ''){
    
    }
});
</script>
@endsection

