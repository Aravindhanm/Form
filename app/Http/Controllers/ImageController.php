<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\formlist;


class ImageController extends Controller
{
    public function index()
    {
        $images = formlist::all();
        return view('images.index', $images);
    }

    public function create(){
        return view('images.create');
    }

    public function store(Request $request){

         $validatedData = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $image = new formlist();
        $image->name = $validatedData['name'];
        $image->image = $imageName;
        $image->save();

        return redirect()->route('images.index')->with('success', 'Image created successfully.');

    }

    public function edit($id)
    {
        $image = formlist::findOrFail($id);
        return view('images.edit', compact('image'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $image = formlist::findOrFail($id);

        $image->name = $request->name;

        if ($request->hasFile('image')) {
           
        }

        $image->save();

        return redirect()->route('images.index')->with('success', 'Image updated successfully');
    }

    public function destroy($id)
    {
        $image = formlist::findOrFail($id);
     

        $image->delete();

        return redirect()->route('images.index')->with('success', 'Image deleted successfully');
    }
}
