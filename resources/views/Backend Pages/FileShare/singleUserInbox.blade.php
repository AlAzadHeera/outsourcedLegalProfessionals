@extends('layouts.app')

@section('title','Inbox')

@push('css')

@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title ">File(s) From <span class="badge badge-info">{{ $user->userName }}</span></h4>
                                </div>
                                <div class="col-md-6">
                                    <button onclick="deleteFunction({{ $user->userID }})" href="#" class="btn btn-danger btn-sm float-right">Delete All</button>
                                    <form id="deleteForm-{{$user->userID}}" action="{{ route('allFileDelete',$user->userID) }}" method="GET" style="display: none;"></form>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="example">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Rec/Sent</th>
                                    <th>Name</th>
                                    <th>Note</th>
                                    <th>File</th>
                                    <th>Time Ago</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($files as $key => $file)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            @if($file->sender == "admin")
                                                <td><span class="badge badge-primary">Sent To</span></td>
                                            @else
                                                <td><span class="badge badge-success">Rec. From</span></td>
                                            @endif
                                            <td>{{ $file->userName }}</td>
                                            <td>{{ $file->note }}</td>
                                            <td class="text-primary"><a href="">{{ $file->fileName }}</a></td>
                                            <td>{{ \Carbon\Carbon::parse($file->created_at)->diffForHumans() }}</td>
                                            <td class="text-primary">
                                                <a href="{{route('shareFile.create')}}" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">Reply</a>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Send File(s) To <span style="color:darkolivegreen">{{ $user->userName }}</span></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('shareFile.store') }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <input type="text" name="sender" value="admin" style="display: none;">
                                                                    <input type="text" name="userID" value="{{$file->userID}}" style="display: none;">
                                                                    <div class="row" style="display: none;">
                                                                        <div class="col-md-12" style="float: none; margin: 0 auto;">
                                                                            <div class="form-group">
                                                                                <label class="bmd-label-floating">Name</label>
                                                                                <input type="text" id="name" class="form-control" name="name" value="{{$file->userName}}">
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
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <input type="submit" class="btn btn-primary btn-round" value="Send">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-cta" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a href="{{route('shareFile.show',$file->id)}}" class="btn btn-info btn-sm">Download</a>
                                                <button class="btn btn-danger btn-sm" onclick="deleteFunction({{ $file->id }})">Delete</button>
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
