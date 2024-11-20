<?php 

	$id = $_GET ['id'];
	$koneksi->query("delete from tb_customer where id_customer='$id'");

?>

<script type="text/javascript">
		window.location.href="?page=customer";
</script>