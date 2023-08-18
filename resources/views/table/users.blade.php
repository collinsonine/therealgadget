@extends('layout.home')

@section('title')
    Manage Users
@endsection

@section('yamayama')
<div class="col-10 mx-auto">
    <div class="card mt-4">
        <div class="card-header text-center h4">
            All Users
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                   <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                        <strong>Success!</strong> {{Session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
                @endif
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">

                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->username}}</td>
                                <td>{{$user->lastname}} {{$user->firstname}} {{$user->othername}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{\Carbon\Carbon::parse($user->dob)->age}}</td>
                                <td><div class="btn-group">
                                    <a href="{{route('user.show', ['user' => encrypt($user->id)])}}" class="btn btn-primary"> View</a>
                                    &nbsp;
                                    <a href="{{route('user.edit', ['user' => encrypt($user->id)])}}" class="btn btn-info"> Update</a>
                                    &nbsp;
                                    <a href="" class="btn btn-danger"> Delete</a>
                                    </div></td>
                            </tr>
                        @endforeach

                    </tbody>
                  </table>
            </div>
            <div class="d-flex justify-content-center">
                {{$users->links()}}
            </div>



        </div>
    </div>
</div>

@endsection
