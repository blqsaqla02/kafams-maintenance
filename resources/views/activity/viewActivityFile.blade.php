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
            <h3>Activity > View {{$activity->activityType}} Section</h3>
        </div>
    </div>
        
    <div class="row mb-4 form form-group">
        <label class="form form-label">Title</label>
        <input class="form form-control" name="title" type="text" placeholder="Title...." value="{{$activity->activityTitle}}" readonly>
    </div>
    <div class="row mb-4 form form-group">
        <label class="form form-label">Subject</label>
        <input class="form form-control" name="subject" type="text" placeholder="Subject...." value="{{$activity->activitySubject}}" readonly>
    </div>
    <div class="row mb-4 form form-group">
        <label class="form form-label">Level</label>
        <select class="form form-control" name="level" readonly>
            <option class="form">Please select the level</option>

            @foreach ($levels as $level)
                <option class="form " value="{{ $level }}" 
                    @if ($level == old('level', $activity->activityLevel))
                        selected="selected"
                    @endif > 
                    Level {{$level}}
                </option>
            @endforeach

        </select>
    </div>
    <div class="row mb-4 form form-group">
        <label class="form form-labeel">Current File: </label>
        <input class="form form-control" name="prevFile" type="text" value="{{$activityFile}}" readonly>
    </div>
    
    <div class="row mb-4">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{ route('activity.viewActivity', ['type' => $activity->activityType]) }}">Back</a>
        </div>
    </div>

@endsection