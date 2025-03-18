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
                                <h1 class="mb-3 mt-3 text-center"><?php echo e($service->name); ?></h1>                                                                                                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>                
    </div>
</section>



<section class="section-2  py-5">
    <div class="container py-2">
        <div class="row">
            <div class="col-md-6 align-items-center d-flex">
                <div class="about-block">
                    <h1 class="title-color"><?php echo e($service->name); ?></h1>
                    
                    <?php echo $service->description; ?>


                </div>
            </div>
            <div class="col-md-6">
                <?php if(!empty($service->image)): ?>
                <div class="image-red-background">                   
                    <img src="<?php echo e(asset('uploads/services/thumb/large/'.$service->image)); ?>" alt="" class="w-100">                   
                </div>
                <?php endif; ?>                
            </div>
        </div>
    </div>
</section>

<section class="section-4 py-5 text-center">
    <div class="hero-background-overlay"></div>
    <div class="container">
       <div class="help-container">
            <h1 class="title">Do you need help?</h1>
            <p class="card-text mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi ipsum, odit velit exercitationem praesentium error id iusto dolorem expedita nostrum eius atque? Aliquam ab reprehenderit animi sapiente quasi, voluptate dolorum?</p>
            <a href="#" class="btn btn-primary mt-3">Call Us Now <i class="fa-solid fa-angle-right"></i></a>
       </div>
    </div>
</section>

<?php echo $__env->make('common.latest-blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/service-detail.blade.php ENDPATH**/ ?>