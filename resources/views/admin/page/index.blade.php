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
                <a style="margin-bottom:10px;" class="btn btn-success" href = "{{ url('admin-panel/manage-pages/create') }}">Add New</a>
                <hr/>
                 <table class="table" id="page-table">
                    <thead>
                        <tr class = ''>
                            <th width="20%">Parent</th>
                            <th width="20%">Title</th>
                            <th width="30%">Sub Title</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($model->whereParentId(0)->get() as $parent)
                        <tr class="success">
                            <td>This Parent</td>
                            <td>{{ $parent->title }}</td>
                            <td>{{ $parent->sub_title }}</td>
                            <td>{!! Helper::buttons($parent->id) !!}</td>
                        </tr>

                        @foreach($model->whereParentId($parent->id)->get() as $child)
                            <tr>
                                <td>{{ $parent->title }}</td>
                                <td>{{ $child->title }}</td>
                                <td>{{ $child->sub_title }}</td>
                                 <td>{!! Helper::buttons($child->id) !!}</td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

    <script type="text/javascript">
        $('#page-table').DataTable({
            ordering:false,
        });
    </script>

@endsection
