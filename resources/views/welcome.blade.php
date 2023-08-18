@extends('layout.home')

@section('title')
    Landing Page
@endsection

@section('yamayama')
<div class="col-10 mx-auto bg-secondary-subtle mt-5">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header text-center h4">
                    Manage Users
                </div>
                <div class="card-body text-center">
                    <img src="{{asset('image/users.png')}}" alt="" width="250px" height="250px">
                </div>
                <div class="card-footer">
                    <div class="d-grid">
                        <a href="{{route('manage.users')}}" class="btn btn-secondary"> Manage</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header text-center h4">
                    Manage Comments
                </div>
                <div class="card-body text-center">
                    <img src="{{asset('image/comments.png')}}" alt="" width="250px" height="250px">
                </div>
                <div class="card-footer">
                    <div class="d-grid">
                        <a href="{{route('comment.all')}}" class="btn btn-secondary"> Manage</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
