<?php
	$id = $_GET['id'];

	$sql = $koneksi->query("select * from tb_capster where id_capster='$id'");

	$tampil = $sql->fetch_assoc();
?>

<div class="panel panel-primary">
<div class="panel-heading">	
	Ubah Data Capster
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                	<form method="POST">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama" value="<?php echo $tampil['nama'];?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>No HP</label>
                                            <input class="form-control" name="nomor" value="<?php echo $tampil['no_hp'];?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Lokasi Barbershop</label>
                                            <select class="form-control" name="id_cabang" />
                                                <option value="">- Pilih Cabang -</option>
                                                    <?php $query = $koneksi->query("SELECT * FROM tb_cabang ");
                                                    while ($per_cabang = $query-> fetch_assoc()) {
                                                    ?>
                                                    <option value="<?php echo $per_cabang ['id_cabang']; ?>"<?php echo ($per_cabang['id_cabang'] == $tampil ['id_cabang']) ? 'selected' : ''; ?>><?php echo $per_cabang ['nama_cabang']; ?></option>
                                                     <?php } ?>
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jam Mulai Barbershop</label>
                                            <input class="form-control" name="jam_mulai" type="time" value="<?php echo $tampil['jam_mulai_barbershop'];?>" />
                                        </div>    
                                	    <div class="form-group">
                                            <label>Jam Selesai Barbershop</label>
                                            <input class="form-control" name="jam_selesai" type="time" value="<?php echo $tampil['jam_selesai_barbershop'];?>" />
                                        </div>    
                                    <div>
                                    	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                                        <a href="?page=capster" class="btn btn-default">Batal</a>
                                    </div>
                                </div>
                                </form>
                            </div>
</div>
</div>
</div>

<?php
	$nama                 = @$_POST ['nama'];
	$nomor                = @$_POST ['nomor'];
	$id_cabang   			  = @$_POST ['id_cabang'];
	$jam_mulai 			  = @$_POST ['jam_mulai'];
    $jam_selesai          = @$_POST ['jam_selesai'];

	$simpan               = @$_POST ['simpan'];

	if ($simpan){

        $query = $koneksi->query("SELECT * FROM tb_cabang WHERE id_cabang='$id_cabang'");

        $detailCabang = $query->fetch_assoc();
        $lokasi = $detailCabang['nama_cabang'];

		$sql =$koneksi->query("update tb_capster set nama='$nama', no_hp='$nomor', id_cabang='$id_cabang', lokasi_barbershop='$lokasi', jam_mulai_barbershop='$jam_mulai', jam_selesai_barbershop='$jam_selesai' where id_capster='$id'");
		
		if ($sql){
			?>
					<script type="text/javascript">

					alert  ("Ubah Berhasil Disimpan");
                    window.location.href="?page=capster";
			</script>		
			<?php
		}
	}
?>