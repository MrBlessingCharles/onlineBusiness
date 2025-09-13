<?php

namespace App\Http\Controllers;

use App\Models\size;
use App\Models\color;
use App\Models\product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\endlevelcategory;
use App\Models\toplevelcategory;
use App\Models\middlelevelcategory;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function viewproduct()
    {
        $products = product::get();
        $increment = 1;
        // Logic to display the admin product management page
        return view('admin.product', compact('products', 'increment'));
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
        print_r($request->all());

        // Validate the request data
        $request->validate([
            'p_name' => 'required|string|max:255',
            'tcat_name' => 'required|string',
            'mcat_name' => 'required|string',
            'ecat_name' => 'required|string',
            'p_qty' => 'required|integer',
            'p_old_price' => 'required|integer',
            'p_current_price' => 'required|integer',
            'p_description' => 'required|string',
            'p_short_description'=>'required|string',
            'p_feature'=>'required|string',
            'p_condition'=>'required|string',
            'p_return_policy'=>'required|string',
            'size' => 'required|array',
            'size.*' => 'required|string',
            'color' => 'required|array',
            'color.*' => 'required|string',
            'p_featured_photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'photo' => 'required|array',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'p_is_featured' => 'required|integer',
            'p_is_active' => 'required|integer',
        ]);

        $imgdata = "";
        $sizes = $request->input('size');
        $colors = $request->input('color');
        $photo = $request->file('photo');
        $increment = 0;
        $sizedata = "";
        $colordata = "";

        foreach($sizes as $size){
            $sizedata = $size . "*";
        }

        foreach($colors as $color){
            $colordata = $color . "*";
        }

        foreach($photo as $photo){
        
        //file name with extension
        $fileNameWithExt = $photo->getClientOriginalName();
        //just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //just extension
        $extension = $photo->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $fileName.'_'.time().$increment.'.'.$extension;

        $imgdata = $imgdata.$fileNameToStore."*";
        //upload file
        $path = $photo->storeAs('public/productimages', $fileNameToStore);


        }
        // Handle the featured photo upload
        
         //file name with extension
        $fileNameWithExt = $request->file('p_featured_photo')->getClientOriginalName();
        //just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //just extension
        $extension = $request->file('p_featured_photo')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        //upload file
        $path = $request->file('p_featured_photo')->storeAs('public/productimages', $fileNameToStore);

        $product = new product();
        $product->p_name = $request->input('p_name');
        $product->tcat_name = $request->input('tcat_name');
        $product->mcat_name = $request->input('mcat_name');
        $product->ecat_name = $request->input('ecat_name');
        $product->p_qty = $request->input('p_qty');
        $product->p_old_price = $request->input('p_old_price');
        $product->p_current_price = $request->input('p_current_price');
        $product->p_description = $request->input('p_description');
        $product->p_short_description = $request->input('p_short_description');
        $product->p_feature = $request->input('p_feature');
        $product->p_condition = $request->input('p_condition');
        $product->p_return_policy = $request->input('p_return_policy');
        $product->size = $sizedata;
        $product->color = $colordata;
        $product->p_featured_photo = $fileNameToStore;
        $product->photos = $imgdata;
        $product->p_is_featured = $request->input('p_is_featured');
        $product->p_is_active = $request->input('p_is_active');
        $product->save();

        

        return redirect()->back()->with('status', 'Product added successfully!');
       
    }

    public function vieweditproduct($id)
    {

        $product= product::find($id);
        $toplevelcategories = toplevelcategory::where('tcat_name', '!=', $product->tcat_name)->get();
        $midlelevelcategories = middlelevelcategory::where('mcat_name', '!=', $product->mcat_name)->get();
        $endlevelcategories = endlevelcategory::where('ecat_name', '!=', $product->ecat_name)->get();
        $selectedSizes = explode('*', $product->size);
        array_pop($selectedSizes); // Remove the last empty element
        $selectedcolors = explode('*', $product->color);
        array_pop($selectedcolors); // Remove the last empty element
        
        $selectedphotos = explode('*', $product->photos);
        array_pop($selectedphotos); // Remove the last empty element

    
        $sizes = array();
        $sizes1 = size::get();


        foreach($sizes1 as $size1){
            if(!in_array($size1->size, $selectedSizes)){
                array_push($sizes, $size1->size);
            }
        }

        $colors = array();
        $colors1 = color::get();

        foreach($colors1 as $color1){
            if(!in_array($color1->color_name, $selectedcolors)){
                array_push($colors, $color1->color_name);
            }
        }
    
        // Logic to display the page for editing an existing product
        return view('admin.editproduct' , compact('product', 'toplevelcategories',
         'midlelevelcategories', 'endlevelcategories' ,'selectedSizes', 'selectedcolors',
          'selectedphotos' , 'sizes', 'colors'));
    }

    //product update
    
