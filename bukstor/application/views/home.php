
    <!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-35">
        <div id="carousel-example-generic" class="carousel slide carousel-slider">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First slide -->
                <div class="item carousel-item-four active">
                    <div class="container">
                        <div class="carousel-position-four text-center">
                            <h2 class="margin-bottom-20 animate-delay carousel-title-v3 border-bottom-title text-uppercase" data-animation="animated fadeInDown">
                                PROMO <br/><span class="color-red-v2">12.12</span><br/> SEMUA BUKU
                            </h2>
                            <p class="carousel-subtitle-v2" data-animation="animated fadeInUp">Nikmati Promo Gratis Ongkir Untuk Semua Buku</p>
                        </div>
                    </div>
                </div>
                
                <!-- Second slide -->
                <div class="item carousel-item-seven">
                    <div class="center-block">
                        <div class="center-block-wrap">
                            <div class="center-block-body">
                                <h2 class="carousel-title-v1 margin-bottom-20" data-animation="animated fadeInDown">
                                    NIKMATI BELANJA BUKU MURAH DI<br/>
                                    BUKSTOR
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
    <!-- END SLIDER -->

    <div class="main">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SALE PRODUCT -->
          <div class="col-md-12 sale-product">
            <h2>New Arrivals</h2>

            <div class="owl-carousel owl-carousel5">

<?php foreach ($data->result() as $key) : ?>
               
              <div>
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="<?= base_url(); ?>admin_assets/upload/<?= $key->gambar; ?>" class="img-responsive" alt="Berry Lace Dress">
                    <div>
                     
                      <a href="#product-pop-up<?php echo $key->id_buku; ?>" class="btn btn-default fancybox-fast-view">Detail</a>
                    </div>
                  </div>
                  <h3><a href="<?= base_url(); ?>index.php/home/detail/<?= $key->id_buku; ?>"><?= $key->nama; ?></a></h3>
                  <div class="pi-price">Rp. <?= number_format($key->harga, 0, ',', '.'); ?></div>
                  <a href="<?= base_url(); ?>index.php/pesanan/add/<?= $key->id_buku; ?>" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
         <?php endforeach; ?>


             <!-- BEGIN fast view of a product -->
             		<?php foreach ($data->result() as $key) : ?>

    <div id="product-pop-up<?php echo $key->id_buku; ?>" style="display: none; width: 700px;">

            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">

                  <div class="product-main-image">
                    <img src="<?= base_url(); ?>admin_assets/upload/<?= $key->gambar; ?>" alt="Cool green dress with red bell" class="img-responsive">
                  </div>

                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h2><?= $key->nama; ?></h2>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>Rp. </span><?= number_format($key->harga, 0, ',', '.'); ?></strong>
                    </div>
                    <div class="availability">
                      <strong><?= $key->penulis; ?></strong>
                    </div>
                  </div>

                  
                  <div class="product-page-cart">
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                    <a href="<?= base_url(); ?>index.php/home/detail/<?= $key->id_buku; ?>" class="btn btn-default">More details</a>
                  </div>
                </div>

              </div>
            </div>

    </div>
    				<?php endforeach; ?>

    <!-- END fast view of a product -->
