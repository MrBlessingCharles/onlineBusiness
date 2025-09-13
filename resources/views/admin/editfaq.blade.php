@extends('admin_layout.master')
@section('title', 'edit faq')

@section('content')
	
    
    <!-- start content -->
			<div class="content-wrapper">
				<section class="content-header">
				<div class="content-header-left">
					<h1>Edit FAQ</h1>
				</div>
				<div class="content-header-right">
					<a href="{{url('admin/faq')}}" class="btn btn-primary btn-sm">View All</a>
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

				<section class="content">
				<div class="row">
					<div class="col-md-12">

						<form class="form-horizontal" action="{{url('admin/updatefaq', [$faq->id]) }}" method="post">
							@csrf
							@method('PUT')

							<div class="box box-info">
							<div class="box-body">
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Title <span>*</span></label>
									<div class="col-sm-6">
										<input type="text" autocomplete="off" class="form-control" name="faq_title" value="{{$faq->faq_title}}">
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label">Content <span>*</span></label>
									<div class="col-sm-9">
										<textarea class="form-control" name="faq_content" id="editor1" style="height:140px;">
											<h3 class="checkout-complete-box font-bold txt16" style="box-sizing: inherit; text-rendering: optimizeLegibility; margin: 0.2rem 0px 0.5rem; padding: 0px; line-height: 1.4; background-color: rgb(250, 250, 250);"><font color="#222222" face="opensans, Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif"><span style="font-size: 15.7143px;">We have a wide range of fabulous products to choose from.</span></font></h3><h3 class="checkout-complete-box font-bold txt16" style="box-sizing: inherit; text-rendering: optimizeLegibility; margin: 0.2rem 0px 0.5rem; padding: 0px; line-height: 1.4; background-color: rgb(250, 250, 250);"><span style="font-size: 15.7143px; color: rgb(34, 34, 34); font-family: opensans, "Helvetica Neue", Helvetica, Helvetica, Arial, sans-serif;">
												{{$faq->faq_content}}
											</span></h3><h3 class="checkout-complete-box font-bold txt16" style="box-sizing: inherit; text-rendering: optimizeLegibility; margin: 0.2rem 0px 0.5rem; padding: 0px; line-height: 1.4; background-color: rgb(250, 250, 250);"><font color="#222222" face="opensans, Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif"><span style="font-size: 15.7143px;">Tip 2: If you want to explore a category of products, use the Shop Categories in the upper menu, and navigate through your favorite categories where we'll feature the best products in each.</span></font><br><br></h3>
										</textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="" class="col-sm-2 control-label"></label>
									<div class="col-sm-6">
										<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
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