@extends('layouts.app')

@section('title', 'Contact Details')

@section('content')
<h1>Contact Details</h1>

<ul>
    <li><strong>Name:</strong> {{ $contact->name }}</li>
    <li><strong>Email:</strong> {{ $contact->email }}</li>
    <li><strong>Phone:</strong> {{ $contact->phone }}</li>
    <li><strong>Address:</strong> {{ $contact->address }}</li>
</ul>

<a href="{{ route('contacts.index') }}" class="btn btn-secondary">Back to List</a>
<a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
<form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
@endsection