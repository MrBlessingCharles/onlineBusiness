<?php

namespace App\Http\Controllers;

use App\Models\size;
use App\Models\color;
use Illuminate\Http\Request;
use App\Models\endlevelcategory;
use App\Models\toplevelcategory;
use App\Models\middlelevelcategory;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function viewproduct()
    {
        // Logic to display the admin product management page
        return view('admin.product');
    }

    public function viewaddproduct()
    {
        $topcategories = toplevelcategory::get();
        $middlecategories = middlelevelcategory::get();
        $endcategories = endlevelcategory::get();
        $sizes = size::get();
        $colors = color::get();
        
        // Logic to display the page for adding a new product
        return view('admin.addproduct', compact('topcategories', 'middlecategories', 'endcategories', 'sizes', 'colors'));
    }

    //savetoplevelcategory
    public function saveproduct(Request $request)
    {
        // Validate the request data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'tcat_name' => 'required|string',
            'mcat_name' => 'required|string',
            'ecat_name' => 'required|string',
            'price' => 'required|integer',
            'p_qty' => 'required|integer',
            'p_old_price' => 'required|integer',
            'p_current_price' => 'required|integer',
            'p_description' => 'required|string',
            'p_short_description'=>'required|string',
            'p_feature'=>'required|string',
            'p_condition'=>'required|string',
            'p_returns_policy'=>'required|string',
            'size' => 'required|array',
            'color' => 'required|array',
            'photo' => 'required|string', // Validate each image
            'p_is_featured' => 'required|integer',
            'p_active' => 'required|integer',
        ]);
        // Create a new product instance and save it to the database
        $product = new product();
        $product->product_name = $request->input('product_name');
        $product->tcat_name = $request->input('tcat_name');
        $product->mcat_name = $request->input('mcat_name');
        $product->ecat_name = $request->input('ecat_name');
        $product->price = $request->input('price');
        $product->p_qty = $request->input('p_qty');
        $product->p_old_price = $request->input('p_old_price');
        $product->p_current_price = $request->input('p_current_price');
        $product->p_description = $request->input('p_description');
        $product->p_short_description = $request->input('p_short_description');
        $product->p_feature = $request->input('p_feature');
        $product->p_condition = $request->input('p_condition');
        $product->p_returns_policy = $request->input('p_returns_policy');
        $product->size = implode(',', $request->input('size')); // Convert array to comma-separated string
        $product->color = implode(',', $request->input('color')); // Convert array to comma-separated string
        $product->photo = $request->input('photo'); // Handle file upload as needed
        $product->p_is_featured = $request->input('p_is_featured');
        $product->p_active = $request->input('p_active');
        $product->save();
        return redirect('/admin/product')->with('status', 'Product Added Successfully');
        

       
    }

    public function vieweditproduct()
    {
        // Logic to display the page for editing an existing product
        return view('admin.editproduct');
    }

    public function vieworders()
    {
        // Logic to display the admin orders page
        return view('admin.orders');
    }
}
