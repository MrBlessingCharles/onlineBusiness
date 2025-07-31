<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\logoimage;
class SettingController extends Controller
{
   
    public function savelogo(){
        $this->validate(request(), [
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
    //file name with extension
        $fileNameWithExt = request()->file('logo')->getClientOriginalName();
        //just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //just extension
        $extension = request()->file('logo')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        //upload file
        request()->file('logo')->storeAs('public/logo', $fileNameToStore);

        //save logo in database
        $logoImage = new logoimage;
        $logoImage->logo = $fileNameToStore;
        $logoImage->save();

        return redirect()->back()->with('success', 'Logo saved successfully!');
    }
    
   
}
