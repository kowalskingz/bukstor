<?php 
	$key = $data->row();
?>
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="active"><?= $key->nama; ?></li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
         

          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-7">
            <div class="product-page">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                <div class="product-main-image">
                    <img src="<?= base_url(); ?>admin_assets/upload/<?= $key->gambar; ?>" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                  
                </div>
                <div class="col-md-6 col-sm-6">
                  <h1><?= $key->nama; ?></h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>Rp. <?= number_format($key->harga, 0, ',', '.'); ?></span></strong>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                 
                  <div class="product-page-cart">
                  <a href="<?= base_url(); ?>index.php/pesanan/add/<?= $key->id_buku; ?>" class="btn btn-primary add2cart">Add to cart</a>

                  </div>

                  <ul class="breadcrumb">
                <li>Bagikan : </li>
                </ul>
                  <ul class="social-icons">
                    <li><a class="facebook" data-original-title="facebook" href="#"></a></li>
                    <li><a class="twitter" data-original-title="twitter" href="#"></a></li>
                    <li><a class="googleplus" data-original-title="googleplus" href="#"></a></li>
                    <li><a class="evernote" data-original-title="evernote" href="#"></a></li>
                    <li><a class="tumblr" data-original-title="tumblr" href="#"></a></li>
                  </ul>
                </div>

                <div class="product-page-content">
                  <ul id="myTab" class="nav nav-tabs">
                    <li class="active"><a href="#Description" data-toggle="tab">Description</a></li>
                    <li><a href="#Information" data-toggle="tab">Information</a></li>
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="Description">
                      <p><?= $key->deskripsi; ?></p>
                    </div>
                    <div class="tab-pane fade" id="Information">
                      <table class="datasheet">
                        <tr>
                          <td class="datasheet-features-type">Penulis</td>
                          <td><?= $key->penulis?></td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Penerbit</td>
                          <td><?= $key->penerbit?></td>
                        </tr>
                                                <tr>
                          <td class="datasheet-features-type">Jumlah Halaman</td>
                          <td><?=$key->jumlah_halaman?></td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Berat</td>
                          <td><?= $key->berat?></td>
                        </tr>
                        <tr>
                          <td class="datasheet-features-type">Panjang</td>
                          <td><?=$key->panjang?></td>
                        </tr>
                                                <tr>
                          <td class="datasheet-features-type">Lebar</td>
                          <td><?=$key->lebar?></td>
                        </tr>
                      </table>
                    </div>
                    
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

      </div>
    </div>