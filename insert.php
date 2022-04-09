<?php

require 'proses/panggil.php';

$score = strip_tags($_POST['score']);
$description = strip_tags($_POST['description']);


$tabel = 'tbl_score';
# proses insert
$data[] = array(
    'score'		=>$score,
    'description'		=>$description
);
$proses->tambah_data($tabel,$data);
echo '<script>alert("Tambah Data Berhasil");window.location="index.php"</script>';

?>
