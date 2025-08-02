<?php


namespace App\Http\Controllers;
use App\Models\favicon;
use App\Models\Message;
use App\Models\logoimage;
use App\Models\information;
use App\Models\Metasection;
use App\Models\onoffsection;
use Illuminate\Http\Request;
use App\Models\Productsetting;
use App\Models\featproductsection;
use App\Http\Controllers\Controller;
use App\Models\latestproductsection;
use App\Models\popularproductsection;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
   
    public function savelogo(Request $request){
        $request->validate([
            'photo_logo' => 'required|image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
    //file name with extension
        $fileNameWithExt = $request->file('photo_logo')->getClientOriginalName();
        //just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //just extension
        $extension = $request->file('photo_logo')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        //upload file
        $path = $request->file('photo_logo')->storeAs('public/logoimage', $fileNameToStore);

        //save logo in database
        $logoImage = new logoimage;
        $logoImage->logo_name = $fileNameToStore;
        $logoImage->save();

        return redirect()->back()->with('status', 'Logo saved successfully!');
    }

    //update logo
    public function updateLogo(Request $request, $id){
        $request->validate([
            'photo_logo' => 'required|image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //find the logo by id
       

        //file name with extension
        $fileNameWithExt = $request->file('photo_logo')->getClientOriginalName();
        //just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //just extension
        $extension = $request->file('photo_logo')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        //delete old logo file if exists
        $logoImage = logoimage::find($id);
        Storage::delete('public/logoimage/'.$logoImage->logo_name);

        //upload file
        $path = $request->file('photo_logo')->storeAs('public/logoimage', $fileNameToStore);

        //update logo in database
        $logoImage->logo_name = $fileNameToStore;
        $logoImage->update();

        return redirect()->back()->with('status', 'Logo updated successfully!');
    }
    
   
// Save favicon
      public function saveFavicon(Request $request){
        $request->validate([
            'photo_favicon' => 'required|image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
    //file name with extension
        $fileNameWithExt = $request->file('photo_favicon')->getClientOriginalName();
        //just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //just extension
        $extension = $request->file('photo_favicon')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;
        //upload file
        $path = $request->file('photo_favicon')->storeAs('public/logoimage', $fileNameToStore);

        //save logo in database
        $favicon = new favicon;
        $favicon->photo_favicon = $fileNameToStore;
        $favicon->save();

        return redirect()->back()->with('status', 'favicon saved successfully!');
    }

    //update favicon

     //update logo
    public function updatefavicon(Request $request, $id){
        $request->validate([
            'photo_favicon' => 'required|image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        //find the logo by id
       

        //file name with extension
        $fileNameWithExt = $request->file('photo_favicon')->getClientOriginalName();
        //just file name
        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //just extension
        $extension = $request->file('photo_favicon')->getClientOriginalExtension();
        //file name to store
        $fileNameToStore = $fileName.'_'.time().'.'.$extension;

        //delete old logo file if exists
        $favicon = favicon::find($id);
        Storage::delete('public/logoimage/'.$favicon->photo_favicon);

        //upload file
        $path = $request->file('photo_favicon')->storeAs('public/logoimage', $fileNameToStore);

        //update logo in database
        $favicon->photo_favicon = $fileNameToStore;
        $favicon->update();

        return redirect()->back()->with('status', 'Favicon updated successfully!');
    }

    // SAVE INFORMATION
    
    public function saveInformation(Request $request){
        $request->validate([
            'contact_adress' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required|email',
            'contact_map_iframe' => 'required',
            'footer_copyright' => 'required',
            'newsletter_on' => 'required',
        ]);

        // Save or update information
        $information = information::first() ?: new information;
        $information->contact_adress = $request->input('contact_adress');
        $information->contact_phone = $request->input('contact_phone');
        $information->contact_email = $request->input('contact_email');
        $information->contact_map_iframe = $request->input('contact_map_iframe');
        $information->footer_copyright = $request->input('footer_copyright');
        $information->newsletter_on = $request->input('newsletter_on');
        $information->save();

        return redirect()->back()->with('status', 'Information saved successfully!');
    }

    //UPDATE INFORMATION
   
    public function updateInformation(Request $request, $id){
        $request->validate([
            'contact_adress' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required|email',
            'contact_map_iframe' => 'required',
            'footer_copyright' => 'required',
            'newsletter_on' => 'required',
        ]);

        // Find the information by id
        $information = information::find($id);
        if (!$information) {
            return redirect()->back()->with('error', 'Information not found.');
        }

        // Update information
        $information->contact_adress = $request->input('contact_adress');
        $information->contact_phone = $request->input('contact_phone');
        $information->contact_email = $request->input('contact_email');
        $information->contact_map_iframe = $request->input('contact_map_iframe');
        $information->footer_copyright = $request->input('footer_copyright');
        $information->newsletter_on = $request->input('newsletter_on');
        $information->update();

        return redirect()->back()->with('status', 'Information updated successfully!');
    }

    //SAVE MESSAGE

    public function saveMessage(Request $request){
        $request->validate([
            'receive_email'=> 'required',
            'receive_email_thank_you_message' => 'required',
            'receive_email_subject' => 'required',
            'forget_password_message' => 'required',
        ]);

        // Save or update message
        $message =  new Message;
        $message->receive_email = $request->input('receive_email');
        $message->receive_email_thank_you_message = $request->input('receive_email_thank_you_message');
        $message->receive_email_subject = $request->input('receive_email_subject');
        $message->forget_password_message = $request->input('forget_password_message');
        $message->save();

        return redirect()->back()->with('status', 'Message saved successfully!');
    }


    //UPDATE MESSAGE

    public function updateMessage(Request $request, $id){
        $request->validate([
            'receive_email'=> 'required',
            'receive_email_thank_you_message' => 'required',
            'receive_email_subject' => 'required',
            'forget_password_message' => 'required',
        ]);

        // Find the message by id
        $message = Message::find($id);
        if (!$message) {
            return redirect()->back()->with('error', 'Message not found.');
        }

        // Update message
        $message->receive_email = $request->input('receive_email');
        $message->receive_email_thank_you_message = $request->input('receive_email_thank_you_message');
        $message->receive_email_subject = $request->input('receive_email_subject');
        $message->forget_password_message = $request->input('forget_password_message');
        $message->update();

        return redirect()->back()->with('status', 'Message updated successfully!');
    }

    // SAVE PRODUCT SETTING
    public function saveProductSetting(Request $request){
        $request->validate([
            'total_latest_product_home' => 'required|integer',
            'total_featured_product_home' => 'required|integer',
            'total_popular_product_home' => 'required|integer',
        ]);

        // Save or update product setting
        $productsetting = Productsetting::first() ?: new Productsetting;
        $productsetting->total_latest_product_home = $request->input('total_latest_product_home');
        $productsetting->total_featured_product_home = $request->input('total_featured_product_home');
        $productsetting->total_popular_product_home = $request->input('total_popular_product_home');
        $productsetting->save();

        return redirect()->back()->with('status', 'Product setting saved successfully!');
    }


    //UPDATE PRODUCT SETTING
    public function updateProductSetting(Request $request, $id){
        $request->validate([
            'total_latest_product_home' => 'required|integer',
            'total_featured_product_home' => 'required|integer',
            'total_popular_product_home' => 'required|integer',
        ]);

        // Find the product setting by id
        $productsetting = Productsetting::find($id);
        if (!$productsetting) {
            return redirect()->back()->with('error', 'Product setting not found.');
        }

        // Update product setting
        $productsetting->total_latest_product_home = $request->input('total_latest_product_home');
        $productsetting->total_featured_product_home = $request->input('total_featured_product_home');
        $productsetting->total_popular_product_home = $request->input('total_popular_product_home');
        $productsetting->update();

        return redirect()->back()->with('status', 'Product setting updated successfully!');
    }

    // SAVE ON/OFF SECTION
    public function saveOnOffSection(Request $request){
        $request->validate([
            'home_welcome_on_off' => 'required',
            'home_service_on_off' => 'required',
            'home_featured_product_on_off' => 'required',
            'home_latest_product_on_off' => 'required',
            'home_popular_product_on_off' => 'required',
        ]);

        // Save or update on/off section
        $onoffsection = new onoffsection;
        $onoffsection->home_welcome_on_off = $request->input('home_welcome_on_off');
        $onoffsection->home_service_on_off = $request->input('home_service_on_off');
        $onoffsection->home_featured_product_on_off = $request->input('home_featured_product_on_off');
        $onoffsection->home_latest_product_on_off = $request->input('home_latest_product_on_off');
        $onoffsection->home_popular_product_on_off = $request->input('home_popular_product_on_off');
        $onoffsection->save();

        return redirect()->back()->with('status', 'On/Off section saved successfully!');
    }

    //UPDATE ON/OFF SECTION
    public function updateOnOffSection(Request $request, $id){
        $request->validate([
            'home_welcome_on_off' => 'required',
            'home_service_on_off' => 'required',
            'home_featured_product_on_off' => 'required',
            'home_latest_product_on_off' => 'required',
            'home_popular_product_on_off' => 'required',
        ]);

        // Find the on/off section by id
        $onoffsection = onoffsection::find($id);
        if (!$onoffsection) {
            return redirect()->back()->with('error', 'On/Off section not found.');
        }

        // Update on/off section
        $onoffsection->home_welcome_on_off = $request->input('home_welcome_on_off');
        $onoffsection->home_service_on_off = $request->input('home_service_on_off');
        $onoffsection->home_featured_product_on_off = $request->input('home_featured_product_on_off');
        $onoffsection->home_latest_product_on_off = $request->input('home_latest_product_on_off');
        $onoffsection->home_popular_product_on_off = $request->input('home_popular_product_on_off');
        $onoffsection->update();

        return redirect()->back()->with('status', 'On/Off section updated successfully!');
    }

    // SAVE META SECTION
    public function saveMetasection(Request $request){
        $request->validate([
            'meta_title_home' => 'required',
            'meta_keyword_home' => 'required',
            'meta_description_home' => 'required',
        ]);

        // Save or update meta section
        $metasection = new Metasection;
        $metasection->meta_title_home = $request->input('meta_title_home');
        $metasection->meta_keyword_home = $request->input('meta_keyword_home');
        $metasection->meta_description_home = $request->input('meta_description_home');
        $metasection->save();

        return redirect()->back()->with('status', 'Meta section saved successfully!');
    }

    //UPDATE META SECTION
    public function updateMetasection(Request $request, $id){
        $request->validate([
            'meta_title_home' => 'required',
            'meta_keyword_home' => 'required',
            'meta_description_home' => 'required',
        ]);

        // Find the meta section by id
        $metasection = Metasection::find($id);
        if (!$metasection) {
            return redirect()->back()->with('error', 'Meta section not found.');
        }

        // Update meta section
        $metasection->meta_title_home = $request->input('meta_title_home');
        $metasection->meta_keyword_home = $request->input('meta_keyword_home');
        $metasection->meta_description_home = $request->input('meta_description_home');
        $metasection->update();

        return redirect()->back()->with('status', 'Meta section updated successfully!');
    }

    // SAVE FEATURED PRODUCT SECTION
    public function saveFeaturedProductSection(Request $request){
        $request->validate([
            'featured_product_title' => 'required',
            'featured_product_subtitle' => 'required',
        ]);

        // Save or update featured product section
        $featuredproductsection = new featproductsection;
        $featuredproductsection->featured_product_title = $request->input('featured_product_title');
        $featuredproductsection->featured_product_subtitle = $request->input('featured_product_subtitle');
        $featuredproductsection->save();

        return redirect()->back()->with('status', 'Featured product section saved successfully!');
    }

    //UPDATE FEATURED PRODUCT SECTION
    public function updateFeaturedProductSection(Request $request, $id){
        $request->validate([
            'featured_product_title' => 'required',
            'featured_product_subtitle' => 'required',
        ]);

        // Find the featured product section by id
        $featuredproductsection = featproductsection::find($id);
        if (!$featuredproductsection) {
            return redirect()->back()->with('error', 'Featured product section not found.');
        }

        // Update featured product section
        $featuredproductsection->featured_product_title = $request->input('featured_product_title');
        $featuredproductsection->featured_product_subtitle = $request->input('featured_product_subtitle');
        $featuredproductsection->update();

        return redirect()->back()->with('status', 'Featured product section updated successfully!');
    }

    //SAVE LATEST PRODUCT SECTION

    public function saveLatestProductSection(Request $request){
        $request->validate([
            'latest_product_title' => 'required',
            'latest_product_subtitle' => 'required',
        ]);

        // Save or update latest product section
        $latestproductsection = new latestproductsection;
        $latestproductsection->latest_product_title = $request->input('latest_product_title');
        $latestproductsection->latest_product_subtitle = $request->input('latest_product_subtitle');
        $latestproductsection->save();

        return redirect()->back()->with('status', 'Latest product section saved successfully!');
    }

    //UPDATE LATEST PRODUCT SECTION
    public function updateLatestProductSection(Request $request, $id){
        $request->validate([
            'latest_product_title' => 'required',
            'latest_product_subtitle' => 'required',
        ]);

        // Find the latest product section by id
        $latestproductsection = latestproductsection::find($id);
        if (!$latestproductsection) {
            return redirect()->back()->with('error', 'Latest product section not found.');
        }

        // Update latest product section
        $latestproductsection->latest_product_title = $request->input('latest_product_title');
        $latestproductsection->latest_product_subtitle = $request->input('latest_product_subtitle');
        $latestproductsection->update();

        return redirect()->back()->with('status', 'Latest product section updated successfully!');
    }

    // SAVE POPULAR PRODUCT SECTION
    public function savePopularProductSection(Request $request){
        $request->validate([
            'popular_product_title' => 'required',
            'popular_product_subtitle' => 'required',
        ]);

        // Save or update popular product section
        $popularproductsection = new popularproductsection;
        $popularproductsection->popular_product_title = $request->input('popular_product_title');
        $popularproductsection->popular_product_subtitle = $request->input('popular_product_subtitle');
        $popularproductsection->save();

        return redirect()->back()->with('status', 'Popular product section saved successfully!');
    }
}
