

<h4><i class="fa fa-exchange"></i> Detail Transaksi</h4>
<hr>
<br>
<?php 
	$data = $get->result_array();
?>

<div class="row">
	<div class="col m2 s4">
		<b>Id Pesanan
	</div>
	<div class="col m6 s6">
		 : <?= $data->id_order; ?></b>
	</div>
</div>

<div class="row">
<table class="bordered responsive-table col m12 s12">
	<thead>
		<tr>
			<th width="5%" class="center">#</th>
			<th width="20%" class="center">Nama Buku</th>
			<th width="15%" class="center">Jumlah Pesan</th>
			<th width="15%" class="center">Biaya</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$i = 1;
			$total_biaya = 0;
			foreach ($get->result() as $key) :
				$total_biaya += $key->biaya;
		?>
			<tr>
				<td class="center"><?= $i++; ?></td>
				<td class="center"><?= $key->nama; ?></td>
				<td class="center"><?= $key->qty; ?></td>
				<td class="center">Rp. <?= number_format($key->biaya, 0, ',', '.'); ?></td>
			</tr>

		<?php endforeach; ?>
		<tr>
			<td colspan="3" class="center"><b>Total Biaya</b></td>
			<td style="text-align:center">Rp. <?php echo number_format($data->total, 0,',','.'); ?></td>
		</tr>
	</tbody>
</table>
<div class="right">
	<br>
	<button type="button" class="btn red" onclick="window.history.go(-1)">Kembali</button>	
</div>

</div>

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