<?php
    error_reporting(0);
   
    //memanggil file database.php
    require_once 'database.php';

    //menyimpan variabel kon dalam variabel koneksi
    $koneksi = $kon;    


  $koneksi = new mysqli("localhost","root","","antrian-barbershop");

  if ($_SESSION['admin'] || $_SESSION['customer']){
        
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/bootstrap.css">
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
   <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

   <!-- datetime picker -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top hidden-print" style="background-color:#B22222" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="background-color:#B22222" href="index.php">BARBERSHOP</a> 
            </div>
<div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 18px;"> 

        <a href="logout.php" style="text-decoration: none;color:#F0F8FF" class="fa fa-sign-out" >Logout</a> </div>
        </nav>    
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side hidden-print" style="background-color:#B22222" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-left">
                    <?php
                           if($_SESSION['admin']){
                                $user_l=$_SESSION['admin'];
                           
                           }elseif ($_SESSION['customer']) {
                                $user_l=$_SESSION['customer'];
                           } 
                           
                           $sql_u = $koneksi->query("select* from tb_customer where id_customer='$user_l'");
                           $data_u = $sql_u->fetch_assoc();
                        ?>

                    <li><a> Selamat Datang, <?php echo $data_u['username'];; ?> &nbsp;&nbsp;  </a></li>
                    
                    <li class="">
                        <a href="#" class="dropdown-toggle">
                            <i class="fa fa-book"></i>
                            <span class="menu-text">
                                Profil
                            </span>

                            <b class="arrow fa fa-down"></b>
                        </a>

                        <b class="arrow"></b>

                        <ul class="submenu">
                                <li><a href="?page=profil&aksi=akun" style="text-decoration: none;color: white"></i>Akun</a></li> 
                        </ul>
                    </li>
                    <?php if ($_SESSION['admin']) {?>
                     <li>
                        <a  href="?page=user"><i class="fa fa-user "></i> User </a>
                    </li>

                    <li>
                        <a href="?page=cabang"><i class="fa fa-cut "></i> Cabang Barbershop </a>
                    </li>

                    <?php } ?> 
                      <li>
                        <a  href="?page=capster"><i class="fa fa-user "></i> Daftar Capster</a>
                    </li>
                    <?php if ($_SESSION['admin']) {?>
                    <li>
                        <a  href="?page=customer"><i class="fa fa-user"></i> Daftar Customer </a>
                    </li>
                    <?php } ?> 
                    <li>
                        <a  href="?page=paket"><i class="fa fa-list "></i> Daftar Paket </a>
                    </li>
                   
                    <li>
                        <a  href="?page=booking"><i class="fa fa-list"></i> Booking Barbershop</a>
                    </li>
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <?php

                        $page = isset($_GET['page']) ? $_GET['page'] : "";
                        $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : "";

                            if ($page == "user"){
                                if ($aksi == ""){
                                    include "page/user/pengguna.php";
                                }if ($aksi=="tambah") {
                                    include "page/user/tambah.php";
                                }if ($aksi=="ubah") {
                                    include "page/user/ubah.php"; 
                                }if ($aksi=="hapus") {
                                    include "page/user/hapus.php";       
                                }
                            }elseif ($page == "cabang") {
                                if ($aksi == "") {
                                    include "page/cabang/cabang.php";
                                }if ($aksi=="tambah"){
                                    include "page/cabang/tambah.php";
                                }if ($aksi=="ubah"){
                                    include "page/cabang/ubah.php";
                                }if ($aksi=="hapus"){
                                    include "page/cabang/hapus.php";
                                }

                            }elseif($page == "capster"){
                                if ($aksi == ""){
                                    include "page/capster/capster.php";
                                }if ($aksi=="tambah") {
                                    include "page/capster/tambah.php";
                                }if ($aksi=="ubah") {
                                    include "page/capster/ubah.php"; 
                                }if ($aksi=="hapus") {
                                    include "page/capster/hapus.php";       
                                }
                            }elseif ($page == "customer"){
                                if ($aksi == ""){
                                    include "page/customer/customer.php";
                                }if ($aksi=="tambah") {
                                    include "page/customer/tambah.php";
                                }if ($aksi=="ubah") {
                                    include "page/customer/ubah.php"; 
                                }if ($aksi=="hapus") {
                                    include "page/customer/hapus.php"; 
                                }
                            }elseif ($page == "paket"){
                                if ($aksi == ""){
                                    include "page/paket/paket.php";
                                }if ($aksi=="tambah") {
                                    include "page/paket/tambah.php";
                                }if ($aksi=="ubah") {
                                    include "page/paket/ubah.php";  
                                }if ($aksi=="hapus") {
                                    include "page/paket/hapus.php";    
                                }
                            }elseif ($page == "booking"){
                                if ($aksi == ""){
                                    include "page/booking/booking.php";
                                }if ($aksi=="tambah") {
                                    include "page/booking/tambah.php";
                                }if ($aksi=="ubah") {
                                    include "page/booking/ubah.php";   
                                }if ($aksi=="hapus") {
                                    include "page/booking/hapus.php";   
                                }if ($aksi=="cetak") {
                                    include "page/booking/rekapdata.php";
                                }if ($aksi == "antrianbooking"){
                                    include "page/booking/antrianbooking.php";
                                }

                             }elseif ($page == "profil"){
                                if ($aksi == ""){
                                    include "page/index.php";
                                }if ($aksi=="akun") {
                                    include "page/profil/akun.php";
                                }if ($aksi=="ubahakun") {
                                    include "page/profil/ubahakun.php";   
                                }
      
                            }elseif ($page=="") {
                                include "home.php";
                            }else if ($page == 'nota'){
                                include 'page/booking/nota.php';
                            }
                            
                     ?>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript">

        function bayarFunc(e,idBooking){
            var bayar = e.value;
            var harga = $("#harga"+idBooking).val();
            console.log(harga);
            var kembalian = parseInt(bayar)-parseInt(harga);
            if(0>kembalian){
                $(".tombol").attr('disabled','disabled');
            }else{
                $(".tombol").removeAttr('disabled');
            }
            $("#kembalian"+idBooking).val(kembalian);
        }
        // $(".bayar").on('keyup',function(){
        //     var bayar = $(this).val();
        //     var harga = $(".harga").val();
        //     console.log(harga);
        //     var kembalian = parseInt(bayar)-parseInt(harga);
        //     if(0>kembalian){
        //         $(".tombol").attr('disabled','disabled');
        //     }else{
        //         $(".tombol").removeAttr('disabled');
        //     }
        //     $(".kembalian").val(kembalian);
        // });
    </script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
        </script>

        <!-- date time picker -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function(){
                $("#tgl_booking").datepicker({
                    minDate:new Date ()
                    });
                });
        </script>

         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
 
</body>
</html>

<?php
    }else{
        header("location:login.php");
    }

?>