@extends('layout.home')
@section('title')
    Register
@endsection
@section('yamayama')
    <div class="col-10 mx-auto">
       <div class="card mt-4">
            <div class="card-header text-center h4">
                Register
            </div>
            <div class="card-body">
                <form action="{{route('doregister')}}" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="firstname" class="form-label">First Name:</label>
                                <input type="text" id="firstname" name="firstname" value="{{old('firstname')}}" placeholder="Enter First Name" class="form-control" required>
                                @error('firstname')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="lastname" class="form-label">Last Name:</label>
                                <input type="text" id="lastname" name="lastname" value="{{old('lastname')}}" placeholder="Enter Last Name" class="form-control" required>
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
                                <input type="text" id="othername" name="othername" value="{{old('othername')}}" placeholder="Enter Other Name" class="form-control">
                                @error('othername')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="gender" class="form-label">Gender:</label>
                                <select name="gender" id="gender" class="form-select" required>
                                    <option value=""> Select Gender</option>
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
                                <input type="email" id="email" value="{{old('email')}}" name="email" placeholder="example@email.com" class="form-control" required>
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="dob" class="form-label">Date of Birth:</label>
                                <input type="date" class="form-control" value="{{old('dob')}}" id="dob" name="dob" required>
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
                                <input type="tel" id="phone" name="phone" value="{{old('phone')}}" placeholder="1234567890" class="form-control" required>
                                @error('phone')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" value="{{old('username')}}" name="username" placeholder="Enter Username" required>
                                @error('username')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="row">
                            <div class="col">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" id="password" name="password" value="{{old('password')}}" class="form-control" placeholder="******" required>
                                @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="password" class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control" id="password" value="{{old('password_confirmation')}}" name="password_confirmation" placeholder="******" required>
                                @error('password')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-secondary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
