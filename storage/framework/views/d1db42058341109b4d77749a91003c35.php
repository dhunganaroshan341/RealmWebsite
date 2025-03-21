<?php $__env->startSection('content'); ?>
<section class="hero-small">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('<?php echo e(asset('assets/images/banner1.jpg')); ?>') ;">
                <div class="hero-background-overlay"></div>
                <div class="container  h-100">
                    <div class="row align-items-center d-flex h-100">
                        <div class="col-md-12">
                            <div class="block text-center">
                                <span class="text-uppercase text-sm letter-spacing"></span>
                                <h1 class="mb-3 mt-3 text-center">Services</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-3 py-5">
    <div class="container">
        <div class="divider mb-3"></div>
        <h2 class="title-color mb-4 h1">Services</h2>
        <div class="cards">
           <div class="row">

                <?php if(!empty($services)): ?>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="col-md-4 mb-4">
                    <div class="card border-0">
                        <?php if(!empty($service->image)): ?>
                        <img src="<?php echo e(asset('uploads/services/thumb/small/'.$service->image)); ?>" class="card-img-top" alt="">
                        <?php else: ?>
                        <img src="<?php echo e(asset('uploads/placeholder.jpg')); ?>" class="card-img-top" alt="">
                        <?php endif; ?>
                        <div class="card-body p-3">
                            <h1 class="card-title mt-2"><a href="<?php echo e(url('/services/detail/'.$service->id)); ?>"><?php echo e($service->name); ?></a></h1>
                            <div class="content pt-2">
                                <p class="card-text"><?php echo e($service->short_desc); ?></p>
                            </div>
                            <a href="<?php echo e(url('/services/detail/'.$service->id)); ?>" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
           </div>
        </div>
    </div>
</section>

<section class="section-4 py-5 text-center">
    <div class="hero-background-overlay"></div>
    <div class="container">
       <div class="help-container">
            <h1 class="title">Want to Reach out?</h1>
            <p class="card-text mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
            <a href="<?php echo e(route('contact')); ?>" class="btn btn-primary mt-3">Contact Us <i class="fa-solid fa-angle-right"></i></a>
       </div>
    </div>
</section>

<?php echo $__env->make('common.latest-blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/services.blade.php ENDPATH**/ ?>