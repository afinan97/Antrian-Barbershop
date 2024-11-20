
<?php

	$ambil = $koneksi->query("select * from tb_customer where id_customer='$_GET[id]'");

	$data = $ambil->fetch_assoc();

	$foto_produk=$data['foto'];

	if (file_exists("images/$foto_produk")) {
		unlink("images/$foto_produk");
	}

	$koneksi->query("delete from tb_customer where id_customer='$_GET[id]'");



?>


<script type="text/javascript">
	alert ("Data Berhasil Dihapus");
    window.location.href="?page=user";
</script>