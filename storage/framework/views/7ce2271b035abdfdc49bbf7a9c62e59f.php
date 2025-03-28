
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'home_welcome_content' => [] // Expecting an array from JSON-decoded data
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'home_welcome_content' => [] // Expecting an array from JSON-decoded data
]); ?>
<?php foreach (array_filter(([
    'home_welcome_content' => [] // Expecting an array from JSON-decoded data
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="col-md-12">
    <div class="form-group">

        <h4 for="home_welcome_title" class="font-weight-bold">Welcome Home Section </h4>
        <label for="home_welcome_title"> Title</label>
        <input type="text"
            name="home_welcome_content[title]"
            id="home_welcome_title"
            class="form-control mt-2"
            value="<?php echo e(old('home_welcome_content.title', $home_welcome_content['title'] ?? '')); ?>"
            placeholder="Enter title">

        <label for="home_welcome_subtitle">Subtitle</label>
        <input type="text"
            name="home_welcome_content[subtitle]"
            id="home_welcome_subtitle"
            class="form-control mt-2"
            value="<?php echo e(old('home_welcome_content.subtitle', $home_welcome_content['subtitle'] ?? '')); ?>"
            placeholder="Enter subtitle">

        <label for="home_welcome_description">Description</label>
        <textarea name="home_welcome_content[description]"
            id="home_welcome_description"
            class="form-control summernote mt-2"><?php echo e(old('home_welcome_content.description', $home_welcome_content['description'] ?? '')); ?></textarea>

        
        <label for="home_welcome_image">Upload Image</label>
        <div class="dropzone mt-2" id="homeWelcomeDropzone"></div>
        <input type="hidden" name="home_welcome_content[image]" id="home_welcome_image">

        
        <?php if(!empty($home_welcome_content['image'])): ?>
            <img src="<?php echo e(asset('storage/' . $home_welcome_content['image'])); ?>" alt="Current Image" width="100">
        <?php endif; ?>
    </div>
</div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    // Dropzone.autoDiscover = false;
    // let homeWelcomeDropzone = new Dropzone("#homeWelcomeDropzone", {
    //     url: "<?php echo e(route('tempUpload')); ?>", // Define your upload route
    //     paramName: "file",
    //     maxFilesize: 2, // MB
    //     acceptedFiles: ".jpg,.jpeg,.png",
    //     headers: {
    //         'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    //     },
    //     success: function (file, response) {
    //         document.getElementById('home_welcome_image').value = response.path; // Store the uploaded image path
    //     }
    // });

    Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone("#homeWelcomeDropzone", {
                url: "<?php echo e(route('settings.uploadImage')); ?>",
                paramName: "file",
                maxFilesize: 2,
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                },
                success: function(file, response) {
                    $("#home_welcome_image").val(response.image_path);
                },
                error: function(file, response) {
                    console.log(response);
                }
            });
</script>

<?php $__env->stopPush(); ?>
<?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/components/welcome-home-form.blade.php ENDPATH**/ ?>