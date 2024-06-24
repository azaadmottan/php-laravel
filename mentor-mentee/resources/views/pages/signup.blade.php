<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-3 border border-2 p-4 rounded-3">
        <h2 class="mb-4">Sign Up Now</h2>

        @if(session()->has('errorRegister'))
            <div class="alert alert-success">
                <strong>
                    {{ session()->get('errorRegister') }}
                </strong>
            </div>
        @endif

        <select class="form-select shadow-none my-4" name="selectSignUpType" id="selectSignUpForm" aria-label="Default select example">
            <option value="">Select Sign Up Form Type</option>
            <option value="mentor">Mentor</option>
            <option value="mentee">Mentee</option>
        </select>

        <form id="mentorRegisterForm" action="{{ route('registerMentor') }}" method="POST">
            @csrf
            <div class="row d-flex flex-column flex-md-row">
                <div class="col p-3">
                    <label for="name" class="form-label fw-medium">Name</label>
                    <input type="text" value="{{ old('mentorName') }}" name="mentorName" class="form-control border-2 shadow-none @error('mentorName') is-invalid @enderror" placeholder="Enter your name">
                    <span class="text-danger">
                        @error('mentorName')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
                <div class="col p-3">
                    <label for="empId" class="form-label fw-medium">Employee Id</label>
                    <input type="text" name="empId" class="form-control border-2 shadow-none" placeholder="Enter your employee id" >
                </div>
            </div>

            <div class="row d-flex flex-column flex-md-row">
                <div class="col p-3">
                    <label for="department" class="form-label fw-medium">Department</label>
                    <select name="department" name="department" class="form-control border-2 shadow-none pointer" required>
                        <option value="none" default>Select Department</option>
                        <option value="CSE">Computer Science & Engg</option>
                        <option value="ECE">Electrical Communication Engg</option>
                        <option value="EE">Electrical Engg</option>
                        <option value="ME">Mechanical Engg</option>
                        <option value="CE">Civil Engg</option>
                        <option value="MCA">MCA</option>
                        <option value="MBA">MBA</option>
                        <option value="BCA">BCA</option>
                        <option value="BBA">BBA</option>
                        <option value="B.Sc(IT)">B.Sc(IT)</option>
                        <option value="BHMCT">BHMCT</option>
                    </select>
                </div>
            </div>

            <div class="row d-flex flex-column flex-md-row">
                <div class="col p-3">
                    <label for="phone" class="form-label fw-medium">Mobile No.</label>
                    <input type="number" name="mentorPhone" class="form-control border-2 shadow-none" placeholder="Enter your mobile number" >
                </div>
                <div class="col p-3">
                    <label for="email" class="form-label fw-medium">Email id</label>
                    <input type="email" name="mentorEmail" class="form-control border-2 shadow-none" placeholder="Enter your email id" >
                </div>
            </div>
            
            <div class="row d-flex flex-column flex-md-row">
                <div class="col p-3">
                    <label for="address" class="form-label fw-medium">Permanent Address</label>
                    <textarea type="text" name="mentorAddress" class="form-control border-2 shadow-none" placeholder="Enter your permanent address" ></textarea>
                </div>
                    
            </div>
            <div class="row d-flex flex-column flex-md-row">
                <div class="col p-3">
                    <label for="password" class="form-label fw-medium">Password</label>
                    <input type="text" name="mentorPassword" class="form-control border-2 shadow-none" placeholder="Create your password" >
                </div>
                    
                <div class="col p-3">
                    <label for="confirmPassword" class="form-label fw-medium">Confirm Password</label>
                    <input type="text" name="mentorConfirmPassword" class="form-control border-2 shadow-none" placeholder="Confirm your password" >
                </div>
            </div>
            

            <div class="links mt-3">
                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
            </div>

            <div class="registerBtn">
                <input type="submit" id="register" class="btn btn-primary" value="Sign Up">
            </div>
        </form>

        <form id="menteeRegisterForm" action="{{ route('registerMentee') }}" method="POST" enctype="multipart/form-data" style="display: none">
            @csrf
            <div class="row mb-2">
                <div class="form-group col-md-6">
                    <label for="menteeName">Mentee Name</label>
                    <input type="text" class="form-control @error('menteeName') is-invalid @enderror" name="menteeName" required>
                    <span class="text-danger">
                        @error('menteeName')
                            $message
                        @enderror
                    </span>
                </div>
                <div class="form-group col-md-6">
                    <label for="rollNo">Roll No</label>
                    <input type="text" class="form-control @error('rollNo') is-invalid @enderror" name="rollNo" required>
                    <span class="text-danger">
                        @error('rollNo')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group col-md-6">
                    <label for="course">Course</label>
                    <input type="text" class="form-control" name="course" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" name="branch" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group col-md-6">
                    <label for="semester">Semester</label>
                    <input type="text" class="form-control" name="semester" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="mentor">Mentor</label>
                    <select class="form-select" name="mentor" id="selectSignUpForm" aria-label="Default select example">
                        <option value="">Select Your Mentor</option>
                        @if(count($mentors) > 0)
                            @foreach($mentors as $mentorName => $id)
                                <option value="{{ $id }}">{{ $mentorName }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group col-md-6">
                    <label for="menteePhone">Phone</label>
                    <input type="text" class="form-control" name="menteePhone" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="menteeEmail">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                    <span class="text-danger">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group col-md-6">
                    <label for="fatherName">Father's Name</label>
                    <input type="text" class="form-control" name="fatherName" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="fatherPhone">Father's Phone</label>
                    <input type="text" class="form-control" name="fatherPhone" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="form-group col-md-6">
                    <label for="fatherProfession">Father's Profession</label>
                    <input type="text" class="form-control" name="fatherProfession" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-md-6">
                    <label for="profilePic">Profile Picture</label>
                    <input class="form-control" type="file" name="profilePicture">
                </div>
                <div class="form-group col-md-6">
                    <label for="menteePassword">Password</label>
                    <input type="password" class="form-control @error('menteePassword') is-invalid @enderror" name="menteePassword" required>
                    <span class="text-danger">
                        @error('menteePassword')
                            {{ $message }}
                        @enderror
                    </span>
                </div>
            </div>
            <div class="row my-4">
                <span>
                    Already have an account? <a href="{{ route('login') }}">Login</a>
                </span>
            </div>
            <input type="submit" class="btn btn-primary" value="Sign Up" />
        </form>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            
            $("#selectSignUpForm").on("change", function() {
                if ($(this).val() === "mentor") {
                    $("#mentorRegisterForm").css("display", "block");
                    $("#menteeRegisterForm").css("display", "none");
                }
                else {
                    $("#menteeRegisterForm").css("display", "block");
                    $("#mentorRegisterForm").css("display", "none");
                }
            });
        });
    </script>

</body>
</html>