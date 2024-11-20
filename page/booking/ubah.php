<?php
	$id = $_GET['id'];

	$sql = $koneksi->query("select * from tb_booking where id_booking='$id'");

	$tampil = $sql->fetch_assoc();

	$lokasi = $tampil['lokasi_barbershop'];
    $paket = $tampil ['paket'];
?>

<div class="panel panel-primary">
<div class="panel-heading">	
	Ubah Data Booking
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                	<form method="POST">
                                        <div class="form-group">
                                            <label>Nama Capster</label>
                                            <input class="form-control" name="nama" value="<?php echo $tampil ['nama'];?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Customer</label>
                                            <input class="form-control" name="nama2" value="<?php echo $tampil ['nama_cust'];?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Booking</label>
                                            <input class="form-control" name="tgl" type="date" value="<?php echo $tampil ['tanggal_booking'];?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Jam Booking</label>
                                            <input class="form-control" name="jam" type="time" value="<?php echo $tampil['jam_booking'];?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Paket Barbershop</label>
                                            <select class="form-control" name="paket" />
                                                <option value="Ganteng Minimum" <?php if ($paket=='Ganteng Minimum') {echo "selected";} ?>>Ganteng Minimum</option>
                                                <option value="Ganteng Medium" <?php if ($paket=='Ganteng Medium') {echo "selected";} ?>>Ganteng Medium</option>
                                                <option value="Ganteng Maximum" <?php if ($paket=='Ganteng Maximum') {echo "selected";} ?>>Ganteng Maximum</option>
                                                <option value="Anak-anak" <?php if ($paket=='Anak-anak') {echo "selected";} ?>>Anak-anak</option>
                                                <option value="Semir" <?php if ($paket=='Semir') {echo "selected";} ?>>Semir</option>
                                                <option value="Shaving" <?php if ($paket=='Shaving') {echo "selected";} ?>>Shaving</option>

                                            </select>
                                        </div>   
                                        <div class="form-group">
                                            <label>Lokasi Barbershop</label>
                                            <select class="form-control" name="lokasi" />
                                                <option value="Barbershop 1" <?php if ($lokasi=='Barbershop 1') {echo "selected";} ?>>Barbershop 1</option>
                                                <option value="Barbershop 2" <?php if ($lokasi=='Barbershop 2') {echo "selected";} ?>>Barbershop 2</option>
                                                <option value="Barbershop 3" <?php if ($lokasi=='Barbershop 3') {echo "selected";} ?>>Barbershop 3</option>
                                                <option value="Barbershop 4" <?php if ($lokasi=='Barbershop 4') {echo "selected";} ?>>Barbershop 4</option>
                                                <option value="Barbershop 5" <?php if ($lokasi=='Barbershop 5') {echo "selected";} ?>>Barbershop 5</option>
                                                <option value="Barbershop 6" <?php if ($lokasi=='Barbershop 6') {echo "selected";} ?>>Barbershop 6</option>
                                            </select>
                                        </div>

                                    <div>
                                    	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                                        <a href="?page=booking" class="btn btn-default">Batal</a>
                                    </div>
                                </div>
                                </form>
                            </div>
</div>
</div>
</div>

<?php
	$nama             		  = @$_POST ['nama'];
    $nama2                     = @$_POST ['nama2'];
    $tgl                     = @$_POST ['tgl'];
	$jam                	  = @$_POST ['jam'];
	$paket  			      = @$_POST ['paket'];
	$lokasi  			      = @$_POST ['lokasi'];

	$simpan                   = @$_POST ['simpan'];

	if ($simpan){

		$sql =$koneksi->query("update tb_booking set nama='$nama', nama_cust='$nama2', tanggal_booking='$tgl', jam_booking='$jam', paket='$paket', lokasi_barbershop='$lokasi' where id_booking='$id'");
		
		if ($sql){
			?>
					<script type="text/javascript">

					alert  ("Data Berhasil Disimpan");
                    window.location.href="?page=booking";
			</script>		
			<?php
		}
	}
?>