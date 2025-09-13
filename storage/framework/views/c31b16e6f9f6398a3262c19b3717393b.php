 
<?php $__env->startSection('title', 'add services'); ?>

<?php $__env->startSection('content'); ?>
	<!-- start content -->
         <div class="content-wrapper">
            <section class="content-header">
               <div class="content-header-left">
                  <h1>Edit Service</h1>
               </div>
               <div class="content-header-right">
                  <a href="<?php echo e(url('/admin/services')); ?>" class="btn btn-primary btn-sm">View All</a>
               </div>
            </section>

            <?php if(session('status')): ?>
                        <section class="content" style="min-height:auto;margin-bottom: -30px;">
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="callout callout-success">
                                    <p><?php echo e(Session::get("status")); ?></p>
                                    </div>
                                </div>
                                </div>
                        </section>
                        <?php endif; ?>
                        <?php if(count($errors) > 0): ?>
                        <section class="content" style="min-height:auto;margin-bottom: -30px;">
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="callout callout-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    </div>
                                </div>
                                </div>
                        </section>
            <?php endif; ?>


            <section class="content">
               <div class="row">
                  <div class="col-md-12">
                     <form class="form-horizontal" action="<?php echo e(url('admin/updateservice', [$service->id])); ?>" method="post" enctype="multipart/form-data">
                     <?php echo csrf_field(); ?>
                     <?php echo method_field('PUT'); ?>   

                     <input type="hidden" name="current_photo" value="service-5.png">
                        <div class="box box-info">
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Title <span>*</span></label>
                                 <div class="col-sm-6">
                                    <input type="text" autocomplete="off" class="form-control" name="title" value="<?php echo e($service->title); ?>" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Content <span>*</span></label>
                                 <div class="col-sm-6">
                                    <textarea class="form-control" name="content" style="height:140px;"required><?php echo e($service->content); ?></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Existing Photo</label>
                                 <div class="col-sm-9" style="padding-top:5px">
                                    <img src="<?php echo e(asset('/storage/public/serviceimage/'.$service->photo)); ?>" alt="Service Photo" style="width:180px;">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Photo </label>
                                 <div class="col-sm-6" style="padding-top:5px">
                                    <input type="file" name="photo">(Only jpg, jpeg, gif and png are allowed)
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views\admin\editservice.blade.php ENDPATH**/ ?>