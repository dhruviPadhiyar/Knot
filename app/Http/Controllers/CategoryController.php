<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        $notifications = Notification::where("receiverId",Auth::user()->id)->get();
        return view('category.manage',compact('categories','notifications'));
    }

    public function create()
    {
        $notifications = Notification::where("receiverId",Auth::user()->id)->get();
        return view("category.create",compact('notifications'));
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
        $notifications = Notification::where("receiverId",Auth::user()->id)->get();
        return view('admin.dashboard',compact("notifications"));
    }

    public function edit($id){
        // returning view for the edit category form
        $category = Category::find($id);
        $notifications = Notification::where("receiverId",Auth::user()->id)->get();
        return view('category.edit',compact('category','notifications'));
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
