<?php $__env->startSection('content'); ?>
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

<div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gallery / List</h1>
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

    <!-- Gallery Items Table -->
    <h2>Gallery Items</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gallery Title</th>
                <th>Images Count</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($gallery->title); ?></td>
                    <td><?php echo e($gallery->media->count()); ?></td>
                    <td>
                        <a href="<?php echo e(route('galleries.edit', $gallery->id)); ?>" class="btn btn-info btn-sm">Edit</a>
                        <form action="<?php echo e(route('galleries.destroy', $gallery->id)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <!-- Create Gallery Form -->
    <h2>Create Gallery Albums</h2>

    <?php if (isset($component)) { $__componentOriginal5f189c7f4d42a3d95f9e8f8aaf19f146 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5f189c7f4d42a3d95f9e8f8aaf19f146 = $attributes; } ?>
<?php $component = App\View\Components\GalleryAlbumForm::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('GalleryAlbumForm'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GalleryAlbumForm::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['galleryAlbum' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($album ?? null),'clients' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($clients)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5f189c7f4d42a3d95f9e8f8aaf19f146)): ?>
<?php $attributes = $__attributesOriginal5f189c7f4d42a3d95f9e8f8aaf19f146; ?>
<?php unset($__attributesOriginal5f189c7f4d42a3d95f9e8f8aaf19f146); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5f189c7f4d42a3d95f9e8f8aaf19f146)): ?>
<?php $component = $__componentOriginal5f189c7f4d42a3d95f9e8f8aaf19f146; ?>
<?php unset($__componentOriginal5f189c7f4d42a3d95f9e8f8aaf19f146); ?>
<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/admin/gallery/list.blade.php ENDPATH**/ ?>