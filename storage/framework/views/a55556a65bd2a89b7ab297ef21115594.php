<div class="container pt-4">
    <div class="row">
        <!-- Client Name on the Left -->
        <div class="col-md-4 ">
            <div class="testimonial-list">
                <div class="card p-3">
                    <div class="d-flex flex-row align-items-center">
                        <img id="clientImage" src="<?php echo e($testimonials[0]->image ?? ''); ?>" width="50" class="rounded-circle">
                        <div class="d-flex flex-column ml-2">
                            <span id="clientName" class="font-weight-normal"><?php echo e($testimonials[0]->customer_name ?? 'Milton Austin'); ?></span>
                            <span id="clientPosition"><?php echo e($testimonials[0]->customer_position ?? 'Sales Manager, Stack'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Testimonial Content on the Right -->
        <div class="col-md-8">
            <div class="testimonial-content">
                <div id="testimonialText">
                    <h4><?php echo e($testimonials[0]->testimonial_title ?? 'It was a great experience'); ?></h4>
                    <div class="ratings">
                        <?php for($i = 0; $i < $testimonials[0]->rating; $i++): ?>
                            <i class="fa fa-star"></i>
                        <?php endfor; ?>
                    </div>
                    <p><?php echo e($testimonials[0]->testimonial_text ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Circular Indicators -->
    <div class="d-flex justify-content-center mt-3" id="indicatorContainer">
        <?php for($i = 0; $i < count($testimonials); $i++): ?>
            <div class="testimonial-indicator"></div>
        <?php endfor; ?>
    </div>
</div>
<?php $__env->startPush('styles'); ?>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:weight@100;200;300;400;500;600;700;800&display=swap");

    .testimonial-list {
        list-style: none;
    }

    .testimonial-list li {
        margin-bottom: 20px;
    }

    .card {
        border: none;
        cursor: pointer;
        box-shadow: 0 0 40px rgba(51, 51, 51, .1);
    }

    .card:hover {
        background-color: #eee;
    }

    .ratings i {
        color: orange;
    }

    .testimonials-margin {
        margin-top: -19px;
    }

    /* Circular Indicator */
    #indicatorContainer {
        display: flex;
        justify-content: center;
    }

    .testimonial-indicator {
        width: 10px;
        height: 10px;
        margin: 0 5px;
        border-radius: 50%;
        background-color: #ccc;
        transition: background-color 0.3s;
    }

    .testimonial-indicator.active {
        background-color: #007bff;
    }
</style>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {
        let currentIndex = 0;  // Start from the first testimonial
        let totalTestimonials = <?php echo e(count($testimonials)); ?>;  // Total number of testimonials

        // Function to update the testimonial content
        function updateTestimonial(index) {
            // Update the client name, position, image, and testimonial content
            let testimonial = <?php echo json_encode($testimonials, 15, 512) ?>;  // Convert the PHP array into a JS array

            // Update the left side (client name and image)
            $("#clientName").text(testimonial[index].customer_name);
            $("#clientPosition").text(testimonial[index].customer_position);
            $("#clientImage").attr("src", testimonial[index].image ?? '');

            // Update the right side (testimonial content)
            $("#testimonialText h4").text(testimonial[index].testimonial_title);
            $(".ratings").html("");  // Clear existing stars
            for (let i = 0; i < testimonial[index].rating; i++) {
                $(".ratings").append('<i class="fa fa-star"></i>');
            }
            $("#testimonialText p").text(testimonial[index].testimonial_text);

            // Update the circular indicators
            $(".testimonial-indicator").removeClass("active");
            $(".testimonial-indicator").eq(index).addClass("active");
        }

        // Auto-cycle every 2 seconds
        setInterval(function() {
            currentIndex = (currentIndex + 1) % totalTestimonials;  // Loop through testimonials
            updateTestimonial(currentIndex);
        }, 2000);  // 2 seconds

        // Initial update on page load
        updateTestimonial(currentIndex);
    });
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/components/testimonial.blade.php ENDPATH**/ ?>