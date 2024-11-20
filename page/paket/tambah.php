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
                                            <select class="form-control" name="jenis"/>
                                            <option value="Ganteng Minimum">Ganteng Minimum</option>
                                            <option value="Ganteng Medium">Ganteng Medium</option>
                                            <option value="Ganteng Maximum">Ganteng Maximum</option>
                                            <option value="Ganteng Anak-anak">Ganteng Anak-anak</option>
                                            <option value="Ganteng Semir">Ganteng Semir Hitam</option>
                                            <option value="Ganteng Semir">Ganteng Semir Full Hitam</option>
                                            <option value="Ganteng Semir">Ganteng Semir Warna</option>
                                            <option value="Ganteng Shaving">Ganteng Shaving Brewok</option>
                                            <option value="Ganteng Shaving">Ganteng Shaving Kumis</option>
                                            <option value="Ganteng Shaving">Ganteng Shaving Botak</option>
                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Harga</label>
                                            <input class="form-control" name="harga"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Pelayanan</label>
                                            <input class="form-control" name="pelayanan" type="text" />
                                        </div>    
                                    <div>
                                    	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
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

		$sql =$koneksi->query("insert into tb_paket(jenis_paket, harga, pelayanan) values ('$jenis','$harga', '$pelayanan')");
		
		if ($sql){
			?>
					<script type="text/javascript">

					alert  ("Data Berhasil Disimpan");

                    window.location.href="?page=paket";
			</script>		
			<?php
		}
	}
?>