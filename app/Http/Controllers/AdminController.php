<?php

namespace App\Http\Controllers;

use App\Models\faq;
use App\Models\size;
use App\Models\color;
use App\Models\banner;
use App\Models\country;
use App\Models\favicon;
use App\Models\Message;
use App\Models\logoimage;
use App\Models\newsletter;
use App\Models\information;
use App\Models\Metasection;
use App\Models\onoffsection;
use Illuminate\Http\Request;
use App\Models\shippingcoast;
use App\Models\Paymentsetting;
use App\Models\Productsetting;
use App\Models\toplevelcategory;
use App\Models\shippingcoastrest;
use App\Models\featproductsection;
use App\Http\Controllers\Controller;
use App\Models\latestproductsection;
use App\Models\popularproductsection;

class AdminController extends Controller
{
    
    public function viewadmindashboard()
    {
        // Logic to display the admin dashboard
        return view('admin.dashboard');
    }

    public function viewadminsettings()
    {   

        $logoImages = logoimage::first();
        $favicons = favicon::first();
        $information = information::first();
        $message= Message::first();
        $productsetting = Productsetting::first(); 
        $onoffsection = onoffsection::first(); 
        $metasection = Metasection::first(); 
        $featuredproductsection = featproductsection::first();
        $latestproductsection = latestproductsection::first();
        $popularproductsection = popularproductsection::first();
        $newsletter = newsletter::first(); 
        $banner = banner::first();
        $paymentsetting = Paymentsetting::first();
        // Logic to display the admin settings page
        return view('admin.settings', compact('logoImages', 'favicons', 
        'information', 'message', 'productsetting','onoffsection', 'metasection', 
        'featuredproductsection', 'latestproductsection', 'popularproductsection', 'newsletter', 
        'banner', 'paymentsetting'));
    }

    public function viewadminsize()
    {

        $sizes = size::get();
        $increment = 1;
        // Logic to display the admin size management page
        return view('admin.size' , compact('sizes' , 'increment'));
    }

    public function addadminsize()
    {
        // Logic to display the page for adding a new size
        return view('admin.addsize');
    }

  

    public function viewcolor()
    {
        $colors = color::get();
        $increment = 1;
        // Logic to display the admin color management page
        return view('admin.color' , compact('colors', 'increment'));
    }

    public function addadmincolor()
    {
        // Logic to display the page for adding a new color
        return view('admin.addcolor');
    }



    public function viewcountry()
    {
        
        $countries = country::get();
        $increment = 1;
        // Logic to display the admin country management page
        return view('admin.country' , compact('countries', 'increment'));
    }

    public function viewaddcountry()
    {
        // Logic to display the page for adding a new country
        return view('admin.addcountry');
    }

    
    
    public function viewshippingcoast()
    {
        $countries = country::get();
        $shippingcoasts = shippingcoast::with('country')->get();
        $shippingcoastrest = shippingcoastrest::first();
        $increment = 1;
        // Logic to display the admin shipping coast management page
        return view('admin.shippingcoast', compact('countries', 'shippingcoasts' , 'increment' , 'shippingcoastrest'));
    }

     
   
    
        public function viewfaq()
    {
        $faqs= faq::get();
        $increment = 1;
        // Logic to display the FAQ management page
        return view('admin.faq', compact('faqs', 'increment'));
    }

    //save faq
    public function savefaq(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'faq_title' => 'required|string',
            'faq_content' => 'required|string',
        ]);

        // Create a new FAQ entry
        $faq = new faq();
        $faq->faq_title = $request->input('faq_title');
        $faq->faq_content = $request->input('faq_content');
        $faq->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'FAQ added successfully.');
    }

    public function vieweditfaq($id)
    {
        // Logic to display the page for editing an existing FAQ
        $faq = faq::find($id);



        return view('admin.editfaq' , compact('faq'));
    }

    //update faq
    public function updatefaq(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'faq_title' => 'required|string',
            'faq_content' => 'required|string',
        ]);

        // Find the existing FAQ entry
        $faq = faq::find($id);
        if (!$faq) {
            return redirect()->back()->with('error', 'FAQ not found.');
        }

        // Update the FAQ entry
        $faq->faq_title = $request->input('faq_title');
        $faq->faq_content = $request->input('faq_content');
        $faq->save();

        // Redirect back with a success message
        return redirect()->back()->with('status', 'FAQ updated successfully.');
    }

    public function viewaddfaq()
    {
        // Logic to display the page for adding a new FAQ
        return view('admin.addfaq');
    }
    //delete faq

    public function deletefaq($id)
    {
        $faq = faq::find($id);
        if (!$faq) {
            return redirect()->back()->with('error', 'FAQ not found.');
        }

        $faq->delete();
        return redirect()->back()->with('status', 'FAQ deleted successfully.');
    }

    public function viewregistercustomer()
    {
        // Logic to display the page for registering a new customer
        return view('admin.registercustomer');
    }

    public function viewpagesettings()
    {
        // Logic to display the page for managing page settings
        return view('admin.pagesettings');
    }

    public function viewsocialmedia()
    {
        // Logic to display the social media settings page
        return view('admin.socialmedia');
    }
    public function viewsubscriber(){
        // Logic to display the social media settings page
        return view('admin.subscriber');
    }


    public function viewadminprofile()
    {
        // Logic to display the admin profile page
        return view('admin.adminprofile');
    }
    
}
