@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Manage Gallery</h2>
    <div class="card">
        <div class="card-body">
            <form id="galleryForm">
                @csrf
                <div class="form-group">
                    <label for="gallery_id">Select Gallery</label>
                    <select name="gallery_id" id="gallery_id" class="form-control">
                        <option value="">-- Create New --</option>
                        @foreach($galleries as $gallery)
                            <option value="{{ $gallery->id }}">{{ $gallery->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group" id="newGallerySection" style="display:none;">
                    <label for="title">New Gallery Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label>Upload Images</label>
                    <div id="dropzone" class="dropzone dz-clickable">
                        <div class="dz-message needsclick">Drop files here or click to upload.</div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>

@endsection

@section('extraJs')
<script>
    $(document).ready(function () {
        // Show new gallery input if needed
        $('#gallery_id').change(function() {
            if ($(this).val() === '') {
                $('#newGallerySection').show();
            } else {
                $('#newGallerySection').hide();
            }
        });

        // Dropzone setup
        Dropzone.autoDiscover = false;
        let uploadedFiles = [];
        let myDropzone = new Dropzone("#dropzone", {
            url: "{{ route('tempUpload') }}",
            maxFiles: 5,
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(file, response) {
                uploadedFiles.push(response.name);
            },
            removedfile: function(file) {
                let name = file.upload.filename;
                uploadedFiles = uploadedFiles.filter(item => item !== name);
                file.previewElement.remove();
            }
        });

        // Form submission via AJAX
        $('#galleryForm').submit(function(e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            formData.push({ name: 'file_paths', value: JSON.stringify(uploadedFiles) });

            $.ajax({
                url: "{{ route('galleries.store') }}",
                type: "POST",
                data: formData,
                success: function(response) {
                    alert('Gallery saved successfully!');
                    location.reload();
                }
            });
        });
    });
</script>
@endsection
