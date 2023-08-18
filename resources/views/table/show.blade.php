@extends('layout.home')
@section('title')
    View User
@endsection

@section('yamayama')
    <div class="col-10 mx-auto mt-4">
        <div class="card">
            <div class="card-header text-center h4">
                {{$users->firstname}} {{$users->lastname}} {{$users->othername}}
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div class="col-2 d-flex justify-content-center">
                       <div class="rounded rounded-circle border border-4 border-success h1 p-4 text-success">
                        {{substr($users->firstname,0,1)}}{{substr($users->lastname,0,1)}}
                    </div>
                    </div>
                </div>
                <div class="mt-3 h5">
                    <div class="mb-3">
                       <span class="text-muted">First Name: </span> <strong> {{$users->firstname}}</strong>
                    </div>
                    <div class="mb-3">
                       <span class="text-muted">Last Name: </span> <strong> {{$users->lastname}}</strong>
                    </div>
                    <div class="mb-3">
                       <span class="text-muted">Other Name: </span> <strong> {{$users->othername}}</strong>
                    </div>
                    <div class="mb-3">
                       <span class="text-muted">Email: </span> <strong> {{$users->email}}</strong>
                    </div>
                    <div class="mb-3">
                       <span class="text-muted">Gender: </span> <strong> {{$users->gender}}</strong>
                    </div>
                    <div class="mb-3">
                       <span class="text-muted">Age: </span> <strong> {{\Carbon\Carbon::parse($users->dob)->age}}</strong>
                    </div>
                    <div class="mb-3">
                       <span class="text-muted">Username: </span> <strong> {{$users->username}}</strong>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
