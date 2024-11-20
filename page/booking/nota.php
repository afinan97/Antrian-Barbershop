<?php
$id = $_GET['id'];
$sql = $koneksi->query("SELECT * FROM tb_booking WHERE id_booking='$id'");
$booking= $sql->fetch_assoc();
?>
<div style="background: whitesmoke; border:3px solid #333;padding: 2.5rem;">
	<h2 style="color:black; ">Nota #<?php echo $id; ?></h2>
	<h3 class="text-center" style="text-transform: uppercase;">
		<?php echo $booking['lokasi_barbershop']; ?>
	</h3>
	<h2 class="text-center">
		00<?php echo $booking['no_antrian']; ?>
	</h2>
	<p class="text-center">
		<b>
		Nama Capster : <?php echo $booking['nama_capster']; ?>
		</br>
		(<?php echo date ("d/M/Y", strtotime($booking['tanggal_booking'])); ?> <?php echo $booking['jam_booking'];?>)	
		</b>
	</p>
</div>
<br/>
<a onclick="window.print()" class="hidden-print btn btn-success btn-sm"> <i class="fa fa-print"> </i> Cetak </a>
<script>
	window.print();
</script>