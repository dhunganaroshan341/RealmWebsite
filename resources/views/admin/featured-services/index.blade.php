@extends('admin.layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Featured Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::has('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <a href="{{ route('service.create.form') }}" class="btn btn-primary">Create</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <!-- Featured Services List -->
                            <div id="featured-services-list">
                                @foreach ($featuredServices as $featuredService)
                                    <div class="service-item" data-id="{{ $featuredService->id }}">
                                        <span class="service-name">{{ $featuredService->service->name }}</span>
                                        <button class="btn btn-danger btn-sm delete-service" data-id="{{ $featuredService->id }}">X</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('extraJs')
<script>
    // Deleting service
    $(document).on('click', '.delete-service', function() {
        let serviceId = $(this).data('id');

        if (confirm('Are you sure you want to delete this service?')) {
            $.ajax({
                url: '/admin/featured-services/' + serviceId,
                type: 'DELETE',
                success: function(response) {
                    // Remove the service from the DOM
                    $('[data-id="'+serviceId+'"]').remove();
                    alert(response.message);
                },
                error: function(response) {
                    alert('Something went wrong!');
                }
            });
        }
    });
</script>
@endsection
