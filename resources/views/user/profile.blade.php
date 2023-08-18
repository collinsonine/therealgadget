@extends('layout.home')

@section('title')
    User Profile
@endsection
@section('yamayama')
    <div class="col-10 mx-auto mt-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-3">
                @include('user.include.sidebar')
            </div>
            <div class="col-9 mt-3">
                @if (Session::has('success'))
                   <div class="alert alert-success alert-dismissible fade show mb-3 mt-3" role="alert">
                        <strong>Success!</strong> {{Session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
                @endif
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
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">...</div>

                  </div>
            </div>
        </div>

        </div>
    </div>
@endsection
