<?php 
// jika cabang dipilih maka
if (isset($_POST['id_cabang'])) {
    $id_cabang = $_POST['id_cabang'];
}else{
    $id_cabang = '';
}

if (isset($_POST['id_capster'])) {
    $id_capster = $_POST['id_capster'];
}else{
    $id_capster = '';
}

$sql = $koneksi-> query("SELECT * FROM tb_capster WHERE id_capster= '$id_capster'");
$detailCapster = $sql->fetch_assoc();

$queryPaket = $koneksi-> query("SELECT * FROM tb_paket");
?>

<div class="panel panel-primary">
<div class="panel-heading">	

	Tambah Data Booking
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                	<form method="POST">
                                        <div class="form-group">
                                            <label>Barbershop</label>
                                            <select class="form-control" name="id_cabang" required onchange="submit()" >
                                            <option value="">- Pilih Cabang -</option>    
                                            <?php 
                                                $query = $koneksi-> query("SELECT * FROM tb_cabang");
                                                while ($per_cabang =$query->fetch_assoc()) {
                                            ?>
                                            <option value="<?php echo $per_cabang['id_cabang']; ?>"<?php echo ($per_cabang['id_cabang']== $id_cabang) ? 'selected' : ''; ?>><?php echo $per_cabang['nama_cabang']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">    
                                            <label>Nama Capster</label>
                                            <select class="form-control" name="id_capster" onchange="submit()">
                                                <option value="">- Pilih Capster -</option>
                                                <?php 
                                                    $query = $koneksi->query("SELECT * FROM tb_capster WHERE id_cabang='$id_cabang'");
                                                    while ($per_capster=$query->fetch_assoc()) {
                                                ?>
                                                <option value="<?php echo $per_capster ['id_capster']; ?>" <?php echo ($per_capster['id_capster']== $id_capster) ? 'selected' : ''; ?>><?php echo $per_capster['nama']; ?></option>
                                                    <?php } ?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Nama Customer</label>
                                            <?php if ($_SESSION['admin']) {?>
                                                <select class="form-group" name="nama2">
                                                    <option value="">-Pilih Customer-</option>
                                                    <?php $query = $koneksi->query("SELECT * FROM tb_customer");

                                                    while ($nama=$query->fetch_assoc()) {
                                                        echo "<option value='$nama[username]'>$nama[username]</option>";
                                                    
                                            }  ?>
                                            </select>
                                            <?php }else{ ?>
                                                <?php 
                                               $id_customer_login = $_SESSION['customer'];
                                                $query = $koneksi->query("SELECT * FROM tb_customer WHERE id_customer='$id_customer_login' AND status='1'");
                                                $customer=$query->fetch_assoc();
                                                ?>
                                                <input type="text" class="form-control" value="<?php echo $customer['nama_customer'];?>" name="nama2">
                                            <?php } ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Tanggal Booking</label>
                                            <input class="form-control" name="tgl" type="text" id="tgl_booking" />
                                        </div>
                                        <div class="form-group">
                                            <?php $range=range(strtotime($detailCapster['jam_mulai_barbershop']),strtotime($detailCapster['jam_selesai_barbershop']),30*60); ?>
                                            <label>Jam Booking</label>
                                            (<?php echo $detailCapster['jam_mulai_barbershop']; ?> - <?php echo $detailCapster['jam_selesai_barbershop']; ?>) </label></br>
                                            <select class="form-control" name="jam">
                                                <option value="">- Pilih Jam -</option>
                                                <?php foreach($range as $time): ?>
                                                    <option><?php echo date("H:i",$time); ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Paket Barbershop</label>
                                            <select class="form-control" name="paket" />
                                                <?php while($per_paket = $queryPaket->fetch_assoc()): ?>
                                                    <option value="<?php echo $per_paket['id_paket']; ?>"><?php echo $per_paket['jenis_paket']; ?></option>
                                                <?php endwhile ?>
                                            </select>
                                        </div>

                                    <div>
                                    	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                        <a href="?page=booking" class="btn btn-default">Batal</a>
                                    </div>
                                </div>
                                </form>
                            </div>
</div>
</div>
</div>

<?php
	$nama             		  = $detailCapster ['nama'];
    $id_cabang                     = @$_POST ['id_cabang'];
    $nama2                      = @$_POST ['nama2'];
    $id_customer              = $_SESSION['customer'];
    $tgl                     = @$_POST ['tgl'];
	$jam                	  = @$_POST ['jam'];
	$paket  			      = @$_POST ['paket'];

	$simpan                   = @$_POST ['simpan'];

	if ($simpan){

        $sql = $koneksi-> query("SELECT * FROM tb_paket WHERE id_paket= '$paket'");
        $detailPaket = $sql->fetch_assoc();

        $query = $koneksi -> query (" SELECT * FROM tb_cabang WHERE id_cabang='$id_cabang'");
        $detailCabang = $query->fetch_assoc();
        $lokasi = $detailCabang['nama_cabang'];

        $tgl= date ('Y-m-d', strtotime($tgl));

        $query = $koneksi -> query ("SELECT * FROM tb_booking WHERE id_capster='$id_capster' AND tanggal_booking = '$tgl' AND id_cabang = '$id_cabang' AND jam_booking='$jam'");

        if ($query->num_rows == 0) {
        $query = $koneksi->query (" SELECT * FROM tb_booking WHERE id_capster='$id_capster' AND tanggal_booking = '$tgl' AND id_cabang = '$id_cabang' ORDER BY no_antrian DESC ");

        $booking = $query->fetch_assoc();

        if (empty($booking)) {
            $no_antrian = 1;
        }else{
            $no_antrian = $booking['no_antrian']+1;
        
        }
        $id = rand(1000,9999);
        $harga = str_replace("Rp", "", $detailPaket['harga']);
        $harga = str_replace(".", "", $harga);
		$sql =$koneksi->query("insert into tb_booking (id_booking, id_customer, id_capster, id_cabang, nama_capster, nama_customer, tanggal_booking, jam_booking, paket, lokasi_barbershop, no_antrian,harga) values ('$id','$id_customer', '$id_capster', '$id_cabang', '$nama','$nama2', '$tgl', '$jam', '$detailPaket[jenis_paket]', '$lokasi', '$no_antrian','$harga')");
		
		if ($sql){
			?>
					<script type="text/javascript">

					alert  ("Data Berhasil Disimpan");

                    window.location.href="?page=nota&id=<?php echo $id; ?>";
			</script>		
			<?php
		}
	}else{
        ?>
                    <script type="text/javascript">

                    alert  ("Jam sudah dibooking, silahkan booking jam lain");
            </script>       
            <?php
        }
    }
?>