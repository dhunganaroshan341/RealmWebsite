<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Settings</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>">Home</a></li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content  h-100"">
        <div class="container-fluid  h-100"">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                
                <div class="col-md-12 ">	
                    <?php if(Session::has('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                    <?php endif; ?>						
                    <form action="" method="post" name="settingsFrom" id="settingsFrom">
                        <div class="card">
                            
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Website Title</label>
                                    <input type="text" name="website_title" id="website_title" class="form-control" value="<?php echo e((!empty($settings->website_title)) ? $settings->website_title : ''); ?>">
                                    <p class="error website-title-error"></p>
                                </div>

                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="text" value="<?php echo e((!empty($settings->email)) ? $settings->email : ''); ?>" name="email" id="email" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Phone</label>
                                    <input type="text" value="<?php echo e((!empty($settings->phone)) ? $settings->phone : ''); ?>" name="phone" id="phone" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="name">Copyright</label>
                                    <input type="text" value="<?php echo e((!empty($settings->copy)) ? $settings->copy : ''); ?>" name="copy" id="copy" class="form-control">
                                </div>

                                <div class="mt-4">
                                    <h4><strong>Social Links</strong></h4>
                                    <hr>
                                    <div class="form-group">
                                        <label for="name">Facebook Url</label>
                                        <input type="text" value="<?php echo e((!empty($settings->facebook_url)) ? $settings->facebook_url  : ''); ?>" name="facebook_url" id="facebook_url" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Twitter Url</label>
                                        <input type="text" value="<?php echo e((!empty($settings->twitter_url)) ? $settings->twitter_url : ''); ?>"  name="twitter_url" id="twitter_url" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Instagram Url</label>
                                        <input type="text" value="<?php echo e((!empty($settings->instagram_url)) ? $settings->instagram_url : ''); ?>"  name="instagram_url" id="instagram_url" class="form-control">
                                    </div>
                                    

                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Contact Card One</label>
                                            <textarea name="contact_card_one" id="contact_card_one" class="summernote" ><?php echo (!empty($settings->contact_card_one)) ? $settings->contact_card_one : ''; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Contact Card Two</label>
                                            <textarea name="contact_card_two" id="contact_card_two" class="summernote" ><?php echo (!empty($settings->contact_card_two)) ? $settings->contact_card_two : ''; ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Contact Card Three</label>
                                            <textarea name="contact_card_three" id="contact_card_three" class="summernote" ><?php echo (!empty($settings->contact_card_three)) ? $settings->contact_card_three : ''; ?></textarea>
                                        </div>
                                    </div> 

                                    <div class="col-md-6">
                                        <label for="">Featured Services</label>
                                        <div class="row">
                                            <div class="col">
                                                <select name="service" id="service" class="form-control">
                                                    <?php if($services): ?>
                                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($service->id); ?>"><?php echo e($service->name); ?></option>    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>                                                    
                                                </select>
                                            </div>
                                            <div class="col">
                                                <button onclick="addService();" type="button" class="btn btn-primary">
                                                    Add Service
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12" id="services-wrapper">

                                                <?php if($featuredServices->isNotEmpty()): ?>
                                                    <?php $__currentLoopData = $featuredServices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="ui-state-default" data-id='<?php echo e($service->service_id); ?>' id='service-<?php echo e($service->service_id); ?>''>
                                                        <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                                                        <?php echo e($service->name); ?>

                                                        <button type="button" onclick="deleteService(<?php echo e($service->service_id); ?> );" class='btn btn-danger btn-sm'>Delete</button>
                                                    </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                                
                                            </div>
                                        </div>
                                    </div>                                                                

                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>                   
                </div>                            
            </div>
            <!-- /.row -->
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>


<?php $__env->startSection('extraJs'); ?>

<script type="text/javascript">

    function deleteService(id) {
        $("#service-"+id).remove();
    }

    $( function() {
        $( "#services-wrapper" ).sortable();
    } );

    function addService(){
        var serviceId = $("#service").val()
        var serviceName = $("#service option:selected").text();

        var html = `<div class="ui-state-default" data-id='${serviceId}' id=service-${serviceId}><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>${serviceName} <button type="button" onclick="deleteService(${serviceId});" class='btn btn-danger btn-sm'>Delete</button></div>`;

        var isFound = false;

        $("#services-wrapper .ui-state-default").each(function(){
            var id = $(this).attr('data-id');
            if(id == serviceId){
                isFound = true;
            }
        });

        if(isFound == true){
            alert("You can not select same service again.");
        } else {
            $("#services-wrapper").append(html);
        }        
    }

    $("#settingsFrom").submit(function(event){
        event.preventDefault();
        $("button[type='submit']").prop('disabled',true);     
        
        var servicesString = $("#services-wrapper").sortable('serialize');
        //console.log(servicesString);
        //return false;
        var data = $("#settingsFrom").serializeArray();
        data[data.length] = {name: 'services', value : servicesString};

        $.ajax({
            url: '<?php echo e(route("settings.save")); ?>',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(response){
                $("button[type='submit']").prop('disabled',false);

                if(response.status == 200) {
                    // no error
                    window.location.href = '<?php echo e(route("settings.index")); ?>'; 
                } else {
                    // Here we will show errors
                    if(response.errors.website_title) {
                        $('.website-title-error').html(response.errors.website_title);
                    } else {
                        $('.website-title-error').html('');
                    }                    
                }
            }
        });
    });

    $("#name").change(function(){
        $("button[type='submit']").prop('disabled',true);
        $.ajax({
            url: '<?php echo e(route("blog.slug")); ?>',
            type: 'get',
            data: {name: $(this).val()},
            dataType: 'json',
            success: function(response){
                $("button[type='submit']").prop('disabled',false);
                $("#slug").val(response.slug);
            }
        })
    });

    
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/admin/settings.blade.php ENDPATH**/ ?>