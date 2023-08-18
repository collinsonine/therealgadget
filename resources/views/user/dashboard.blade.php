@extends('layout.home')

@section('title')
    User Dashboard
@endsection
@section('yamayama')
    <div class="col-10 mx-auto mt-5">
        <div class="card">
            <div class="card-body">
                <marquee behavior="" direction="">
               <p class="h5 text-muted">Welcome {{Auth::user()->firstname}} {{Auth::user()->lastname}} {{Auth::user()->othername}}</p>
               </marquee>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                @include('user.include.sidebar')
            </div>
            <div class="col-8">

            </div>
        </div>

        </div>
    </div>
@endsection
