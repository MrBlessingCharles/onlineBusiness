<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\endlevelcategory;
use App\Models\toplevelcategory;
use App\Models\middlelevelcategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    //top level category
   public function viewtoplevelcategory()
    {
        $toplevelcategories = toplevelcategory::get();
        $increment = 1;
        // Logic to display the admin toplevelcategory management page
        return view('admin.toplevelcategory', compact('toplevelcategories', 'increment'));
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
        // Logic to display the admin middle-level category management page
        $middlelevelcategories = middlelevelcategory::get();
        $increment = 1;

        return view('admin.middlelevelcategory', compact('middlelevelcategories', 'increment'));
    }

    //savetoplevelcategory
    public function savemiddlelevelcategory(Request $request)
    {
        // Validate the request data
        $request->validate([
            'tcat_name' => 'required|string|max:255',
            'mcat_name' => 'required',
        ]);

        // Create a new toplevelcategory instance and save it to the database
        $middlelevelcategory = new middlelevelcategory();
        $middlelevelcategory->tcat_name = $request->input('tcat_name') ;
        $middlelevelcategory->mcat_name = $request->input('mcat_name');
        $middlelevelcategory->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Middle level category added successfully!');
    }

    public function viewaddmiddlelevelcategory()
    {
         $toplevelcategories = toplevelcategory::get();
        $increment = 1;
        // Logic to display the admin toplevelcategory management page
        return view('admin.addmiddlelevelcategory', compact('toplevelcategories', 'increment'));
        // Logic to display the admin end-level category management page
    }

    public function vieweditmidllelevelcategory($id)
    {
        $middlelevelcategory = middlelevelcategory::find($id);
        $toplevelcategories = toplevelcategory::where('tcat_name', '!=', $middlelevelcategory->tcat_name)->get();
        // Logic to display the page for adding a new end-level category
        return view('admin.editmidlevelcategory' , compact('middlelevelcategory', 'toplevelcategories'));
    }

    public function updatemiddlelevelcategory(Request $request, $id)
    {
       
        // Find the existing middlelevelcategory instance by ID and update its properties
        $middlelevelcategory = middlelevelcategory::find($id);
        $middlelevelcategory->update($request->all());

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Middle level category updated successfully!');
    }

    // Delete middle level category

    public function deletemiddlelevelcategory($id)
    {
        // Find the middlelevelcategory instance by ID and delete it
        $middlelevelcategory = middlelevelcategory::find($id);
        if ($middlelevelcategory) {
            $middlelevelcategory->delete();
            return redirect()->back()->with('status', 'Middle level category deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Middle level category not found.');
        }
    }
    //end level category
    public function viewendlevelcategory()
    {
        $endlevelcategories = endlevelcategory::get();
        $increment = 1;
        // Logic to display the admin end-level category management page
        return view('admin.endlevelcategory', compact('endlevelcategories', 'increment'));
    }

    public function viewaddendlevelcategory()

    {
        $toplevelcategories = toplevelcategory::get();
        $middlelevelcategories = middlelevelcategory::get();
        
        // Logic to display the page for adding a new end-level category
        return view('admin.addendlevelcategory' , compact('toplevelcategories', 'middlelevelcategories'));
    }

    //savenewendlevelcategory

    public function saveendlevelcategory(Request $request)
    {
        // Validate the request data
        $request->validate([
            'tcat_name' => 'required|string|max:255',
            'mcat_name' => 'required|string|max:255',
            'ecat_name' => 'required',
        ]);

        // Create a new toplevelcategory instance and save it to the database
        $endlevelcategory = new endlevelcategory();
        $endlevelcategory->tcat_name = $request->input('tcat_name') ;
        $endlevelcategory->mcat_name = $request->input('mcat_name');
        $endlevelcategory->ecat_name = $request->input('ecat_name');
        $endlevelcategory->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'End level category added successfully!');
    }

    public function vieweditendlevelcategory( $id )
    {
        $endlevelcategory = endlevelcategory::find($id);
        $toplevelcategories = toplevelcategory::where('tcat_name', '!=', $endlevelcategory->tcat_name)->get();
        $middlelevelcategories = middlelevelcategory::where('mcat_name', '!=', $endlevelcategory->mcat_name)->get();
        

        // Logic to display the page for editing an existing end-level category
        return view('admin.editendlevelcategory', compact('endlevelcategory', 'toplevelcategories', 'middlelevelcategories'));
    }

    //updateendlevelcategory

    public function updateendlevelcategory(Request $request, $id)
    {
        // Validate the request data
       
        // Find the existing endlevelcategory instance by ID and update its properties
        $endlevelcategory = endlevelcategory::find($id);
        $endlevelcategory->update($request->all());
        // Redirect back with a success message
        return redirect()->back()->with('status', 'End level category updated successfully!');
    }

    // Delete end level category
    public function deleteendlevelcategory($id)
    {
        // Find the endlevelcategory instance by ID and delete it
        $endlevelcategory = endlevelcategory::find($id);
        if ($endlevelcategory) {
            $endlevelcategory->delete();
            return redirect()->back()->with('status', 'End level category deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'End level category not found.');
        }
    }
}
