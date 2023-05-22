<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class TableController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
{
    $search = $request->input('search');
    $sort = $request->input('sort', 'id');
    $sortOrder = $request->input('sort_order', 'asc');
    $query = Table::query();
    if ($search) {
        $query->where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('dob', 'like', "%$search%")
            ->orWhere('mob', 'like', "%$search%");
    }
    $tables = $query->orderBy($sort, $sortOrder)->paginate(10);
    $tables->appends(['search' => $search, 'sort' => $sort, 'sort_order' => $sortOrder]);
    return view('tables.index', compact('tables', 'sort', 'sortOrder', 'search'));
}


 /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('tables.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:_table|max:100',
        'mob' => 'required|string|unique:_table|max:10',
        'image' => 'required|mimes:png,jpg,jpeg,gif',
    ], [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'mob.required' => 'The Mobile field is required.',
            'mob.unique'=>'The Mobile Number already exists',
            'mob.min' => 'The Mobile must be at least 10 digits.',
        ]);
    $input = $request->all();

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);
        $input['image'] = $imageName;
    }
    Table::create($input);
    return redirect('table')->with('success', 'List Added Successfully');
}


/**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
            $tables = Table::find($id);
            return view('tables.edit')->with('tables',$tables);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
{
    $table = Table::findOrFail($id);
    $input = $request->all();
    if ($request->hasFile('image')) {
        // Delete the previous image from storage if it exists
        if ($table->image) {
            Storage::disk('public')->delete('images/' . $table->image);
        }
        // Store the new image
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/images', $imageName);
        $input['image'] = $imageName;
    }
    $table->update($input);
    return redirect('table')->with('success', 'List Updated Successfully');
}  


/**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $table = Table::findOrFail($id);
       // Delete the image from the folder
        if ($table->image) {
            $imagePath = storage_path('app/public/images/' . $table->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the record from the database
        $table->delete();
        return redirect('table')->with('delete', 'List Deleted successfully');
    }
}