<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if(!empty(getSettings()) && getSettings()->website_title != ''): ?>
    <title><?php echo e(getSettings()->website_title); ?></title>
    <?php else: ?>
    <title><?php echo e(get_website_title()); ?></title>
    <?php endif; ?>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>">
    <?php echo $__env->yieldPushContent('styles'); ?>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>
    <header>
        <div class="header-top-bar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <ul class="top-bar-info list-inline-item ps-0 mb-0">
                            <li class="list-inline-item">

                                <?php if(!empty(getSettings()) && getSettings()->email != ''): ?>
                                <a href="mailto:<?php echo e(getSettings()->email); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
      <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
    </svg>
                                <?php echo e(getSettings()->email); ?></a>
                                <?php endif; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-md-end top-right-bar mt-2 mt-lg-0 call-now">
                            <?php if(!empty(getSettings()) && getSettings()->phone != ''): ?>
                            <a href="tel:<?php echo e(getSettings()->phone); ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                </svg>
                                <span class="h5"><?php echo e(getSettings()->phone); ?></span>
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar  sticky-top navbar-expand-lg navigation" id="navbar">
            <div class="container" >
                <div class="logo-container">
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="Logo" class="navbar-logo">
                    </a>
                </div>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icofont-navigation-menu"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarmain">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active"><a class="nav-link" href="<?php echo e(url('/')); ?>">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/about-us')); ?>">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Services
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if(!empty(getServices())): ?>
                                <?php $__currentLoopData = getServices(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a class="dropdown-item" href="<?php echo e(url("/services/detail/".$service->id)); ?>"><?php echo e($service->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <li><a class="dropdown-item" href="<?php echo e(url('/services')); ?>">View All</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/faq">FAQ</a></li>
                        <li class="nav-item ">
                            <a class="nav-link " href="<?php echo e(url('/blog')); ?>">Blog</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo e(url('/contact')); ?>">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <?php echo $__env->yieldContent('content'); ?>

    </main>

    <footer class="footer section gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mr-auto col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <div class="logo mb-4">
                            <img src="<?php echo e(asset('assets/images/logo.png')); ?>" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Services</h4>
                        <div class="divider mb-4"></div>

                        <ul class="list-unstyled footer-menu lh-35">
                            <?php if(!empty(getServices())): ?>
                            <?php $__currentLoopData = getServices(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(url("/services/detail/".$service->id)); ?>"><?php echo e($service->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Quick Links</h4>
                        <div class="divider mb-4"></div>

                        <ul class="list-unstyled footer-menu lh-35">
                            <li><a href="<?php echo e(route('terms')); ?>">Terms &amp; Conditions</a></li>
                            <li><a href="<?php echo e(route('privacy')); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo e(route('about')); ?>">About Us</a></li>
                            <li><a href="<?php echo e(route('blog.front')); ?>">Blog</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="widget widget-contact mb-5 mb-lg-0">
                        <h4 class="text-capitalize mb-3">Get in Touch</h4>
                        <div class="divider mb-4"></div>

                        <div class="footer-contact-block mb-4">

                            <h4 class="mt-2">
                                <?php if(!empty(getSettings()) && getSettings()->email != ''): ?>
                                <i class="fa-solid fa-envelope"></i>
                                <a href="mailto:<?php echo e(getSettings()->email); ?>"><?php echo e(getSettings()->email); ?></a>
                                <?php endif; ?>

                            </h4>

                            <h4 class="mt-2">
                                <?php if(!empty(getSettings()) && getSettings()->phone != ''): ?>
                                <i class="fa-solid fa-phone-square" aria-hidden="true"></i>
                                <a href="tel:<?php echo e(getSettings()->phone); ?>"><?php echo e(getSettings()->phone); ?></a>
                                <?php endif; ?>
                            </h4>
                        </div>

                        <div class="footer-contact-block">

                            <ul class="list-inline footer-socials mt-4">
                                <?php if(!empty(getSettings()) && getSettings()->facebook_url != ''): ?>
                                <li class="list-inline-item">
                                    <a target="_blank" href="<?php echo e(getSettings()->facebook_url); ?>"><i class="fa-brands fa-facebook-f"></i> </a>
                                </li>
                                <?php endif; ?>

                                <?php if(!empty(getSettings()) && getSettings()->twitter_url != ''): ?>
                                <li class="list-inline-item">
                                    <a target="_blank" href="<?php echo e(getSettings()->twitter_url); ?>"><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                <?php endif; ?>

                                <?php if(!empty(getSettings()) && getSettings()->instagram_url != ''): ?>
                                <li class="list-inline-item">
                                    <a target="_blank" href="<?php echo e(getSettings()->instagram_url); ?>"><i class="fa-brands fa-instagram"></i></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-btm py-4 mt-5">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-6">
                        <div class="copyright">
                            <?php if(!empty(getSettings()) && getSettings()->copy != ''): ?>
                            <?php echo e(getSettings()->copy); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <a class="backtop scroll-top-to reveal" href="#top">
                            <i class="icofont-long-arrow-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<script src="<?php echo e(asset('assets/js/jquery-3.6.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?php echo e(asset('assets/js/custom.js')); ?>"></script>


<script>

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
<?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/layouts/app.blade.php ENDPATH**/ ?>