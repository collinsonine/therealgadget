@extends('layout.user')

@section('title')
    User Profile
@endsection
@section('yamayama')
<div class="container mt-5">
    <div class="mt-5">
        <div class="card">

        </div>
    </div>
    <div class="">
        <div class="mt-3">
            @if (Session::has('success'))
               <div class="alert alert-success alert-dismissible fade show mb-3 mt-3" role="alert">
                    <strong>Success!</strong> {{Session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            @endif
            <div class="card">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Profile Pic</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Password</button>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <div>
                                        <div class="mb-3">
                                            <img src="@if (Auth::user()->profile_pic == null) {{Avatar::create(Auth::user()->firstname ." ". Auth::user()->lastname)->toBase64()}} @else {{asset('user/images/'.Auth::user()->profile_pic)}} @endif" alt="avatar" class="rounded rounded-circle border border-2 shadow" height="150" width="150">
                                        </div>
                                        <form action="{{route('user.update.profile.pic')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="file" name="file" class="form-control" id="inputGroupFile02">
                                                <button class="input-group-text" type="submit" for="inputGroupFile02">Upload</button>
                                                @error('file')
                                                  <small class="text-danger">{{$message}}</small>
                                                @enderror

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        <form action="" action="POST">
                            @csrf
                            <div class="row mb-3 mt-3">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="form-label" for="firstname"> First Name:</label>
                                        <input type="text" class="form-control" name="firstname" value="{{old('firstname') ? old('firstname') : Auth::user()->firstname}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="form-label" for="lastname"> Last Name:</label>
                                        <input type="text" class="form-control" name="lastname" value="{{old('lastname') ? old('lastname') : Auth::user()->lastname}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 mt-3">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="form-label" for="othername"> Middle Name:</label>
                                        <input type="text" class="form-control" name="othername" value="{{old('othername') ? old('othername') : Auth::user()->othername}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="form-label" for="email"> Email:</label>
                                        <input type="email" class="form-control" name="email" value="{{old('email') ? old('email') : Auth::user()->email}}" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 mt-3">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="form-label" for="phone"> Phone:</label>
                                        <input type="text" class="form-control" name="phone" value="{{old('phone') ? old('phone') : Auth::user()->phone}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="form-label" for="dob"> Date of Birth:</label>
                                        <input type="date" class="form-control" name="dob" value="{{old('dob') ? old('dob') : Auth::user()->dob}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 mt-3">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="form-label" for="gender"> Gender:</label>
                                        <select name="gender" id="gender" class="form-select" required>
                                            <option value="@if (Str::upper(Auth::user()->gender) == "MALE") Male @else Female @endif" @if (Str::upper(Auth::user()->gender) == "MALE") Checked @endif>@if (Str::upper(Auth::user()->gender) == "MALE") Male @else Female @endif</option>
                                            <option value="@if (Str::upper(Auth::user()->gender) == "FEMALE") Female @else Female @endif" @if (Str::upper(Auth::user()->gender) == "Female") Checked @endif>@if (Str::upper(Auth::user()->gender) == "FEMALE") Female @else Female @endif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group">
                                        <label for="form-label" for="username"> Username:</label>
                                        <input type="text" class="form-control" name="username" value="{{old('username') ? old('username') : Auth::user()->username}}" readonly required>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        <div class="mt-3">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="old-password"> Current Password</label>
                                    <input type="password" class="form-control" name="oldpassword" placeholder="********" required>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="password"> New Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="********"  required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="password"> Confirm New Password</label>
                                            <input type="password" class="form-control" name="password_confirmation" placeholder="********"  required>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>
@endsection
