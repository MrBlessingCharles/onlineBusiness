<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\logoimage;
class SettingController extends Controller
{
   
    public function viewSettings()
    {
        // Logic to display the settings page
        $logoimages = logoimage::first();
        return view('admin.settings', compact('logoimages'));
    }

    public function updateLogo(Request $request)
    {
        // Logic to handle logo update
        $request->validate([
            'photo_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the logo image and update the database
        $logoImage = new \App\Models\logoimage();
        $logoImage->logo_name = $request->file('photo_logo')->store('logos', 'public');
        $logoImage->save();

        return redirect()->back()->with('success', 'Logo updated successfully!');
    }
}
