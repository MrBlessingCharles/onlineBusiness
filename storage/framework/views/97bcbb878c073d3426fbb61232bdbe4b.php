 

<?php $__env->startSection('title', 'product category'); ?>

<?php $__env->startSection('content'); ?>

 <!-- ********************** start content ********************** -->

    <!-- start banner -->
    <div class="page-banner" style="background-image: url(<?php echo e(asset('frontend/assets/uploads/banner_product_category.jpg')); ?>);">
      <div class="inner">
         <h1>Category: <?php echo e($product->tcat_name); ?> </h1>
      </div>
  </div>
   <!-- end banner -->
<?php
$increment = 1;
$increment1= 1;
?>
  <!-- start page content -->
  <div class="page">
      <div class="container">
         <div class="row">
            <div class="col-md-3">
               <h3>Categories</h3>
               <div id="left" class="span3">
                  <ul id="menu-group-1" class="nav menu">
                     <?php $__currentLoopData = $toplevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toplevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <li class="cat-level-1 deeper parent">
                        <a class="" href="<?php echo e(url('productbytopcategory',[$toplevelcategory->tcat_name])); ?>">
                        <span data-toggle="collapse" data-parent="#menu-group-1" href="#cat-lvl1-id-<?php echo e($increment); ?>" class="sign"><i class="fa fa-plus"></i></span>
                        <span class="lbl"><?php echo e($toplevelcategory->tcat_name); ?></span>                      
                        </a>
                        <ul class="children nav-child unstyled small collapse" id="cat-lvl1-id-<?php echo e($increment); ?>">
                           <?php $__currentLoopData = $middlelevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $middlelevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li class="deeper parent">
                              <?php if($middlelevelcategory->tcat_name == $toplevelcategory->tcat_name): ?>
                                 <a class="" href="<?php echo e(url('productbymiddlecategory',[$toplevelcategory->tcat_name, $middlelevelcategory->mcat_name ])); ?>">
                                 <span data-toggle="collapse" data-parent="#menu-group-1" href="#cat-lvl2-id-<?php echo e($increment1); ?>" class="sign"><i class="fa fa-plus"></i></span>
                                 <span class="lbl lbl1"><?php echo e($middlelevelcategory->mcat_name); ?></span> 
                                 </a>
                                 <ul class="children nav-child unstyled small collapse" id="cat-lvl2-id-<?php echo e($increment1); ?>">
                                    <?php $__currentLoopData = $endlevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $endlevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($endlevelcategory->tcat_name == $toplevelcategory->tcat_name && $endlevelcategory->mcat_name == $middlelevelcategory->mcat_name): ?>
                                       <li class="item-111">
                                             <a class="" href="<?php echo e(url('productbyendlevelcategory',[$toplevelcategory->tcat_name, $middlelevelcategory->mcat_name, $endlevelcategory->ecat_name ])); ?>">
                                             <span class="sign"></span>
                                             <span class="lbl lbl1"><?php echo e($endlevelcategory->ecat_name); ?> </span>
                                             </a>
                                          </li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                 
                              </ul>
                              <?php endif; ?>
                           </li>
                           <?php
                           $increment1++;
                           ?>

                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                     </li>
                     <?php
                     $increment++;
                     ?>

                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
               </div>
            </div>
            <div class="col-md-9">
               <h3>All Products Under  </h3>
               <div class="product product-cat">
                  <div class="row">
                     <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <div class="col-md-4 item item-product-cat">
                        <div class="inner">
                           <div class="thumb">
                              <div class="photo" style="background-image:url(<?php echo e(asset('/storage/public/productimages/'.$product->p_featured_photo)); ?>);"></div>
                              <div class="overlay"></div>
                           </div>
                           <div class="text">
                              <h3><a href="product.php?id=86"><?php echo e($product->p_name); ?></a></h3>
                              <h4>
                                 <?php echo e($product->p_old_price); ?>

                                 <del>
                                 <?php echo e($product->p_current_price); ?>                                                 </del>
                              </h4>
                              <div class="rating">
                              </div>
                              <p><a href="product.php?id=86"><i class="fa fa-shopping-cart"></i> Add to Cart</a></p>
                           </div>
                        </div>
                     </div>
                    
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
  </div>
  <!-- end page content -->

  <!-- ********************** end content ********************** -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Client_layout.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views/client/productbycategory.blade.php ENDPATH**/ ?>