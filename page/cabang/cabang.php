<?php
$sql = $koneksi-> query("SELECT * FROM tb_cabang");
?>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-danger">
				<div class="panel-heading">
					Data Cabang Barbershop
				</div>
				<div class="panel-body">
					<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Cabang</th>
								<th>Alamat</th>
								<th>No. Telp</th>
								<th>Aksi</th>
							</tr>
						</thead>
					<tbody>
						<?php
						$no=1;
						while ($cabang = $sql->fetch_assoc()) {?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $cabang['nama_cabang'];?></td>
								<td><?php echo $cabang['alamat_cabang'];?></td>
								<td><?php echo $cabang['notelp_cabang'];?></td>
								<td>
									<a href="?page=cabang&aksi=ubah&id=<?php echo $cabang['id_cabang'];?> " class ="btn btn-primary">Ubah</a>
									<a href="?page=cabang&aksi=hapus&id=<?php echo $cabang['id_cabang'];?> " onclick="return confirm ('Apakah Anda Yakin?')" class ="btn btn-danger">Hapus</a>
								</td>
							</tr>
						<?php }?>
					</tbody>	
				</table>
				</div>
				<a href="?page=cabang&aksi=tambah" class="btn btn-primary active " style="margin-top: 8px"> Tambah Data</a>
			</div>
		</div>
	</div>
</div>