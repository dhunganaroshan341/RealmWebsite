
@extends('layouts.app')
@push('styles')
    <style>
        .selected-service {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 15px;
            margin: 5px;
            cursor: pointer;
        }

        .selected-service .remove {
            margin-left: 5px;
            color: white;
            cursor: pointer;
        }
    </style>
@endpush





<!-- Main content -->
<section class="featured-services">
    <h3>Featured Services</h3>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Select Services</h5>
                    </div>

                    <div class="card-body">
                        <!-- Selected Services (Pills) -->
                        <div id="selected-services-list">
                            <!-- Selected services will be added here -->
                        </div>

                        <!-- Service Selection -->
                        <h4>Available Services</h4>
                        <div id="available-services">
                            @foreach ($allServices as $service)
                                <!-- Display services with checkboxes -->
                                <div class="service-item">
                                    <input
                                        type="checkbox"
                                        class="service-checkbox"
                                        value="{{ $service->id }}"
                                        id="service-{{ $service->id }}"
                                    />
                                    <label for="service-{{ $service->id }}">{{ $service->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <button id="save-services" class="btn btn-success mt-3">Save Selected Services</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@push('scripts')
<script>
    $(document).ready(function() {
        // Add selected services as pills when checkbox is clicked
        $(document).on('change', '.service-checkbox', function() {
            if ($(this).prop('checked')) {
                let serviceId = $(this).val();
                let serviceName = $(this).next('label').text();
                $('#selected-services-list').append(`
                    <div class="selected-service" data-id="${serviceId}">
                        ${serviceName}
                        <span class="remove" data-id="${serviceId}">X</span>
                    </div>
                `);
            } else {
                let serviceId = $(this).val();
                $(`#selected-services-list .selected-service[data-id="${serviceId}"]`).remove();
            }
        });

        // Removing selected service when the cross (X) is clicked
        $(document).on('click', '.remove', function() {
            let serviceId = $(this).data('id');
            $(this).parent().remove(); // Remove the pill from the UI

            // Send AJAX request to remove from DB
            $.ajax({
                url: '/featured-services/' + serviceId,
                type: 'DELETE',
                success: function(response) {
                    alert(response.message);
                },
                error: function(response) {
                    alert('Something went wrong!');
                }
            });
        });

        // Optionally, save selected services to the database when "Save" button is clicked
        $('#save-services').on('click', function() {
            let selectedServices = [];
            $('#selected-services-list .selected-service').each(function() {
                selectedServices.push($(this).data('id'));
            });

            // Send selected services data to the server to save them
            $.ajax({
                url: '/admin/featured-services', // Your endpoint for saving selected services
                type: 'POST',
                data: { services: selectedServices },
                success: function(response) {
                    alert(response.message);
                },
                error: function(response) {
                    alert('Something went wrong!');
                }
            });
        });
    });
</script>
@endpush
