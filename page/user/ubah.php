<?php
    
    $id=$_GET['id'];
    $sql = $koneksi->query("select * from tb_customer where id_customer='$id'");
    $tampil = $sql->fetch_assoc();

?>

<div class="panel panel-primary">
<div class="panel-heading">
		Ubah Data User
 </div> 
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <form method="POST" >
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" value="<?php echo $tampil['username'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input class="form-control" name="nama" id="nama" value="<?php echo $tampil['nama_customer'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>No HP</label>
                                            <input class="form-control" name="no_hp" id="no_hp" value="<?php echo $tampil['no_hp'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Alamat Email</label>
                                            <input class="form-control" name="email" id="email" value="<?php echo $tampil['alamat_email'];?>" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Level</label>
                                            <input class="form-control" name="level" id="level" value="<?php echo $tampil['level'];?>" readonly />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="pass" type="Password" id="pass" value="<?php echo $tampil['password'];?>"/>
                                            
                                        </div>

                                        <div>
                                        	
                                        	<input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                            <a href="?page=user" class="btn btn-default">Batal</a>
                                        </div>
                                 </div>

                                 </form>
                              </div>
 </div>  
 </div>  
 </div>


 <?php

 	$username = $_POST ['username'];
    $nama = $_POST ['nama'];
    $no_hp = $_POST ['no_hp'];
    $email = $_POST ['email'];
    $level = $_POST ['level'];
 	$pass = $_POST ['pass'];
 	

 	$simpan = $_POST ['simpan'];


 	if ($simpan) {
        
 		
 		$sql = $koneksi->query("update  tb_customer set username='$username', nama_customer='$nama', no_hp='$no_hp', alamat_email='$email', level='$level', password='$pass' where id_customer='$id'");

 		if ($sql){
            ?>
 				<script type="text/javascript">
 					
 					alert ("Data Berhasil Diubah");
 					window.location.href="?page=user";

 				</script>
 			<?php
 		
 	}

     }

 ?>
                             
                             

