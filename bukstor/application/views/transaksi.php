<div class="main">
		<div class="container">
			<!-- BEGIN SIDEBAR & CONTENT -->
			<div class="row margin-bottom-40">
			<!-- BEGIN CONTENT -->
			<div class="col-md-12 col-sm-12">
				<h1>Data Transaksi</h1>
				<div class="goods-page">
				<div class="goods-data clearfix">
					<div class="table-wrapper-responsive">
					<table summary="Shopping cart">
					<tr>
						<th class="goods-page-image">#</th>
						<th class="goods-page-description">Id Transaksi</th>
						<th class="goods-page-description">Tanggal Pesan</th>
						<th class="goods-page-description">Batas Bayar</th>
						<th class="goods-page-ref-no">Total Biaya</th>
						<th class="goods-page-quantity">Status</th>
						<th class="goods-page-price">Opsi</th>
					</tr>

					<?php 
						$today = (abs(strtotime(date("Y-m-d"))));
						$i = 1;
					
						foreach ($get->result() as $key) :
					?>

					<tr>
						<td class="goods-page-ref-no">
							<?= $i++; ?>
						</td>

						<td class="goods-page-ref-no">
							<?= $key->id_order; ?>
						</td>

						<td class="goods-page-ref-no">
							<?= date("d M Y", strtotime($key->tgl_pesan)); ?>
						</td>

						<td class="goods-page-ref-no">
							<?= date("d M Y", strtotime($key->bts_bayar)); ?>
						</td>

						<td class="goods-page-quantity">
							
						<strong><span>Rp. </span><?= number_format($key->total, 0, ',', '.')?></strong>
						</td>
				
						<td class="goods-page-ref-no">
						<?php 
							$batas = (abs(strtotime($key->bts_bayar)));

							if ($today = $batas && $key->status == 'belum')
							{
								echo 'belum bayar';
							}
							
							else
							{
								echo ucfirst($key->status);
							}
						?>
						</td>
						
						<td class="goods-page-price">
							<a href="<?=base_url()?>index.php/home/detail_transaksi/<?=$key->id_order;?>" class="btn btn-floating green"><i class="fa fa-search-plus"></i></a>
							<?php if ($key->status != 'proses') { ?>
								<a href="<?=base_url();?>index.php/home/hapus_transaksi/<?=$key->id_order;?>"  class="btn btn-floating red" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
							<?php } ?>
						</td>

					</tr>
					<tr>
 
	<!-- Modal -->
	
		<?php endforeach; ?>

					</tr>
					</table>
					</div>

					
				</div>
				<a href="home" class="btn btn-default">Continue shopping <i class="fa fa-shopping-cart"></i></a>
				<a href="<?= base_url(); ?>index.php/pesan" class="btn btn-primary">Checkout <i class="fa fa-check"></i></a>
				</div>
			</div>
			<!-- END CONTENT -->
			</div>
			<!-- END SIDEBAR & CONTENT -->

			
			
    <!-- Jquery -->
