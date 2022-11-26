                <div class="x_panel">
                  <div class="x_title">
                    <h2><?= $header; ?></h2><br><br>
                    <div class="clearfix">
                      <?= validation_errors('<p style="color:red">','</p>'); ?>
                      <?php 
                        if ($this->session->flashdata('alert'))
                        {
                            echo '<div class="alert alert-danger alert-message">';
                            echo $this->session->flashdata('alert');
                            echo '</div>';
                        }
                      ?>
                    </div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" enctype="multipart/form-data" method="post">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Buku</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="nama" value="<?= $nama; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gambar</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <?php 
                            if (isset($gambar))
                            {
                              echo '<input type="hidden" name="old_pict" value="'.$gambar.'">';
                              echo '<img src="'.base_url().'admin_assets/upload/'.$gambar.'" width="30%">';
                            }
                          ?>
                          <div class="clearfix"></div>
                          <input type="file" class="form-control col-md-7 col-xs-12" name="foto">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Penerbit</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="penerbit" value="<?= $penerbit; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Penulis</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="penulis" value="<?= $penulis; ?>">
                        </div>
                      </div>   

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Harga Buku</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="harga" value="<?= $harga; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Berat</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="berat" value="<?= $berat; ?>">
                          <p class="help-text">* Berat dalam satuan Gram</p>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Kategori</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="kategori" id="txt1" rows="2"><?= $kategori; ?></textarea>
                          <p class="help-text">* Gunakan tanda koma untuk memisahkan kategori</p>
                          <?php
                             foreach($kat->result() as $k) :
                          ?>
                  <input type="checkbox" name="kat[]" value="<?=$k->kategori;?>" onclick="addlist(this, 'txt1')"
                    <?php  if($rk) 
                          {
                            foreach ($rk->result() as $l) 
                            { 
                              if ($k->kategori == $l->kategori) 
                              { 
                                echo 'checked'; 
                              } 
                            } 
                          } 
                    ?> 
                  > <?=$k->kategori; ?>
                  
                  <?php endforeach; ?>


                          
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jumlah Halaman</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="jumlah_halaman" value="<?= $jumlah_halaman; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Panjang</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="panjang" value="<?= $panjang; ?>">
                          <p class="help-text">* Berat dalam satuan kg</p>
                        </div>
                      </div>                   

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Lebar</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control col-md-7 col-xs-12" name="lebar" value="<?= $lebar; ?>">
                          <p class="help-text">* Berat dalam satuan kg</p>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="status" class="form-control">
                            <option value="">--Pilih Status--</option>
                            <option value="1" <?php if ($status == 1) {echo "Selected";};?>>Aktif</option>
                            <option value="2" <?php if ($status == 2) {echo "Selected";};?>>Tidak Aktif</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Deskripsi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" name="desk" rows="4"><?= $desk; ?></textarea>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="button" onclick="window.history.go(-1)" class="btn btn-primary">Kembali</button>
                          <button type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
                        </div>
                      </div>  

                    </div>
                  </div>


                </form>
              </div>
            </div>
          </div>
        </div>
