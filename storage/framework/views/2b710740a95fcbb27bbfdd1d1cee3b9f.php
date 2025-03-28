<section class="section-3 py-5">
    <div class="container">
        <div class="divider mb-3"></div>
        <h2 class="title-color mb-4 h1">Blog & News</h2>
        <div class="cards">
            <div class="services-slider">
                <?php if(!empty(getLatestBlog())): ?>
                <?php $__currentLoopData = getLatestBlog(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card border-0 ">
                    <a href="<?php echo e(route('blog-detail',$blog->id)); ?>">
                    <?php if(!empty($blog->image)): ?>
                        <img src="<?php echo e(asset('uploads/blogs/thumb/small/'.$blog->image)); ?>" class="card-img-top" alt="">
                    <?php else: ?>

                    <?php endif; ?>
                    </a>

                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="<?php echo e(route('blog-detail',$blog->id)); ?>"><?php echo e($blog->name); ?></a></h1>
                        <div class="content pt-2">
                            <p class="card-text"><?php echo e($blog->short_desc); ?></p>
                        </div>
                        <a href="<?php echo e(route('blog-detail',$blog->id)); ?>" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
                    </div>
                </div> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                <?php endif; ?>
                
            </div>
        </div>                
    </div>
</section><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/common/latest-blog.blade.php ENDPATH**/ ?>