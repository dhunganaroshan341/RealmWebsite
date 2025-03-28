<?php $__env->startSection('content'); ?>
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Testimonials</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Testimonials</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <?php if(session('error')): ?>
                        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                    <?php endif; ?>

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            
                            <a href="<?php echo e(route('testimonials.create')); ?>" class="btn btn-primary">Add New</a>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Position</th>
                                        <th>Title</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($testimonial->customer_name); ?></td>
                                            <td><?php echo e($testimonial->customer_position); ?></td>
                                            <td><?php echo e($testimonial->testimonial_title); ?></td>
                                            <td><?php echo e($testimonial->rating); ?> ⭐</td>
                                            <td>
                                                <span class="badge <?php echo e($testimonial->is_active ? 'badge-success' : 'badge-danger'); ?>">
                                                    <?php echo e($testimonial->is_active ? 'Active' : 'Inactive'); ?>

                                                </span>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(route('testimonials.edit', $testimonial->id)); ?>" class="btn btn-sm btn-warning">Edit</a>
                                                <button class="btn btn-sm btn-danger delete-testimonial" data-id="<?php echo e($testimonial->id); ?>">Delete</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraJs'); ?>
<script>
    $(document).on('click', '.delete-testimonial', function() {
        let testimonialId = $(this).data('id');

        if (confirm('Are you sure you want to delete this testimonial?')) {
            $.ajax({
                url: '<?php echo e(url('/admin/testimonials')); ?>/' + testimonialId,
                type: 'DELETE',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function() {
                    alert('Something went wrong!');
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/admin/testimonials/index.blade.php ENDPATH**/ ?>