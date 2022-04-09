<?php
    // panggil file
    include 'koneksi.php';
    include 'prosescrud.php';
    // cara panggil class di koneksi php
    $db = new Koneksi();
    // cara panggil koneksi di fungsi DBConnect()
    $koneksi =  $db->DBConnect();
    // var_dump($koneksi);
    // panggil class prosesCrud di file prosescrud.php
    $proses = new prosesCrud($koneksi);
    // var_dump($koneksi);
    // menghilangkan pesan error
    error_reporting(0);
    // panggil session ID
    // $id = $_SESSION['ADMIN']['id_login'];
    // $sesi = $proses->tampil_data_id('tbl_user','id_login',$id);
?>