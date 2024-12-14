@extends('layouts.main-layout')

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="d-flex justify-content-center align-items-center">
                <h2> Manage KAFA activities</h2>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-lg-12">
            <a class="btn btn-dark" href="{{route('activity.viewActivity', 'materials')}}">Materials</a>
            <a class="btn btn-dark" href="{{route('activity.viewActivity', 'quizzes')}}">Quizzes</a>
            <a class="btn btn-dark" href="{{route('activity.viewActivity', 'tuitions')}}">Tuition</a>
        </div>

    </div>

    <div class="row mb-4">
        <div class="col-lg-12">
            <img class="img-fluid" src="/images/umpsa.png" alt="School Logo">
        </div>
    </div>


@endsection