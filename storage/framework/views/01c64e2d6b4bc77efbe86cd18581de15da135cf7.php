

<?php $__env->startSection('contents'); ?>
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">UDASA Contribution</h1>
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
      <div class="col-md-9" style="background-color: aliceblue;">
        <div class="row">

          <div class="col-md-12">
            <div class="full p-3">
              <h3 style="color: #029EE3;"><?php echo e($contribution->name != '' ? 'The contributions made by UDASA' : "Nothing is here yet!"); ?></h3>
              <?php echo $contribution->contents ?? ''; ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/udasa/public_html/resources/views/front-pages/contribution.blade.php ENDPATH**/ ?>