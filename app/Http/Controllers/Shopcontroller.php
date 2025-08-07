<?php

namespace App\Http\Controllers;

use App\Models\size;
use App\Models\color;
use App\Models\country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Shopcontroller extends Controller
{
    
    public function savesize(Request $request)
    {
        // Validate the request data
        $request->validate([
            'size' => 'required|string|max:255',
        ]);

        // Create a new size instance and save it to the database
        $size = new size();
        $size->size = $request->input('size');
        $size->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Size added successfully!');
    }

    public function vieweditsize(Request $request, $id)
    {
        // Validate the request data
       

        // Find the size by ID and update it
        $size = size::find($id);

        // Redirect back with a success message
        return view('admin.editsize', compact('size')); 
    }

    public function updatesize(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'size' => 'required|string|max:255',
        ]);

        // Find the size by ID and update it
        $size = size::find($id);
        $size->size = $request->input('size');
        $size->update();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Size updated successfully!');
    }

    public function deletesize($id)
    {
        // Find the size by ID and delete it
        $size = size::find($id);
        if ($size) {
            $size->delete();
            return redirect()->back()->with('status', 'Size deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Size not found!');
        }
    }


    public function savecolor(Request $request)
    {
        // Validate the request data
        $request->validate([
            'color_name' => 'required|string|max:255',
        ]);

        // Create a new color instance and save it to the database
        $color = new color();
        $color->color_name = $request->input('color_name');
        $color->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Color added successfully!');
    }

        public function vieweditcolor(Request $request, $id){
         $color= color::find($id);

        // Redirect back with a success message
        return view('admin.editcolor', compact('color')); 

        }

    public function updatecolor(Request $request, $id){
        // Validate the request data
        $request->validate([
            'color_name' => 'required|string|max:255',
        ]);

        // Find the color by ID and update it
        $color = color::find($id);
        $color->color_name = $request->input('color_name');
        $color->update();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Color updated successfully!');
    }

    public function deletecolor($id)
    {
        // Find the color by ID and delete it
        $color = color::find($id);
        if ($color) {
            $color->delete();
            return redirect()->back()->with('status', 'Color deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Color not found!');
        }
    }

    //COUNTRY MANAGEMENT
    public function savecountry(Request $request)
    {
        // Validate the request data
        $request->validate([
            'country_name' => 'required|string|max:255',
        ]);

        // Create a new country instance and save it to the database
        $country = new country();
        $country->country_name = $request->input('country_name');
        $country->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Country added successfully!');
 
    }

    public function vieweditcountry(Request $request, $id)
    {
        // Find the country by ID and return it to the edit view
        $country = country::find($id);
        return view('admin.editcountry', compact('country'));
    }

    public function updatecountry(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'country_name' => 'required|string|max:255',
        ]);

        // Find the country by ID and update it
        $country = country::find($id);
        $country->country_name = $request->input('country_name');
        $country->update();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Country updated successfully!');
    }

    public function deletecountry($id)
    {
        // Find the country by ID and delete it
        $country = country::find($id);
        if ($country) {
            $country->delete();
            return redirect()->back()->with('status', 'Country deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Country not found!');
        }
    }
}
