<?php $__env->startSection('content'); ?>
<section class="hero">
    <?php if (isset($component)) { $__componentOriginald2ae49ba783753123dbbcb785eb0eb0e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald2ae49ba783753123dbbcb785eb0eb0e = $attributes; } ?>
<?php $component = App\View\Components\StartingBanner::resolve(['title' => $page['title'],'description' => $page['description']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('starting-banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\StartingBanner::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald2ae49ba783753123dbbcb785eb0eb0e)): ?>
<?php $attributes = $__attributesOriginald2ae49ba783753123dbbcb785eb0eb0e; ?>
<?php unset($__attributesOriginald2ae49ba783753123dbbcb785eb0eb0e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald2ae49ba783753123dbbcb785eb0eb0e)): ?>
<?php $component = $__componentOriginald2ae49ba783753123dbbcb785eb0eb0e; ?>
<?php unset($__componentOriginald2ae49ba783753123dbbcb785eb0eb0e); ?>
<?php endif; ?>

<div class="desktop_7" unique-script-id="w-w-dm-id">
    <div class="responsive-container-block bigContainer">
      <div class="responsive-container-block Container">
        
        <div class="responsive-container-block optionsContainer">
          <p class="text-blk list all active" data-filter="all">
            Option
          </p>
          <p class="text-blk list" data-filter="one">
            Option
          </p>
          <p class="text-blk list" data-filter="two">
            Option
          </p>
          <p class="text-blk list" data-filter="three">
            Option
          </p>
          <p class="text-blk list" data-filter="four">
            Option
          </p>
          <p class="text-blk list" data-filter="four">
            Option
          </p>
        </div>
        <div class="responsive-container-block imageContainer">
          <div class="project">
            <div class="overlay">
              <div class="overlay-inner">
                <button class="close">
                  Close X
                </button>
                <div class="hdImgs">
                  <img alt="" class="againImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d71.png">
                </div>
              </div>
            </div>
            <img class="squareImg one" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d71.png">
            <div class="btn-box">
              <button class="btn">
                View
              </button>
            </div>
          </div>
          <div class="project">
            <img class="squareImg two" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d72.png">
            <div class="overlay">
              <div class="overlay-inner">
                <button class="close">
                  Close X
                </button>
                <div class="hdImgs">
                  <img class="squareImg two" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d72.png">
                </div>
              </div>
            </div>
            <div class="btn-box">
              <button class="btn">
                View
              </button>
            </div>
          </div>
          <div class="project">
            <img class="squareImg three" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d73.png">
            <div class="overlay">
              <div class="overlay-inner">
                <button class="close">
                  Close X
                </button>
                <div class="hdImgs">
                  <img alt="" class="againImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d73.png">
                </div>
              </div>
            </div>
            <div class="btn-box">
              <button class="btn">
                View
              </button>
            </div>
          </div>
          <div class="project">
            <img class="squareImg four" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d74.png">
            <div class="overlay">
              <div class="overlay-inner">
                <button class="close">
                  Close X
                </button>
                <div class="hdImgs">
                  <img alt="" class="againImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d74.png">
                </div>
              </div>
            </div>
            <div class="btn-box">
              <button class="btn">
                View
              </button>
            </div>
          </div>
          <div class="project">
            <img class="squareImg five" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d75.png">
            <div class="hdImg">
              <img alt="" class="againImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d75.png">
            </div>
            <div class="btn-box">
              <button class="btn">
                View
              </button>
            </div>
          </div>
          <div class="project">
            <img class="squareImg one" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d76.png">
            <div class="overlay">
              <div class="overlay-inner">
                <button class="close">
                  Close X
                </button>
                <div class="hdImgs">
                  <img alt="" class="againImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d76.png">
                </div>
              </div>
            </div>
            <div class="btn-box">
              <button class="btn">
                View
              </button>
            </div>
          </div>
          <div class="project">
            <img class="squareImg two" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d77.png">
            <div class="overlay">
              <div class="overlay-inner">
                <button class="close">
                  Close X
                </button>
                <div class="hdImgs">
                  <img alt="" class="againImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d77.png">
                </div>
              </div>
            </div>
            <div class="btn-box">
              <button class="btn">
                View
              </button>
            </div>
          </div>
          <div class="project">
            <img class="squareImg three" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d78.png">
            <div class="overlay">
              <div class="overlay-inner">
                <button class="close">
                  Close X
                </button>
                <div class="hdImgs">
                  <img alt="" class="againImg" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/d78.png">
                </div>
              </div>
            </div>
            <div class="btn-box">
              <button class="btn">
                View
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
<style>
    .desktop_7 * {
  font-family: Nunito, sans-serif;
}

.desktop_7 .text-blk {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  line-height: 25px;
}

.desktop_7 .responsive-container-block {
  min-height: 75px;
  height: fit-content;
  width: 100%;
  padding-top: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  display: flex;
  flex-wrap: wrap;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 0px;
  margin-left: auto;
  justify-content: flex-start;
}

.desktop_7 .responsive-container-block.bigContainer {
  padding-top: 10px;
  padding-right: 30px;
  padding-bottom: 10px;
  padding-left: 30px;
}

.desktop_7 .responsive-container-block.Container {
  max-width: 980px;
  flex-direction: column;
  padding-top: 10px;
  padding-right: 0px;
  padding-bottom: 10px;
  padding-left: 0px;
  margin-top: 80px;
  margin-right: auto;
  margin-bottom: 50px;
  margin-left: auto;
}

.desktop_7 .text-blk.headingText {
  font-size: 36px;
  line-height: 50px;
  font-weight: 900;
}

.desktop_7 .text-blk.active {
  font-size: 20px;
  line-height: 34px;
  font-weight: 400;
  border-bottom-width: 2px;
  border-bottom-style: solid;
  border-bottom-color: #03a9f4;
}

.desktop_7 .text-blk.list {
  font-size: 20px;
  line-height: 34px;
  cursor: pointer;
}

.desktop_7 .text-blk.all {
  margin-right: 20px;
  margin-left: 0px;
}

.desktop_7 .text-blk.list {
  margin-left: 0px;
  margin-right: 20px;
  padding-top: 10px;
  padding-right: 15px;
  padding-bottom: 10px;
  padding-left: 15px;
}

.desktop_7 .text-blk.list.active {
  padding-top: 10px;
  padding-right: 15px;
  padding-bottom: 10px;
  padding-left: 15px;
}

.desktop_7 .squareImg {
  border-top-left-radius: 6px;
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
  border-bottom-left-radius: 6px;
  width: 225px;
  height: 225px;
  margin-top: 0px;
  margin-right: auto;
  margin-bottom: 20px;
  margin-left: auto;
}

.desktop_7 .responsive-container-block.imageContainer {
  flex-direction: row;
  align-items: flex-start;
  justify-content: flex-start;
  flex-wrap: wrap;
  padding-top: 10px;
  padding-right: 0px;
  padding-bottom: 10px;
  padding-left: 0px;
}

.desktop_7 .responsive-container-block.optionsContainer {
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 10px;
  margin-left: 0px;
  min-height: auto;
}

.desktop_7 .project {
  display: inline-block;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 20px;
  margin-left: 0px;
  padding-top: 0px;
  padding-right: 0px;
  padding-bottom: 0px;
  padding-left: 0px;
}

.desktop_7 button {
  cursor: pointer;
}

.desktop_7 img {
  cursor: pointer;
}

.desktop_7 img:hover {
  transform: scale(1.02);
  transition-duration: 0.3s;
  transition-timing-function: ease-in-out;
  transition-delay: 0s;
  transition-property: all;
}

.desktop_7 .hdImg {
  display: none;
}

.desktop_7 .btn-box {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  display: none;
}

.desktop_7 .project:hover .btn-box {
  display: block;
}

.desktop_7 .imageContainer {
  background-image: initial;
  background-position-x: initial;
  background-position-y: initial;
  background-size: initial;
  background-repeat-x: initial;
  background-repeat-y: initial;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
  background-color: white;
  position: relative;
  display: flex;
  flex-wrap: wrap;
  flex-direction: column;
}

.desktop_7 .project {
  position: relative;
  background-image: initial;
  background-position-x: initial;
  background-position-y: initial;
  background-size: initial;
  background-repeat-x: initial;
  background-repeat-y: initial;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
}

.desktop_7 .overlay {
  position: fixed;
  background-image: initial;
  background-position-x: initial;
  background-position-y: initial;
  background-size: initial;
  background-repeat-x: initial;
  background-repeat-y: initial;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
  background-color: rgba(71, 69, 69, 0.7);
  height: 100%;
  width: 100%;
  max-height: 100%;
  top: 0px;
  left: 0px;
  z-index: 100;
  display: none;
}

.desktop_7 .overlay-inner {
  top: 50%;
  right: 0px;
  bottom: 0px;
  left: 50%;
  transform: translate(-50%, -50%);
  background-image: initial;
  background-position-x: initial;
  background-position-y: initial;
  background-size: initial;
  background-repeat-x: initial;
  background-repeat-y: initial;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
  background-color: white;
  padding-top: 25px;
  padding-right: 20px;
  padding-bottom: 20px;
  padding-left: 20px;
  position: relative;
  opacity: 1;
  width: fit-content;
  max-width: 50%;
  max-height: 85%;
}

.desktop_7 .close {
  position: absolute;
  top: 3px;
  right: 10px;
  background-image: none;
  background-position-x: initial;
  background-position-y: initial;
  background-size: initial;
  background-repeat-x: initial;
  background-repeat-y: initial;
  background-attachment: initial;
  background-origin: initial;
  background-clip: initial;
  background-color: initial;
  outline-color: initial;
  outline-style: initial;
  outline-width: 0px;
  color: #474545;
  border-top-width: 0px;
  border-right-width: 0px;
  border-bottom-width: 0px;
  border-left-width: 0px;
  border-top-style: initial;
  border-right-style: initial;
  border-bottom-style: initial;
  border-left-style: initial;
  border-top-color: initial;
  border-right-color: initial;
  border-bottom-color: initial;
  border-left-color: initial;
  border-image-source: initial;
  border-image-slice: initial;
  border-image-width: initial;
  border-image-outset: initial;
  border-image-repeat: initial;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.desktop_7 .overlay-inner .hdImgs {
  width: fit-content;
  height: calc(85% - 55px);
  display: flex;
}

.desktop_7 .overlay-inner img {
  max-height: 100%;
  max-width: 100%;
  transform: none;
}

.desktop_7 .squareImg.one {
  padding-top: 10px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 10px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
}

.desktop_7 .squareImg.two {
  padding-top: 10px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 10px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
}

.desktop_7 .squareImg.three {
  padding-top: 10px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 10px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
}

.desktop_7 .squareImg.four {
  padding-top: 10px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 10px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
}

.desktop_7 .squareImg.five {
  padding-top: 10px;
  padding-right: 15px;
  padding-bottom: 15px;
  padding-left: 10px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
}

@media (max-width: 1024px) {
  .desktop_7 .Container {
    width: 690px;
  }

  .desktop_7 .squareImg {
    width: 170px;
    height: 170px;
  }

  .desktop_7 .squareImg.one {
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
  }

  .desktop_7 .squareImg.two {
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
  }

  .desktop_7 .squareImg.three {
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
  }

  .desktop_7 .squareImg.four {
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
  }

  .desktop_7 .squareImg.five {
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
  }

  .desktop_7 .overlay-inner {
    margin-top: 20px;
    margin-right: 20px;
    margin-bottom: 20px;
    margin-left: 20px;
    padding-top: 25px;
    padding-right: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
    width: 80%;
  }

  .desktop_7 .close {
    font-size: 14px;
    top: 2px;
    right: 5px;
  }

  .desktop_7 .overlay {
    padding-top: 10px;
    padding-right: 30px;
    padding-bottom: 10px;
    padding-left: 30px;
  }
}

@media (max-width: 768px) {
  .desktop_7 .squareImg {
    width: 225px;
    height: 225px;
  }

  .desktop_7 .responsive-container-block.Container {
    max-width: 450px;
  }

  .desktop_7 .responsive-container-block.optionsContainer {
    max-width: 380px;
    margin-top: 0px;
    margin-right: auto;
    margin-bottom: 10px;
    margin-left: auto;
  }

  .desktop_7 .text-blk.list {
    margin-top: 0px;
    margin-right: auto;
    margin-bottom: 0px;
    margin-left: auto;
  }

  .desktop_7 .text-blk.list.all.active {
    margin-top: 0px;
    margin-right: auto;
    margin-bottom: 0px;
    margin-left: auto;
  }

  .desktop_7 .text-blk.headingText {
    text-align: center;
  }

  .desktop_7 .text-blk.list {
    margin-top: 0px;
    margin-right: auto;
    margin-bottom: 10px;
    margin-left: auto;
  }

  .desktop_7 .text-blk.list.all.active {
    margin-top: 0px;
    margin-right: 14.4219px;
    margin-bottom: 10px;
    margin-left: 14.4219px;
  }

  .desktop_7 .responsive-container-block.bigContainer {
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
  }
}

@media (max-width: 500px) {
  .desktop_7 .text-blk.list.all.active {
    font-size: 14px;
    padding-top: 10px;
    padding-right: 15px;
    padding-bottom: 0px;
    padding-left: 15px;
    line-height: 34px;
  }

  .desktop_7 .text-blk.list {
    font-size: 14px;
  }

  .desktop_7 .responsive-container-block.optionsContainer {
    min-height: auto;
  }

  .desktop_7 .responsive-container-block.imageContainer {
    padding-top: 10px;
    padding-right: 5px;
    padding-bottom: 10px;
    padding-left: 5px;
  }

  .desktop_7 .responsive-container-block.optionsContainer {
    max-width: 330px;
    margin-top: 0px;
    margin-right: auto;
    margin-bottom: 10px;
    margin-left: auto;
  }

  .desktop_7 .text-blk.list.all.active {
    font-size: 17px;
    margin-top: 0px;
    margin-right: auto;
    margin-bottom: 10px;
    margin-left: auto;
  }

  .desktop_7 .text-blk.list {
    font-size: 17px;
    margin-top: 0px;
    margin-right: auto;
    margin-bottom: 10px;
    margin-left: auto;
  }

  .desktop_7 .squareImg {
    width: 100%;
    height: 25%;
  }

  .desktop_7 .project {
    padding-top: 0px;
    padding-right: 10px;
    padding-bottom: 0px;
    padding-left: 10px;
    width: 100%;
    height: 25%;
  }

  .desktop_7 .overlay-inner {
    margin-top: 20px;
    margin-right: auto;
    margin-bottom: 20px;
    margin-left: auto;
    padding-top: 25px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    width: 100%;
  }

  .desktop_7 .overlay {
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
  }

  .desktop_7 .responsive-container-block.bigContainer {
    padding-top: 10px;
    padding-right: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
  }

  .desktop_7 .overlay-inner hdImgs {
    width: 90%;
  }
}
</style>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('scripts'); ?>
<script>
    $(document).ready(function() {

$("[unique-script-id='w-w-dm-id'] .btn-box").click(function() {
  $(this).parent().children(".overlay").show();

});


$("[unique-script-id='w-w-dm-id'] .close").click(function() {
  $(".overlay").hide();
});

$("[unique-script-id='w-w-dm-id'] .list").click(function() {
  const value = $(this).attr('data-filter');
  if (value == 'all') {
    $("[unique-script-id='w-w-dm-id'] .squareImg").show('1000');
  } else {
    $("[unique-script-id='w-w-dm-id'] .squareImg").not('.' + value).hide('1000');
    $("[unique-script-id='w-w-dm-id'] .squareImg").filter('.' + value).show('1000');
  }
})
$("[unique-script-id='w-w-dm-id'] .list").click(function() {
  $(this).addClass('active').siblings().removeClass('active');
})
})
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\applications\laragon\laragon\www\RealmLaravel10Website\resources\views/gallery/index.blade.php ENDPATH**/ ?>