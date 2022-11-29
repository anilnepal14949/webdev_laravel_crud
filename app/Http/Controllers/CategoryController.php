<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index() {
        $title = 'All Categories';
        $categories = Category::paginate(10);
        // print_r($categories);
        // exit;
        return view('categories.index', compact('title','categories'));
    }

    public function create() {
        $title = 'Create Category';
        return view('categories.create', compact('title'));
    }

    public function store(Request $request) {
        $request->validate([
            'category_name'=>'required|max:15',
            'category_slug'=>'required|unique:categories',
            'category_description'=>'required',
            'category_image'=>'required|mimes:jpg,jpeg,png'
        ]);

        $category_name = $request->input('category_name');
        $category_slug = $request->input('category_slug');
        $category_description = $request->input('category_description');
        $category_image = $request->file('category_image');

        if($category_image) {
            $ext = strtolower($category_image->getClientOriginalExtension());
            $image_name = date('dmy_H_s_i').".".$ext;
            $upload_path = "images/categories/";
            $image_url = $upload_path.$image_name;
            $upload = $category_image->move($upload_path, $image_name);
        }

        Category::create([
            "category_name"=>$category_name,
            "category_slug"=>$category_slug,
            "category_description"=>$category_description,
            "category_image"=>$image_url
        ]);

        return redirect()->route('categories.index')->with('message', 'Category added successfully...');
    }

    public function show($id) {
        $category = Category::where('id', $id)->first(); // Category::find($id);
        $title = $category->category_name.' Details';

        return view('categories.show', compact('title', 'category'));
    }

    public function edit($id) {
        $category = Category::where('id', $id)->first(); // Category::find($id);
        $title = 'Edit '.$category->category_name;

        return view('categories.edit', compact('title', 'category'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'category_name'=>'required|max:15',
            'category_slug'=>'required',
            'category_description'=>'required',
            'category_image'=>'mimes:jpg,jpeg,png'
        ]);

        $category = Category::where('id', $id)->first();

        $old_image = $category->category_image;

        $category_name = $request->input('category_name');
        $category_slug = $request->input('category_slug');
        $category_description = $request->input('category_description');
        $category_image = $request->file('category_image');

        if($category_image) {
            if(file_exists($old_image)) {
                unlink($old_image);
            }
            $ext = strtolower($category_image->getClientOriginalExtension());
            $image_name = date('dmy_H_s_i').".".$ext;
            $upload_path = "images/categories/";
            $image_url = $upload_path.$image_name;
            $upload = $category_image->move($upload_path, $image_name);
        } else {
            $image_url = $old_image;
        }

        $category->update([
            "category_name"=>$category_name,
            "category_slug"=>$category_slug,
            "category_description"=>$category_description,
            "category_image"=>$image_url
        ]);

        return redirect()->route('categories.index')->with('message', 'Category updated successfully...');
    }

    public function destroy($id) {
        $category = Category::where('id', $id)->first();

        $category_image = $category->category_image;
        if(file_exists($category_image)) {
            unlink($category_image);
        }

        $category->delete();

        return redirect()->route('categories.index')->with('message', 'Category deleted successfully...');
    }
}
