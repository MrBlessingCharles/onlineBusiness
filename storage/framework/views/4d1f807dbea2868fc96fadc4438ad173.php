
<?php $__env->startSection('title', 'edit product'); ?>

<?php $__env->startSection('content'); ?>
 	<!-- start content -->
         <div class="content-wrapper">
            <section class="content-header">
               <div class="content-header-left">
                  <h1>Edit Product</h1>
               </div>
               <div class="content-header-right">
                  <a href="<?php echo e(url('/admin/product')); ?>" class="btn btn-primary btn-sm">View All</a>
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
                     <form class="form-horizontal" action="<?php echo e(url('admin/updateproduct', [$product->id])); ?>" method="post" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="box box-info">
                           <div class="box-body">
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Top Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="tcat_name" class="form-control select2 top-cat">

                                       <option value="<?php echo e($product->tcat_name); ?>"><?php echo e($product->tcat_name); ?></option>
                                       <?php $__currentLoopData = $toplevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toplevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($toplevelcategory->tcat_name); ?>"><?php echo e($toplevelcategory->tcat_name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Mid Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="mcat_name" class="form-control select2 mid-cat">

                                      <option value="<?php echo e($product->mcat_name); ?>"><?php echo e($product->mcat_name); ?></option>
                                       <?php $__currentLoopData = $midlelevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $midlelevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($midlelevelcategory->mcat_name); ?>"><?php echo e($midlelevelcategory->mcat_name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">End Level Category Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <select name="ecat_name" class="form-control select2 end-cat">

                                      <option value="<?php echo e($product->ecat_name); ?>"><?php echo e($product->ecat_name); ?></option>
                                       <?php $__currentLoopData = $endlevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $endlevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($endlevelcategory->ecat_name); ?>"><?php echo e($endlevelcategory->ecat_name); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
                                 <div class="col-sm-4">
                                    <input type="text" name="p_name" class="form-control" value="<?php echo e($product->p_name); ?>">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Old Price<br><span style="font-size:10px;font-weight:normal;">(In USD)</span></label>
                                 <div class="col-sm-4">
                                    <input type="text" name="p_old_price" class="form-control" value="<?php echo e($product->p_old_price); ?>">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Current Price <span>*</span><br><span style="font-size:10px;font-weight:normal;">(In USD)</span></label>
                                 <div class="col-sm-4">
                                    <input type="text" name="p_current_price" class="form-control" value="<?php echo e($product->p_current_price); ?>">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Quantity <span>*</span></label>
                                 <div class="col-sm-4">
                                    <input type="text" name="p_qty" class="form-control" value="<?php echo e($product->p_qty); ?>">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Select Size</label>
                                 <div class="col-sm-4">
                                    <select name="size[]" class="form-control select2" multiple="multiple">

                                       <?php $__currentLoopData = $selectedSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($size); ?>" selected><?php echo e($size); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                       <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($size); ?>"><?php echo e($size); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Select Color</label>
                                 <div class="col-sm-4">
                                    <select name="color[]" class="form-control select2" multiple="multiple">

                                       <?php $__currentLoopData = $selectedcolors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($color); ?>" selected><?php echo e($color); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                       <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($color); ?>"><?php echo e($color); ?></option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Existing Featured Photo</label>
                                 <div class="col-sm-4" style="padding-top:4px;">
                                    <img src=" <?php echo e(asset('/storage/public/productimages/'.$product->p_featured_photo)); ?> " alt="" style="width:150px;">
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
                                         <?php $__currentLoopData = $selectedphotos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $selectedphoto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <tr>
                                              <td>
                                                <img src="<?php echo e(asset('/storage/public/productimages/'.$selectedphoto)); ?>" alt="" style="width:150px;margin-bottom:5px;">
                                              </td>
                                             <td style="width:28px;">
                                                <a href="<?php echo e(url('admin/deleteortherphoto', [$product->id, $selectedphoto] )); ?>" class="btn btn-danger btn-xs">X</a>
                                             </td>
                                          </tr>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                         
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
                                    <textarea name="p_description" class="form-control" cols="30" rows="10" id="editor1" required><?php echo e($product->p_description); ?></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Short Description</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_short_description" class="form-control" cols="30" rows="10" id="editor1"><?php echo e($product->p_short_description); ?></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Features</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_feature" class="form-control" cols="30" rows="10" id="editor3"><?php echo e($product->p_feature); ?></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Conditions</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_condition" class="form-control" cols="30" rows="10" id="editor4"><?php echo e($product->p_condition); ?></textarea>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Return Policy</label>
                                 <div class="col-sm-8">
                                    <textarea name="p_return_policy" class="form-control" cols="30" rows="10" id="editor5"><?php echo e($product->p_return_policy); ?></textarea>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Is Featured?</label>
                                 <div class="col-sm-8">
                                    <select name="p_is_featured" class="form-control" style="width:auto;">

                                       <?php if($product->p_is_featured == 1): ?>
                                       <option value="0" >No</option>
                                       <option value="1" selected>Yes</option>
                                       <?php else: ?>
                                       <option value="0" selected>No</option>
                                       <option value="1" >Yes</option>
                                       <?php endif; ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="" class="col-sm-3 control-label">Is Active?</label>
                                 <div class="col-sm-8">
                                    <select name="p_is_active" class="form-control" style="width:auto;">
                                       <?php if($product->p_is_active == 1): ?>
                                          <option value="0" >No</option>
                                          <option value="1" selected>Yes</option>
                                       <?php else: ?>
                                          <option value="0" selected>No</option>
                                          <option value="1" >Yes</option>
                                       <?php endif; ?>
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
 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin_layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views\admin\editproduct.blade.php ENDPATH**/ ?>