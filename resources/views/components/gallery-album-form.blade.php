@props([
    'galleryAlbum' => null, // For edit mode
    'clients' => [], // List of clients (optional)
])

<form action="{{ $galleryAlbum ? route('gallery-albums.update', $galleryAlbum->id) : route('gallery-albums.store') }}"
      method="POST" enctype="multipart/form-data">
    @csrf
    @if ($galleryAlbum)
        @method('PUT')
    @endif

    <!-- Title -->
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control"
               value="{{ old('title', $galleryAlbum?->title) }}" required>
    </div>

    <!-- Type -->
    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <select name="type" id="type" class="form-select">
            @foreach (['image', 'video', 'pdf', 'other'] as $type)
                <option value="{{ $type }}"
                    {{ old('type', $galleryAlbum?->type) === $type ? 'selected' : '' }}>
                    {{ ucfirst($type) }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Client (optional) -->
    <div class="mb-3">
        <label for="client_id" class="form-label">Client (Optional)</label>
        <select name="client_id" id="client_id" class="form-select">
            <option value="">Select Client</option>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}"
                    {{ old('client_id', $galleryAlbum?->client_id) == $client->id ? 'selected' : '' }}>
                    {{ $client->name }}
                </option>
            @endforeach
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
        {{-- <input type="hidden" name="file[]" multiple id="image_id" class="form-control"> --}}
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">
        {{ $galleryAlbum ? 'Update Album' : 'Create Album' }}
    </button>



</form>
@section('extraJs')
<script type="text/javascript">
    $(document).ready(function() {
        Dropzone.autoDiscover = false;
var myDropzone = new Dropzone("#image", {
    url: "{{ route('gallery-albums.uploadImage') }}",
    paramName: "file", // Dropzone automatically appends '[]' for multiple files
    maxFilesize: 2, // Max file size in MB
    acceptedFiles: "image/*", // Accept only images
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
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
@endsection
