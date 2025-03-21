<?php $__env->startSection('content'); ?>
<section class="hero-small">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('<?php echo e(asset('assets/images/banner1.jpg')); ?>') ;">
                <div class="hero-small-background-overlay"></div>
                <div class="container  h-100">
                    <div class="row align-items-center d-flex h-100">
                        <div class="col-md-12">
                            <div class="block text-center">
                                <span class="text-uppercase text-sm letter-spacing"></span>
                                <h1 class="mb-3 mt-3 text-center">Contact us</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="pt-5 pb-0" >
    <div class="container contact-box">
        <div class="row">
            <div class="col-lg-12 text-center mx-auto">
                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-8 col-xl-6 text-center mx-auto">
                <h1 class="mb-4 text-black">We're here to help!</h1>
            </div>
        </div>

        <!-- Contact info box -->
        <div class="row g-4 g-md-5 mt-0 mt-lg-3">
            <!-- Box item -->
            <?php if(!empty($settings) && $settings->contact_card_one != ''): ?>
            <div class="col-lg-4 mt-lg-0">
                <div class="card card-body bg-primary shadow py-5 text-center h-100 border-0 text-white card-one">
                    <!-- Title -->
                    <?php echo $settings->contact_card_one; ?>

                </div>
            </div>
            <?php endif; ?>

            <!-- Box item -->
            <?php if(!empty($settings) && $settings->contact_card_two != ''): ?>
            <div class="col-lg-4 mt-lg-0">
                <div class="card card-body shadow py-5 text-center h-100 border-0">
                    <!-- Title -->
                    <?php echo $settings->contact_card_two; ?>

                </div>
            </div>
            <?php endif; ?>

            <!-- Box item -->
            <?php if(!empty($settings) && $settings->contact_card_three != ''): ?>
            <div class="col-lg-4 mt-lg-0">
                <div class="card card-body shadow py-5 text-center h-100 border-0">
                    <!-- Title -->
                    <?php echo $settings->contact_card_three; ?>

                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section>
    <div class="container my-5">
        <div class="row g-4 g-lg-0 align-items-center">

            <!-- Contact form START -->
            <div class="col-md-12">
                <!-- Title -->
                <h2 class="mt-4 mt-md-0">Let's talk</h2>
                <p>To request a quote or want to meet up for coffee, contact us directly or fill out the form and we will get back to you promptly</p>

                <form action="" method="post" id="contactForm" name="contactForm">
                    <!-- Name -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4 bg-light-input">
                                <label for="name" class="form-label">Your name *</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name">
                                <p class="name-error invalid-feedback"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4 bg-light-input">
                                <label for="email" class="form-label">Email address *</label>
                                <input type="text" class="form-control form-control-lg" id="email" name="email">
                                <p class="email-error invalid-feedback"></p>
                            </div>
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="mb-4 bg-light-input">
                        <label for="textareaBox" class="form-label">Message *</label>
                        <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                        <p class="message-error invalid-feedback"></p>
                    </div>
                    <!-- Button -->
                    <div class="d-grid">
                        <button class="btn btn-lg btn-primary mb-0" id="submit" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
            <!-- Contact form END -->
        </div>
    </div>
</section>

<section class="pt-0 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2700.5606430646158!2d85.31658827059948!3d27.677991674207497!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19799ecafa79%3A0xbd693a1616123b1f!2sRealm%20Infotech%20Pvt.%20Ltd.!5e1!3m2!1sen!2snp!4v1742194915574!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('extraJs'); ?>
<script type="text/javascript">
    $("#contactForm").submit(function(event){
        event.preventDefault();
        $("#submit").prop('disabled',true);
        $.ajax({
            url: '<?php echo e(route("sendContactEmail")); ?>',
            type: 'post',
            data: $("#contactForm").serializeArray(),
            dataType: 'json',
            success: function(response){
                $("#submit").prop('disabled',false);

                if (response.status == 0) {
                    if (response.errors.name) {
                        $("#name").addClass('is-invalid');
                        $(".name-error").html(response.errors.name);
                    } else {
                        $(".name-error").html('');
                        $("#name").removeClass('is-invalid');
                    }

                    if (response.errors.email) {
                        $("#email").addClass('is-invalid');
                        $(".email-error").html(response.errors.email);
                    } else {
                        $(".email-error").html('');
                        $("#email").removeClass('is-invalid');
                    }

                    if (response.errors.message) {
                        $("#message").addClass('is-invalid');
                        $(".message-error").html(response.errors.message);
                    } else {
                        $(".message-error").html('');
                        $("#message").removeClass('is-invalid');
                    }
                } else {
                    window.location.href='<?php echo e(url("/contact")); ?>';
                }
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/contact.blade.php ENDPATH**/ ?>