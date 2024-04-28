<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            /* height: 80vh; */
            /* width: 70vw; */
            display: flex;
            align-items: center;
            background: #f4f4ff;
        }
        .login-form {
            padding: 40px;
        }
        .login-form img {
            width: 100%;
            height: auto;
        }
        .form-group label {
            font-size: 18px;
            font-weight: 500;
        }
        .form-group input, select {
            font-size: 18px;
            font-weight: 400;
        }
        input[type="submit"] {
            font-size: 20px;
            font-weight: 500;
            letter-spacing: 1.5px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row login-container shadow p-3 mb-5 bg-body-tertiary rounded">
            <!-- Image Section -->
            <div class="col-md-6">
                <img src="{{ asset('images/loginpageimg.png') }}" alt="Image" class="img-fluid">
            </div>
            <!-- Login Form Section -->
            <div class="col-md-6 login-form">
                <h2 class="mb-4">Sign In Now</h2>

                @if(session()->has('successRegister'))
                    <div class="alert alert-success">
                        <strong>
                            {{ session()->get('successRegister') }}
                        </strong>
                    </div>
                @endif

                @if(session()->has('errorLogin'))
                    <div class="alert alert-danger">
                        <strong>
                            {{ session()->get('errorLogin') }}
                        </strong>
                    </div>
                    
                @endif

                <form action="{{ route('loginUser') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="select-option">Select User Type</label>
                        <select class="form-group form-select shadow-none @error('userType') is-invalid @enderror" name="userType" aria-label="Default select example">
                            <option value="">Select Type</option>
                            <option value="admin">Admin</option>
                            <option value="mentor">Mentor</option>
                            <option value="mentee">Mentee</option>
                        </select>
                        <span class="text-danger">
                            @error('userType')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" value="{{ old('email') }}" class="form-control shadow-none @error('email') is-invalid @enderror" name="email" placeholder="Enter username">
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror" name="password" placeholder="Enter password">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    
                    <div class="form-group mt-4 mb-4">
                        Don't have an account? <a href="{{ route('signUp') }}">Sign Up</a>
                    </div>

                    <input type="submit" value="Login" class="form-control shadow-none btn btn-primary w-full submit" />

                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>