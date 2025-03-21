<?php $__env->startSection('content'); ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Banner Slider / Edit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Edit Banner Slider</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo e(route('banner-sliders.update', $bannerSlider->id)); ?>" method="POST" enctype="multipart/form-data" id="editBannerSlider">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="card">
                            <div class="card-header">
                                <a href="<?php echo e(route('banner-sliders.index')); ?>" class="btn btn-primary">Back</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" id="title" class="form-control" value="<?php echo e(old('title', $bannerSlider->title)); ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="subtitle">Subtitle</label>
                                    <input type="text" name="subtitle" id="subtitle" class="form-control" value="<?php echo e(old('subtitle', $bannerSlider->subtitle)); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="summernote form-control"><?php echo e(old('description', $bannerSlider->description)); ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="button_text">Button Text</label>
                                    <input type="text" name="button_text" id="button_text" class="form-control" value="<?php echo e(old('button_text', $bannerSlider->button_text)); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="url" name="link" id="link" class="form-control" value="<?php echo e(old('link', $bannerSlider->link)); ?>">
                                </div>

                                <div class="form-group">
                                    <label for="order">Order</label>
                                    <input type="number" name="order" id="order" class="form-control" value="<?php echo e(old('order', $bannerSlider->order)); ?>" required>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="image">Image</label>
                                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                                        <?php if($bannerSlider->image): ?>
                                        <div class="imageContainer">
                                            <i class="fas fa-cross"></i>
                                            <img src="<?php echo e(asset('storage/' . $bannerSlider->image)); ?>" alt="Current Image" class="mt-2" width="100">
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="is_active">Status</label>
                                    <select name="is_active" id="is_active" class="form-control" required>
                                        <option value="1" <?php echo e($bannerSlider->is_active == 1 ? 'selected' : ''); ?>>Active</option>
                                        <option value="0" <?php echo e($bannerSlider->is_active == 0 ? 'selected' : ''); ?>>Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extraJs'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        // Initialize Summernote (if required)
        $('.summernote').summernote();

        // Handle form submission with AJAX
        $("#editBannerSlider").submit(function(event){
            event.preventDefault();
            let form = $(this);

            $("button[type='submit']").prop('disabled', true);

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                dataType: 'json',
                data: form.serialize(),
                success: function(response){
                    $("button[type='submit']").prop('disabled', false);

                    if(response.status === 200) {
                        window.location.href = '<?php echo e(route("banner-sliders.index")); ?>';
                    } else {
                        $(".title-error").text(response.errors.title ?? '');
                    }
                },
                error: function(response) {
                    $("button[type='submit']").prop('disabled', false);
                    alert('Something went wrong!');
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/admin/banner-slider/form.blade.php ENDPATH**/ ?>