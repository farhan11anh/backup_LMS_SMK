<?php
    // session start
    // if(!empty($_SESSION)){ }else{ session_start(); }
    require 'proses/panggil.php';

    // var_dump($proses);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Data Nilai</title>
		<!-- BOOTSTRAP 4-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
        <!-- DATATABLES BS 4-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- jQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
        <!-- DATATABLES BS 4-->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <!-- BOOTSTRAP 4-->
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

	</head>
    <body style="background:#586df5;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">


                    <br/>
                    <!-- <span style="color:#fff";>Selamat Datang, <?php echo $sesi['nama_pengguna'];?></span> -->
                    <a href="logout.php" class="btn btn-danger btn-md float-right"><span class="fa fa-sign-out"></span> Logout</a>
                    <br/><br/>
                    <a href="tambah.php" class="btn btn-success btn-md"><span class="fa fa-plus"></span> Tambah</a>
                    <br/><br/>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Pengguna</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered" id="mytable" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                        <th width="50px">No</th>
                                        <th>Nilai</th>
                                        <th>Grade</th>
                                        <th>Deskripsi</th>
                                        <th>Ditambahkan</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $no=1;
                                    $hasil = $proses->tampil_data('tbl_score');
                                    foreach($hasil as $isi){
                                ?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $isi['score']?></td>


                                        <td>
                                            <?php
                                                $nilai = $isi['score'];
                                                if($nilai > 80){
                                                    echo 'A';
                                                }elseif($nilai > 60){
                                                    echo 'B';
                                                }elseif($nilai > 40){
                                                    echo 'C';
                                                }elseif($nilai > 20){
                                                    echo 'D';
                                                }else{
                                                    echo 'E';
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo $isi['description'];?></td>
                                        <td><?php echo $isi['create_at'];?></td>
                                        <td style="text-align: center;">
                                            <a href="edit.php?id=<?php echo $isi['id_login'];?>" class="btn btn-success btn-md">
                                            <span class="fa fa-edit"></span></a>
                                            <a onclick="return confirm('Apakah yakin data akan di hapus?')" href="proses/crud.php?aksi=hapus&hapusid=<?php echo $isi['score_id'];?>" 
                                            class="btn btn-danger btn-md"><span class="fa fa-trash"></span></a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

			    </div>
			</div>
		</div>
        <script>
            $('#mytable').dataTable();
        </script>
	</body>
</html>

<?php 

// echo $_GET['param1'];

?>