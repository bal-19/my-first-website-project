<?php
    include "koneksi.php";
    $koneksi = koneksiToko();       
        
    function cariUser($username) {
        global $koneksi;
        $sql = "SELECT * FROM customer WHERE username='$username'";
        $hasil = mysqli_query($koneksi, $sql);
        $result = $hasil->fetch_assoc();
        
        if (mysqli_num_rows($hasil) > 0) {
            return $result;

            $baris = mysqli_fetch_assoc($hasil);
            $data['kode_customer'] = $baris['kode_customer'];
            $data['nama'] = $baris['nama'];
            $data['email'] = $baris['email'];
            $data['username'] = $baris['username'];
            $data['password'] = $baris['password'];
            $data['telp'] = $baris['telp'];
            mysqli_close($koneksi);
            return $data;
        } else {
            mysqli_close($koneksi);
            return null;
        }
    }

    function otentikasi($username, $password) {
        $dataUser = array();
        $dataUser = cariUser($username);
        if ($dataUser != null) {
            $hashedPassword = $dataUser['password'];
            if (password_verify($password, $hashedPassword)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }


    // function otentikasi($username, $password) {
    //     $dataUser = array();
    //     $dataUser = cariUser($username);
    //     $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    //     if ($dataUser != null) {
    //         if ($passwordHash == $dataUser['password']) {
    //             return true;
    //         } else {return false;}
    //     } else {
    //         return false;
    //     }
    // }

    function register($nama, $email, $username, $password, $telp) {
        global $koneksi;

        $query = "SELECT * FROM customer WHERE username = '$username'";
        $result = mysqli_query($koneksi, $query);
        
        if (mysqli_num_rows($result) > 0) {
            return false;
        } else {
            $query = "SELECT kode_customer FROM customer ORDER BY kode_customer DESC LIMIT 1";
            $result = mysqli_query($koneksi, $query);
            $row = mysqli_fetch_assoc($result);
            $kodeTerakhir = $row['kode_customer'];

            if ($kodeTerakhir) {
                $angkaTerakhir = substr($kodeTerakhir, 1);
                $angkaBaru = intval($angkaTerakhir) + 1;
                $kode = "C" . str_pad($angkaBaru, 3, '0', STR_PAD_LEFT);
            } else {
                $kode = "C001";
            }

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $hasil = 0;
            $query = "INSERT INTO customer VALUES ('$kode', '$nama', '$email', '$username', '$passwordHash', '$telp')";

            if(mysqli_query($koneksi, $query))
            $hasil = 1;
            mysqli_close($koneksi);
            return $hasil;
        }
    }
?>