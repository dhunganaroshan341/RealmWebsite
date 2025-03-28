<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Services / Edit</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
    <section class="content  h-100"">
        <div class="container-fluid  h-100"">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12 ">
                    <form action="" method="post" name="editServiceForm" id="editServiceForm">
                        <div class="card">
                            <div class="card-header">
                                <a href="<?php echo e(route('serviceList')); ?>" class="btn btn-primary">Back</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" value="<?php echo e($service->name); ?>" name="name" id="name"
                                        class="form-control">
                                    <p class="error name-error"></p>
                                </div>

                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea name="description" id="description" class="summernote"><?php echo e($service->description); ?></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="image_id" id="image_id" value="">
                                        <label for="Image">Image</label>
                                        <div id="image" class="dropzone dz-clickable">
                                            <div class="dz-message needsclick">
                                                <br>Drop files here or click to upload.<br><br>
                                            </div>
                                        </div>

                                        <?php if(!empty($service->image)): ?>
                                            <img class="img-thumbnail my-4" src="<?php echo e(asset($service->image)); ?>"
                                                width="300">
                                        <?php endif; ?>


                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Short Description</label>
                                        <textarea name="short_description" id="short_description" cols="30" rows="7" class="form-control"><?php echo e($service->short_desc); ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" <?php echo e($service->status == 1 ? 'selected' : ''); ?>>Active
                                        </option>
                                        <option value="0" <?php echo e($service->status == 0 ? 'selected' : ''); ?>>Block
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('extraJs'); ?>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("#image", {
            url: "<?php echo e(route('service.uploadImage')); ?>",
            paramName: "file",
            maxFilesize: 2,
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
            },
            success: function(file, response) {
                $("#image_id").val(response.image_path);
            },
            error: function(file, response) {
                console.log(response);
            }
        });


        $("#editServiceForm").submit(function(event) {
            event.preventDefault();
            $("button[type='submit']").prop('disabled', true);
            $.ajax({
                url: '<?php echo e(route('service.edit.update', $service->id)); ?>',
                type: 'POST',
                dataType: 'json',
                data: $("#editServiceForm").serializeArray(),
                success: function(response) {
                    $("button[type='submit']").prop('disabled', false);

                    if (response.status == true) {
                        $("#description").summernote("code", "");
                        $("#editServiceForm").trigger("reset");
                        Lobibox.notify('success', {
                            position: 'top right',
                            msg: response.message
                        });
                        // no error
                    } else {
                        // Here we will show errors
                        $('.name-error').html(response.errors.name);
                    }
                },
                error: function(xhr) {
                    Lobibox.notify('error', {
                        position: 'top right',
                        msg: 'Something went wrong!'
                    });
                },
                complete: function() {
                    $("button[type='submit']").prop('disabled', false);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/admin/services/edit.blade.php ENDPATH**/ ?>