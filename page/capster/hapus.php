<?php 

	$id = $_GET ['id'];
	$koneksi->query("delete from tb_capster where id_capster='$id'");

?>

<script type="text/javascript">
		window.location.href="?page=capster";
</script>