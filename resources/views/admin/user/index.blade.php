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
                <a style="margin-bottom:10px;" class="btn btn-success" href = "{{ url('admin-panel/user/create') }}">Add New</a>
                <hr/>
                 <table class="table" id="users-table">
                    <thead>
                        <tr>
                            <th width="20%">Name</th>
                            <th width="20%">Username</th>
                            <th width="20%">Email</th>
                            <th width="20%">Role</th>
                            <th width="20%">Action</th>
                            
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
    $.fn.dataTable.ext.errMode = 'none';
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax : '{{ url("admin-panel/user/data") }}',
        columns: [
            { data: 'name', name: 'users.name' },
            { data: 'username', name: 'username' },
            { data: 'email', name: 'email' },
            { data: 'role_name', name: 'roles.name' },
            { data: 'action', name: 'action' ,"searchable": false ,'orderable' : false},
        ]
    });

    
    </script>

@endsection
