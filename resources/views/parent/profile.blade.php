@extends('layouts.mainParent-layout')

@section('content')
<div class="container mt-4">
    <h2>Your Profile</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $parent->name }}</p>
            <p><strong>Email:</strong> {{ $parent->email }}</p>

            <form action="{{ route('profile.parent') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="old_password">Old Password:</label>
                    <input type="password" name="old_password" class="form-control" required>
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password:</label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Update Password</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection