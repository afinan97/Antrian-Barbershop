<?php
session_start();
$sesiData = !empty($_SESSION['sesiData'])?$_SESSION['sesiData']:'';
if(!empty($sesiData['status']['msg'])){
    $statusPsn = $sesiData['status']['msg'];
    $jenisStatusPsn = $sesiData['status']['type'];
    unset($_SESSION['sesiData']['status']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Barbershop Daftar</title>
    <!-- <link rel="stylesheet" href="style.css" type="text/css" media="all" /> -->
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
</head>
<body background="barber2.jpg" style="padding-top: 5%;">
    
    <div class="text-center">
    <h1>Mas Ganteng Barbershop</h1>
    <h2>Registrasi</h2>
    </div>
    <div class="container">
        <div class="row ">
               
                   <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <h3 class="panel-title text-center"> Buat akun baru</h3>
                            </div>
        
        <?php echo !empty($statusPsn)?'<p class="'.$jenisStatusPsn.'">'.$statusPsn.'</p>':''; ?>
        <div class="panel-body">
            <form action="akunuser.php" method="post" enctype="multipart-/form-data">

                <div class="form-group">
                <input class="form-control" type="text" name="username" placeholder="Username" required="">
                </div>

                <div class="form-group">
                <input class="form-control" type="text" name="nama_customer" placeholder="Nama" required="">
                </div>

                <div class="form-group">
                <input class="form-control" type="text" name="no_hp" placeholder="No HP" required="">
                </div>

                <div class="form-group">
                <input class="form-control" type="email" name="alamat_email" placeholder="Alamat Email" required="">
                </div>

                <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Password" required="">
                </div>

                <div class="form-group">
                <input class="form-control" type="password" name="confirm_password" placeholder="Konfirmasi Password" required="">
                </div>

                
                <button type="submit" style="margin: 10px auto;" class="btn btn-primary" name="daftar"> Daftar </button>
                
                
                <a href="login.php" style="text-decoration: none;">Batal</a>
            </form>
           </div>
    </div>
   
</body>
</html>
