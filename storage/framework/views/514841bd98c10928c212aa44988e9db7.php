<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(get_website_title()); ?> | Dashboard</title>
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="<?php echo e(asset('admin_assets/assets/plugins/fontawesome-free/css/all.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('admin_assets/assets/css/adminlte.min.css?v=3.2.0')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('admin_assets/assets/plugins/summernote/summernote-bs4.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('admin_assets/assets/plugins/dropzone/dropzone.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('admin_assets/assets/plugins/jquery-ui/jquery-ui.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('admin_assets/assets/css/custom.css')); ?>">
        <?php echo $__env->yieldPushContent('styles'); ?>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->
                <a href="<?php echo e(route('home')); ?>" class="brand-link bg-white" style="height: 57px;">
					<!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
					
                    <h4>Realm Infotechs</h4>
					<!-- <span class="brand-text font-weight-light">AdminLTE 3</span> -->
				  </a>
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item">
                                <a href="#" class="nav-link <?php echo e(Request::is('admin/dashboard') ? 'active' : ''); ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('serviceList')); ?>" class="nav-link <?php echo e(Request::is('admin/services*') ? 'active' : ''); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Services</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('blogList')); ?>" class="nav-link <?php echo e(Request::is('admin/blogs*') ? 'active' : ''); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Blogs</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('faqList')); ?>" class="nav-link <?php echo e(Request::is('admin/faqs*') ? 'active' : ''); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage FAQ</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('pageList')); ?>" class="nav-link <?php echo e(Request::is('admin/pages*') ? 'active' : ''); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Manage Pages</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('settings.index')); ?>" class="nav-link <?php echo e(Request::is('admin/settings*') ? 'active' : ''); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Settings</p>
                                </a>
                            </li>

                            <!-- Page Sections Dropdown -->
                            <li class="nav-item <?php echo e(Request::is('admin/banner-sliders*') ? 'menu-open' : ''); ?>">
                                <a href="#" class="nav-link <?php echo e(Request::is('admin/banner-sliders*') ? 'active' : ''); ?>">
                                    <i class="nav-icon fas fa-layer-group"></i>
                                    <p>
                                        Page Sections
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('banner-sliders.index')); ?>" class="nav-link <?php echo e(Request::is('admin/banner-sliders*') ? 'active' : ''); ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Bannerslider</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(url('/admin/page-sections/sliders')); ?>" class="nav-link <?php echo e(Request::is('admin/page-sections/sliders') ? 'active' : ''); ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Sliders</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(url('/admin/page-sections/other')); ?>" class="nav-link <?php echo e(Request::is('admin/page-sections/other') ? 'active' : ''); ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Other Sections</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('testimonials.index')); ?>" class="nav-link <?php echo e(Request::is('admin/testimonials*') ? 'active' : ''); ?>">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Testimonials</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.logout')); ?>" class="nav-link">
                                    <i class='fas fa-sign-out-alt nav-icon'></i>
                                    <p>Logout</p>
                                </a>
                            </li>
                        </ul>
                    </nav>


                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </div>

            <!-- /.content-wrapper -->


            <footer class="main-footer">
                <strong>Copyright &copy; 2022 </strong>All rights reserved.
            </footer>
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <script src="<?php echo e(asset('admin_assets/assets/plugins/jquery/jquery.min.js')); ?>"></script>

        <script src="<?php echo e(asset('admin_assets/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

        <script src="<?php echo e(asset('admin_assets/assets/js/adminlte.min.js?v=3.2.0')); ?>"></script>

        <!-- Summernote -->
        <script src="<?php echo e(asset('admin_assets/assets/plugins/summernote/summernote-bs4.min.js')); ?>"></script>

        <script src="<?php echo e(asset('admin_assets/assets/plugins/dropzone/dropzone.js')); ?>"></script>

        <script src="<?php echo e(asset('admin_assets/assets/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>


        <script type="text/javascript">
            $(document).ready(function(){
                $(".summernote").summernote({
                    height: 300
                });
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
        </script>

        <?php echo $__env->yieldContent('extraJs'); ?>
        <?php echo $__env->yieldPushContent('scripts'); ?>
    </body>


</html>
<?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/admin/layouts/app.blade.php ENDPATH**/ ?>