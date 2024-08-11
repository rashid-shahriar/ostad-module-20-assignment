@extends('layouts.app')

@section('title', 'All Contacts')

@section('content')
<h1>All Contacts</h1>
<a href="{{ route('contacts.create') }}">Add New Contact</a>

<form method="GET" action="{{ route('contacts.index') }}">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email"
        class="form-control">
    <button type="submit">Search</button>
</form>

<!-- Shorting button for name and ceated at -->
<div>
    <a
        href="{{ route('contacts.index', ['sort_by' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">Sort
        by Name (A-Z)</a>

    <a
        href="{{ route('contacts.index', ['sort_by' => 'created_at', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">Sort
        by Created At</a>

</div>

<table class="table mt-3">
    <thead>
        <tr>
            <th>Name </th>
            <th><a
                    href="{{ route('contacts.index', ['sort_by' => 'created_at', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">Created
                    At</a></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($contacts as $contact)
        <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->created_at->format('Y-m-d') }}</td>
            <td>
                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">View</a>
                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                    style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No contacts found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection