@php
$admin_asset = asset('assets');
@endphp

@include('layouts.header')
<!-- Content Wrapper. Contains page content -->

@yield('content')
<!-- /.content-wrapper -->
@include('layouts.footer')
