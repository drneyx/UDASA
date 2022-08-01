

<?php $__env->startSection('contents'); ?>
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">Contact us</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->
    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="full">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="main_heading text_align_center">
                                    <h2 class="color">GET IN TOUCH</h2>
                                </div>
                            </div>
                            <div class="contact_information">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                                    <div class="information_bottom text_align_center">
                                        <div class="icon_bottom"> <i class="fa fa-road" aria-hidden="true"></i> </div>
                                        <div class="info_cont">
                                            <h4>Wellcome to Udasa.</h4>
                                            <p>Udsm udasa</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                                    <div class="information_bottom text_align_center">
                                        <div class="icon_bottom"> <i class="fa fa-user" aria-hidden="true"></i> </div>
                                        <div class="info_cont">
                                            <h4><a href="tel:+255784687530" class="text-primary">+255 784 687 530</a></h4>
                                            <!-- <p>Mon-Fri 8:30am-6:30pm</p> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 adress_cont">
                                    <div class="information_bottom text_align_center">
                                        <div class="icon_bottom"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
                                        <div class="info_cont">
                                            <h4><a href="mailto:udasa@info.com" class="text-primary">udasa@info.com</a></h4>
                                            <!-- <p>24/7 online support</p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
                                <h2 class="text_align_center color">SEND US MESSAGE</h2>
                                <div class="form_section">
                                    <form class="form_contant" action="<?php echo e(route('sendEmail')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <fieldset>
                                            <div class="row">
                                                <div class="field col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" name="name" placeholder="Your name" type="text">
                                                </div>
                                                <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" name="email" placeholder="Email adress" type="email">
                                                </div>
                                                <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" name="phone" placeholder="Phone number" type="text">
                                                </div>
                                                <div class="field col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" name="subject" placeholder="subject" type="text">
                                                </div>
                                                <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <textarea class="field_custom" name="content" placeholder="Messager"></textarea>
                                                </div>
                                                <div class="center"><button type="submit" class="btn main_bt">SUBMIT NOW</button></div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/udasa/public_html/resources/views/front-pages/contacts.blade.php ENDPATH**/ ?>