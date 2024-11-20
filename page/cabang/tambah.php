<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default ">
			<div class="pael-heading">
				Tambah Data Cabang
			</div>
			<div class="panel-body">
				<form method="POST" >
					<div class="form-group">
						<label>Nama Cabang</label>
						<input type="text" class="form-control" name="nama_cabang">
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="alamat_cabang"></textarea>
					</div>

					<div class="form-group">
						<label>No. Telp</label>
						<input type="text" class="form-control" name="notelp_cabang">
					</div>

					<button name="simpan" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
//jika tombol ditekan maka
if (isset($_POST ['simpan'])) {

	//mengambil data nama_cabang, alamat_cabang, Notelp_cabang
	$nama_cabang = $_POST ['nama_cabang'];
	$alamat_cabang = $_POST ['alamat_cabang'];
	$notelp_cabang = $_POST ['notelp_cabang'];
	
	//mengambil data ketabel cabang sesuai kolom
	$koneksi->query ("INSERT INTO tb_cabang (nama_cabang, alamat_cabang, notelp_cabang) VALUE ('$nama_cabang', '$alamat_cabang', '$notelp_cabang')");

	echo "<script>alert ('Data Berhasil Disimpan.'); location='?page=cabang';</script>";
}
?>