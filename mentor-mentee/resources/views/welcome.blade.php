<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SSGI (srisaigroup.in) India</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .navbar-dark {
            background-color: #03092c;
        }
        .navbar-brand {
            font-size: 1.3rem;
            font-weight: 600;
        }
        .nav-item{
            color: #fff;
            font-size: 18px;
            font-weight: 500;
        }

        .hero {
            /* background-color: #041293; */
            /* height: 90vh; */
            background: linear-gradient(rgb(0, 157, 255), rgb(1, 1, 73));
            color: #fff;
            padding: 100px 0;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .hero h4 {
            font-size: 1.2rem;
            letter-spacing: 1.5px;
            font-weight: 400;
        }

        .btn-get-started {
            background-color: #03092c;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-get-started:hover {
            background-color: #0627ff;
            color: #fff;
        }
    </style>
</head>
<body>

    <header id="header" class="header sticky navbar-dark">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand fs-2" href="/">
                    {{-- <img src="assets/img/logo.png" alt="Logo" height="30"> --}}
                    Sri Sai Group of Institutes
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#hero">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            @if(!(Session::get('user.userStatus')))
                                <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                            @else
                                <a class="nav-link" href="{{ route(Session::get('user.userType').'Dashboard') }}">Dashboard</a>
                            @endif

                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="mb-4">We offer modern solutions for growing your knowledge.</h1>

                    <h4 class="mb-4">The Management of Sri Sai Group of Institutes believes in walking an extra mile from others in order to make the campuses vibrant, happening and ahead of other Groups.</h4>
                    
                    @if(!(Session::get('user.userStatus')))
                        <a href="{{ route('login') }}" class="btn btn-primary btn-get-started">Get Started Now</a>
                    @endif
                </div>
                <div class="col-lg-6 d-flex justify-content-center justify-content-lg-end">
                    <img src="images/hero-img.png" class="img-fluid" alt="Hero Image">
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>