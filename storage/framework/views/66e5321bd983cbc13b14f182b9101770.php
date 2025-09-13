 
<?php $__env->startSection('title', 'edit sliders'); ?>

<?php $__env->startSection('content'); ?>

<!-- start content -->

         <div class="content-wrapper">
            <section class="content-header">
               <div class="content-header-left">
                  <h1>Edit Slider</h1>
               </div>
               <div class="content-header-right">
                  <a href="<?php echo e(url('/admin/sliders')); ?>" class="btn btn-primary btn-sm">View All</a>
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
                     <form class="form-horizontal" action="<?php echo e(url('/admin/updateslider', [$slider->id])); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                     <input type="hidden" name="current_photo" value="slider-1.png">
                        <div class="box box-info">
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Existing Photo</label>
                                 <div class="col-sm-9" style="padding-top:5px">
                                    <img src="<?php echo e(asset('/storage/public/sliderimages/'.$slider->photo)); ?>" alt="Slider Photo" style="width:400px;">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Photo </label>
                                 <div class="col-sm-6" style="padding-top:5px">
                                    <input type="file" name="photo">(Only jpg, jpeg, gif and png are allowed)
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Heading </label>
                                 <div class="col-sm-6">
                                    <input type="text" autocomplete="off" class="form-control" name="heading" value="<?php echo e($slider->heading); ?>" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Content </label>
                                 <div class="col-sm-6">
                                    <textarea class="form-control" name="content" style="height:140px;" required><?php echo e($slider->content); ?></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Button Text </label>
                                 <div class="col-sm-6">
                                    <input type="text" autocomplete="off" class="form-control" name="button_text" value="<?php echo e($slider->button_text); ?>">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Button URL </label>
                                 <div class="col-sm-6">
                                    <input type="text" autocomplete="off" class="form-control" name="button_url" value="<?php echo e($slider->button_url); ?>" required>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-2 control-label">Position </label>
                                 <div class="col-sm-6">
                                    <select name="position" class="form-control">

                                    <?php if($slider->position == 'Left'): ?>
                                       <option value="Left" selected>Left</option>
                                       <option value="Center" >Center</option>
                                       <option value="Right" >Right</option>
                                    <?php elseif($slider->position == 'Center'): ?>

                                       <option value="Left" >Left</option>
                                       <option value="Center" selected>Center</option>
                                       <option value="Right" >Right</option>
                                    <?php else: ?>
                                       <option value="Left" >Left</option>
                                       <option value="Center" >Center</option>
                                       <option value="Right" selected>Right</option>
                                    <?php endif; ?>
                                   
                               </select>
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
<?php echo $__env->make('admin_layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views\admin\editsliders.blade.php ENDPATH**/ ?>