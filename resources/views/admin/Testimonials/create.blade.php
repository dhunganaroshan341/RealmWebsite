@extends('admin.layouts.app')

@section('content')

    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Testimonials / Create</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.testimonials.index') }}">Testimonials</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content h-100">
        <div class="container-fluid h-100">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('admin.testimonials.store') }}" method="post" id="createTestimonialForm">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.testimonials.index') }}" class="btn btn-primary">Back</a>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="customer_name">Customer Name</label>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control">
                                    <p class="error customer_name-error text-danger"></p>
                                </div>

                                <div class="form-group">
                                    <label for="customer_position">Customer Position</label>
                                    <input type="text" name="customer_position" id="customer_position" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="testimonial_title">Title</label>
                                    <input type="text" name="testimonial_title" id="testimonial_title" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="testimonial_content">Testimonial</label>
                                    <textarea name="testimonial_content" id="testimonial_content" class="summernote"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="image_id" id="image_id" value="">
                                        <label for="image">Customer Image</label>
                                        <div id="image" class="dropzone dz-clickable">
                                            <div class="dz-message needsclick">
                                                <br>Drop files here or click to upload.<br><br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="rating">Rating (1-5)</label>
                                        <select name="rating" id="rating" class="form-control">
                                            <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                                            <option value="4">⭐⭐⭐⭐ (4)</option>
                                            <option value="3">⭐⭐⭐ (3)</option>
                                            <option value="2">⭐⭐ (2)</option>
                                            <option value="1">⭐ (1)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="is_active">Status</label>
                                    <select name="is_active" id="is_active" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('extraJs')

<script type="text/javascript">
    Dropzone.autoDiscover = false;
    const dropzone = $("#image").dropzone({
        init: function() {
            this.on('addedfile', function(file) {
                if (this.files.length > 1) {
                    this.removeFile(this.files[0]);
                }
            });
        },
        url: "{{ route('admin.testimonials.upload') }}",
        maxFiles: 1,
        addRemoveLinks: true,
        acceptedFiles: "image/jpeg,image/png,image/gif",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        success: function(file, response){
            $("#image_id").val(response.name);
        }
    });

    $("#createTestimonialForm").submit(function(event){
        event.preventDefault();
        $("button[type='submit']").prop('disabled', true);

        $.ajax({
            url: '{{ route("admin.testimonials.store") }}',
            type: 'POST',
            dataType: 'json',
            data: $("#createTestimonialForm").serializeArray(),
            success: function(response){
                $("button[type='submit']").prop('disabled', false);

                if(response.status == 200) {
                    window.location.href = '{{ route("admin.testimonials.index") }}';
                } else {
                    $('.customer_name-error').html(response.errors.customer_name);
                }
            }
        });
    });
</script>

@endsection
