@extends('template.temp')
@section('title', 'Login')
@section('css')

@endsection
@section('content')
<div class="card mt-5">
    <div class="card-body">
        <div class="container">
        @if (session('status'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <center>
            <strong>{{ session('status') }} </strong>
            </center>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{route('postlogin')}}" method="POST">
            @csrf
            @method('post')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection
@push('scripts')

@endpush
    