@extends('admin.layouts.layout')
@section('content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">{{ $titleAction }}</h3>

            @if(Session::has('message'))

                <div class="alert alert-info">{{ Session::get('message') }}</div>

            @endif

            {!! Form::open() !!}
                <div class="table-responsive bs-example widget-shadow">
                     <table class="table" id="roles-table">
                        <thead>
                            <tr>
                                <th width="70%">Menu</th>
                                <th width="30%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $parent)

                            <tr class="success">    
                                <td colspan="2">{{ $parent->title }}</td>
                            </tr>

                                @foreach(Helper::injectModel('Menu')->whereParentId($parent->id)->orderBy('order' ,'asc')->get() as $child)

                                     <tr class="">    
                                        <td>{{ $child->title }}</td>
                                        <td><input  {{ $active($child->id) }} type = 'checkbox' value = '{{ $child->id }}' name = 'menu_id[]'  /></td>
                                     </tr>

                                @endforeach
                            @endforeach

                        </tbody>
                    </table>
                    <div> 
                        <button class="btn btn-success" type="submit">Update</button> 
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

