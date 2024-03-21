<?php
    session_start();
    include "cruduser.php";

    $username = $_POST['user'];
    $password = $_POST['pass'];
    

    if (otentikasi($username, $password)) {
        $_SESSION['username'] = $username;
        $dataUser = array();
        $dataUser = cariUser($username);
        echo "
        <script type='text/javascript'>
            alert('Berhasil Login');
            window.location='halaman_utama.php';
        </script>";
    } else {
        header("Location: index.php?error");
    }
?>