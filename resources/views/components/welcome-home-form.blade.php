{{-- Welcome Home Section Component --}}
@props([
    'home_welcome_content' => [] // Expecting an array from JSON-decoded data
])

<div class="col-md-12">
    <div class="form-group">

        <h4 for="home_welcome_title" class="font-weight-bold">Welcome Home Section </h4>
        <label for="home_welcome_title"> Title</label>
        <input type="text"
            name="home_welcome_content[title]"
            id="home_welcome_title"
            class="form-control mt-2"
            value="{{ old('home_welcome_content.title', $home_welcome_content['title'] ?? '') }}"
            placeholder="Enter title">

        <label for="home_welcome_subtitle">Subtitle</label>
        <input type="text"
            name="home_welcome_content[subtitle]"
            id="home_welcome_subtitle"
            class="form-control mt-2"
            value="{{ old('home_welcome_content.subtitle', $home_welcome_content['subtitle'] ?? '') }}"
            placeholder="Enter subtitle">

        <label for="home_welcome_description">Description</label>
        <textarea name="home_welcome_content[description]"
            id="home_welcome_description"
            class="form-control summernote mt-2">{{ old('home_welcome_content.description', $home_welcome_content['description'] ?? '') }}</textarea>

        {{-- Dropzone for Image Upload --}}
        <label for="home_welcome_image">Upload Image</label>
        <div class="dropzone mt-2" id="homeWelcomeDropzone"></div>
        <input type="hidden" name="home_welcome_content[image]" id="home_welcome_image">

        {{-- Display Existing Image if Available --}}
        @if(!empty($home_welcome_content['image']))
            <img src="{{ asset('storage/' . $home_welcome_content['image']) }}" alt="Current Image" width="100">
        @endif
    </div>
</div>
</div>
{{-- End of Welcome Home Section --}}
@push('scripts')
<script>
    // Dropzone.autoDiscover = false;
    // let homeWelcomeDropzone = new Dropzone("#homeWelcomeDropzone", {
    //     url: "{{ route('tempUpload') }}", // Define your upload route
    //     paramName: "file",
    //     maxFilesize: 2, // MB
    //     acceptedFiles: ".jpg,.jpeg,.png",
    //     headers: {
    //         'X-CSRF-TOKEN': "{{ csrf_token() }}"
    //     },
    //     success: function (file, response) {
    //         document.getElementById('home_welcome_image').value = response.path; // Store the uploaded image path
    //     }
    // });

    Dropzone.autoDiscover = false;
            var myDropzone = new Dropzone("#homeWelcomeDropzone", {
                url: "{{ route('settings.uploadImage') }}",
                paramName: "file",
                maxFilesize: 2,
                acceptedFiles: "image/*",
                addRemoveLinks: true,
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                success: function(file, response) {
                    $("#home_welcome_image").val(response.image_path);
                },
                error: function(file, response) {
                    console.log(response);
                }
            });
</script>

@endpush
