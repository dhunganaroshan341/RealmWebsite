<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Featured Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php if(Session::has('success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(Session::get('success')); ?>

                        </div>
                    <?php endif; ?>

                    <?php if(Session::has('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo e(Session::get('error')); ?>

                        </div>
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <a href="<?php echo e(route('service.create.form')); ?>" class="btn btn-primary">Create</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- Featured Services List -->
                            <div id="featured-services-list">
                                <?php $__currentLoopData = $featuredServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featuredService): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="service-item" data-id="<?php echo e($featuredService->id); ?>">
                                        <span class="service-name"><?php echo e($featuredService->service->name); ?></span>
                                        <button class="btn btn-danger btn-sm delete-service" data-id="<?php echo e($featuredService->id); ?>">X</button>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraJs'); ?>
<script>
    // Deleting service
    $(document).on('click', '.delete-service', function() {
        let serviceId = $(this).data('id');

        if (confirm('Are you sure you want to delete this service?')) {
            $.ajax({
                url: '/admin/featured-services/' + serviceId,
                type: 'DELETE',
                success: function(response) {
                    // Remove the service from the DOM
                    $('[data-id="'+serviceId+'"]').remove();
                    alert(response.message);
                },
                error: function(response) {
                    alert('Something went wrong!');
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/admin/featured-services/index.blade.php ENDPATH**/ ?>