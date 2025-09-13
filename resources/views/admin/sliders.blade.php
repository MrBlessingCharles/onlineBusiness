 @extends('admin_layout.master')
@section('title', 'all sliders')

@section('content')

<!-- start content -->
         <div class="content-wrapper">
            <section class="content-header">
               <div class="content-header-left">
                  <h1>View Sliders</h1>
               </div>
               <div class="content-header-right">
                  <a href="{{url('/admin/addslider')}}" class="btn btn-primary btn-sm">Add Slider</a>
               </div>
            </section>
            <section class="content">
               <div class="row">
                  <div class="col-md-12">
                     <div class="box box-info">
                        <div class="box-body table-responsive">
                           <table id="example1" class="table table-bordered table-hover table-striped">
                              <thead>
                                 <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Heading</th>
                                    <th>Content</th>
                                    <th>Button Text</th>
                                    <th>Button URL</th>
                                    <th>Position</th>
                                    <th width="140">Action</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 @foreach($sliders as $slider)
                                 <tr>
                                    <td>{{$increment++}}</td>
                                    <td style="width:150px;"><img src="{{asset('/storage/public/sliderimages/'.$slider->photo) }}" alt="Welcome to Ecommerce PHP" style="width:140px;"></td>
                                    <td>{{$slider->heading }}</td>
                                    <td>{{$slider->content }}</td>
                                    <td>{{$slider->button_text }}</td>
                                    <td>{{$slider->button_url }}</td>
                                    <td>{{$slider->position }}</td>
                                    <td style="display: flex;">
                                    <a href="{{url('admin/editslider', [$slider->id])}}" class="btn btn-primary btn-xs">Edit</a>
                                    <!-- <a href="#" class="btn btn-danger btn-xs" data-href="size-delete.php?id=1" data-toggle="modal" data-target="#confirm-delete">Delete</a> -->
                                    <form action="{{url('admin/deleteslider', [$slider->id])}}" method="post">
                                       @csrf
                                       @method('DELETE')
   
                                       <button type="submit" class="btn btn-danger btn-xs" style="margin-left:5px;">Delete</button>
                                    </form> 

                                 </td>
                                 </tr>
                               @endforeach  
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
                     </div>
                     <div class="modal-body">
                        <p>Are you sure want to delete this item?</p>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger btn-ok">Delete</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
		<!-- end content -->

@endsection