<?php

namespace App\Http\Controllers;

use App\Models\size;
use App\Models\color;
use App\Models\banner;
use App\Models\favicon;
use App\Models\Message;
use App\Models\logoimage;
use App\Models\newsletter;
use App\Models\information;
use App\Models\Metasection;
use App\Models\onoffsection;
use Illuminate\Http\Request;
use App\Models\Paymentsetting;
use App\Models\Productsetting;
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
        // Logic to display the admin country management page
        return view('admin.country');
    }

    public function viewaddcountry()
    {
        // Logic to display the page for adding a new country
        return view('admin.addcountry');
    }

    public function vieweditcountry()
    {
        // Logic to display the page for editing an existing country
        return view('admin.editcountry');
    }
    
    public function viewshippingcoast()
    {
        // Logic to display the admin shipping coast management page
        return view('admin.shippingcoast');
    }

     public function vieweditshippingcoast()
    {
        // Logic to display the admin shipping coast management page
        return view('admin.editshippingcoast');
    }


     public function viewfaq()
    {
        // Logic to display the FAQ management page
        return view('admin.faq');
    }

    public function vieweditfaq()
    {
        // Logic to display the page for editing an existing FAQ
        return view('admin.editfaq');
    }

    public function viewaddfaq()
    {
        // Logic to display the page for adding a new FAQ
        return view('admin.addfaq');
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
