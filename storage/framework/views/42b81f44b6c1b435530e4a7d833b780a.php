<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Services / List</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content  h-100">
        <div class="container-fluid  h-100">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-md-12 ">

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
                            <div class="card-tools">
                                <form action="" method="get">
                                    <div class="input-group mb-0 mt-0" style="width: 250px;">
                                        <input value="<?php echo e((!empty(Request::get('keyword'))) ? Request::get('keyword') : ''); ?>" type="text" name="keyword" class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table">
                                <tr>
                                    <th width="50">Id</th>
                                    <th width="80">Image</th>
                                    <th>Title</th>
                                    <th width="100">Created</th>
                                    <th width="100">Status</th>
                                    <th width="100">Action</th>
                                </tr>
                                <?php if(!empty($services)): ?>
                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($service->id); ?></td>
                                    <td>
                                        <?php if(!empty($service->image)): ?>
                                        <img src="<?php echo e(asset('uploads/services/thumb/small/'.$service->image)); ?>" width="50">
                                        <?php else: ?>
                                        <img src="<?php echo e(asset('uploads/placeholder.jpg')); ?>" alt="" width="50">
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($service->name); ?></td>
                                    <td><?php echo e(date('d/m/Y',strtotime($service->created_at))); ?></td>
                                    <td>
                                        <?php if($service->status == 1): ?>
                                        <span class="badge bg-success">Active</span>
                                        <?php else: ?>
                                        <span class="badge bg-success">Block</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('service.edit',$service->id)); ?>" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                            </svg>
                                        </a>
                                        &nbsp;
                                        <a href="javascript:void(0);" class="" onclick="deleteService(<?php echo e($service->id); ?>);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#dc3545" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php else: ?>
                                <tr>
                                    <td colspan="6">Records Not Found</td>
                                </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <?php if(!empty($services)): ?>
                <?php echo e($services->links('pagination::bootstrap-4')); ?>

                <?php endif; ?>
            </div>

            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
   <?php if (isset($component)) { $__componentOriginal6916fe42bdfee41f4a7bc3ae4000fb09 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6916fe42bdfee41f4a7bc3ae4000fb09 = $attributes; } ?>
<?php $component = App\View\Components\FeaturedService::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('featured-service'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\FeaturedService::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6916fe42bdfee41f4a7bc3ae4000fb09)): ?>
<?php $attributes = $__attributesOriginal6916fe42bdfee41f4a7bc3ae4000fb09; ?>
<?php unset($__attributesOriginal6916fe42bdfee41f4a7bc3ae4000fb09); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6916fe42bdfee41f4a7bc3ae4000fb09)): ?>
<?php $component = $__componentOriginal6916fe42bdfee41f4a7bc3ae4000fb09; ?>
<?php unset($__componentOriginal6916fe42bdfee41f4a7bc3ae4000fb09); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraJs'); ?>
<script type="text/javascript">
function deleteService(id) {
    if (confirm("Are you sure you want to delete?")) {
        $.ajax({
            url: '<?php echo e(url("/admin/services/delete")); ?>/'+id,
            type: 'POST',
            dataType: 'json',
            data: {},
            success: function(response){
                window.location.href = "<?php echo e(route('serviceList')); ?>";
            }
        });
    }
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/admin/services/list.blade.php ENDPATH**/ ?>