<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('user/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.3/chart.min.js">
    <style>
        body {
        background-color: #fbf7fb;
        }

    </style>
    @yield('style')
</head>
    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="header_img"> <img src="@if (Auth::user()->profile_pic == null) {{Avatar::create(Auth::user()->firstname ." ". Auth::user()->lastname)->toBase64()}} @else {{asset('user/images/'.Auth::user()->profile_pic)}} @endif" alt=""> </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav1">
                <div> <a href="#" class="nav_logo1" style="text-decoration: none"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">The Real Gadgets</span> </a>
                    <div class="nav_list">
                        <a href="{{route('user.dashboard')}}" style="text-decoration: none" class="nav_link1 @if(Request::is('user/dashboard')) active @endif"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="{{route('user.profile')}}" style="text-decoration: none" class="nav_link1 @if(Request::is('user/profile')) active @endif"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Profile</span> </a>
                        <a href="{{route('user.chat')}}" style="text-decoration: none" class="nav_link1 @if(Request::is('user/chat')) active @endif"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span> </a>
                        <a href="#" class="nav_link1" style="text-decoration: none">  <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Friends</span> </a>
                        <a href="#" class="nav_link1" style="text-decoration: none"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">Files</span> </a>
                        <a href="#" class="nav_link1" style="text-decoration: none"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Stats</span> </a>
                    </div>
                </div> <a href="{{route('user.logout')}}" class="nav_link1" style="text-decoration: none"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100">
            @yield('yamayama')
        </div>

        <!--Container Main end-->
        <script src="{{asset('user/js/main.js')}}"></script>
        <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.3/chart.js"></script>
        @yield('scripts')
</body>
</html>
