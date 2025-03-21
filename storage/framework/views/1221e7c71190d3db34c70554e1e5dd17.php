<?php $__env->startSection('content'); ?>
<section class="hero-small">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('<?php echo e(asset('assets/images/banner1.jpg')); ?>') ;">
                <div class="hero-small-background-overlay"></div>
                <div class="container  h-100">
                    <div class="row align-items-center d-flex h-100">
                        <div class="col-md-12">
                            <div class="block text-center">
                                <span class="text-uppercase text-sm letter-spacing"></span>
                                <h1 class="mb-3 mt-3 text-center">Blog & News</h1>        
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
        <div class="cards">
           <div class="row">                       
                
                <?php if(!empty($blogs)): ?>
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                  
                <div class="col-md-4 mb-4">
                    <div class="card border-0">
                        
                        <?php if(!empty($blog->image)): ?>
                        <img src="<?php echo e(asset('uploads/blogs/thumb/small/'.$blog->image)); ?>" class="card-img-top" alt="">
                        <?php else: ?>

                        <?php endif; ?>

                        <div class="card-body p-3">
                            <h1 class="card-title mt-2"><a href="<?php echo e(route('blog-detail',$blog->id)); ?>"><?php echo e($blog->name); ?></a></h1>
                            <div class="content pt-2">
                                <p class="card-text"><?php echo e($blog->short_desc); ?></p>
                            </div>
                            <a href="<?php echo e(route('blog-detail',$blog->id)); ?>" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                        </div>
                    </div> 
                </div> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>              

           </div>
        </div>                
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/blog.blade.php ENDPATH**/ ?>