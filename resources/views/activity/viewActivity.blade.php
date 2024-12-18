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
            <a class="btn btn-dark" href="{{route('activity.viewActivity', 'tuitions')}}">Tuitions</a>
        </div>

    </div>
    <div class="row mb-4">
        <div class="col-lg-12">
            <h3>Activity > {{$type}} Section</h3>
        </div>
    </div>

    <div class="row mb-2">
        <table class="table table-dark">
            <thead class="text-center">
                <tr>
                    <th>Subject</th>
                    <th>Low-Level</th>
                    <th>High-Level</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @if($activities->count() > 0)
                    @foreach ($activities as $activity)
                        <form class="">
                        @csrf

                        </form>
                        <tr>
                            <td>{{$activity->activitySubject}}</td>
                            <td>
                                @if ($activity->activityLevel < 4)
                                    <h4>{{ $activity->activityTitle }}</h4>
                                    
                                    <form class="form" method="POST" action="{{route('activity.deleteActivity', ['type' => $activity->activityType, 'activity' => $activity])}}">
                                        <a class="btn btn-primary" href="{{ route('activity.viewActivityFile', ['type' => $activity->activityType, 'activity' => $activity]) }}">View file</a>
                                        <a class="btn btn-primary" href="{{ route('activity.editActivity', ['type' => $activity->activityType, 'activity' => $activity])}}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                @endif
                            </td>
                            <td>
                                @if ($activity->activityLevel > 3)
                                    <h4>{{ $activity->activityTitle }}</h4>
                                    <form class="form" method="POST" action="{{route('activity.deleteActivity', ['type' => $activity->activityType,'activity' => $activity])}}">
                                        <a class="btn btn-primary" href="{{ route('activity.viewActivityFile', ['type' => $activity->activityType, 'activity' => $activity]) }}">View file</a>
                                        <a class="btn btn-primary" href="{{ route('activity.editActivity', ['type' => $activity->activityType, 'activity' => $activity])}}">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="3">
                            <h6> No Data Availables </h6>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <div class="row mb-4">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{route('activity.addActivity', $type)}}">Add {{$type}}</a>
        </div>
    </div>




@endsection