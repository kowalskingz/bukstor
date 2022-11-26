<!DOCTYPE html>

<head>
  <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">
  <title>BUKSTOR</title>


  <!-- Global styles START -->          
  <link href="<?= base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?= base_url(); ?>assets/pages/css/animate.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?= base_url(); ?>assets/pages/css/components.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/pages/css/slider.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="<?= base_url(); ?>assets/corporate/css/style.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/corporate/css/style-responsive.css" rel="stylesheet">
  <link href="<?= base_url(); ?>assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?= base_url(); ?>assets/corporate/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">


    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li><span>Ikuti kami di</span></li>
                        <!-- BEGIN CURRENCIES -->
                        <li class="shop-currencies">
                            <a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                            <a href="javascript:void(0);"><i class="fa fa-instagram"></i></a>
                            <a href="javascript:void(0);"><i class="fa fa-whatsapp"></i></a>
                        </li>
                        <!-- END CURRENCIES -->
                        <!-- BEGIN LANGS -->
                        
                        <!-- END LANGS -->
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                        <li class="langs-block">
                        <?php if ($this->session->userdata('user_login')) { ?>
                            <a href="javascript:void(0);" class="current"><i class="fa fa-user"></i><?= $this->session->userdata('name');?> </a>
                            <div class="langs-block-others-wrapper"><div class="langs-block-others">
                              <a href="<?= base_url(); ?>index.php/home/profil"><i class="fa fa-user"></i>Akun Saya</a>
                              <a href="<?= base_url(); ?>index.php/home/transaksi"><i class="fa fa-exchange"></i>Transaksi</a>
                              <a href="<?= base_url(); ?>index.php/home/logout"><i class="fa fa-sign-out"></i>Log Out</a>
                            </div></div>

                        </li>
                        <?php } else { ?>
                        <li><a href="<?= base_url(); ?>index.php/home/registrasi">Daftar</a></li>
                        <li><a href="<?= base_url(); ?>index.php/home/login">Login</a></li>
               <?php } ?>

                    </ul>
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href=""><img src="<?= base_url(); ?>/assets/corporate/img/logos/logo-shop-red.png" alt="Metronic Shop UI"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <div class="top-cart-info">
          <a href="<?= base_url(); ?>index.php/pesanan" class="top-cart-info-count"><i class="fa fa-shopping-cart"></i></a>
            <?php 
                  if ($this->cart->total() > 0)
                  {
                     echo 'Rp. '.number_format($this->cart->total(), 0, ',','.');
                  }

                  else
                  {
                     echo 'Pesanan';
                  }
               ?>
          </div>
                        
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-activates="kat1" href="javascript:;">
                Buku 
                
              </a>
                
              <ul class="dropdown-menu" id="kat1">
                <?php 
                  foreach ($kategori->result() as $kat):
                ?>
                <li>
                  <a href="<?=base_url();?>index.php/home/kategori/<?=$kat->url;?>"> <?=$kat->kategori;?></a>
                </li>
                  <?php endforeach; ?>
              </ul>
            </li>
            
          

                        <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Majalah
                
              </a>
                
              <ul class="dropdown-menu">
                <li><a href="shop-index-header-fix.html">Majalah Anak</a></li>
                <li><a href="shop-index-light-footer.html">Majalah Pria</a></li>
                <li><a href="shop-product-list.html">Majalah Wanita</a></li>
              </ul>
            </li>

                          <li><a href="<?= base_url(); ?>index.php/home/about">About Us</a></li>
            <li class="dropdown dropdown100 nav-catalogue">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                New
                
              </a>
 
            


          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->

        <?= $content; ?>

        
            </div>

          </div>
          <!-- END SALE PRODUCT -->
        </div>

        </div>
      </div>
    </div>


    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>About us</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo consequat. </p>
            <p>Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore.</p>
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->
          <!-- BEGIN BOTTOM INFO BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Information</h2>
            <ul class="list-unstyled">
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Delivery Information</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Customer Service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Order Tracking</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Shipping &amp; Returns</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="contacts.html">Contact Us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Careers</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="javascript:;">Payment Methods</a></li>
            </ul>
          </div>
          <!-- END INFO BLOCK -->


          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Our Contacts</h2>
            <address class="margin-bottom-40">
              Kotamobagu<br>
              Phone: 0822 9343 1134<br>
              Email: <a href="#">bukstor@gmail.com</a><br>
              Facebook: <a href="#">Bukstor</a>
            </address>
          </div>
          <!-- END BOTTOM CONTACTS -->
        </div>
        <hr>
        <div class="row">
          <!-- BEGIN SOCIAL ICONS -->
          <div class="col-md-6 col-sm-6">
            <ul class="social-icons">
              <li><a class="rss" data-original-title="rss" href="javascript:;"></a></li>
              <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
              <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
              <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
              <li><a class="linkedin" data-original-title="linkedin" href="javascript:;"></a></li>
              <li><a class="youtube" data-original-title="youtube" href="javascript:;"></a></li>
              <li><a class="vimeo" data-original-title="vimeo" href="javascript:;"></a></li>
              <li><a class="skype" data-original-title="skype" href="javascript:;"></a></li>
            </ul>
          </div>
          <!-- END SOCIAL ICONS -->
         
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-4 col-sm-4 padding-top-10">
            2019 © Awaludin Siking. ALL Rights Reserved. 
          </div>
          <!-- END COPYRIGHT -->

        </div>
      </div>
    </div>
    <!-- END FOOTER -->


    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>  
    <![endif]-->
       <script src="<?= base_url(); ?>/assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?= base_url(); ?>/assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?= base_url(); ?>/assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?= base_url(); ?>/assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='<?= base_url(); ?>/assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="<?= base_url(); ?>/assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

    <script src="<?= base_url(); ?>/assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>/assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>


<!-- materialize -->
<script type="text/javascript" src="<?= base_url(); ?>/assets/js/materialize.min.js"></script>


    <script type="text/javascript">
        $(".modal").modal();
        
        <?php if ($this->uri->segment(1) == 'pesan' || $this->uri->segment(1) == 'Pesan'){
        ?>

          $('prov').change(function(){
              var prov = $('prov').val();
              var province = prov.split(',');

              $.ajax({
                url: "<?=base_url();?>pesan/city",
                method: "POST",
                data: { prov : province[0] },
                success: function(obj) {
                  $.('#kota').html(obj);
                }
              });
          });

        <?php } ?>

        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
        });

        
    </script>
    <!-- custom -->
    <!-- END PAGE LEVEL JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>