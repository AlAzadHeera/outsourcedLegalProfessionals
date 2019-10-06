@extends('layouts.app')

@section('title','File(s)')

@push('css')
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Send File(s)</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table_id">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Rec/Sent</th>
                                    <th>Name</th>
                                    <th>Note</th>
                                    <th>File</th>
                                    <th>Date</th>
                                    <th>Time</th>
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
                                            <td>{{\Carbon\Carbon::parse($file->created_at)->format('d/m/Y')}}</td>
                                            <td>{{ \Carbon\Carbon::parse($file->created_at)->diffForHumans() }}</td>
                                            <td class="text-primary">
                                                <a class="btn btn-info btn-sm" href="{{ route('shareFile.show',$file->id) }}">Download</a>
                                                <a class="btn btn-cta btn-sm" href="{{ route('shareFile.edit',$file->userID) }}">History</a>
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
            $('#table_id').DataTable();
        } );

    </script>
@endpush
