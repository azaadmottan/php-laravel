@extends('layouts.mentorDashboard')

@section('dashboardContent')
    
    @include('components.toast')

    <section class="border border-2 mb-2 p-4 rounded-3">
        <h2>Your Profile</h2>

        
        <div class="fs-4 fw-semibold my-3">
            Hello, 
            <span class="fw-bold">
                @if(Auth()->guard('mentor')->check())
                    {{ auth()->guard('mentor')->user()->mentorName }}
                @else
                    Guest
                @endif
            </span>
            <span class="badge text-bg-danger">Mentor</span>
            <span class="fw-semibold">Welcome to your personal dashboard.</span>
        </div>

        <div class="fs-5 row d-flex flex-column flex-md-row ">
            <div class="col p-3">
                Employee Id: <span class="fw-semibold">{{ auth()->guard('mentor')->user()->empId }}</span> 
            </div>
            <div class="col p-3">
                Department: <span class="fw-semibold">{{ auth()->guard('mentor')->user()->department }}</span>
            </div>
        </div>

        <div class="fs-5 row d-flex flex-column flex-md-row">
            <div class="col p-3">
                Email Id: <span class="fw-semibold">{{ auth()->guard('mentor')->user()->email }}</span> 
            </div>
            <div class="col p-3">
                Phone: <span class="fw-semibold">{{ auth()->guard('mentor')->user()->phone }}</span>
            </div>
        </div>

        <div class="fs-5 row d-flex flex-column flex-md-row">
            <div class="col p-3">
                Address: <span class="fw-semibold">{{ auth()->guard('mentor')->user()->address }}</span> 
            </div>
        </div>

        <div class="fs-5 row d-flex flex-column flex-md-row">
            <div class="col p-3">
                Account Created: <span class="fw-semibold">{{ auth()->guard('mentor')->user()->created_at }}</span> 
            </div>
            <div class="col p-3">
                Last Profile Update: <span class="fw-semibold">{{ auth()->guard('mentor')->user()->updated_at }}</span> 
            </div>
        </div>
    </section>

    <section class="border border-2 mb-2 p-4 rounded-3">
        <h4>Update Profile</h4>
        <form method="POST" id="profileForm">
        @csrf
        <div class="fs-5 row d-flex flex-column float-right flex-md-row">
            <div class="col p-3">
                <input type="text" name="mentorName" class="form-control shadow-none" placeholder="Update your name">
                <span class="text-danger" style="font-size: 14px;" id="mentorName"></span>
            </div>
            <div class="col p-3">
                <input type="text" name="department" class="form-control shadow-none" placeholder="Update your department">
                <span class="text-danger" style="font-size: 14px;" id="department"></span>
            </div>
        </div>

        <div class="fs-5 row d-flex flex-column float-right flex-md-row">
            <div class="col p-3">
                <input type="text" name="phone" class="form-control shadow-none" placeholder="Update your phone">
                <span class="text-danger" style="font-size: 14px;" id="phone"></span>
            </div>
            <div class="col p-3">
                <input type="text" name="email" class="form-control shadow-none" placeholder="Update your email-id">
                <span class="text-danger" style="font-size: 14px;" id="email"></span>
            </div>
        </div>

        <div class="fs-5 row d-flex flex-column float-right flex-md-row">
            <div class="col p-3">
                <input type="text" name="address" class="form-control shadow-none" placeholder="Update your address">
                <span class="text-danger" style="font-size: 14px;" id="address"></span>
            </div>
        </div>

        <div class="fs-5 row d-flex flex-column float-right flex-md-row">
            <div class="col p-3">
                <input type="submit" class="btn btn-primary" value="Update">
            </div>
        </div>
        </form>

    </section>

    <section class="border border-2 mb-2 p-4 rounded-3">
        <h4>Update Password</h4>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{asset('js/toast.js')}}"></script>

    <script>
    $(document).ready(function() {

        $('#profileForm').submit(function(e) {

            e.preventDefault();
            $.ajax({
                url: "{!! route('mentor.updateProfile') !!}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {

                    if (response.success) {
                        message("Profile updated successfully", "success");
                        $("profileForm").trigger("reset");
                    } else {
                        message("Failed to update profile", "danger");
                    }
                },
                error: function(data) {
                    console.log(data)
                    if(data.responseJSON.errors?.mentorName) {
                        $("#mentorName").text(data.responseJSON.errors.mentorName[0]);
                    }
                    if(data.responseJSON.errors?.department) {
                        $("#department").text(data.responseJSON.errors.department[0]);
                    }
                    if(data.responseJSON.errors?.phone) {
                        $("#phone").text(data.responseJSON.errors.phone[0]);
                    }
                    if(data.responseJSON.errors?.email) {
                        $("#email").text(data.responseJSON.errors.email[0]);
                    }
                    if(data.responseJSON.errors?.address) {
                        $("#address").text(data.responseJSON.errors.address[0]);
                    }
                }
            });
        });
    });
    </script>
@endsection