<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Dashboard ({{ Auth::guard('mentor')->user()->mentorName }})</title>
    <link rel="shortcut icon" href="http://www.srisaigroup.in/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        
        .footer {
            width: 100%;
            background-color: #343a40; 
            color: #fff; 
            font-weight: 400;
            text-align: center;
            border-radius: 10px;
            padding: 10px;
        }
        .sidebar {
            height: 93vh;
            position: sticky;
            top: 55px;
        }

        .sidebar p {
            margin: 5px 0px;
        }
        .sidebar>p>a {
            width: 100%;
            padding: 10px;
            font-size: 17 me-2px;
            text-decoration: none;
            color: #fff; 
            display: block;
        }
        
        .sidebar>p:hover {
            border-radius: 8px;
            background-color: #495057; 
        }

    </style>
<body>

<!-- Header -->
<nav class="navbar navbar-expand-lg bg-dark sticky-top" data-bs-theme="dark">
    <div class="container-fluid d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('home') }}">Sri Sai Group of Institute</a>
        
        <div class="btn-group">
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                <i class="fa-solid fa-list"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><a class="dropdown-item me-2" href="{{ route('mentorDashboard.profile') }}"><i class="fa-solid me-2
                    me-2 fa-user"></i>Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa-solid me-2 fa-gear"></i>Settings</a></li>
            <li><a class="dropdown-item" href="{{ route('logoutMentor') }}"><i class="fa-solid me-2 fa-right-from-bracket"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="main-section d-flex flex-md-row flex-col">

    <!-- Sidebar -->
    <div class="sidebar col-md-2 bg-dark p-3 flex-col">
        <p class="item">
            <a href="{{ route('mentorDashboard.home') }}"><i class="fas fa-home me-2"></i> Home</a>
        </p>
        <p class="item">
            <a href="{{ route('mentorDashboard.mentees') }}">
                <i class="fa-solid fa-users me-3"></i>Mentees
            </a>
        </p>
        <p class="item">
            <a href="">
                <i class="fa-solid fa-clipboard-question me-3"></i>Queries
            </a>
        </p>
        <p class="item">
            <a href="">
                <i class="fa-solid fa-angles-right me-3"></i>More
            </a>
        </p>
        <p class="item">
            <a href="#"><i class="fas fa-chart-bar me-2"></i> Analytics</a>
        </p>
        <p class="item">
            <a href="#"><i class="fas fa-cog me-2"></i> Settings</a>
        </p>
    </div>
    
    <!-- Content -->
    <div class="content col-md-10 p-3">
        
        @yield('dashboardContent')

        <!-- Footer -->
        <div class="footer">
            <p>&copy; 2022 Dashboard. All rights reserved.</p>
        </div>
    </div>

</div>


<!-- Bootstrap JS -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
