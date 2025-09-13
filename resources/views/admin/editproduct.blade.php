@extends('admin_layout.master')
@section('title', 'edit product')

@section('content')
 	<!-- start content -->
         <div class="content-wrapper">
            <section class="content-header">
               <div class="content-header-left">
                  <h1>Edit Product</h1>
               </div>
               <div class="content-header-right">
                  <a href="{{url('/admin/product')}}" class="btn btn-primary btn-sm">View All</a>
               </div>
            </section>
            @if(session('status'))
               <section class="content" style="min-height:auto;margin-bottom: -30px;">
                     <div class="row">
                     <div class="col-md-12">
                        <div class="callout callout-success">
                           <p>{{Session::get("status")}}</p>
                        </div>
                     </div>
                     </div>
               </section>
               
            @endif
            @if (count($errors) > 0)
               <section class="content" style="min-height:auto;margin-bottom: -30px;">
                     <div class="row">
                     <div class="col-md-12">
                        <div class="callout callout-danger">
                           <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                     </div>
               </section>
               @endif

            <section class="content">
               <div class="row">
                  <div class="col-md-12">
                     <form class="form-horizontal" action="{{url('admin/updateproduct', [$product->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="box box-info">
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Top Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="tcat_name" class="form-control select2 top-cat">

                                       <option value="{{ $product->tcat_name }}">{{ $product->tcat_name }}</option>
                                       @foreach($toplevelcategories as $toplevelcategory)
                                          <option value="{{ $toplevelcategory->tcat_name }}">{{ $toplevelcategory->tcat_name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Mid Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="mcat_name" class="form-control select2 mid-cat">

                                      <option value="{{ $product->mcat_name }}">{{ $product->mcat_name }}</option>
                                       @foreach($midlelevelcategories as $midlelevelcategory)
                                          <option value="{{ $midlelevelcategory->mcat_name }}">{{ $midlelevelcategory->mcat_name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">End Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="ecat_name" class="form-control select2 end-cat">

                                      <option value="{{ $product->ecat_name }}">{{ $product->ecat_name }}</option>
                                       @foreach($endlevelcategories as $endlevelcategory)
                                          <option value="{{ $endlevelcategory->ecat_name }}">{{ $endlevelcategory->ecat_name }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <input type="text" name="p_name" class="form-control" value="{{ $product->p_name }}">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Old Price<br><span style="font-size:10px;font-weight:normal;">(In USD)</span></label>
                                 <div class="col-sm-4">
                                    <input type="text" name="p_old_price" class="form-control" value="{{ $product->p_old_price }}">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Current Price <span>*</span><br><span style="font-size:10px;font-weight:normal;">(In USD)</span></label>
                                 <div class="col-sm-4">
                                    <input type="text" name="p_current_price" class="form-control" value="{{ $product->p_current_price }}">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Quantity <span>*</span></label>
                                 <div class="col-sm-4">
                                    <input type="text" name="p_qty" class="form-control" value="{{ $product->p_qty}}">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Select Size</label>
                                 <div class="col-sm-4">
                                    <select name="size[]" class="form-control select2" multiple="multiple">

                                       @foreach($selectedSizes as $size)
                                          <option value="{{ $size }}" selected>{{ $size }}</option>
                                       @endforeach

                                       @foreach($sizes as $size)
                                          <option value="{{ $size }}">{{ $size }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Select Color</label>
                                 <div class="col-sm-4">
                                    <select name="color[]" class="form-control select2" multiple="multiple">

                                       @foreach($selectedcolors as $color)
                                          <option value="{{ $color }}" selected>{{ $color }}</option>
                                       @endforeach

                                       @foreach($colors as $color)
                                          <option value="{{ $color }}">{{ $color }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Existing Featured Photo</label>
                                 <div class="col-sm-4" style="padding-top:4px;">
                                    <img src=" {{asset('/storage/public/productimages/'.$product->p_featured_photo) }} " alt="" style="width:150px;">
                                    <input type="hidden" name="current_photo" value="product-featured-102.jpg">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Change Featured Photo </label>
                                 <div class="col-sm-4" style="padding-top:4px;">
                                    <input type="file" name="p_featured_photo">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Other Photos</label>
                                 <div class="col-sm-4" style="padding-top:4px;">
                                    <table id="ProductTable" style="width:100%;">
                                       <tbody>
                                          <!-- existing photos -->
                                         @foreach($selectedphotos as $selectedphoto)
                                          <tr>
                                              <td>
                                                <img src="{{ asset('/storage/public/productimages/'.$selectedphoto) }}" alt="" style="width:150px;margin-bottom:5px;">
                                              </td>
                                             <td style="width:28px;">
                                                <a href="{{url('admin/deleteortherphoto', [$product->id, $selectedphoto] )}}" class="btn btn-danger btn-xs">X</a>
                                             </td>
                                          </tr>
                                           @endforeach


                                         
                                       </tbody>
                                    </table>
                                 </div>
                                 <div class="col-sm-2">
                                    <input type="button" id="btnAddNew" value="Add Item" style="margin-top: 5px;margin-bottom:10px;border:0;color: #fff;font-size: 14px;border-radius:3px;" class="btn btn-warning btn-xs">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Description</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_description" class="form-control" cols="30" rows="10" id="editor1" required>{{ $product->p_description}}</textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Short Description</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_short_description" class="form-control" cols="30" rows="10" id="editor1">{{ $product->p_short_description}}</textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Features</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_feature" class="form-control" cols="30" rows="10" id="editor3">{{ $product->p_feature}}</textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Conditions</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_condition" class="form-control" cols="30" rows="10" id="editor4">{{ $product->p_condition}}</textarea>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Return Policy</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_return_policy" class="form-control" cols="30" rows="10" id="editor5">{{ $product->p_return_policy}}</textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Is Featured?</label>
                                 <div class="col-sm-8">
                                    <select name="p_is_featured" class="form-control" style="width:auto;">

                                       @if($product->p_is_featured == 1)
                                       <option value="0" >No</option>
                                       <option value="1" selected>Yes</option>
                                       @else
                                       <option value="0" selected>No</option>
                                       <option value="1" >Yes</option>
                                       @endif
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Is Active?</label>
                                 <div class="col-sm-8">
                                    <select name="p_is_active" class="form-control" style="width:auto;">
                                       @if($product->p_is_active == 1)
                                          <option value="0" >No</option>
                                          <option value="1" selected>Yes</option>
                                       @else
                                          <option value="0" selected>No</option>
                                          <option value="1" >Yes</option>
                                       @endif
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label"></label>
                                 <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form1">Update</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </section>
         </div>
		<!-- end Content -->
 

@endsection