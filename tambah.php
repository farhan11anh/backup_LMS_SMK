<?php
    // session start
    // if(!empty($_SESSION)){ }else{ session_start(); }
    //session
	// if(!empty($_SESSION['ADMIN'])){ }else{ header('location:login.php'); }
    // panggil file
    require 'proses/panggil.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Tambah Pengguna</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
    <body style="background:#586df5;">
		<div class="container">
			<br/>
            <span style="color:#fff";>Selamat Datang, <?php echo $sesi['nama_pengguna'];?></span>
			<div class="float-right">	
				<a href="index.php" class="btn btn-success btn-md" style="margin-right:1pc;"><span class="fa fa-home"></span> Kembali</a> 
				<a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
			</div>		
			<br/><br/><br/>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-lg-6">
					<br/>
					<div class="card">
						<div class="card-header">
						<h4 class="card-title">Tambah Data</h4>
						</div>
						<div class="card-body">
						<!-- form berfungsi mengirimkan data input 
						dengan method post ke proses crud dengan paramater get aksi tambah -->
							<form action="proses/crud.php?aksi=tambah" method="POST">
								<div class="form-group">
									<label>Score </label>
									<input type="text" value="" class="form-control" name="score" required>
								</div>
								<div class="form-group">
									<label>Description</label>
									<input type="text" value="" class="form-control" name="description">
								</div>
                                <div class="form-group">
									<label>Materi</label>
                                    <select name="materi_id" class="form-control form-control">
                                        <option value="1" >Dummy Materi 1</option>
                                        <option value="1" >Dummy Materi 2</option>
                                    </select>
								</div>
                                <div class="form-group">
									<label>Siswa</label>
                                    <select name="user_id" class="form-control form-control">
                                        <option value="1" >Dummy User 1</option>
                                        <option value="1" >Dummy User 2</option>
                                        <!-- <option value="100" >Dummy User 3</option> -->
                                    </select>
								</div>

								<button class="btn btn-primary btn-md mx-auto" name="create"><i class="fa fa-plus"> </i> Tambah Data</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>