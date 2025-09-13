<?php

namespace App\Http\Controllers;

use App\Models\slider;
use App\Models\service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    
    public function viewsliders()
    {
        $sliders = slider::get();
        $increment = 1;
        // Logic to display the admin sliders management page
        return view('admin.sliders', compact('sliders', 'increment'));
    }

    // Additional 
    public function viewaddslider()
    {
        // Logic to display the page for adding a new slider
        return view('admin.addslider');
    }
//SAVE SLIDER
    public function saveslider(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'heading' => 'required|string',
            'content' => 'required|string',
            'button_text' => 'required|string',
            'button_url' => 'required|string',
            'position' => 'required|string',
        ]);

        // Handle the file upload
       $fileNameWithExt = $request->file('photo')->getClientOriginalName();
        //just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //just extension
        $extension = $request->file('photo')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        //upload file
        $path = $request->file('photo')->storeAs('public/sliderimages', $fileNameToStore);

        $slider = new slider();
        $slider->photo = $fileNameToStore;
        $slider->content = $request->input('content');
        $slider->heading = $request->input('heading'); 
        $slider->button_text = $request->input('button_text');
        $slider->button_url = $request->input('button_url');
        $slider->position = $request->input('position');
        $slider->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Slider added successfully.');
    }
//edit slider
    public function vieweditslider($id)
    {
        $slider = slider::find($id);
        if (!$slider) {
            return redirect()->back()->with('error', 'Slider not found.');
        }
        // Logic to display the page for editing an existing slider
        return view('admin.editsliders', compact('slider'));
    }
//update slider

    public function updateslider(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'heading' => 'required|string',
            'content' => 'required|string',
            'button_text' => 'required|string',
            'button_url' => 'required|string',
            'position' => 'required|string',
        ]);

        $slider = slider::find($id);
        if (!$slider) {
            return redirect()->back()->with('error', 'Slider not found.');
        }

        // Handle the file upload if a new photo is provided
        if ($request->hasFile('photo')) {
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            //just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload file
            $path = $request->file('photo')->storeAs('public/sliderimages', $fileNameToStore);
            // Delete the old photo if exists
            if ($slider->photo) {
                \Storage::delete('public/sliderimages/'.$slider->photo);
            }
            $slider->photo = $fileNameToStore;
        }

        // Update other fields
        $slider->heading = $request->input('heading');
        $slider->content = $request->input('content');
        $slider->button_text = $request->input('button_text');
        $slider->button_url = $request->input('button_url');
        $slider->position = $request->input('position');
        $slider->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Slider updated successfully.');
    }

    //delete slider

    public function deleteslider($id)
    {
        $slider = slider::find($id);
        if (!$slider) {
            return redirect()->back()->with('error', 'Slider not found.');
        }

        // Delete the photo if exists
        if ($slider->photo) {
            \Storage::delete('public/sliderimages/'.$slider->photo);
        }

        $slider->delete();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Slider deleted successfully.');
    }
    // You can add more methods for handling slider operations like store, update, delete, etc.
    public function viewservices()
    {
        $services = service::get();
        $increment = 1;
        // Logic to display the services page
        return view('admin.services', compact('services', 'increment'));
    }

    public function viewaddservice()
    {
        // Logic to display the page for adding a new service
        return view('admin.addservice');
    }
    //SAVE SERVICE
    public function saveservices(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        // Handle the file upload
       $fileNameWithExt = $request->file('photo')->getClientOriginalName();
        //just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //just extension
        $extension = $request->file('photo')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        //upload file
        $path = $request->file('photo')->storeAs('public/serviceimage', $fileNameToStore);

        // Assuming you have a Service model to handle services
        $service = new service();
        $service->photo = $fileNameToStore;
        $service->title = $request->input('title'); 
        $service->content = $request->input('content');
        $service->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Service added successfully.');
    }

//edit service
    public function vieweditservice($id)
    {
        $service = service::find($id);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }
        // Logic to display the page for editing an existing service
        return view('admin.editservice', compact('service'));
    }

   //update service

    public function updateservice(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $service = service::find($id);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        // Handle the file upload if a new photo is provided
        if ($request->hasFile('photo')) {
            $fileNameWithExt = $request->file('photo')->getClientOriginalName();
            //just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //just extension
            $extension = $request->file('photo')->getClientOriginalExtension();
            //file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload file0
            $path = $request->file('photo')->storeAs('public/serviceimage', $fileNameToStore);
            // Delete the old photo if exists
            if ($service->photo) {
                \Storage::delete('public/serviceimage/'.$service->photo);
            }
            $service->photo = $fileNameToStore;
        }

        // Update other fields
        $service->title = $request->input('title');
        $service->content = $request->input('content');
        $service->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Service updated successfully.');
    }

    //delete service

    public function deleteservice($id)
    {
        $service = service::find($id);
        if (!$service) {
            return redirect()->back()->with('error', 'Service not found.');
        }

        // Delete the photo if exists
        if ($service->photo) {
            \Storage::delete('public/serviceimage/'.$service->photo);
        }

        $service->delete();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'Service deleted successfully.');
    }

}
