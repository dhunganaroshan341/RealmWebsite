<?php $__env->startPush('styles'); ?>
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
<?php $__env->stopPush(); ?>





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
                            <?php $__currentLoopData = $allServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <!-- Display services with checkboxes -->
                                <div class="service-item">
                                    <input
                                        type="checkbox"
                                        class="service-checkbox"
                                        value="<?php echo e($service->id); ?>"
                                        id="service-<?php echo e($service->id); ?>"
                                    />
                                    <label for="service-<?php echo e($service->id); ?>"><?php echo e($service->name); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <button id="save-services" class="btn btn-success mt-3">Save Selected Services</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/components/featured-service.blade.php ENDPATH**/ ?>