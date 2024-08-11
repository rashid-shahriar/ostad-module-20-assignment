@extends('layouts.app')

@section('title', 'Create Contact')

@section('content')
<h1>Create Contact</h1>

<form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <input type="text" name="address" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection