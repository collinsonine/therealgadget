@extends('layout.user')
@section('title')
    Verify Email
@endsection
@section('yamayama')
    <div class="container mt-5">
        <div class="card mt-5">

        </div>
        <div class="col-10 mx-auto">
           <div class="card mt-5">
            <div class="card-body">
                <p class="text-success text-center">Thank you for signing up, please verify your email</p>
                <p class="text-success text-center">A six digit code has been sent to {{Auth::user()->email}}, Please check!</p>
                @error('code')
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                    <strong>Error!</strong> {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
                <div class="col-6 mx-auto">
                    <form action="{{route('user.email.confirm')}}" method="post">
                        @csrf
                        <div class="form-group mt-3 mb-3">
                            <label for="code" class="form-label"> Verification Code:</label>
                            <input type="text" name="code" id="code" class="form-control" required>
                        </div>
                        <div class="d-grid mb-3">
                            <button class="btn btn-primary" type="submit">Verify</button>
                        </div>
                    </form>
                </div>
                <p class="text-center">Did not recieve code? <a href="{{route('user.send.verify.mail')}}"> Resend</a></p>
            </div>

            </div>
        </div>


    </div>
@endsection
