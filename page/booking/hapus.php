<?php 

	$id = $_GET ['id'];
	$koneksi->query("delete from tb_booking where id_booking='$id'");

?>

<script type="text/javascript">
		window.location.href="?page=booking";
</script>