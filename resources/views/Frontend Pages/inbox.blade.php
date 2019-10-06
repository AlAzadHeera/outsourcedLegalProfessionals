@extends('layouts.home')

@section('title','Inbox')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endpush

@section('content')

    <aside id="colorlib-hero" class="js-fullheight">
        <div class="flexslider js-fullheight">
            <ul class="slides">
                <li style="background-image: url({{ asset('frontend/images/img_bg_1.jpg') }});">
                    <div class="overlay-gradient"></div>
                    <div class="container">
                        <div class="col-md-10 col-md-offset-1 text-center js-fullheight slider-text">
                            <div class="slider-text-inner desc">
                                <h2 class="heading-section">Files</h2>
                                <p class="colorlib-lead">Share Your File & Opinion With Us</p>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </aside>

    <div id="colorlib-contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 animate-box">
                    <h3>Send File</h3>
                    <br>
                    <form action="{{ route('fileStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <input type="text" style="display: none" name="name" value="{{ $userName }}">
                        <input type="text" style="display: none" name="userID" value="{{ $userID }}">
                        <input type="text" style="display: none" name="sender" value="user">

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">Brief Note</label> -->
                                <textarea type="text" name="note" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <!-- <label for="email">File</label> -->
                                <input type="file" name="file[]" class="form-control" multiple>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Send" class="btn btn-primary">
                        </div>

                    </form>
                </div>
                <div class="col-md-9 animate-box">
                    <h3>Inbox</h3>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive" style="font-size: 14px">
                                <table class="table table-hover table-bordered" id="example">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 10%">Rec./Sent</th>
                                        <th style="width: 20%;">Note</th>
                                        <th style="width: 20%;">File</th>
                                        <th style="width: 10%">Time</th>
                                        <th style="width: 10%">Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($files as $key => $file)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            @if($file->sender == "admin")
                                                <td><span class="label label-success">Received</span></td>
                                            @else
                                                <td><span class="label label-info">Sent</span></td>
                                            @endif
                                            <td>{{ $file->note }}</td>
                                            <td>{{ $file->fileName }}</td>
                                            <td>{{ \Carbon\Carbon::parse($file->created_at)->diffForHumans() }}</td>
                                            <td>{{\Carbon\Carbon::parse($file->created_at)->format('d/m/Y')}}</td>
                                            <td>
                                                @if($file->fileName)
                                                <a href="{{route('shareFile.show',$file->id)}}" class="label label-success">Download</a>
                                                @endif
                                                <button class="label label-danger" onclick="deleteFunction({{ $file->id }})">Delete</button>
                                                <form id="deleteForm-{{$file->id}}" action="{{route('shareFile.destroy',$file->id)}}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        } );
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.2.6/dist/sweetalert2.all.min.js"></script>
    <script type="text/javascript">
        function deleteFunction(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('deleteForm-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>

@endpush
