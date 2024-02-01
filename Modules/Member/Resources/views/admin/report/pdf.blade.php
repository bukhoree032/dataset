
<h2 class="text-nowrap text-center mb-0">
รายงานข้อมูลสมาชิก
@if ((request()->has('from') && request()->has('to')) && (request()->input('from') != "" && request()->input('to') != ""))
    <span class="px-2 bg-warning font-weight-normal font-small">ระหว่างวันที่ {{ date("d/m/Y", strtotime(request()->input('from'))) }} - {{ date("d/m/Y", strtotime(request()->input('to'))) }}</span>
@else
    <span class="px-2 bg-warning font-weight-normal font-small">ทั้งหมด</span>
@endif
</h2>
<table class="blueTable">
    <thead>
        <tr>
            <th class="text-nowrap text-center">ลำดับที่</th>
            <th class="text-nowrap text-center">ชื่อผู้ใช้งาน</th>
            <th class="text-nowrap text-center">ชื่อ-สกุล</th>
            <th class="text-nowrap text-center">ชื่อเล่น</th>
            <th class="text-nowrap text-center">ตำแหน่ง</th>
            <th class="text-nowrap text-center">เบอร์โทรศัพท์</th>
            <th class="text-nowrap text-center">ที่อยู่อีเมล์</th>
            <th class="text-nowrap text-center">สร้างเมื่อ</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($members as $index => $member)
        <tr>
            <td width="1">{{ $index+1 }}</td>
            <td width="1" class="text-nowrap text-center">{{ $member->username }}</td>
            <td>{{ $member->name }}</td>
            <td>{{ $member->nickname }}</td>
            <td>{{ $member->position }}</td>
            <td>{{ $member->tel }}</td>
            <td>{{ $member->email }}</td>
            <td width="1" class="text-nowrap text-center">{{ $member->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
