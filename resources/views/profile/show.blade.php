
@extends('layouts.mainAdmin-layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between pb-0">
                    <h6>Student's Profile</h6>
                    <div class="profile-container p-4">
                        <div class="profile-details">
                            <div class="mb-3">
                                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</h6>
                                <p class="mb-0">{{$profile->student_name }}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gender</h6>
                                <p class="mb-0">{{$profile->gender }}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</h6>
                                <p class="mb-0">{{ $profile->address }}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Parent's Name</h6>
                                <p class="mb-0">{{$profile->parent_name }}</p>
                            </div>
                            <div class="mb-3">
                                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact No</h6>
                                <p class="mb-0">{{$profile->contact_no }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


  