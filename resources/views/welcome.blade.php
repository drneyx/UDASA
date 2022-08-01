<!DOCTYPE html>
<html lang="en">
<head>
<!-- basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- mobile metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- site metas -->
<title>Udasa</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- site icons -->
<link rel="icon" href="{{ url('front/images/fevicon/fevicon.png') }}" type="image/gif" />
<!-- bootstrap css -->
<link rel="stylesheet" href="{{ url('front/css/bootstrap.min.css') }}" />
<!-- Site css -->
<link rel="stylesheet" href="{{ url('front/css/style.css') }}" />
<!-- responsive css -->
<link rel="stylesheet" href="{{ url('front/css/responsive.css') }}" />
<!-- colors css -->
<link rel="stylesheet" href="{{ url('front/css/colors1.css') }}" />
<!-- custom css -->
<link rel="stylesheet" href="{{ url('front/css/custom.css') }}" />
<!-- wow Animation css -->
<link rel="stylesheet" href="{{ url('front/css/animate.css') }}" />
<!-- revolution slider css -->
<link rel="stylesheet" type="text/css" href="{{ url('front/revolution/css/settings.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('front/revolution/css/layers.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('front/revolution/css/navigation.css') }}" />
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}"></script>
      <![endif]-->
<style>
    .product_list {
      height: 50vh;
    }
    ._img {
        height: 72%;
    }
    .product_detail_btm {
      height: 25%;
    }
    ._img img{
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    .first-ul a {
    font-size: 15px !important;
    font-family: Arial,Helvetica Neue,Helvetica,sans-serif !important;
  }
  p {
    color: black !important;
    font-size: 15px;
  }
  .p {
    color: black !important;
  }
</style>
</head>

<!--Start of Tawk.to Script-->
<!-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/601afa7ec31c9117cb758d83/1etkm508r';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> -->
<style type="text/css') }}">
  .color{
    color: #029ee3;
  }
  .top{
    color: #fff;
    font-size: 78px;
    font-weight: bold;
  }
  .loogo{
    border-radius: 50%
  }
</style>
<!--End of Tawk.to Script-->
<body id="default_theme" class="it_service">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="{{ url('front/images/loaders/loader_1.png') }}" alt="#" /> </div>
<!-- end loader -->
<!-- header -->
<header id="default_header" class="header_style_1">
  <!-- header top -->
  <div class="header_top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="full w-100">
            <div class="topbar -left" style="text-align: center;">
              <ul class="list-inline">
                <li><h2 class="text-white top-header" style="font-weight: bold; margin-left: 100px;">UNIVERSITY OF DAR ES SALAAM ACADEMIC STAFF ASSEMBLY (UDASA)</h2> </li>
                <!-- <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:info@yourdomain.com">info@udasa.com</a></span> </li> -->
              </ul>
            </div>
          </div>
        </div>
        <!-- <div class="col-md-2 right_section_header_top">
          <div class="float-left">
            <div class="social_icon">
              <ul class="list-inline">
                <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
                <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
              </ul>
            </div>
          </div>
           <div class="float-right">
            <div class="make_appo"> <a class="btn white_btn" href="make_appointment.html">Make Appointment</a> </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <!-- end header top -->
  <!-- header bottom -->
   <div class="header_bottom" style="height: 150px;">
    <!-- <div class="container-fluid"> -->
      <div class="row">
        <div class="col-md-1">
          <!-- logo start -->
          <div class="logo udsm" style="margin-left: 100px;"> <a href="{{ url('/') }}"><img src="{{ url('front/images/udsmlogo.png') }}" alt="logo" style="width: 120px; height: 10%;" /></a> </div>
          <!-- logo end -->
        </div>
        <div class="col-md-9">
          <!-- menu start -->
          <div class="menu_side">
            <div id="navbar_menu">
              <ul class="first-ul">
                <li> <a class="active" href="{{ url('/') }}" style="font-size: 25px;">Home</a>
                  <!-- <ul>
                    <li><a href="{{ url('/') }}">Home Page</a></li>
                  </ul> -->
                </li>

                     <li><a class="" href="#">About Us</a>
                 <ul>
                     <li><a href="{{ url('the-mother-of-institution') }}">The Mother Institution</a></li>
                    <li><a href="{{ url('the-history-of-udasa') }}">The History of UDASA</a></li>
                     <li><a href="{{ url('vision-and-mission') }}">Vision and Mission</a></li>
                      <li><a href="{{ url('contribution') }}">Contribution</a></li>
                  </ul>
                </li>
              <li> <a href="#">Leadership</a>
                  <ul>
                    <li><a href="{{ url('leaders/current') }}">Current Leadership</a></li>
                    <li><a href="{{ url('leaders/previous') }}">Previous Leadership</a></li>
                  </ul>
                </li>
                <li> <a href="#">Activities</a>
                  <ul>
                    <li><a href="{{ url('udasa-social-events') }}">Social Events</a></li>
                    <li><a href="{{ url('udasa-academic-events') }}">Academic Events</a></li>
                    <li><a href="{{ url('udasa-social-responsibilities') }}">Social Responsibilities</a></li>
                    <li><a href="{{ url('chachage-scholarship') }}">Chachage Scholarship</a></li>
                  </ul>
                </li>
                <li> <a href="{{ url('udasa-gallery') }}">Gallery</a></li>

              <!--   <li> <a href="it_shop.html">Shop</a>
                  <ul>
                    <li><a href="it_shop.html">Shop List</a></li>
                    <li><a href="it_shop_detail.html">Shop Detail</a></li>
                    <li><a href="it_cart.html">Shopping Cart</a></li>
                    <li><a href="it_checkout.html">Checkout</a></li>
                  </ul>
                </li> -->

                <li>
                    <a href="{{ url('udasa-news') }}">NewsLetter</a>
                </li>
                <li> <a href="{{ url('contact-us')  }}">Contact Us</a>
                </li>
              </ul>
            </div>
          </div>
          <!-- menu end -->
        </div>
        <div class="col-md-2">
          <!-- logo start -->
          <div class="logo udasa"> <a href="{{ url('/') }}"><img src="{{ url('front/images/udasa2.png') }}"  class="loogo" alt="logo" style="width: 150px; height: 98%;" /></a> </div>
          <!-- logo end -->
        </div>
      </div>
    <!-- </div> -->
  </div>
  <!-- header bottom end -->
</header>
@yield('contents')


   <!-- section -->
   <div class="section padding_layout_1" style="padding: 50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <ul class="brand_list">
                            <!-- <li><img src="{{ url('front/images/it_service/brand_icon1.png') }}" alt="#" /></li>
            <li><img src="{{ url('front/images/it_service/brand_icon2.png') }}" alt="#" /></li>
            <li><img src="{{ url('front/images/it_service/brand_icon3.png') }}" alt="#" /></li>
            <li><img src="{{ url('front/images/it_service/brand_icon4.png') }}" alt="#" /></li>
            <li><img src="{{ url('front/images/it_service/brand_icon5.png') }}" alt="#" /></li>
          </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- Modal -->
    <div class="modal fade" id="search_bar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
                            <div class="navbar-search">
                                <form action="#" method="get" id="search-global-form" class="search-global">
                                    <input type="text" placeholder="Type to search" autocomplete="off" name="s" id="search" value="" class="search-global__input">
                                    <button class="search-global__btn"><i class="fa fa-search"></i></button>
                                    <div class="search-global__note">Begin typing your search above and press return to search.</div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Model search bar -->
    <!-- footer -->
    <footer class="footer_style_2">
        <div class="container-fuild">
            <div class="footer_blog">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="main-heading left_text">
                            <h2>Udasa Social Media</h2>
                        </div>
                        <p>Get us on social media</p>
                        <ul class="social_icons">
                            <li class="social-icon fb"><a href="https://web.facebook.com/udasa.udsm" target="_blank"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a></li>
                            <li class="social-icon tw"><a href="https://twitter.com/udasaudsm" target="_blank"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a></li>
                            <li class="social-icon gp"><a href="https://www.instagram.com/udasaudsm" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
                            <li class="social-icon gp"><a class="text-danger" href="https://www.youtube.com/channel/UC95_Qs9xPEjmgGYO6ohKutg" target="_blank"><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="main-heading left_text">
                            <h2>Quick links</h2>
                        </div>
                        <ul class="footer-menu">
                            <li><a href="{{ url('the-mother-of-institution') }}"><i class="fa fa-angle-right"></i> The Mother Institution</a></li>
                            <li><a href="{{ url('the-history-of-udasa') }}"><i class="fa fa-angle-right"></i> Our History</a></li>
                            <li><a href="{{ url('vision-and-mission#mission') }}"><i class="fa fa-angle-right"></i> Our Mission</a></li>
                            <li><a href="{{ url('vision-and-mission#vision') }}"><i class="fa fa-angle-right"></i> Our Vision</a></li>
                            <li><a href="{{ url('contact-us')  }}"><i class="fa fa-angle-right"></i> Contact us</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="main-heading left_text">
                            <h2>More About Udasa</h2>
                        </div>
                        <ul class="footer-menu">
                            <li><a href="{{ url('udasa-gallery') }}"><i class="fa fa-angle-right"></i> Events Photos</a></li>
                            <li><a href="{{ url('leaders/current') }}"><i class="fa fa-angle-right"></i> Current Leadership</a></li>
                            <li><a href="{{ url('udasa-social-events') }}"><i class="fa fa-angle-right"></i> Social Events</a></li>
                            <li><a href="{{ url('udasa-academic-events') }}"><i class="fa fa-angle-right"></i> Academic Events</a></li>
                            <li><a href="{{ url('udasa-social-responsibilities') }}"><i class="fa fa-angle-right"></i> Social Responsibilites</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="main-heading left_text">
                            <h2>Contact us</h2>
                        </div>
                        <p>UDASA General Secretary,<br> University of Dar es Salaam<br>P.O. Box 35050, Dar es Salaam <br>Tanzania <br>
                            <span style="font-size:18px;"><a href="tel:+255784687530" class="text-primary">+255 784 687 530</a></span> <br>
                            <span style="font-size:18px;"><a href="mailto:udasa.udsm@gmail.com" class="text-primary">udasa.udsm@gmail.com</a></span>
                            </p>
                        <div class="footer_mail-section">
                            <!-- <form>
                                <fieldset>
                                    <div class="field">
                                        <input placeholder="Email" type="text">
                                        <button class="button_custom"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                                    </div>
                                </fieldset>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="cprt">
                <p class="text-white">Udasa © Copyrights 2021 Design by coict team</p>
            </div>
        </div>
        </div>
    </footer>
    <!-- end footer -->
    <!-- js section -->
    <script src="{{ url('front/js/jquery.min.js') }}"></script>
    <script src="{{ url('front/js/bootstrap.min.js') }}"></script>
    <!-- menu js -->
    <script src="{{ url('front/js/menumaker.js') }}"></script>
    <!-- wow animation -->
    <script src="{{ url('front/js/wow.js') }}"></script>
    <!-- custom js -->
    <script src="{{ url('front/js/custom.js') }}"></script>
    <!-- revolution js files -->
    <script src="{{ url('front/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ url('front/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ url('front/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ url('front/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ url('front/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ url('front/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ url('front/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ url('front/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ url('front/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ url('front/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ url('front/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: '/visitor'
            })
        })
    </script>
</body>

</html>
