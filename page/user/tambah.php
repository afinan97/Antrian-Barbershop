<div class="panel panel-primary">
<div class="panel-heading"> 
    Tambah Data User
</div>
<div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" name="username"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input class="form-control" name="nama" />
                                        </div>
                                        <div class="form-group">
                                            <label>No HP</label>
                                            <input class="form-control" name="no_hp" />    
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat Email</label>
                                            <input class="form-control" name="email" />
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Level</label>
                                            <input class="form-control" name="level" />    
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" name="pass" />
                                            
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

    $username = $_POST ['username'];
    $nama = $_POST ['nama'];
    $no_hp = $_POST ['no_hp'];
    $email = $_POST ['email'];
    $level = $_POST ['level'];
    $pass = $_POST ['pass'];
    

    $simpan = $_POST ['simpan'];


    if ($simpan) {

        $sql =$koneksi->query("insert into tb_customer(username, nama_customer, no_hp, alamat_email, level, password) values ('$username','$nama', '$no_hp', '$email', '$level', '$pass')");
        
        if ($sql){
            ?>
                    <script type="text/javascript">

                    alert  ("Data Berhasil Disimpan");

                    window.location.href="?page=user";
            </script>       
            <?php
        }
    }
?>