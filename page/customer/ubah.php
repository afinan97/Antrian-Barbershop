<?php
    $id = $_GET['id'];

    $sql = $koneksi->query("select * from tb_customer where id_customer='$id'");

    $tampil = $sql->fetch_assoc();
    
?>

<div class="panel panel-primary">
<div class="panel-heading">	
	Ubah Data Customer
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                	<form method="POST">
                                        <div class="form-group">
                                            <label>Nama Customer</label>
                                            <input class="form-control" name="nama_cust" value="<?php echo $tampil['nama_customer'];?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>No HP</label>
                                            <input class="form-control" name="nomor" value="<?php echo $tampil['no_hp'];?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat email</label>
                                            <input class="form-control" name="email" type="email" value="<?php echo $tampil['alamat_email'];?>"/>
                                        </div>    
                                	
                                    <div>
                                    	<input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                                        <a href="?page=customer" class="btn btn-default">Batal</a>
                                    </div>
                                </div>
                                </form>
                            </div>
</div>
</div>
</div>

<?php
	$nama_cust                = @$_POST ['nama_cust'];
	$nomor                = @$_POST ['nomor'];
	$email  			  = @$_POST ['email'];

	$simpan               = @$_POST ['simpan'];

	if ($simpan){

		$sql =$koneksi->query("update tb_customer set nama_customer='$nama_cust', no_hp='$nomor', alamat_email='$email' where id_customer='$id'");
		
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