    <div class="main">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SALE PRODUCT -->
          <div class="col-md-12 sale-product">
			<ul class="breadcrumb">
				<li><a href="home">Home</a></li>
				<li class="active">Kategori</li>

                    <?php
                    if ($data->num_rows() > 0) {

                    if (isset($url)) {
                        echo '<li class="active">'.$url.'</li>';
                    }
                    ?>

      </ul>
      
        <div class="row product-list">
<?php foreach ($data->result() as $key) : ?>

              <!-- PRODUCT ITEM START -->
              <div class="col-md-2 col-sm-2 col-xs-1">
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

              <!-- PRODUCT ITEM END -->
            </div>


        

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
<?php
} else {
    echo '<li class="active">'.$url.'</li><hr />';
   echo '<h4>Kategori '.$url.' Masih Kosong</h4><hr />';
}
?>
    <!-- END fast view of a product -->
