@extends('layout.home')
@section('title')
    Login
@endsection

@section('yamayama')
    <div class="col-10 mt-4 mx-auto">
        <div class="card">
            <div class="card-header h4 text-center">
                Login
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                   <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        <strong>Success!</strong> {{Session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
                @endif
                @if (Request::has('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                    <strong>Error!</strong> {{Request('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @error('email')
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                    <strong>Error!</strong> {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
                <form action="{{route('dologin')}}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="form-label"> Email:</label>
                        <input type="email" class="form-control" value="{{old('email')}}" name="email" id="email" placeholder="example@email.com" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label"> password:</label>
                        <input type="password" class="form-control" value="" name="password" id="password" placeholder="******" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-secondary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
