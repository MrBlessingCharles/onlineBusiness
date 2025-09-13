<?php

namespace App\Http\Controllers;

use App\Models\slider;
use App\Models\product;
use App\Models\service;
use Illuminate\Http\Request;
use App\Models\Productsetting;
use App\Http\Controllers\Controller;

class ClientController extends Controller
{
    public function home()
    {
        $sliders = slider::get();
        $increment = 0;
        $increment1 = 0;
        $services = service::get();
        $count_products = Productsetting::first();
        $featured_products = product::limit($count_products->total_featured_product_home)->get();
        $latest_products = product::limit($count_products->total_latest_product_home)->orderby('created_at', 'DESC')->get();
        $popular_products = product::limit($count_products->total_popular_product_home)->orderby('soldqty', 'DESC')->get();
        // Logic to retrieve and display clients can be added here
        return view('client.home', compact('sliders', 'increment' , 'increment1', 'services' ,
        'featured_products', 'latest_products', 'popular_products')); // Assuming you have a view for displaying clients
    }


    public function about()
    {
        // Logic for the about page can be added here
        return view('client.about'); // Assuming you have a view for the about page
    }

    public function faqpage()
    {
        // Logic for the FAQ page can be added here
        return view('client.faq'); // Assuming you have 
    // Additional methods for ClientController can be added here
    }


    public function contactpage()
    {
        // Logic for the contact page can be added here
        return view('client.contact'); // Assuming you have a view for the contact page
    }

    public function viewloginpage()
    {
        // Logic for the terms page can be added here
        return view('client.login'); // Assuming you have a view for the terms page
    }

    public function viewregisterpage()
    {
        // Logic for the terms page can be added here
        return view('client.register'); // Assuming you have a view for the terms page
    }

    public function viewcartpage()
    {
        // Logic for the cart page can be added here
        return view('client.cart'); // Assuming you have a view for the cart page
    }

    public function viewcheckoutpage()
    {
        // Logic for the checkout page can be added here
        return view('client.checkout'); // Assuming you have a view for the checkout page
    }

    public function viewdashboardpage()
    {
        // Logic for the dashboard page can be added here
        return view('client.dashboard'); // Assuming you have a view for the dashboard page
    }

    public function viewprofilepage()
    {
        // Logic for the profile page can be added here
        return view('client.profile'); // Assuming you have a view for the profile page
    }

    public function viewbillingsdetailspage()
    {
        // Logic for the billing details page can be added here
        return view('client.billingsdetails'); // Assuming you have a view for the billing details page
    }
    public function viewcustomerorderspage()
    {
        // Logic for the orders page can be added here
        return view('client.customerorders'); // Assuming you have a view for the orders page
    }
    public function viewproductbytopcategorypage($tcatname)
    {
        // Logic for the order details page can be added here
        $products= product::where('tcat_name',$tcatname)->get();
        return view('client.productbycategory', compact('products')); // Assuming you have a view for the order details page
    }
    public function viewproductbymiddlecategorypage($tcatname, $mcatname)
    {
        // Logic for the order details page can be added here
        $products= product::where('tcat_name',$tcatname)->where('mcat_name',$mcatname)->get();
        return view('client.productbycategory', compact('products')); // Assuming you have a view for the order details page
    }

    public function viewproductbyendlevelcategorypage($tcatname, $mcatname, $ecatname)
    {
        // Logic for the order details page can be added here
        $products= product::where('tcat_name',$tcatname)->where('mcat_name',$mcatname)->where('ecat_name',$ecatname)->get();
        return view('client.productbycategory', compact('products')); // Assuming you have a view for the order details page
    }
    public function viewproductdetailspage($id)
    {
        $products= product::find($id);
        $increment = 0;
        $selectedsizes = explode("*", $products->size);
        array_pop($selectedsizes) ;

        $selectedcolors = explode("*", $products->color);
        array_pop($selectedcolors) ;

        $selectedphotos = explode("*", $products->photo);
        array_pop($selectedphotos) ;
        // Logic for the product details page can be added here
        return view('client.productdetails', compact('products', 'increment', 'selectedsizes',
         'selectedcolors', 'selectedphotos')); // Assuming you have a view for the product details page
    }

    public function viewloginpasswordpage()
    {
        // Logic for the login password page can be added here
        return view('client.loginpassword'); // Assuming you have a view for the login password page
    }

    public function viewsearchproductpage()
    {
        // Logic for the search product page can be added here
        return view('client.searchproduct'); // Assuming you have a view for the search product page
    }

}
