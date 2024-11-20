<?php
	$id = $_GET['id'];

	$sql = $koneksi->query("select * from tb_paket where id_paket='$id'");

	$tampil = $sql->fetch_assoc();
    $jenis = $tampil['jenis_paket'];

?>


<div class="panel panel-primary">
<div class="panel-heading">	
	Tambah Data Paket
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                	<form method="POST">
                                        <div class="form-group">
                                            <label>Jenis Paket</label>
                                            <select class="form-control" name="jenis">
                                                <option value="Ganteng Minimum" <?php if ($jenis=='Ganteng Minimum') {
                                                    echo "selected";
                                                } ?>>Ganteng Minimum</option>
                                                 <option value="Ganteng Medium" <?php if ($jenis=='Ganteng Medium') {
                                                    echo "selected";
                                                } ?>>Ganteng Medium</option>
                                                <option value="Ganteng Maximum" <?php if ($jenis=='Ganteng Maximum') {
                                                    echo "selected";
                                                } ?>>Ganteng Maximum</option>
                                                <option value="Ganteng Anak-anak" <?php if ($jenis=='Ganteng Anak-anak') {
                                                    echo "selected";
                                                } ?>>Ganteng Anak-anak</option>
                                                <option value="Ganteng Semir Hitam" <?php if ($jenis=='Ganteng Semir Hitam') {
                                                    echo "selected";
                                                } ?>>Ganteng Semir Hitam</option>
                                                <option value="Ganteng Semir Full Hitam" <?php if ($jenis=='Ganteng Semir Full Hitam') {
                                                    echo "selected";
                                                } ?>>Ganteng Semir Full Hitam</option>
                                                <option value="Ganteng Semir Warna" <?php if ($jenis=='Ganteng Semir Warna') {
                                                    echo "selected";
                                                } ?>>Ganteng Semir Warna</option>
                                                <option value="Ganteng Shaving Brewok" <?php if ($jenis=='Ganteng Shaving Brewok') {
                                                    echo "selected";
                                                } ?>>Ganteng Shaving Brewok</option>
                                                <option value="Ganteng Shaving Kumis" <?php if ($jenis=='Ganteng Shaving Kumis') {
                                                    echo "selected";
                                                } ?>>Ganteng Shaving Kumis</option>
                                                <option value="Ganteng Shaving Botak" <?php if ($jenis=='Ganteng Shaving Botak') {
                                                    echo "selected";
                                                } ?>>Ganteng Shaving Botak</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" name="harga" value="<?php echo $tampil['harga'];?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Pelayanan</label>
                                            <input class="form-control" name="pelayanan" value="<?php echo $tampil['pelayanan'];?>" />
                                        </div>    
                                    <div>
                                    	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                                        <a href="?page=paket" class="btn btn-default">Batal</a>
                                    </div>
                                </div>
                                </form>
                            </div>
</div>
</div>
</div>

<?php
	$jenis             		  = @$_POST ['jenis'];
	$harga                	  = @$_POST ['harga'];
	$pelayanan  			  = @$_POST ['pelayanan'];

	$simpan                   = @$_POST ['simpan'];

	if ($simpan){

		$sql =$koneksi->query("update tb_paket set jenis_paket='$jenis', harga='$harga', pelayanan='$pelayanan' where id_paket='$id'");
		
		if ($sql){
			?>
					<script type="text/javascript">

					alert  ("Ubah Berhasil Disimpan");
                    window.location.href="?page=paket";
			</script>		
			<?php
		}
	}
?>