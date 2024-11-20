<div class="panel panel-primary">
<div class="panel-heading">	
	Tambah Data Capster
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                	<form method="POST">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input class="form-control" name="nama"/>
                                        </div>
                                        <div class="form-group">
                                            <label>No HP</label>
                                            <input class="form-control" name="nomor"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Lokasi Barbershop</label>
                                            <select class="form-control" name="id_cabang" />
                                                <?php $query=$koneksi->query("SELECT * FROM tb_cabang");
                                                while ($per_cabang = $query->fetch_assoc ()) {
                                                    ?>
                                                <option value="<?php echo $per_cabang['id_cabang'];?>">
                                                    <?php echo $per_cabang['nama_cabang']; ?>
                                                </option>    
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jam Mulai Barbershop</label>
                                            <input class="form-control" name="jam_mulai" type="time" />
                                        </div>    
                                	    <div class="form-group">
                                            <label>Jam Selesai Barbershop</label>
                                            <input class="form-control" name="jam_selesai" type="time" />
                                        </div> 

                                    <div>
                                        <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
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
	$id_cabang   		  = @$_POST ['id_cabang'];
	$jam_mulai 			  = @$_POST ['jam_mulai'];
    $jam_selesai          = @$_POST ['jam_selesai'];


	$simpan               = @$_POST ['simpan'];

	if ($simpan){

        //mengambil semua data cabang berdasarkan id_cabangnya
        $query = $koneksi-> query ("SELECT * FROM tb_cabang WHERE id_cabang='$id_cabang'");
        $detailCabang = $query->fetch_assoc();

        //mengambil nama cabang
        $lokasi = $detailCabang ['nama_cabang'];

		$sql =$koneksi->query("insert into tb_capster (nama, no_hp, id_cabang, lokasi_barbershop, jam_mulai_barbershop, jam_selesai_barbershop) values ('$nama','$nomor','$id_cabang', '$lokasi', '$jam_mulai', '$jam_selesai')") or die (mysqli_error($koneksi));
		
		if ($sql){
			?>
					<script type="text/javascript">

					alert  ("Data Berhasil Disimpan");

                    window.location.href="?page=capster";
			</script>		
			<?php
		}
	}
?>