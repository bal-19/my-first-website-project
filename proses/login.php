<?php
    session_start();
    include "../cruduser.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    

    if (otentikasi($username, $password)) {
        $_SESSION['username'] = $username;
        $dataUser = array();
        $dataUser = cariUser($username);
        $_SESSION['nama'] = $dataUser['nama']; 
        $_SESSION['kd_cs'] = $dataUser['kode_customer'];
        echo "
        <script type='text/javascript'>
            alert('Berhasil Login');
            window.location='../index.php';
        </script>";
    } else {
        header("Location: ../user_login.php?error");
    }
?>