@extends('admin.layouts.layout')
@section('content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="grid_3 grid_5 widget-shadow">
            <h3 class="hdg">HOME</h3>
            <div class="well">
           		<h3><b>Welcome</b></h3> {{ Auth::user()->name }}
            </div>
        </div>
    </div>
</div>
@endsection
