<!-- resources/views/components/starting-banner.blade.php -->
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
                                <h1 class="mb-3 mt-3 text-center"><?php echo e($title ?? 'Default Title'); ?></h1>
                                <p><?php echo e($description ?? 'Default Description'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/components/starting-banner.blade.php ENDPATH**/ ?>