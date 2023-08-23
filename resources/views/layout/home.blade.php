<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
        background-color: #fbf7fb;
        }

        /* Sidebar */
        .sidebar {
        position: fixed;
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
        width: 240px;
        z-index: 600;
        }

        @media (max-width: 991.98px) {
        .sidebar {
            width: 100%;
        }
        }
        .sidebar .active {
        border-radius: 5px;
        box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
        }

        .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: 0.5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
        }


    </style>
</head>
<body>
    <div class="container">
        <div class="col-10 mt-5 text-end mx-auto">
            @if (Auth::check())
            <div class="dropdown">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="rounded rounded-circle">
                        <img src="@if (Auth::user()->profile_pic == null) {{Avatar::create(Auth::user()->firstname ." ". Auth::user()->lastname)->toBase64()}} @else {{asset('user/images/'.Auth::user()->profile_pic)}} @endif" alt="avatar" class="rounded rounded-circle" height="50" width="50">
                    </div>
                </button>

                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{route('user.profile')}}">Profile</a></li>
                  <li><a class="dropdown-item" href="{{route('user.profile')}}">Change Password</a></li>
                  <li><a class="dropdown-item" href="{{route('user.logout')}}">Logout</a></li>
                </ul>
            </div>
            @else
                <div class="btn-group">
                    <a href="{{route('login')}}" class="btn btn-outline-secondary">Login</a>
                    &nbsp;
                    <a href="{{route('register')}}" class="btn btn-outline-secondary">Register</a>
                </div>
            @endif

        </div>
            <div class="col-10">
                @yield('yamayama')
            </div>
        </div>


    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
    @include('include.scripts')
</body>
</html>
