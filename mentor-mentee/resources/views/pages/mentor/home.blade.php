@extends('layouts.mentorDashboard')

@section('dashboardContent')
    
    <section class="border border-2 mb-2 p-4 rounded-3">
        <h2>Mentor Dashboard</h2>

        
        <div class="fs-4 fw-semibold my-3">
            Hello, 
            <span class="fw-bold">
                @if(Auth()->guard('mentor')->check())
                    {{ auth()->guard('mentor')->user()->mentorName }}
                @else
                    Guest
                @endif
            </span>
            <span class="fw-semibold">Welcome to your Mentor Hub!</span>
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
            <div class="col p-3">
                Last Profile Update: <span class="fw-semibold">{{ auth()->guard('mentor')->user()->updated_at }}</span> 
            </div>
        </div>
        {{-- {{ auth()->guard('mentor')->user() }} --}}
    </section>

@endsection