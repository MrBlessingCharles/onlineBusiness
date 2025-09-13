@extends('admin_layout.master')
@section('title', 'add product')

@section('content')
 
 
 <!-- start content -->
         <div class="content-wrapper">
            <section class="content-header">
               <div class="content-header-left">
                  <h1>Add Product</h1>
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
                     <form class="form-horizontal" action="{{url('admin/saveproduct')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="box box-info">
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Top Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="tcat_name" class="form-control select2 top-cat" required>
                                       <option value="">Select Top Level Category</option>

                                       @foreach($topcategories as $topcategory)
                                          <option value="{{$topcategory->tcat_name}}">{{$topcategory->tcat_name}}</option>
                                       
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Mid Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="mcat_name" class="form-control select2 mid-cat"required>
                                       <option value="">Select Mid Level Category</option>
                                       @foreach($middlecategories as $middlecategory)
                                          <option value="{{$middlecategory->mcat_name}}">{{$middlecategory->mcat_name}}</option>
                                       @endforeach
                                       </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">End Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="ecat_name" class="form-control select2 end-cat" required>
                                       <option value="">Select End Level Category</option>
                                       @foreach($endcategories as $endcategory)
                                          <option value="{{$endcategory->ecat_name}}">{{$endcategory->ecat_name}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <input type="text" name="p_name" class="form-control" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Old Price <br><span style="font-size:10px;font-weight:normal;">(In USD)</span></label>
                                 <div class="col-sm-4">
                                    <input type="number" name="p_old_price" class="form-control" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Current Price <span>*</span><br><span style="font-size:10px;font-weight:normal;">(In USD)</span></label>
                                 <div class="col-sm-4">
                                    <input type="number" name="p_current_price" class="form-control" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Quantity <span>*</span></label>
                                 <div class="col-sm-4">
                                    <input type="number" name="p_qty" class="form-control" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Select Size</label>
                                 <div class="col-sm-4">
                                    <select name="size[]" class="form-control select2" multiple="multiple" required>
                                       @foreach($sizes as $size)
                                          <option value="{{$size->size}}">{{$size->size}}</option>
                                       
                                      @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Select Color</label>
                                 <div class="col-sm-4">
                                    <select name="color[]" class="form-control select2" multiple="multiple" required>
                                       @foreach($colors as $color)
                                          <option value="{{$color->color_name}}">{{$color->color_name}}</option>
                                      @endforeach

                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Featured Photo <span>*</span></label>
                                 <div class="col-sm-4" style="padding-top:4px;">
                                    <input type="file" name="p_featured_photo" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Other Photos</label>
                                 <div class="col-sm-4" style="padding-top:4px;">
                                    <table id="ProductTable" style="width:100%;">
                                       <tbody>
                                          <tr>
                                             <td>
                                                <div class="upload-btn">
                                                   <input type="file" name="photo[]" style="margin-bottom:5px;" required>
                                                </div>
                                             </td>
                                             <td style="width:28px;"><a href="javascript:void()" class="Delete btn btn-danger btn-xs">X</a></td>
                                          </tr>
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
                                    <textarea name="p_description" class="form-control" cols="30" rows="10" id="editor1" required></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Short Description</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_short_description" class="form-control" cols="30" rows="10" id="editor2" required></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Features</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_feature" class="form-control" cols="30" rows="10" id="editor3" required></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Conditions</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_condition" class="form-control" cols="30" rows="10" id="editor4" required></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Return Policy</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_return_policy" class="form-control" cols="30" rows="10" id="editor5" required></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Is Featured?</label>
                                 <div class="col-sm-8">
                                    <select name="p_is_featured" class="form-control" style="width:auto;" required>
                                       <option value="0">No</option>
                                       <option value="1">Yes</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Is Active?</label>
                                 <div class="col-sm-8">
                                    <select name="p_is_active" class="form-control" style="width:auto;" required>
                                       <option value="0">No</option>
                                       <option value="1">Yes</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label"></label>
                                 <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success pull-left" name="form1">Add Product</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </section>
         </div>
		 <!-- end content -->
@endsection