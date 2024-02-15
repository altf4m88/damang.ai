@extends('templates.index')

@section('title', 'Create User')

@section('content')
    <div class="container mt-5">
        <h2>Create New User</h2>
        <form action="{{URL::to('users')}}" method="POST">
            @csrf <!-- CSRF token for Laravel -->
    
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
    
            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>
    
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" id="gender" name="gender" required>
                    <option value="">Choose...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection