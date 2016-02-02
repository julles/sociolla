@extends('admin.layouts.layout')
@section('content')

<div id="page-wrapper">
    <div class="main-page">
        <div class="forms">
            <h3 class="title1">{{ $titleAction }}</h3>
            <div class=" form-grids row form-grids-right">
                <div class="widget-shadow " data-example-id="basic-forms"> 
                    <div class="form-title">
                        <h4>Form</h4>
                    </div>
                    <div class="form-body">

                        <div id = 'message'>

                        </div>

                        {!! Form::model($model,['class' => 'form-horizontal' , 'id' => 'form']) !!}
                            <div class="form-group"> 
                                <label class="col-sm-2 control-label">
                                    Name
                                </label> 
                                <div class="col-sm-9"> 
                             
                                    {!! Form::text('name' , null , ['class' => 'form-control']) !!}

                                </div> 
                            </div>
                            <div class="col-sm-offset-2"> 
                                <button class="btn btn-default" type="button" id = 'command'>{{ (!empty($model->id)) ? 'Update' : 'Save' }}</button> 
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')

    <script type="text/javascript">

    $(document).ready(function(){

        $("#command").on('click' , function(){

            $.ajax({
                type : 'post',
                url : '{{ url("admin-panel/role/validate") }}',
                data : $("#form").serialize() + '&id={{$model->id}}',
                success : function(data){
                    
                    if(data.status == 'notValidate')
                    {
                        str = '<ul>';
                        $.each(data.errors , function(key , value){

                            str = '<li>'+value+'</li>';

                        })
                        str += '</ul>';

                        $("#message").html('<div style="text-align:center;" class = "alert alert-danger">'+str+'</div>');
                        
                    }else{
                        $("#form").submit();
                    }

                },
            });
            

        });

    });

    </script>

@endsection