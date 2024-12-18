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
            <h3>Activity > {{$type}} Section</h3>
        </div>
    </div>

    <form class="form" action="{{ route('activity.submit', ['type' => $type]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-4 form form-group">
            <label class="form form-label">Title</label>
            <input class="form form-control" name="title" type="text" placeholder="Title....">
        </div>
        <div class="row mb-4 form form-group">
            <label class="form form-label">Subject</label>
            <input class="form form-control" name="subject" type="text" placeholder="Subject....">
        </div>
        <div class="row mb-4 form form-group">
            <label class="form form-label">Level</label>
            <select class="form form-control" name="level">
                <option class="form">Please select the level</option>
                <option class="form " value="1">Level 1</option>
                <option class="form " value="2">Level 2</option>
                <option class="form " value="3">Level 3</option>
                <option class="form " value="4">Level 4</option>
                <option class="form " value="5">Level 5</option>
            </select>
        </div>
        <div class="row mb-4 form form-group">
            <label class="form form-label">File</label>
            <input class="form form-control-file" name="file" type="file" placeholder="Choose a file to be uploaded">
        </div>
        
        <div class="row mb-4">
            <div class="col-lg-12">
                <button class="btn btn-primary" type="submit">Add {{$type}}</button>
            </div>
        </div>
    </form>

@endsection