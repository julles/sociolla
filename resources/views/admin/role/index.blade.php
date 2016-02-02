@extends('admin.layouts.layout')
@section('content')
<div id="page-wrapper">
    <div class="main-page">
        <div class="tables">
            <h3 class="title1">{{ $titleAction }}</h3>

            @if(Session::has('message'))

                <div class="alert alert-info">{{ Session::get('message') }}</div>

            @endif

            <div class="table-responsive bs-example widget-shadow">
                <a style="margin-bottom:10px;" class="btn btn-success" href = "{{ url('admin-panel/role/create') }}">Add New</a>
                <hr/>
                 <table class="table" id="roles-table">
                    <thead>
                        <tr>
                            <th width="70%">Name</th>
                            <th width="30%">Action</th>
                            
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

    <script type="text/javascript">

    $('#roles-table').DataTable({
        processing: true,
        serverSide: true,
        ajax : '{{ url("admin-panel/role/data") }}',
        columns: [
            { data: 'name', name: 'name' },
            { data: 'action', name: 'action' ,"searchable": false ,'orderable' : false},
        ]
    });

    </script>

@endsection
