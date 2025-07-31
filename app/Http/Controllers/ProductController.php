<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function viewproduct()
    {
        // Logic to display the admin product management page
        return view('admin.product');
    }

    public function viewaddproduct()
    {
        // Logic to display the page for adding a new product
        return view('admin.addproduct');
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
