<?php

namespace App\Http\Controllers;

use App\Models\CmApp;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CmAppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Initialize the query
        $query = CmApp::query();

        // Apply sorting if specified
        if ($request->has('sort_by')) {
            $query->orderBy($request->get('sort_by'), $request->get('direction', 'asc'));
        }

        // Apply search if specified
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%");
        }

        // Get all contacts
        $contacts = $query->get();

        // Pass contacts to the index view
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validateData = $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50|unique:cm_apps',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        // Create a new CmApp instance
        CmApp::create($validateData);

        // Redirect to the index page with a success message
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the contact by id
        $contact = CmApp::find($id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        // Return the show view with the specified contact
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Find the contact by id
        $contact = CmApp::find($id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        // Return the edit view with the specified contact
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Find the contact by id
        $contact = CmApp::find($id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        // Validate the request data
        $validateData = $request->validate([
            'name' => 'sometimes|required|string|max:50',
            'email' => 'sometimes|required|string|max:50|unique:cm_apps,email,' . $id,
            'phone' => 'sometimes|nullable|string|max:20',
            'address' => 'sometimes|nullable|string|max:255',
        ]);

        // Update the contact
        $contact->update($validateData);

        // Redirect to the index page with a success message
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the contact by id
        $contact = CmApp::find($id);

        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }

        // Delete the contact
        $contact->delete();

        // Redirect to the index page with a success message
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully');
    }
}
