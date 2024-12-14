<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAFAMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            height: 100%;
            width: 220px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #004d00;
            padding-top: 20px;
            transition: width 0.3s;
        }
        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: background-color 0.3s, color 0.3s;
        }
        .sidebar a:hover {
            background-color: #006600;
            color: #f1f1f1;
        }
        .sidebar a.active {
            background-color: #005500;
            color: white;
        }
        .sidebar h2 {
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }
        .content {
            margin-left: 240px;
            padding: 20px;
            background-color: #f9f9f9;
            min-height: 100vh; /* Ensure content takes full height */
        }
        .navbar {
            background-color: #004d00;
            color: white;
            padding: 10px 20px;
            margin-bottom: 20px;
        }
        .navbar h1 {
            margin: 0;
            font-size: 24px;
        }
        .container-fluid {
            padding: 0 15px;
        }
        /* Responsive design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }
            .sidebar a {
                float: left;
            }
            .content {
                margin-left: 0;
            }
        }
        @media (max-width: 480px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>KAFAMS</h2>
    <a href="{{ route('home.student') }}" class="{{ Request::routeIs('home.student') ? 'active' : '' }}">Home</a>
    <a href="{{ route('profile.index2') }}" class="{{ Request::routeIs('profile.index2') ? 'active' : '' }}">Students Profile</a>
    <a href="{{ route('activities.main') }}" class="{{ Request::routeIs('activities.main') ? 'active' : '' }}">KAFA Activities</a>
    <a href="{{ route('results.index') }}" class="{{ Request::routeIs('results.index') ? 'active' : '' }}">Students Results</a>
    <a href="{{ route('bulletin.indexBulletin') }}" class="{{ Request::routeIs('bulletin.indexBulletin') ? 'active' : '' }}">KAFA Bulletin</a>
</div>

<div class="content">
        <div class="navbar">
            <h1>KAFA Management System</h1>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a style="color:#f1f1f1" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        @yield('content')
    </div>

<!-- Bootstrap JS and dependencies (jQuery and Popper.js) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
