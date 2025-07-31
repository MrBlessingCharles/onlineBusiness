@extends('Client_layout.master')

@section('title', 'dashboard')

@section('content')
 <!-- ********************** start content ********************** -->
	  <!-- start page content -->
      <div class="page">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="user-sidebar">
                     <ul>
                        <a href="dashboard.php"><button class="btn btn-danger">Dashboard</button></a>
                        <a href="customer-profile-update.php"><button class="btn btn-danger">Update Profile</button></a>
                        <a href="customer-billing-shipping-update.php"><button class="btn btn-danger">Update Billing and Shipping Info</button></a>
                        <a href="customer-password-update.php"><button class="btn btn-danger">Update Password</button></a>
                        <a href="customer-order.php"><button class="btn btn-danger">Orders</button></a>
                        <a href="logout.php"><button class="btn btn-danger">Logout</button></a>
                     </ul>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="user-content">
                     <h3 class="text-center">
                        Welcome to the Dashboard                    
                     </h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
	  <!-- end page content -->
	  <!-- ********************** end content ********************** -->

@endsection