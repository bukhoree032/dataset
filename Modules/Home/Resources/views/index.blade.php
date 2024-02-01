@extends('home::layouts.master')

@section('app-content')
<div class="container-fluid" id="particles">
    <div id="box-content">
        <div class="row">
            <div class="col-12 text-center">
                <img src="{{ asset('assets/images/rajabhat-1-768x614.png') }}" class="mw-100" width="600">
                <h2 class="mt-4 font-weight-normal">มหาวิทยาลัยราชภัฏยะลา</h2>
                <h4 class="m-0 font-weight-normal">133 ถ.เทศบาล3 ต.สะเตง อ.เมือง จ.ยะลา 95000</h4>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script-content')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        particleground(document.getElementById('particles'), {
            dotColor: '#5cbdaa',
            lineColor: '#5cbdaa'
        });

        var intro = document.getElementById('box-content');
        intro.style.marginTop = - intro.offsetHeight / 2 + 'px';
     }, false);
</script>
@endsection