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
        let selectedServices = []; // Store selected services with order

        // When a service is selected
        $(document).on('change', '.service-checkbox', function() {
            let service_id = $(this).val();
            let service_name = $(this).next('label').text();

            if ($(this).prop('checked')) {
                selectedServices.push(service_id); // Add to the end (order matters)
                let sort_order = selectedServices.length;

                $('#selected-services-list').append(`
                    <div class="selected-service" data-id="${service_id}" data-order="${sort_order}">
                        ${service_name} <span class="remove" data-id="${service_id}">X</span>
                    </div>
                `);
            } else {
                selectedServices = selectedServices.filter(id => id !== service_id); // Remove from list
                $(`#selected-services-list .selected-service[data-id="${service_id}"]`).remove();
            }
        });

        // Removing selected service when the cross (X) is clicked
        $(document).on('click', '.remove', function() {
            let service_id = $(this).data('id');
            $(`.service-checkbox[value="${service_id}"]`).prop('checked', false); // Uncheck
            $(this).parent().remove(); // Remove from UI

            selectedServices = selectedServices.filter(id => id !== service_id); // Remove from list
        });

        // Save selected services with order
        $('#save-services').on('click', function() {
            let servicesToSave = [];
            $('#selected-services-list .selected-service').each(function(index) {
                servicesToSave.push({
                    service_id: $(this).data('id'),
                    sort_order: index + 1 // Assign order
                });
            });

            if (servicesToSave.length === 0) {
                alert("Please select at least one service.");
                return;
            }

            // Send to server
            $.ajax({
                url: '/admin/featured-services',
                type: 'POST',
                data: { services: servicesToSave },
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    alert(response.message);
                    location.reload(); // Refresh page to show changes
                },
                error: function(response) {
                    alert('Something went wrong!');
                }
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/components/featured-service.blade.php ENDPATH**/ ?>