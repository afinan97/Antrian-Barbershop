<?php
	session_start();
    $host="localhost";
    $user="root";
    $password="";
    $db="antrian-barbershop";
    
    $kon = mysqli_connect($host,$user,$password,$db);
    if (!$kon){
          die("Koneksi gagal:".mysqli_connect_error());
    }
?>