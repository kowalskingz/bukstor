<div class="x_panel">
	<div class="x_title">
		<h2>Buku</h2>
		<div style="float:right">
			<a href="item/add_item" class="btn btn-primary">Tambah Buku</a>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="x_content">
		<table class="table table-striped table-bordered dt-responsive nowrap" id="datatable">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Buku</th>
					<th>Harga Buku</th>
					<th>Status</th>
					<th>Opsi</th>
				</tr>
			</thead>

			<tbody>
				<?php 
					$i = 1;
					foreach ($data->result() as $items) :
				?>	
				<tr>
					<td style="vertical-align:middle"><?= $i++; ?></td>
					<td style="vertical-align:middle"><?= $items->nama; ?></td>
					<td style="vertical-align:middle"><?= 'Rp. '. number_format($items->harga,0,',','.'); $items->harga; ?></td>
					<td style="vertical-align:middle;text-align:center;">
						<?php 
							if ($items->status == 1) 
							{
								echo '<label class="label-success" style="color:white; padding:3px 10px;">Aktif</label>';
							}

							else
							{
								echo '<label class="label-danger" style="color:white; padding:3px 10px;">Tidak Aktif</label>';
							}
						 ?>
					<td style="vertical-align:middle;text-align:center">
						<a href="<?= base_url(); ?>index.php/item/detail/<?= $items->id_buku; ?>" class="btn btn-success"><i class="fa fa-search-plus"></i></a>
						<a href="<?= base_url(); ?>index.php/item/update_item/<?= $items->id_buku; ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
					</td>
				</tr>
					
	    		<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>