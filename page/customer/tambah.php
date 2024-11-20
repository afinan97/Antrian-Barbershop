<div class="panel panel-primary">
<div class="panel-heading">	
	Tambah Data Customer
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                	<form method="POST">
                                        <div class="form-group">
                                            <label>Nama Customer</label>
                                            <input class="form-control" name="username"/>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>No HP</label>
                                            <input class="form-control" type="number" name="no_hp"/>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat email</label>
                                            <input class="form-control" name="alamat_email" type="alamat_email" />
                                           
                                        </div>    
                                	
                                    
                                        

                                    <div>
                                    	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                    </div>
                                </div>
                                </form>
                            </div>
</div>
</div>
</div>

<?php
	$username                = @$_POST ['username'];
	$no_hp                = @$_POST ['no_hp'];
	$alamat_email  			  = @$_POST ['alamat_email'];

	$simpan               = @$_POST ['simpan'];

	if ($simpan){

		$sql =$koneksi->query("insert into tb_customer(nama, no_hp, alamat_email) values ('$username','$no_hp', '$alamat_email')");
		
		if ($sql){
			?>
					<script type="text/javascript">

					alert  ("Data Berhasil Disimpan");

                    window.location.href="?page=customer";
			</script>		
			<?php
		}
	}
?>