@extends('template.temp')
@section('title', 'Company')
@section('css')

@endsection
@section('content')
<div class="card mt-5">
    <div class="card-header">
        <h2>
            Data Company
        </h2>
        <center>
            <a href="{{ route('add.company') }}" class="btn btn-primary">Tambah data</a>
        </center>
    </div>
    <div class="card-body">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Desc</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($company as $c)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{asset('storage/app/public/'.$c->logo)}}" alt="" style="width:100px; height=100px">
                            </td>
                            <td>{{ $c->title }}</td>
                            <td>{{ $c->desc }}</td>
                            <td nowrap="nowrap">
                                <a href="{{ route('edit.company', ['company' => $c->id]) }}" class="badge bg-warning">Edit</a>
                                <a href="{{ route('delete.company', $c->id) }}" class="badge bg-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
@push('scripts')

@endpush
    