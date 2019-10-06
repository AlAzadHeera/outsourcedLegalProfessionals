@extends('layouts.app')

@section('title','Send File(s)')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7" style="float: none;margin: 0 auto;">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Send File(s)</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('shareFile.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <input type="text" id="sender" name="sender" value="admin" style="display: none;">
                                <input type="text" id="userID" name="userID" style="display: none;">
                                <div class="row">
                                    <div class="col-md-12" style="float: none; margin: 0 auto;">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" id="name" class="form-control" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-12" style="float: none; margin: 0 auto;">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="text" id="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Brief Note</label>
                                        <textarea type="text" class="form-control" name="note"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input type="file" name="file[]" multiple>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4" style="float: none; margin: 0 auto;">
                                        <input type="submit" class="btn btn-primary btn-round" value="Send">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        $(function () {
            $('#name').autocomplete({
                source: function(request,response){
                    $.getJSON('{{url('admin/autoComplete')}}',function (data) {
                        var array = $.map(data,function (row) {
                            return {
                                value:row.fname + " " + row.lname,
                                label:row.fname + " " + row.lname,
                                email:row.email,
                                name:row.fname + row.lname,
                                userID:row.id
                            }
                        })
                    response($.ui.autocomplete.filter(array,request.term));
                    })
                },
                minLength:2,
                delay:350,
                select:function (event,ui) {
                    console.log(ui.item)
                    $('#email').val(ui.item.email)
                    $('#userID').val(ui.item.userID)
                }
            })
        })
        $(function () {
            $('#email').autocomplete({
                source: function(request,response){
                    $.getJSON('{{url('admin/autoComplete')}}',function (data) {
                        var array = $.map(data,function (row) {
                            return {
                                value:row.email,
                                label:row.email,
                                name:row.fname + " " + row.lname,
                                userID:row.id
                            }
                        })
                        response($.ui.autocomplete.filter(array,request.term));
                    })
                },
                minLength:2,
                delay:350,
                select:function (event,ui) {
                    console.log(ui.item)
                    $('#name').val(ui.item.name)
                    $('#userID').val(ui.item.userID)
                }
            })
        })


    </script>

@endpush
