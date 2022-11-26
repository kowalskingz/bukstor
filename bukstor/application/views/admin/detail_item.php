<div class="x_panel">
	<div class="x_title">
		<h2>Detail Buku</h2>
		<div class="clearfix"></div>
	</div>

	<div class="x_content">
		<div class="row">
			<div class="col-md-5 col-sm-6">
				<img src="<?= base_url(); ?>admin_assets/upload/<?= $gambar; ?>" style="width:100%">
			</div>
			<div class="col-md-6 col-sm-6">
				<table class="table table-striped">
					<tr>
						<td width="150px">Nama Buku</td>
						<td> :  <?= $nama; ?></td>
					</tr>
					<tr>
						<td width="150px">Penerbit</td>
						<td> :  <?= $penerbit; ?></td>
					</tr>
										<tr>
						<td width="150px">Penulis</td>
						<td> :  <?= $penulis; ?></td>
					</tr>
					<tr>
						<td width="150px">Harga Buku</td>
						<td> :  <?= 'Rp. '.number_format($harga, 0, ',','.'); ?></td>
					</tr>
					<tr>
						<td width="150px">Berat</td>
						<td> :  <?= $berat; ?> kg</td>
					</tr>
					<tr>
						<td width="150px">Jumlah Halaman</td>
						<td> :  <?= $jumlah_halaman; ?></td>
					</tr>
					<tr>
						<td width="150px">Panjang</td>
						<td> :  <?= $panjang; ?> cm</td>
					</tr>
					<tr>
						<td width="150px">Lebar</td>
						<td> :  <?= $lebar; ?> cm</td>
					</tr>
					<tr>
						<td width="150px">Status</td>
						<td>: <?php 
								if($status == 1) 
								{ 
									echo 'Aktif'; 
								} 
								
								else 
								{ 
									echo 'Tidak Aktif'; 
								} 
							?>
						</td>
					</tr>
					<tr>
						<td width="150px">Deskripsi</td>
						<td> :  <?= nl2br($desk); ?></td>
					</tr>
					<tr>
						<td width="100px;">Kategori</td>
						<?php
							$value = '';
							foreach ($kategori->result() as $k) 
							{
								$value .= ', '.$k->kategori;
							}
						?>
						<td>: <?= trim($value, ', '); ?></td>
					</tr>
					<tr>
						<td><a href="#" class="btn btn-default" onclick="window.history.go(-1)">Kembali</a></td>
						<td><a href="<?= base_url();?>index.php/item/update_item/<?= $id_buku;?>" class="btn btn-warning">Edit</a></td>
					</tr>
					
				</table>
				
			</div>
		</div>	
	</div>
</div>