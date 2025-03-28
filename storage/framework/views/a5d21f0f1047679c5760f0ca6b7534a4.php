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
        <input type="file" name="file" id="file" class="form-control">
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">
        <?php echo e($galleryAlbum ? 'Update Album' : 'Create Album'); ?>

    </button>
</form>
<?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/components/gallery-album-form.blade.php ENDPATH**/ ?>