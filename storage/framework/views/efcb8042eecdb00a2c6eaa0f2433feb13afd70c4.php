

<?php $__env->startSection('contents'); ?>
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Vision and Mission</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- end inner page banner -->

<div class="section padding_layout_1 it_service_policy">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="row conts p-2">
          <?php if($values->isNotEmpty()): ?>
            <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-md-12">
                <div class="full" id="mission">
                  <h3 class="color">OUR <?php echo e(strtoupper($value->name)); ?></h3>
                  <p><?php echo $value->contents; ?></p>
                </div>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>
          <div class="col-md-12">
            <div class="full">
              <!-- <h3 class="color">OUR MOTTO</h3>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="side_bar">
          <div class="side_bar_blog">
          <div class="side_bar_blog">
            <h4  class="color">OUR VALUES</h4>
            <div class="categary">
              <ul>
                <li><a data-toggle="modal" data-target="#freedom" href="#"><i class="fa fa-angle-right"></i> Academic Freedom</a></li>
                <li><a data-toggle="modal" data-target="#interest" href="#"><i class="fa fa-angle-right"></i> Academic Interest</a></li>
                <li><a data-toggle="modal" data-target="#promote" href="#"><i class="fa fa-angle-right"></i> Promote Academic Functions</a></li>
                <li><a data-toggle="modal" data-target="#sponsor" href="#"><i class="fa fa-angle-right"></i> Sponsor and Functions</a></li>
                <li><a data-toggle="modal" data-target="#debated" href="#"><i class="fa fa-angle-right"></i> Academic Debates</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php echo $__env->make('front-pages/valuesModals/values', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- section -->
<style>
.conts {
    background-color: aliceblue;
  }
  .conts p {
    font-size: 17px; text-align:justify; color:black; line-height: 30px;
  }

  .conts h3 {
    padding-top: 20px;
  }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/udasa/public_html/resources/views/front-pages/vision-mission.blade.php ENDPATH**/ ?>