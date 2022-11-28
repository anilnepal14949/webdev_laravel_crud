<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index() {
        $title = 'All Products';
        $products = Product::paginate(10);
        return view('products.index', compact('title','products'));
    }

    public function create() {
        $title = 'Create Product';
        return view('products.create', compact('title'));
    }

    public function store(Request $request) {
        $product_name = $request->input('product_name');
        $product_code = $request->input('product_code');
        $product_details = $request->input('product_details');
        $product_image = $request->file('product_image');

        if($product_image) {
            $ext = strtolower($product_image->getClientOriginalExtension());
            $image_name = date('dmy_H_s_i').".".$ext;
            $upload_path = "images/products/";
            $image_url = $upload_path.$image_name;
            $upload = $product_image->move($upload_path, $image_name);
        }

        Product::create([
            "product_name"=>$product_name,
            "product_code"=>$product_code,
            "product_details"=>$product_details,
            "product_image"=>$image_url
        ]);

        return redirect()->route('products.index')->with('message', 'Product added successfully...');
    }

    public function show($id) {
        $product = Product::where('id', $id)->first(); // Product::find($id);
        $title = $product->product_name.' Details';

        return view('products.show', compact('title', 'product'));
    }

    public function edit($id) {
        $product = Product::where('id', $id)->first(); // Product::find($id);
        $title = 'Edit '.$product->product_name;

        return view('products.edit', compact('title', 'product'));
    }

    public function update(Request $request, $id) {
        $product = Product::where('id', $id)->first();

        $old_image = $product->product_image;

        $product_name = $request->input('product_name');
        $product_code = $request->input('product_code');
        $product_details = $request->input('product_details');
        $product_image = $request->file('product_image');

        if($product_image) {
            if(file_exists($old_image)) {
                unlink($old_image);
            }
            $ext = strtolower($product_image->getClientOriginalExtension());
            $image_name = date('dmy_H_s_i').".".$ext;
            $upload_path = "images/products/";
            $image_url = $upload_path.$image_name;
            $upload = $product_image->move($upload_path, $image_name);
        } else {
            $image_url = $old_image;
        }

        $product->update([
            "product_name"=>$product_name,
            "product_code"=>$product_code,
            "product_details"=>$product_details,
            "product_image"=>$image_url
        ]);

        return redirect()->route('products.index')->with('message', 'Product updated successfully...');
    }

    public function destroy($id) {
        $product = Product::where('id', $id)->first();

        $product_image = $product->product_image;
        if(file_exists($product_image)) {
            unlink($product_image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('message', 'Product deleted successfully...');
    }
}
