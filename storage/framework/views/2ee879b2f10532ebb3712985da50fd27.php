    <div id="fb-root"></div>
      <script>(function(d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=323620764400430";
         fjs.parentNode.insertBefore(js, fjs);
         }(document, 'script', 'facebook-jssdk'));
      </script>

      <!-- start top bar -->
      <div class="top">
         <div class="container">
            <div class="row">
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="left">
                     <ul>
                        <li><i class="fa fa-phone"></i> +001 10 101 0010</li>
                        <li><i class="fa fa-envelope-o"></i> support@ecommercephp.com</li>
                     </ul>
                  </div>
               </div>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="right">
                     <ul>
                        <li><a href="https://www.facebook.com/#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://www.twitter.com/#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.youtube.com/#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="https://www.instagram.com/#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="https://www.whatsapp.com/#"><i class="fa fa-whatsapp"></i></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end top bar -->

      <!-- start header -->
      <div class="header">
         <div class="container">
            <div class="row inner">
               <div class="col-md-4 logo">
                  <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('frontend/assets/uploads/logo.png')); ?>" alt="logo image"></a>
               </div>
               <div class="col-md-5 right">
                  <ul>
                     <li><a href="<?php echo e(url('login')); ?>"><i class="fa fa-sign-in"></i> Login</a></li>
                     <li><a href="<?php echo e(url('register')); ?>"><i class="fa fa-user-plus"></i> Register</a></li>
                     <li><a href="<?php echo e(url('cart')); ?>"><i class="fa fa-shopping-cart"></i> Cart ($0.00)</a></li>
                  </ul>
               </div>
               <div class="col-md-3 search-area">
                  <form class="navbar-form navbar-left" role="search" action="search-result.php" method="get">
                     <input type="hidden" name="_csrf" value="305e2e05d29f55b50a14ad09db8b623c" />					
                     <div class="form-group">
                        <input type="text" class="form-control search-top" placeholder="Search Product" name="search_text">
                     </div>
                     <button type="submit" class="btn btn-danger">Search</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- end header -->

      <!-- start navbar -->
      <div class="nav">
         <div class="container">
            <div class="row">
               <div class="col-md-12 pl_0 pr_0">
                  <div class="menu-container">
                     <div class="menu">
                        <ul>
                           <li><a href="<?php echo e(asset('/')); ?>">Home</a></li>
                           <?php $__currentLoopData = $toplevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toplevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <li>
                              <a href="product-category.php?id=1&type=top-category"><?php echo e($toplevelcategory->tcat_name); ?></a>
                              <ul>
                                 <?php $__currentLoopData = $middlelevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $middlelevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                       <?php if($middlelevelcategory->tcat_name == $toplevelcategory->tcat_name): ?>
                                       
                                             <a href="product-category.php?id=1&type=mid-category"><?php echo e($middlelevelcategory->mcat_name); ?></a>
                                             <ul>
                                                 <?php $__currentLoopData = $endlevelcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $endlevelcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <?php if($endlevelcategory->tcat_name == $toplevelcategory->tcat_name && $endlevelcategory->mcat_name == $middlelevelcategory->mcat_name): ?>
                                                   <li>
                                                      <a href="product-category.php?id=1&type=end-category">
                                                         <?php echo e($endlevelcategory->ecat_name); ?>

                                                      </a>
                                                   </li>
                                                <?php endif; ?>
                                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                             </ul>
                                       <?php endif; ?>
                                    </li>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                              </ul>
                           </li>
                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       
                           <li><a href="<?php echo e(url('about')); ?>">About Us</a></li>
                           <li><a href="<?php echo e(url('faq')); ?>">FAQ</a></li>
                           <li><a href="<?php echo e(url('contact')); ?>">Contact Us</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end navbar --><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views/Client_layout/header.blade.php ENDPATH**/ ?>