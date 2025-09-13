@extends('Client_layout.master')

@section('title', 'Home')

@section('content')
      <!-- ********************* start content ******************** -->

      <!-- start sliders -->
      <div id="bootstrap-touch-slider" class="carousel bs-slider fade control-round indicators-line" data-ride="carousel" data-pause="hover" data-interval="false" >
         <!-- Indicators -->
         <ol class="carousel-indicators">
            @foreach($sliders as $key=>$slider)
            <li data-target="#bootstrap-touch-slider"  class="{{$increment==0 ? 'active' :''}}"data-slide-to="{{$increment++}}"></li>
            @endforeach
         </ol>
         <!-- Wrapper For Slides -->
         <div class="carousel-inner" role="listbox">
            @foreach($sliders as $slider)
            <div class="item {{$increment1==0? 'active': ''}}" style="background-image:url( {{asset('/storage/public/sliderimages/'.$slider->photo) }});">

               <div class="bs-slider-overlay"></div>
               <div class="container">
                  <div class="row">
                     <div class="slide-text slide_style_{{strtolower( $slider->position) }}">
                        <h1 data-animation="animated flipInX">{{$slider->heading }}</h1>
                        <p data-animation="animated  {{strtolower( $slider->position) == 'center' ?
                         'fadeInLeft' : (strtolower( $slider->position) == 'right' ? 'fadeInRight' : 'fadeInDown') }}
                        fadeInDown">{{$slider->content }}</p>

                        <a href="product-category.php?id=4&type=mid-category" target="_blank"  
                        class="btn btn-primary" data-animation="animated fadeInDown">{{$slider->button_text }}</a>
                     </div>
                  </div>
               </div>
            </div>
            @php $increment1++; @endphp

            @endforeach
            <!-- <div class="item " style="background-image:url(asset('frontend/assets/uploads/slider-2.jpg')}});">
               <div class="bs-slider-overlay"></div>
               <div class="container">
                  <div class="row">
                     <div class="slide-text slide_style_center">
                        <h1 data-animation="animated flipInX">50% Discount on All Products</h1>
                        <p data-animation="animated fadeInDown">Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.</p>
                        <a href="#" target="_blank"  class="btn btn-primary" data-animation="animated fadeInDown">Read More</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="item " style="background-image:url({{asset('frontend/assets/uploads/slider-3.png')}});">
               <div class="bs-slider-overlay"></div>
               <div class="container">
                  <div class="row">
                     <div class="slide-text slide_style_right">
                        <h1 data-animation="animated zoomInRight">24 Hours Customer Support</h1>
                        <p data-animation="animated fadeInRight">Lorem ipsum dolor sit amet, an labores explicari qui, eu nostrum copiosae argumentum has.</p>
                        <a href="#" target="_blank"  class="btn btn-primary" data-animation="animated fadeInRight">Read More</a>
                     </div>
                  </div>
               </div>
            </div> -->
         </div>
         <!-- Slider Left Control -->
         <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
         <span class="fa fa-angle-left" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
         </a>
         <!-- Slider Right Control -->
         <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
         <span class="fa fa-angle-right" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
         </a>
      </div>
      <!-- end sliders -->

      <!-- start services -->
      <div class="service bg-gray">
         <div class="container">
            <div class="row">    
               @foreach($services as $service)
               <div class="col-md-4">
                  <div class="item">
                     <div class="photo"><img src=" {{asset('/storage/public/serviceimage/'.$service->photo) }}" width="150px" alt="Easy Returns"></div>
                     <h3>{{$service->title }}</h3>
                     <p>
                        {{$service->content }}                          
                     </p>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
      <!-- end services -->

      <!-- start featured products -->
      <div class="product pt_70 pb_70">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="headline">
                     <h2>Featured Products</h2>
                     <h3>Our list on Top Featured Products</h3>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="product-carousel">
                     @foreach($featured_products as $featured_product)
                     <div class="item">
                        <div class="thumb">
                           <div class="photo" style="background-image:url({{asset('/storage/public/productimages/'.$featured_product->p_featured_photo) }});"></div>
                           <div class="overlay"></div>
                        </div>
                        <div class="text">
                           <h3><a href="{{url('productdetails', [$featured_product->id]) }}">{{$featured_product->p_name}} </a></h3>
                           <h4>
                              {{$featured_product->p_current_price}}
                              <del>
                              {{$featured_product->p_old_price}}                                  </del>
                           </h4>
                           <div class="rating">
                           </div>
                           <p><a href="{{url('productdetails', [$featured_product->id]) }}"><i class="fa fa-shopping-cart"></i> Add to Cart</a></p>
                        </div>
                     </div>
                     @endforeach

                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end featured products -->

      <!-- start lastest products -->
      <div class="product bg-gray pt_70 pb_30">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="headline">
                     <h2>Latest Products</h2>
                     <h3>Our list of recently added products</h3>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="product-carousel">
                     @foreach($latest_products as $latest_product)
                     <div class="item">
                        <div class="thumb">
                           <div class="photo" style="background-image:url({{asset('/storage/public/productimages/'.$latest_product->p_featured_photo) }});"></div>
                           <div class="overlay"></div>
                        </div>
                        <div class="text">
                           <h3><a href="{{url('productdetails', [$latest_product->id]) }}">{{$latest_product->p_name}}</a></h3>
                           <h4>
                              {{$latest_product->p_old_price}}
                              <del>
                              {{$latest_product->p_current_price}}                                 </del>
                           </h4>
                           <div class="rating">
                           </div>
                           <p><a href="{{url('productdetails', [$latest_product->id]) }}"><i class="fa fa-shopping-cart"></i> Add to Cart</a></p>
                        </div>
                     </div>
                     @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end lastest products -->

      <!-- start popular products -->
      <div class="product pt_70 pb_70">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="headline">
                     <h2>Popular Products</h2>
                     <h3>Popular products based on customer's choice</h3>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="product-carousel">
                     @foreach($popular_products as $popular_product)
                      <div class="item">
                        <div class="thumb">
                           <div class="photo" style="background-image:url({{asset('/storage/public/productimages/'.$popular_product->p_featured_photo) }});"></div>
                           <div class="overlay"></div>
                        </div>
                        <div class="text">
                           <h3><a href="{{url('productdetails', [$popular_product->id]) }}">{{$popular_product->p_name}}</a></h3>
                           <h4>
                              {{$popular_product->p_old_price}}
                              <del>
                              {{$popular_product->p_current_price}}                                 </del>
                           </h4>
                           <div class="rating">
                           </div>
                           <p><a href="{{url('productdetails', [$popular_product->id]) }}"><i class="fa fa-shopping-cart"></i> Add to Cart</a></p>
                        </div>
                     </div>
                    @endforeach
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end popular products -->

      <!-- ********************** end content ******************** -->

@endsection
