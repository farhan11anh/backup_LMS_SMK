<?php
    require 'panggil.php';
    // var_dump($proses);

    // echo $_GET['aksi'];
    

    // proses tambah
    if(!empty($_GET['aksi'] == 'tambah'))
    {
        $score = strip_tags($_POST['score']);
        $description = strip_tags($_POST['description']);
        $materi_id = strip_tags($_POST['materi_id']);
        $user_id = strip_tags($_POST['user_id']);

        
        $tabel = 'tbl_score';
        // var_dump($tabel);
        # proses insert
        $data[] = array(
            'score'		=>$score,
            'description' =>$description,
            'file' => 'dummy.exe',
            'materi_id' => (int)$materi_id,
            'user_id' => (int)$user_id
        );
        // var_dump($data);
        $proses->tambah_data($tabel,$data);
        
        echo '<script>alert("Tambah Data Berhasil");window.location="../index.php"</script>';

        header("Location: localhost/smk");
    }

    // proses edit
	if(!empty($_GET['aksi'] == 'edit'))
	{
		$nama = strip_tags($_POST['nama']);
		$telepon = strip_tags($_POST['telepon']);
		$email = strip_tags($_POST['email']);
		$alamat = strip_tags($_POST['alamat']);
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);
		
        // jika password tidak diisi
        if($pass == '')
        {
            $data = array(
                'username'		=>$user,
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }else{

            $data = array(
                'username'		=>$user,
                'password'		=>md5($pass),
                'nama_pengguna'	=>$nama,
                'telepon'		=>$telepon,
                'email'			=>$email,
                'alamat'		=>$alamat
            );
        }
        $tabel = 'tbl_user';
        $where = 'id_login';
        $id = strip_tags($_POST['id_login']);
        $proses->edit_data($tabel,$data,$where,$id);
        echo '<script>alert("Edit Data Berhasil");window.location="../index.php"</script>';
    }
    
    // hapus data
    if(!empty($_GET['aksi'] == 'hapus'))
    {
        $tabel = 'tbl_score';
        $where = 'score_id';
        $id = strip_tags($_GET['hapusid']);
        $proses->hapus_data($tabel,$where,$id);
        echo '<script>alert("Hapus Data Berhasil");window.location="../index.php"</script>';
    }

    // login
    if(!empty($_GET['aksi'] == 'login'))
    {   
        // validasi text untuk filter karakter khusus dengan fungsi strip_tags()
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);
        // panggil fungsi proses_login() yang ada di class prosesCrud()
        $result = $proses->proses_login($user,$pass);
        if($result == 'gagal')
        {
            echo "<script>window.location='../login.php?get=gagal';</script>";
        }else{
            // status yang diberikan 
            session_start();
            $_SESSION['ADMIN'] = $result;
            // status yang diberikan 
            echo "<script>window.location='../index.php';</script>";
        }
    }
?>