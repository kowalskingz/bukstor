<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Laporan</title>
	  <link href="<?php echo base_url(); ?>admin_assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		      <div class="row">
            <?php 
               switch ($bln) {
                  case '01':
                     $bulan = 'Januari';
                     break;
                     
                     case '02':
                        $bulan = 'Februari';
                        break;

                     case '03':
                        $bulan = 'Maret';
                        break;

                     case '04':
                        $bulan = 'April';
                        break;

                     case '05':
                        $bulan = 'Mei';
                        break;

                     case '06':
                        $bulan = 'Juni';
                        break;

                     case '07':
                        $bulan = 'Juli';
                        break;

                     case '08':
                        $bulan = 'Agustus';
                        break;

                     case '09':
                        $bulan = 'September';
                        break;

                     case '10':
                        $bulan = 'Oktober';
                        break;
                     
                     case '11':
                        $bulan = 'November';
                        break;
                     
                     case '12':
                        $bulan = 'Desember';
                        break;
                  
               }
            ?>
         <div class="col-md-10 col-sm-12 col-md-offset-1">
            <center><h3>Laporan Bulan <?= $bulan;?>  Tahun <?=$thn;?> </h3></center>
         </div>

         <div class="col-md-12 col-sm-12">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Id Order</th>
                     <th>Nama Pemesan</th>
                     <th>Total Bayar</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     $no = 1;
                     $pendapatan = 0;
                     foreach ($data->result() as $key) :
                        $pendapatan += $key->biaya;
                 ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td><?= $key->id_order;?></td>
                     <td><?= $key->fullname;?></td>
                     <td>
                        <span style="float:left">Rp.</span>
                        <span style="float:left"><?= number_format($key->total,0,',','.');?></span>
                     </td>
                  </tr>
                  <?php endforeach ?>
                  <tr>
                     <td colspan="3" style="text-align:center"><b>Pendapatan</b></td>
                     <td>
                        <b>
                           <span style="float:left">Rp.</span>
                           <span style="float:left"><?= number_format($pendapatan,0,',','.');?></span>
                        </b>
                     </td>
                  </tr>
               </tbody>
	
            </table>
         </div>
     </div>
	</div>
	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>