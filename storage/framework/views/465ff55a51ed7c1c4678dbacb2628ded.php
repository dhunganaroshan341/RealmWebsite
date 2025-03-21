<?php $__env->startSection('content'); ?>
<section class="hero">
    
    <?php if (isset($component)) { $__componentOriginal05f17e22dd22afc8aac2908fcdbb25a4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal05f17e22dd22afc8aac2908fcdbb25a4 = $attributes; } ?>
<?php $component = App\View\Components\PopUpNotice::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pop-up-notice'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\PopUpNotice::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal05f17e22dd22afc8aac2908fcdbb25a4)): ?>
<?php $attributes = $__attributesOriginal05f17e22dd22afc8aac2908fcdbb25a4; ?>
<?php unset($__attributesOriginal05f17e22dd22afc8aac2908fcdbb25a4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal05f17e22dd22afc8aac2908fcdbb25a4)): ?>
<?php $component = $__componentOriginal05f17e22dd22afc8aac2908fcdbb25a4; ?>
<?php unset($__componentOriginal05f17e22dd22afc8aac2908fcdbb25a4); ?>
<?php endif; ?>
    <?php
        $carouselItems = getBanners();
    ?>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php $__currentLoopData = $carouselItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carousel-item <?php echo e($index == 0 ? 'active' : ''); ?>" style="background-image: url('<?php echo e(asset($item['image'])); ?>') ;">
                    <div class="hero-background-overlay"></div>
                    <div class="container h-100">
                        <div class="row align-items-center d-flex h-100">
                            <div class="col-md-7">
                                <div class="block">
                                    <div class="divider mb-3"></div>
                                    <span class="text-uppercase text-sm letter-spacing"><?php echo e($item['subtitle']); ?></span>
                                    <h1 class="mb-3 mt-3"><?php echo e($item['title']); ?></h1>
                                    <p class="mb-4 pr-5"><?php echo e($item['description']); ?></p>
                                    <div class="btn-container ">
                                        <a href="<?php echo e($item['link']); ?>" target="_blank" class="btn btn-primary">
                                            <?php echo e($item['button_text']); ?> <i class="icofont-simple-right ml-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>


<section class="section-2  py-5">
    <div class="container py-2">
        <div class="row">
            <div class="col-md-6 align-items-center d-flex">
                <div class="about-block">
                    <h1 class="title-color">Welcome </h1>
                    <div class="mt-2 mb-3 text-muted">To, Realm  Infotech!</div>
                    <p>At Realm Infotech, we specialize in delivering top-notch services
                         in Social Media Management, Graphic Design, Website Development,
                         and SEO. We are dedicated to helping businesses grow and enhance
                         their online presence through creative solutions and cutting-edge digital strategies.
                          Whether you're looking to elevate your brand with captivating graphics
                         or boost your website's visibility, we've got you covered!</p>
                         <p>
                            Our expertise lies in creating dynamic and visually appealing digital experiences
                            that resonate with your audience. From expertly managing your social media presence
                            to designing stunning visuals that represent your brand, we ensure your business stands out.
                             Our SEO services are focused on improving your website's ranking, driving more organic traffic,
                            and ensuring that your online platform is optimized for success.
                         </p>
                         <p>
                            At Realm Infotech, we believe in the power of innovation and creativity.
                             With our integrated services, we help you navigate the ever-evolving digital landscape,
                              making sure your brand stays ahead of the competition.
                               Let us help you create impactful digital experiences that will leave a lasting
                            impression on your audience and take your business to new heights!
                         </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="image-red-background">
                    <img src="<?php echo e(asset('assets/images/about-us.jpg')); ?>" alt="" class="w-100">
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
            <div class="services-slider">

                <?php if(!empty($services)): ?>
                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card border-0 ">

                    <a href="<?php echo e(url('/services/detail/'.$service->id)); ?>">
                        <?php if(!empty($service->image)): ?>
                        <img src="<?php echo e(asset('uploads/services/thumb/small/'.$service->image)); ?>" class="card-img-top" alt="">
                        <?php else: ?>
                        <img src="<?php echo e(asset('uploads/placeholder.jpg')); ?>" class="card-img-top" alt="">
                        <?php endif; ?>
                    </a>

                    <div class="card-body p-3">
                        <h1 class="card-title mt-2"><a href="<?php echo e(url('/services/detail/'.$service->id)); ?>"><?php echo e($service->name); ?></a></h1>
                        <div class="content pt-2">
                            <p class="card-text"><?php echo e($service->short_desc); ?></p>
                        </div>
                        <a href="<?php echo e(url('/services/detail/'.$service->id)); ?>" class="btn btn-primary mt-4">Details <i class="fa-solid fa-angle-right"></i></a>
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
            <h1 class="title"> Innovating the Future with Technology</h1>
            <p class="card-text mt-3">At Realm Infotech, we specialize in cutting-edge IT solutions, including web development</p>
            <a href="<?php echo e(url('/contact')); ?>" class="btn btn-primary mt-3">Reach out <i class="fa-solid fa-angle-right"></i></a>
       </div>
    </div>
</section>


<section class="testimonial-container pt-4">
    <?php if (isset($component)) { $__componentOriginal06cf8767fb67761f17058e74be611369 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal06cf8767fb67761f17058e74be611369 = $attributes; } ?>
<?php $component = App\View\Components\Testimonial::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('testimonial'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Testimonial::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal06cf8767fb67761f17058e74be611369)): ?>
<?php $attributes = $__attributesOriginal06cf8767fb67761f17058e74be611369; ?>
<?php unset($__attributesOriginal06cf8767fb67761f17058e74be611369); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal06cf8767fb67761f17058e74be611369)): ?>
<?php $component = $__componentOriginal06cf8767fb67761f17058e74be611369; ?>
<?php unset($__componentOriginal06cf8767fb67761f17058e74be611369); ?>
<?php endif; ?>
</section>

<section class="gallery-section">
    <?php if (isset($component)) { $__componentOriginalda8b3c6580f5ebfb57e6ac2140e55254 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalda8b3c6580f5ebfb57e6ac2140e55254 = $attributes; } ?>
<?php $component = App\View\Components\FrontGallery::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('front-gallery'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FrontGallery::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalda8b3c6580f5ebfb57e6ac2140e55254)): ?>
<?php $attributes = $__attributesOriginalda8b3c6580f5ebfb57e6ac2140e55254; ?>
<?php unset($__attributesOriginalda8b3c6580f5ebfb57e6ac2140e55254); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalda8b3c6580f5ebfb57e6ac2140e55254)): ?>
<?php $component = $__componentOriginalda8b3c6580f5ebfb57e6ac2140e55254; ?>
<?php unset($__componentOriginalda8b3c6580f5ebfb57e6ac2140e55254); ?>
<?php endif; ?>
</section>

<?php echo $__env->make('common.latest-blog', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/home.blade.php ENDPATH**/ ?>