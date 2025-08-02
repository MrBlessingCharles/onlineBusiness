<aside class="main-sidebar">
            <section class="sidebar">
               <ul class="sidebar-menu">
                  <li class="treeview <?php echo e(request()->is('admin') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin')); ?>">
                     <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                     </a>
                  </li>
                  <li class="treeview <?php echo e(request()->is('admin/settings') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin/settings')); ?>">
                     <i class="fa fa-sliders"></i> <span>Website Settings</span>
                     </a>
                  </li>
                  <li class="treeview <?php echo e(request()->is('admin/settings') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin/settings')); ?>">
                     <i class="fa fa-cogs"></i>
                     <span>Shop Settings</span>
                     <span class="pull-right-container">
                     <i class="fa fa-angle-left pull-right"></i>
                     </span>
                     </a>
                     <ul class="treeview-menu <?php echo e(request()->is('admin/size') || request()->is('admin/color')||request()->is('admin/country')
                        || request()->is('admin/shippingcoast') || request()->is('admin/toplevelcategory')
                        || request()->is('admin/middlelevelcategory') || request()->is('admin/endlevelcategory')
                      ? 'active' : ''); ?>">
                        <li><a href="<?php echo e(url('/admin/size')); ?>"><i class="fa fa-circle-o"></i> Size</a></li>
                        <li><a href="<?php echo e(url('/admin/color')); ?>"><i class="fa fa-circle-o"></i> Color</a></li>
                        <li><a href="<?php echo e(url('/admin/country')); ?>"><i class="fa fa-circle-o"></i> Country</a></li>
                        <li><a href="<?php echo e(url('/admin/shippingcoast')); ?>"><i class="fa fa-circle-o"></i> Shipping Cost</a></li>
                        <li><a href="<?php echo e(url('/admin/toplevelcategory')); ?>"><i class="fa fa-circle-o"></i> Top Level Category</a></li>
                        <li><a href="<?php echo e(url('/admin/middlelevelcategory')); ?>"><i class="fa fa-circle-o"></i> Mid Level Category</a></li>
                        <li><a href="<?php echo e(url('/admin/endlevelcategory')); ?>"><i class="fa fa-circle-o"></i> End Level Category</a></li>
                     </ul>
                  </li>
                  <li class="treeview <?php echo e(request()->is('admin/product') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin/product')); ?>">
                     <i class="fa fa-shopping-bag"></i> <span>Product Management</span>
                     </a>
                  </li>
                  <li class="treeview <?php echo e(request()->is('admin/orders') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin/orders')); ?>">
                     <i class="fa fa-sticky-note"></i> <span>Order Management</span>
                     </a>
                  </li>
                  <li class="treeview <?php echo e(request()->is('admin/sliders') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin/sliders')); ?>">
                     <i class="fa fa-picture-o"></i> <span>Manage Sliders</span>
                     </a>
                  </li>
                  <!-- Icons to be displayed on Shop -->
                  <li class="treeview <?php echo e(request()->is('admin/services') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin/services')); ?>">
                     <i class="fa fa-list-ol"></i> <span>Services</span>
                     </a>
                  </li>
                  <li class="treeview <?php echo e(request()->is('admin/faq') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin/faq')); ?>">
                     <i class="fa fa-question-circle"></i> <span>FAQ</span>
                     </a>
                  </li>
                  <li class="treeview <?php echo e(request()->is('admin/registercustomer') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin/registercustomer')); ?>">
                     <i class="fa fa-user-plus"></i> <span>Registered Customer</span>
                     </a>
                  </li>
                  <li class="treeview <?php echo e(request()->is('admin/pagesettings') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin/pagesettings')); ?>">
                     <i class="fa fa-tasks"></i> <span>Page Settings</span>
                     </a>
                  </li>
                  <li class="treeview <?php echo e(request()->is('admin/socialmedia') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin/socialmedia')); ?>">
                     <i class="fa fa-globe"></i> <span>Social Media</span>
                     </a>
                  </li>
                  <li class="treeview <?php echo e(request()->is('admin/subscriber') ? 'active' : ''); ?>">
                     <a href="<?php echo e(url('/admin/subscriber')); ?>">
                     <i class="fa fa-hand-o-right"></i> <span>Subscriber</span>
                     </a>
                  </li>
               </ul>
            </section>
         </aside><?php /**PATH C:\xampp\htdocs\basiclessons\resources\views/admin_layout/sidebar.blade.php ENDPATH**/ ?>