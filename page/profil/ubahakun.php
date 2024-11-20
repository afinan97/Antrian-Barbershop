<?php
    

    $user_1 = $_GET['id'];

    $sql_u = $koneksi->query("select * from tb_customer where id_customer='$user_1'");

    $tampil = $sql_u->fetch_assoc();
    
?>

<div class="panel panel-primary">
<div class="panel-heading"> 
    Ubah Data Diri
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                     <form method="POST" >
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username" value="<?php echo $tampil['username'];?>"/>
                                        </div>
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
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="password" type="password" />
                                        </div>  
                                    
                                    <div>
                                        <input type="submit" name="simpan" value="Ubah" class="btn btn-primary">
                                        <a href="?page=profil&aksi=akun" class="btn btn-default">Batal</a>
                                    </div>
                                </div>
                                </form>
                            </div>
</div>
</div>
</div>

<?php
    $username                = @$_POST ['username'];
    $nama_cust                = @$_POST ['nama_cust'];
    $nomor                = @$_POST ['nomor'];
    $email                = @$_POST ['email'];
    $password               = @$_POST ['password'];

    $simpan               = @$_POST ['simpan'];

    if ($simpan){

        if(empty($password)){
            $sql=$koneksi->query("update tb_customer set username='$username', nama_customer='$nama_cust', no_hp='$nomor', alamat_email='$email' where id_customer='$user_1'");
        }else{

        $sql =$koneksi->query("update tb_customer set username='$username', nama_customer='$nama_cust', no_hp='$nomor', alamat_email='$email', password='$password' where id_customer='$user_1'");
        }

        
        if ($sql){
            ?>
                    <script type="text/javascript">

                    alert  ("Data Berhasil Disimpan");
                    window.location.href="?page=profil&aksi=akun";
            </script>       
            <?php
        }
    }
?>