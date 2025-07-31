<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //top level category
    public function viewtoplevelcategory()
    {
        // Logic to display the admin top-level category management page
        return view('admin.toplevelcategory');
    }
    public function viewaddtoplevelcategory()
    {
        // Logic to display the page for adding a new top-level category
        return view('admin.addtoplevelcategory');
    }

    public function viewedittoplevelcategory()
    {
        // Logic to display the page for editing an existing top-level category
        return view('admin.edittoplevelcategory');
    }

    //middle level category

    public function viewmiddlelevelcategory()
    {
        // Logic to display the page for editing an existing end-level category
        return view('admin.middlelevelcategory');
    }

    public function viewaddmiddlelevelcategory()
    {
        // Logic to display the admin end-level category management page
        return view('admin.addmiddlelevelcategory');
    }

    public function vieweditmidllelevelcategory()
    {
        // Logic to display the page for adding a new end-level category
        return view('admin.editmiddlelevelcategory');
    }


    //end level category
    public function viewendlevelcategory()
    {
        // Logic to display the admin end-level category management page
        return view('admin.endlevelcategory');
    }

    public function viewaddendlevelcategory()
    {
        // Logic to display the page for adding a new end-level category
        return view('admin.addendlevelcategory');
    }
    public function vieweditendlevelcategory()
    {
        // Logic to display the page for editing an existing end-level category
        return view('admin.editendlevelcategory');
    }
}
