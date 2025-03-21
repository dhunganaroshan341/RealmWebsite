@extends('admin.layouts.app')

@section('content')
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Testimonials</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Testimonials</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            {{-- <h3 class="card-title">Testimonials List</h3> --}}
                            <a href="{{ route('testimonials.create') }}" class="btn btn-primary">Add New</a>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Position</th>
                                        <th>Title</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $testimonial->customer_name }}</td>
                                            <td>{{ $testimonial->customer_position }}</td>
                                            <td>{{ $testimonial->testimonial_title }}</td>
                                            <td>{{ $testimonial->rating }} ⭐</td>
                                            <td>
                                                <span class="badge {{ $testimonial->is_active ? 'badge-success' : 'badge-danger' }}">
                                                    {{ $testimonial->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                                <button class="btn btn-sm btn-danger delete-testimonial" data-id="{{ $testimonial->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extraJs')
<script>
    $(document).on('click', '.delete-testimonial', function() {
        let testimonialId = $(this).data('id');

        if (confirm('Are you sure you want to delete this testimonial?')) {
            $.ajax({
                url: '{{ url('/admin/testimonials') }}/' + testimonialId,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function() {
                    alert('Something went wrong!');
                }
            });
        }
    });
</script>
@endsection
