@extends('layouts.mainAdmin-layout')

@section('content')
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="d-flex justify-content-between align-items-center">
            <h2>List Of Bulletin</h2>
            <a class="btn btn-success" href="{{ route('bulletin.createBulletin') }}">Create New Bulletin</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="row mb-4">
    <div class="col-lg-12">
        <form action="{{ route('bulletin.indexBulletinAdmin') }}" method="GET" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <label for="category" class="mr-2">Filter by Category:</label>
                <select name="category" id="category" class="form-control">
                    <option value="all" {{ $category=='all' ? 'selected' : '' }}>All</option>
                    <option value="events" {{ $category=='events' ? 'selected' : '' }}>Events</option>
                    <option value="announcement" {{ $category=='announcement' ? 'selected' : '' }}>Announcement</option>
                    <option value="news" {{ $category=='news' ? 'selected' : '' }}>News</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-2">Filter</button>
        </form>
    </div>
</div>

<div class="row">
    @if ($bulletins->isEmpty())
        <div class="col-12">
            <p>No results available for this category.</p>
        </div>
    @else
        @foreach ($bulletins as $bulletin)
        <div class="col-md-4 d-flex align-items-stretch">
            <div class="card mb-4">
                <img src="{{ asset('images/' . $bulletin->bulletin_image) }}" class="card-img-top"
                    alt="{{ $bulletin->bulletin_title }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $bulletin->bulletin_title }}</h5>
                    <p class="card-text">{{ Str::limit($bulletin->bulletin_desc, 150) }}</p>
                    <p class="card-text"><small class="text-muted">Category: {{ ucfirst($bulletin->bulletin_category) }}</small></p>
                    <p class="card-text"><small class="text-muted">Created at: {{ $bulletin->created_at->format('d M Y, H:i') }}</small></p>
                    <div class="mt-auto">
                        <a href="{{ route('bulletin.updateBulletin', $bulletin->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('bulletin.destroy', $bulletin->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this bulletin?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>

@endsection