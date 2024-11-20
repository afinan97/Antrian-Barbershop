<?php
//memulai Session
session_start();
//memuat dan menginisialisasi class User
include 'user.php';
$user = new tb_customer();
if(isset($_POST['daftar'])){
	//memeriksa apakah rincian user kosong
    if(!empty($_POST['username']) && !empty($_POST['nama_customer']) && !empty($_POST['no_hp']) && !empty($_POST['alamat_email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
		//membandingkan password and konfirmasi password
        if($_POST['password'] !== $_POST['confirm_password']){
            $sesiData['status']['type'] = 'error';
            $sesiData['status']['msg'] = 'Konfirmasi password harus sama dengan password.'; 
        }else{
			//memeriksa apakah user sudah ada di dalam database
            $kondSblmnya['where'] = array('alamat_email'=>$_POST['alamat_email']);
            $kondSblmnya['return_type'] = 'count';
            $userSblmnya = $user->getRows($kondSblmnya);
            if($userSblmnya > 0){
                $sesiData['status']['type'] = 'error';
                $sesiData['status']['msg'] = 'Email sudah ada, silakan gunakan email yang lain.';
            }else{
				//memasukkan data user dalam database
                $userData = array(
                    'username' => $_POST['username'],
                    'nama_customer' => $_POST['nama_customer'],
                    'no_hp' => $_POST['no_hp'],
                    'alamat_email' => $_POST['alamat_email'],
                    'password' => $_POST['password'],
                    
                    'level' => 'customer'

                    
                );
                $insert = $user->insert($userData);
				//Status ditetapkan berdasarkan data yang dimasukkan

                if($insert){
                    $sesiData['status']['type'] = 'sukses';
                    $sesiData['status']['msg'] = 'Anda telah berhasil didaftarkan.';
                }else{
                    $sesiData['status']['type'] = 'error';
                    $sesiData['status']['msg'] = 'Terjadi masalah, silahkan coba lagi.';
                }
            }
        }
    }else{
        $sesiData['status']['type'] = 'error';
        $sesiData['status']['msg'] = 'Isi semua bidang.'; 
    }
	//menyimpan status pendaftaran ke dalam Session
    $_SESSION['sesiData'] = $sesiData;
    $redirectURL = ($sesiData['status']['type'] == 'sukses')?'index.php':'daftar.php';
	//mengalihkan ke halaman index/pendaftaran
    header("Location:".$redirectURL);
}elseif(isset($_POST['login'])){
    //memeriksa apakah login yang diinput kosong
    if(!empty($_POST['alamat_email']) && !empty($_POST['password'])){
		//mendapatkan data user dari class user
        $kondisi['where'] = array(
            'alamat_email' => $_POST['alamat_email'],
            'password' => $_POST['password'],
            'status' => '1'
        );
        $kondisi['return_type'] = 'single';
        $userData = $user->getRows($kondisi);
		//Menetapkan data dan status user berdasarkan login
        if($userData){
            $sesiData['userLoggedIn'] = TRUE;
            $sesiData['userID'] = $userData['id_customer'];
            $sesiData['status']['type'] = 'sukses';
            $sesiData['status']['msg'] = 'Selamat Datang '.$userData['username'].'!';
        }else{
            $sesiData['status']['type'] = 'error';
            $sesiData['status']['msg'] = 'Email atau password salah, silahkan coba lagi.'; 
        }
    }else{
        $sesiData['status']['type'] = 'error';
        $sesiData['status']['msg'] = 'Masukkan email and password.'; 
    }



	//menyimpan status login ke dalam Session
    $_SESSION['sesiData'] = $sesiData;
	//mengalihkan ke halaman home
    header("Location:index.php");
}elseif(!empty($_REQUEST['logout'])){
	//menghapus data Session
    unset($_SESSION['sesiData']);
    session_destroy();
	//menyimpan Status logout ke dalam Session
    $sesiData['status']['type'] = 'sukses';
    $sesiData['status']['msg'] = 'Anda telah berhasil logout dari akun Anda.';
    $_SESSION['sesiData'] = $sesiData;
	//mengalihkan ke halaman home
    header("Location:index.php");
}else{
	//mengalihkan ke halaman home
    header("Location:index.php");
}

