@extends('layout.home')

@section('title')
    Comment Section
@endsection

@section('yamayama')
    <div class="col-10 mx-auto mt-5">
        <div class="card">
            <div class="card-header text-center h4">
                Comment Section
            </div>
            <div class="card-body">
                <form action="{{route('comment.post')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" name="comment" class="form-control @error('comment') is-invalid @enderror" value="{{old('comment')}}" placeholder="Enter Your Comment Here" >
                                @error('comment')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-2">
                                <input type="submit" class="btn btn-secondary" value="Post">
                            </div>
                        </div>
                    </div>
                </form>
                <hr>
                @if (Session::has('success'))
                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{Session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                   </div>
                @endif

                @if (session('comments'))
                @foreach (session('comments') as $key => $comment)
                <div class="card mb-2">
                    <div class="card-header d-flex justify-content-between">
                        <div><strong> {{$comment['name']}} </strong> - <small class="text-muted">{{\Carbon\Carbon::parse($comment['time'])->diffForHumans()}}</small></div>
                        <div class="text-danger"><a class="btn text-danger" href="{{route('comment.delete', ['id' => encrypt($key)])}}">x</a></div>
                    </div>
                    <div class="card-body">
                        {{$comment['body']}}
                    </div>
                </div>
                @endforeach
                @endauth



            </div>
        </div>
        <a href="{{route('home')}}" class="btn"><< Back to</a>
    </div>

@endsection
