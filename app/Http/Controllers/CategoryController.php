<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('category.manage',compact('categories'));
    }

    public function create()
    {
        return view("category.create");
    }
    public function store(Request $request)
    {
        //validate the data
        $request->validate([
            'category' => 'required|string|min:2',
        ]);

        //insert into database
        $category = new Category;
        $category->title = $request->category;
        $category->description = $request->description;
        $category->save();

        // showing toastr success message
        toastr()->success('Category created successfullt!');

        // redirect
        return view('admin.dashboard');
    }

    public function edit($id){
        // returning view for the edit category form
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    public function update($id){
        $category = Category::find($id);
        $category->update(['title'=> request('title'), 'description'=> request('description')]);
        toastr()->info('Category updated successfully!');
        return back();
        // dd(" update $id");
    }

    public function delete($id){
        $category = Category::find($id);
        // delete the category
        $category->delete();
        // toast message after deleting category
        toastr()->error('Category has been deleted successfully!');
        // returning back
        return back();
    }
}
