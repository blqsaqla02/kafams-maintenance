
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @extends('layouts.main-layout')
    
    @section('content')
    <title>Index Bulletin</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #004d00;
            /* Dark green color */
            padding-top: 20px;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .content {
            margin-left: 220px;
            /* Same as the width of the sidebar */
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('profile.index') }}">Students Profile</a>
        <a href="{{ route('activities.index') }}">KAFA activities</a>
        <a href="{{ route('results.index') }}">Students Result</a>
        <a href="{{ route('bulletin.index') }}">KAFA Bulletin</a>
    </div>

    <div class="content">
        @yield('content')
        index Bulletin
    </div>

    <!-- Bootstrap JS and dependencies (jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>