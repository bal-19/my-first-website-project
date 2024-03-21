<?php
    include "../cruduser.php";

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];
    $telp = $_POST['telp'];
    
    if ($password == $konfirmasi) {
        $hasil = register($nama, $email, $username, $password, $telp);
        if($hasil != 0) {
            echo "<script type='text/javascript'>
                    alert('Berhasil Daftar');
                    window.location='../user_login.php';
                </script>";
        } else {
            echo "<script type='text/javascript'>
                alert('Username telah dipakai');
                window.location='../register.php';  
            </script>";
        }
    } else {
        echo "
        <script type='text/javascript'>
            alert('Password tidak sama');
            window.location='../register.php';  
        </script>";
    }
?>