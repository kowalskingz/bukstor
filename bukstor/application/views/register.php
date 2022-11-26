	<div class="main">
		<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">Daftar</li>
		</ul>
	
<?= validation_errors('<p style="color:red">','</p>');?>

		<!-- BEGIN PAYMENT ADDRESS -->
		<div id="payment-address" class="panel panel-default">
			
			<div class="panel-body row">
				<div class="col-md-6 col-sm-6">
				<h3>Your Personal Details</h3>
			<form action="" method="post">

				<div class="form-group">
					<label for="first_name">Nama Depan <span class="require">*</span></label>
					<input type="text" id="firstname" class="form-control" name="nama1" value="<?= $nama1;?>">
				</div>
				<div class="form-group">
					<label for="last_name">Nama Belakang <span class="require">*</span></label>
					<input type="text" id="lastname" class="form-control" name="nama2" value="<?= $nama2;?>">
				</div>
				<div class="form-group">
					<label for="username">Username <span class="require">*</span></label>
					<input type="text" id="username" class="form-control" name="user" value="<?= $user;?>">
				</div>
				<div class="form-group">
					<label for="email">E-Mail <span class="require">*</span></label>
					<input type="text" id="email" class="form-control" name="email" value="<?= $email;?>">
				</div>
				<div class="form-group">
					<label for="telephone">Telp <span class="require">*</span></label>
					<input type="number" id="telp"  name="telp" value="<?= $telp;?>" class="form-control">
				</div>
				<div class="radio-list">
				<label for="jk">Jenis Kelamin <span class="require">*</span></label>
				<label for="lk">
                  <input type="radio" name="jk" value="L" id="lk"  <?php if ($jk == 'L') { echo 'checked'; } ?>/> Laki-laki
                </label>
                <label for="pr">
                  <input type="radio" name="jk" value="P" id="pr" <?php if ($jk == 'P') { echo 'checked'; } ?>/> Perempuan
                </label>
			  </div>
			
				</div>
				<div class="col-md-6 col-sm-6">
					<h3>Your Address</h3>
					<div class="form-group">
						<label for="alamat">Alamat<span class="require">*</span></label>
						<textarea name="alamat" id="alamat" rows="11" class="form-control"><?= $alamat; ?></textarea>
					</div>
					<hr>
				
					<h3>Your Password</h3>
					<div class="form-group">
						<label for="password">Password <span class="require">*</span></label>
						<input type="password" id="password" class="form-control" name="pass1">
					</div>
				
					<div class="form-group">
						<label for="password">Ketik Ulang Password <span class="require">*</span></label>
						<input type="password" id="password" class="form-control" name="pass2">
					</div>
				</div>
				
				<div class="col-md-12">
              
              <button class="btn btn-primary  pull-right" type="submit" name="submit" value="Submit">Daftar</button>
            </div>
			</div>
</form>
			</div>
		</div>
		<!-- END PAYMENT ADDRESS -->


		</div>
		<!-- END CHECKOUT PAGE -->
	</div>