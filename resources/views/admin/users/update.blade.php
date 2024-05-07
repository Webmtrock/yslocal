@extends('layouts.app')
@section('content')
<div style="text-align: center;">
    <h1>Update User</h1>
    <a href="{{ route('users.index') }}" class="btn btn-danger btn-lg float-right">Back</a>
</div>
<div class="content-wrapper">
    <div class="container mt-3 mb-3">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') 
            
            <div class="form-group mb-2">
                <label>Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" name="name" id="name" placeholder="Enter the Name">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" name="email" id="email" placeholder="Enter the Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Phone</label>
                <input type="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $user->phone }}" name="phone" id="phone" placeholder="Enter the Phone">
                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group mb-2">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
            <input type="submit" name="submit" value="Update" class="btn btn-success">
        </form>
    </div>
</div>
@endsection
