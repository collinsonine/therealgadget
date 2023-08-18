@extends('layout.home')
@section('title')
    Edit User
@endsection
@section('yamayama')
    <div class="col-10 mx-auto">
       <div class="card mt-4">
            <div class="card-header text-center h4">
                {{$users->firstname}} {{$users->lastname}} {{$users->othername}}
            </div>
            <div class="card-body">
                @if (Session::has('success'))
                   <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        <strong>Success!</strong> {{Session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
                @endif
                <form action="{{route('user.update', ['user' => encrypt($users->id)])}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="firstname" class="form-label">First Name:</label>
                                <input type="text" id="firstname" name="firstname" value="{{$users->firstname ? $users->firstname : old('firstname')}}" placeholder="Enter First Name" class="form-control" required>
                                @error('firstname')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="lastname" class="form-label">Last Name:</label>
                                <input type="text" id="lastname" name="lastname" value="{{$users->lastname}}" placeholder="Enter Last Name" class="form-control" required>
                                @error('lastname')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="othername" class="form-label">Other Name:</label>
                                <input type="text" id="othername" name="othername" value="{{$users->othername}}" placeholder="Enter Other Name" class="form-control" required>
                                @error('othername')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="gender" class="form-label">Gender:</label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value="{{'Select Gender' ?  $users->gender : ''}}"> {{'Select Gender' ?  $users->gender : ''}}</option>
                                    <option value="Male"> Male</option>
                                    <option value="Female"> Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" id="email" value="{{$users->email}}" name="email" placeholder="example@email.com" class="form-control" readonly>
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="dob" class="form-label">Date of Birth:</label>
                                <input type="date" class="form-control" date="{{\Carbon\Carbon::parse($users->dob)->format('YYYY-MM-DD')}}" id="dob" name="dob" required>
                                @error('dob')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="phone" class="form-label">Phone Number:</label>
                                <input type="tel" id="phone" name="phone" value="{{$users->phone}}" placeholder="1234567890" class="form-control" required>
                                @error('phone')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" value="{{$users->username}}" name="username" placeholder="Enter Username" required>
                                @error('username')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-secondary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
