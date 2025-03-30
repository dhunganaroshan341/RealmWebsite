<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'galleryAlbum' => null, // For edit mode
    'clients' => [], // List of clients (optional)
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'galleryAlbum' => null, // For edit mode
    'clients' => [], // List of clients (optional)
]); ?>
<?php foreach (array_filter(([
    'galleryAlbum' => null, // For edit mode
    'clients' => [], // List of clients (optional)
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<form action="<?php echo e($galleryAlbum ? route('gallery-albums.update', $galleryAlbum->id) : route('gallery-albums.store')); ?>"
      method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php if($galleryAlbum): ?>
        <?php echo method_field('PUT'); ?>
    <?php endif; ?>

    <!-- Title -->
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control"
               value="<?php echo e(old('title', $galleryAlbum?->title)); ?>" required>
    </div>

    <!-- Type -->
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type" class="form-select">
            <?php $__currentLoopData = ['image', 'video', 'pdf', 'other']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($type); ?>"
                    <?php echo e(old('type', $galleryAlbum?->type) === $type ? 'selected' : ''); ?>>
                    <?php echo e(ucfirst($type)); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <!-- Client (optional) -->
    <div class="mb-3">
        <label for="client_id" class="form-label">Client (Optional)</label>
        <select name="client_id" id="client_id" class="form-select">
            <option value="">Select Client</option>
            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($client->id); ?>"
                    <?php echo e(old('client_id', $galleryAlbum?->client_id) == $client->id ? 'selected' : ''); ?>>
                    <?php echo e($client->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>

    <!-- File Upload -->
    <div class="mb-3">
        <label for="file" class="form-label">Upload File</label>
        <div class="col-md-6">
            <input type="hidden" name="image_id" id="image_id" value="">
            <label for="Image">Image</label>
            <div id="image" class="dropzone dz-clickable">
                <div class="dz-message needsclick">
                    <br>Drop files here or click to upload.<br><br>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">
        <?php echo e($galleryAlbum ? 'Update Album' : 'Create Album'); ?>

    </button>



</form>
<?php $__env->startSection('extraJs'); ?>
<script type="text/javascript">
    $(document).ready(function() {
        Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#image", {
    url: "<?php echo e(route('gallery-albums.uploadImage')); ?>",
    paramName: "file", // Dropzone automatically appends '[]' for multiple files
    maxFilesize: 2, // Max file size in MB
    acceptedFiles: "image/*", // Accept only images
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    },
    success: function(file, response) {
        let existingImages = $("#image_id").val();
        let newImagePath = response.image_path;

        // Store multiple image paths in hidden input
        if (existingImages) {
            $("#image_id").val(existingImages + ',' + newImagePath);
        } else {
            $("#image_id").val(newImagePath);
        }
    },
    error: function(file, response) {
        console.log(response);
    }
});

    })
</script>
<?php $__env->stopSection(); ?>
<?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/components/gallery-album-form.blade.php ENDPATH**/ ?>