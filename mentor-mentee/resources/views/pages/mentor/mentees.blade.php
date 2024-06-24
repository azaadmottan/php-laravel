@extends('layouts.mentorDashboard')


@section('dashboardContent')
    
    @include('components.toast')

    <section class="border border-2 mb-2 p-4 rounded-3">
        <h2>Your Mentees</h2>
        
        <div class="overflow-x-auto">
            <table class="table table-striped table-hover">
                <thead>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Roll No</th>
                    <th>Branch</th>
                    <th>Semester</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>View</th>
                    <th>Remove</th>
                </thead>

                <tbody id="mentorMentees">
                </tbody>
            </table>
        </div>
    </section>

    <section class="border border-2 mb-2 p-4 rounded-3">
        <h2>All Mentees</h2>

        <div class="overflow-x-auto">
            <table class="table table-striped table-hover">
                <thead>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Roll No</th>
                    <th>Branch</th>
                    <th>Semester</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>View</th>
                    <th>Add</th>
                </thead>
                <tbody id="allMentees">
                </tbody>
            </table>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="profileModalLabel">Mentee Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row bg-body-tertiary p-1 rounded-2">
                    <div class="col">
                        Name: <span id="name" class="fw-bold"></span>
                    </div>
                    <div class="col">
                        Roll No: <span id="rollNo" class="fw-bold"></span>
                    </div>
                </div>
                <div class="row mt-2 bg-body-tertiary p-1 rounded-2">
                    <div class="col">
                        Course: <span id="course" class="fw-bold"></span>
                    </div>
                    <div class="col">
                        Branch: <span id="branch" class="fw-bold"></span>
                    </div>
                </div>
                <div class="row mt-2 bg-body-tertiary p-1 rounded-2">
                    <div class="col">
                        Semester: <span id="semester" class="fw-bold"></span>
                    </div>
                    <div class="col">
                        Mentor: <span id="mentor" class="fw-bold"></span>
                    </div>
                </div>
                <div class="row mt-2 bg-body-tertiary p-1 rounded-2">
                    <div class="col">
                        Phone: <span id="phone" class="fw-bold"></span>
                    </div>
                    <div class="col">
                        Email-id: <span id="email" class="fw-bold"></span>
                    </div>
                </div>
                <div class="row mt-2 bg-body-tertiary p-1 rounded-2">
                    <div class="col">
                        Father's Name: <span id="fatherName" class="fw-bold"></span>
                    </div>
                    <div class="col">
                        Father's Phone: <span id="fatherPhone" class="fw-bold"></span>
                    </div>
                </div>
                <div class="row mt-2 bg-body-tertiary p-1 rounded-2">
                    <div class="col">
                        Father's Profession: <span id="fatherProfession" class="fw-bold"></span>
                    </div>
                    <div class="col">
                        Address: <span id="address" class="fw-bold"></span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="{{asset('js/toast.js')}}"></script>

    <script>
    $(document).ready(function() {

        // show mentee profile data
        $('.viewUser').click(function(){

            let id = $(this).attr('id');

            $.ajax({
                url: "{!! route('getMenteeProfileData') !!}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(responseData){

                    $("#name").text(responseData.menteeName);
                    $("#rollNo").text(responseData.rollNo);
                    $("#course").text(responseData.course);
                    $("#branch").text(responseData.branch);
                    $("#semester").text(responseData.semester);
                    $("#mentor").text((responseData.mentor === "null") ? "Mentor Not Allocated" : responseData.mentor);
                    $("#phone").text(responseData.phone);
                    $("#email").text(responseData.email);
                    $("#fatherName").text(responseData.fatherName);
                    $("#fatherPhone").text(responseData.fatherPhone);
                    $("#fatherProfession").text(responseData.fatherProfession);
                    $("#address").text(responseData.address);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

        // show mentor mentee details
        $(document).on("click", ".viewMentee", function () {

            let id = $(this).data("id");

            $.ajax({
                url: "{!! route('getMenteeProfileData') !!}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(responseData){

                    $("#name").text(responseData.menteeName);
                    $("#rollNo").text(responseData.rollNo);
                    $("#course").text(responseData.course);
                    $("#branch").text(responseData.branch);
                    $("#semester").text(responseData.semester);
                    $("#mentor").text((responseData.mentor === "null") ? "Mentor Not Allocated" : responseData.mentor);
                    $("#phone").text(responseData.phone);
                    $("#email").text(responseData.email);
                    $("#fatherName").text(responseData.fatherName);
                    $("#fatherPhone").text(responseData.fatherPhone);
                    $("#fatherProfession").text(responseData.fatherProfession);
                    $("#address").text(responseData.address);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

        // get all mentees
        function getAllMentees() {
            $.ajax({
                url: "{!! route('getAllMentees') !!}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(responseData){

                    if (responseData.length > 0) {
                        $("#allMentees").empty();

                        $.each(responseData, function(index, data) {
                            $("#allMentees").append(`
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${data.menteeName}</td>
                                    <td>${data.rollNo}</td>
                                    <td>${data.branch}</td>
                                    <td>${data.semester}</td>
                                    <td>${data.phone}</td>
                                    <td>${data.email}</td>
                                    <td><button class="btn btn-primary viewMentee" data-bs-toggle="modal" data-bs-target="#profileModal" data-id="${data.id}">View</button></td>
                                    <td><button class="btn btn-success addMentee" data-id="${data.id}">Add</button></td>
                                </tr>
                            `);
                        });
                    }
                    else {
                        $("#allMentees").empty();

                        $("#allMentees").append("<tr><th colspan='9' class='text-center'>No More Mentees !</th></tr>");
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        }
        getAllMentees();

        // get mentees of mentor
        function getMentorMentees() {
            $.ajax({
                url: "{!! route('getMentorMentees') !!}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(responseData){

                    if (responseData.length > 0) {
                        $("#mentorMentees").empty();

                        $.each(responseData, function(index, data) {
                            $("#mentorMentees").append(`
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${data.menteeName}</td>
                                    <td>${data.rollNo}</td>
                                    <td>${data.branch}</td>
                                    <td>${data.semester}</td>
                                    <td>${data.phone}</td>
                                    <td>${data.email}</td>
                                    <td><button class="btn btn-primary viewMentee" data-bs-toggle="modal" data-bs-target="#profileModal" data-id="${data.id}">View</button></td>
                                    <td><button class="btn btn-danger removeMentee" data-id="${data.id}">Remove</button></td>
                                </tr>
                            `);
                        });
                    }
                    else {
                        $("#mentorMentees").empty();

                        $("#mentorMentees").append("<tr><th colspan='9' class='text-center'>Mentees Not Found !</th></tr>");
                    }
                },
                error: function(data){
                    console.log(data);
                }
            })
        }
        getMentorMentees();

        // add mentee
        $(document).on("click", ".addMentee", function addMentee() {
            
            let id = $(this).data("id");

            $.ajax({
                url: "{!! route('addMentee') !!}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(responseData){

                    if (responseData.success) {
                        getMentorMentees();
                        getAllMentees();

                        message("Mentee added successfully", "success");
                    }
                    else {
                        message("Failed to add mentee !", "error");
                    }
                },
                error: function(data) {
                    message("Something went wrong", "error");
                }
            })
        });

        // remove mentee
        $(document).on("click", ".removeMentee", function removeMentee() {
            
            let id = $(this).data("id");

            $.ajax({
                url: "{!! route('removeMentee') !!}",
                method: "POST",
                data: {
                    id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(responseData){

                    if (responseData.success) {
                        getMentorMentees();
                        getAllMentees();

                        message("Mentee remove successfully", "success");
                    }
                    else {
                        message("Failed to remove mentee !", "danger");
                        console.log(responseData)
                    }
                },
                error: function(data) {
                    console.log(data)

                    message("Something went wrong", "danger");
                }
            })
        });
    });
    </script>
@endsection