<?php 

	$id_cabang = $_GET ['id'];
	$koneksi->query("delete from tb_cabang where id_cabang='$id_cabang'");

echo "<script>alert ('Data Berhasil Dihapus.'); location='?page=cabang';</script>";