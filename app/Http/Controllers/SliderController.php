<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    
    public function viewsliders()
    {
        // Logic to display the admin sliders management page
        return view('admin.sliders');
    }

    // Additional 
    public function viewaddslider()
    {
        // Logic to display the page for adding a new slider
        return view('admin.addslider');
    }

    public function vieweditslider()
    {
        // Logic to display the page for editing an existing slider
        return view('admin.editslider');
    }

    // You can add more methods for handling slider operations like store, update, delete, etc.
    public function viewservices()
    {
        // Logic to display the services page
        return view('admin.services');
    }

    public function viewaddservice()
    {
        // Logic to display the page for adding a new service
        return view('admin.addservice');
    }

    public function vieweditservice()
    {
        // Logic to display the page for editing an existing service
        return view('admin.editservice');
    }

   

}
