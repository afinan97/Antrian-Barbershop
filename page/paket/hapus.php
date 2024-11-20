<?php 

	$id = $_GET ['id'];
	$koneksi->query("delete from tb_paket where id_paket='$id'");

?>

<script type="text/javascript">
		window.location.href="?page=paket";
</script>