public function updateproduct(Request $request, $id)
{
    // Validation
    $request->validate([
        'p_name' => 'required|string|max:255',
        'tcat_name' => 'required|string',
        'mcat_name' => 'required|string',
        'ecat_name' => 'required|string',
        'p_qty' => 'required|integer',
        'p_old_price' => 'required|integer',
        'p_current_price' => 'required|integer',
        'p_description' => 'required|string',
        'p_short_description'=>'required|string',
        'p_feature'=>'required|string',
        'p_condition'=>'required|string',
        'p_return_policy'=>'required|string',
        'size' => 'required|array',
        'size.*' => 'required|string',
        'color' => 'required|array',
        'color.*' => 'required|string',
        'p_is_featured' => 'required|integer',
        'p_is_active' => 'required|integer',
    ]);

    $product = product::find($id);

    // Featured photo
    if($request->hasFile('p_featured_photo')){
        $request->validate([
            'p_featured_photo'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $fileNameWithExt = $request->file('p_featured_photo')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('p_featured_photo')->getClientOriginalExtension();
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        Storage::delete('public/productimages/'.$product->p_featured_photo);
        $request->file('p_featured_photo')->storeAs('public/productimages', $fileNameToStore);
        $product->p_featured_photo = $fileNameToStore;
    }

    // Sizes & colors
    $sizes = $request->input('size');
    $colors = $request->input('color');
    $sizedata = "";
    $increment = 0;
    foreach($sizes as $size){
        $sizedata .= $size . "*";
    }
    $colordata = "";
    foreach($colors as $color){
        $colordata .= $color . "*";
    }

    // Other photos
    if($request->hasFile('photo')){
        $request->validate([
            'photo' => 'required|array',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imgdata = "";
        foreach($request->file('photo') as $photo){
            $fileNameWithExt = $photo->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $photo->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().$increment.'.'.$extension;
            $imgdata .= $fileNameToStore."*";
            $photo->storeAs('public/productimages', $fileNameToStore);
        }
        // delete old photos
        $oldphotos = explode('*', $product->photos);
        array_pop($oldphotos);
       
        $product->photos = $product->photos.$imgdata;
    }

    // Update product
    $product->p_name = $request->input('p_name');
    $product->tcat_name = $request->input('tcat_name');
    $product->mcat_name = $request->input('mcat_name');
    $product->ecat_name = $request->input('ecat_name');
    $product->p_qty = $request->input('p_qty');
    $product->p_old_price = $request->input('p_old_price');
    $product->p_current_price = $request->input('p_current_price');
    $product->p_description = $request->input('p_description');
    $product->p_short_description = $request->input('p_short_description');
    $product->p_feature = $request->input('p_feature');
    $product->p_condition = $request->input('p_condition');
    $product->p_return_policy = $request->input('p_return_policy');
    $product->size = $sizedata;
    $product->color = $colordata;
    $product->p_is_featured = $request->input('p_is_featured');
    $product->p_is_active = $request->input('p_is_active');
    $product->update();

    return redirect()->back()->with('status', 'Product updated successfully!');
}


//delete other photo
    public function deleteortherphoto($id, $photos)
        {
            $product = product::find($id);

            // Séparer les photos
            $photoArray = explode('*', $product->photos);

            // Retirer la photo à supprimer
            $photoArray = array_filter($photoArray, function($photo) use ($photos) {
                return $photo !== $photos;
            });

            // Recréer la chaîne avec le séparateur
            $product->photos = implode('*', $photoArray);
            $product->save();

            // Supprimer le fichier
            Storage::delete('public/productimages/'.$photos);

            return back();
        }

//DELETE PRODUCT
    public function deleteproduct($id)
    {
        $product = product::find($id);

        // Delete featured photo
        Storage::delete('public/productimages/'.$product->p_featured_photo);

        // Delete other photos
        $photos = explode('*', $product->photos);
        array_pop($photos); // Remove the last empty element
        foreach($photos as $photo){
            Storage::delete('public/productimages/'.$photo);
        }

        // Delete product record
        $product->delete();

        return redirect()->back()->with('status', 'Product deleted successfully!');
    }
    public function vieworders()
    {
        // Logic to display the admin orders page
        return view('admin.orders');
    }
}
