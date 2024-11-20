<?php
    error_reporting(0);
    ob_start();
    //memanggil file database
    require_once 'database.php';


  // $koneksi = new mysqli("localhost","root","","barbershop");

  if ($_SESSION['admin'] || $_SESSION['customer']){
        header("location:index.php");
    }else{

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barbershop</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<br /><br />
<br /><br />
<body background="barber2.jpg">
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12" style="color: #696969">
                
                <h1> Mas Ganteng Barbershop</h1>
                
                <h3>Login</h3>
                
            </div>
        </div>
         <div class="row ">
               
                   <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                            <center> Masukan Username Dan Password </center>
                            </div>
                            <div class="panel-body">
                                <form role="form" method="POST">
                                       <br />   
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Username " name="username" />
                                        </div>
                                            <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your Password" name="pass" />
                                        </div>
                                        <center>
                                        <div class="form-group input-group">
                                            
                                            <input type="submit" class="btn btn-primary active"  name="login" value="Login" />
                                        </div>
                                        </center>
                                        <a href="daftar.php"  style="text-decoration: none;color: red">Daftar</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>


<?php

if (isset($_POST['login'])) {
    $username=$_POST['username'];
    $pass=$_POST['pass'];

    $ambil = $kon->query("select * from tb_customer where username='$username' and password='$pass' ");
    $data =$ambil->fetch_assoc();
    $ketemu = $ambil->num_rows;

    if($ketemu >=1){
                                    
    session_start();
    
    $_SESSION['username'] = $data ['username'];
    $_SESSION['pass'] = $data ['password'];
    $_SESSION['level'] = $data ['level'];
    
    
    if($data['level'] == "admin"){
        $_SESSION['admin'] = $data['id_customer'];
        header("location:index.php");
        
    }else if($data['level']== "customer"){
        $_SESSION['customer'] = $data['id_customer'];
        header("location:index.php");
    }    

} else{
            ?>
                <script type="text/javascript">
                    alert("Login Gagal Username dan Password Salah.. Silahkan Ulangi Lagi");
                </script>
            <?php
        }


}
}
?>

