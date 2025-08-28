<?php

namespace App\Http\Controllers;

use App\Models\size;
use App\Models\color;
use App\Models\country;
use Illuminate\Http\Request;
use App\Models\shippingcoast;
use App\Models\toplevelcategory;
use App\Models\shippingcoastrest;
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

    // SHIPPING COAST MANAGEMENT

    public function saveshippingcoast(Request $request)
    {
        // Validate the request data
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'amount' => 'required|numeric|min:0',
        ]);

        // Create a new shipping coast instance and save it to the database
        $shippingCoast = new shippingcoast();
        $shippingCoast->country_id = $request->input('country_id');
        $shippingCoast->amount = $request->input('amount');
        $shippingCoast->save();
        return redirect()->back()->with('status', 'Shipping coast saved successfully!');
    }

    public function vieweditshippingcoast($id)
    {
        // Find the shipping coast by ID and return it to the edit view
        $shippingcoast = shippingcoast::find($id);
        $countries = country::where('country_name', '!=', $shippingcoast->country->country_name)->get();
        return view('admin.editshippingcoast', compact('shippingcoast', 'countries'));
    }

    public function updateshippingcoast(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'country_id' => 'required|exists:countries,id',
            'amount' => 'required|numeric|min:0',
        ]);

        // Find the shipping coast by ID and update it
        $shippingCoast = shippingcoast::find($id);
        $shippingCoast->country_id = $request->input('country_id');
        $shippingCoast->amount = $request->input('amount');
        $shippingCoast->save();
        return redirect()->back()->with('status', 'Shipping coast updated successfully!');
        }

    public function deleteshippingcoast($id){
        // Find the shipping coast by ID and delete it
        $shippingCoast = shippingcoast::find($id);
        if ($shippingCoast) {
            $shippingCoast->delete();
            return redirect()->back()->with('status', 'Shipping coast deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Shipping coast not found!');
        }
    }

    // Save shipping coast rest
    public function saveshippingcoastrest(Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Create a new shipping coast rest instance and save it to the database
        $shippingCoastRest = new shippingcoastrest();
        $shippingCoastRest->amount = $request->input('amount');
        $shippingCoastRest->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'The rest of the world amount has been saved successfully!');
    }

    // Update shipping coast rest
    public function updateshippingcoastrest(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        // Find the shipping coast rest by ID and update it
        $shippingCoastRest = shippingcoastrest::find($id);
        if ($shippingCoastRest) {
            $shippingCoastRest->amount = $request->input('amount');
            $shippingCoastRest->save();
            return redirect()->back()->with('status', 'The rest of the world amount has been updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Shipping coast rest not found!');
        }
    }

    //savetoplevelcategory
    public function savetoplevelcategory(Request $request)
    {
        // Validate the request data
        $request->validate([
            'tcat_name' => 'required|string|max:255',
            'show_on_menu' => 'required',
        ]);

        // Create a new toplevelcategory instance and save it to the database
        $toplevelcategory = new toplevelcategory();
        $toplevelcategory->tcat_name = $request->input('tcat_name');
        $toplevelcategory->show_on_menu = $request->input('show_on_menu') ;
        $toplevelcategory->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Top level category added successfully!');
    }

    //Update toplevelcategory
    public function viewedittoplevelcategory(Request $request, $id)
    {
        // Find the toplevelcategory by ID and return it to the edit view
        $toplevelcategory = toplevelcategory::find($id);
        return view('admin.editToplevelCategory', compact('toplevelcategory'));
    }

   //udpadte top level category
    public function viewedupdatetoplevelcategory(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'tcat_name' => 'required|string|max:255',
            'show_on_menu' => 'required',
        ]);

        // Find the toplevelcategory by ID and update it
        $toplevelcategory = toplevelcategory::find($id);
        $toplevelcategory->tcat_name = $request->input('tcat_name');
        $toplevelcategory->show_on_menu = $request->input('show_on_menu') ;
        $toplevelcategory->update();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Top level category updated successfully!');
    }

    public function deletetoplevelcategory($id)
    {
        // Find the toplevelcategory by ID and delete it
        $toplevelcategory = toplevelcategory::find($id);
        if ($toplevelcategory) {
            $toplevelcategory->delete();
            return redirect()->back()->with('status', 'Top level category deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Top level category not found!');
        }
    }
}
    
