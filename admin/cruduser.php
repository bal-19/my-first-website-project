<?php
    include "../koneksi.php";
    $koneksi = koneksiToko();       
        
    function cariUser($username) {
        global $koneksi;
        $sql = "SELECT * FROM admin WHERE username='$username'";
        $hasil = mysqli_query($koneksi, $sql);
        $result = $hasil->fetch_assoc();
        
        if (mysqli_num_rows($hasil) > 0) {
            return $result;

            $baris = mysqli_fetch_assoc($hasil);
            $data['username'] = $baris['username'];
            $data['pass'] = $baris['pass'];
            mysqli_close($koneksi);
            return $data;
        } else {
            mysqli_close($koneksi);
            return null;
        }
    }

    // function hapusUser($kode_customer) {
    //     global $koneksi;
    //     $sql = "DELETE FROM pengguna WHERE kode_customer = '$kode_customer'";
    //     $del = mysqli_query($koneksi, $sql);

    //     if ($del) {
    //         echo "
    //             <script>
    //                 alert('1 PENGGUNA DIHAPUS!');
    //                 window.location='m_customer.php';
    //             </script>
    //         ";
    //     }
    // }

    function hapusUser($kode_customer) {
        global $koneksi;
        $sql = "DELETE FROM customer WHERE kode_customer = '$kode_customer'";

        $hasil = 0;
        if (mysqli_query($koneksi, $sql)) {
            $hasil = 1;
        }
        mysqli_close($koneksi);
        return $hasil;
    }

    function otentikasi($username, $password) {
        $dataUser = array();
        $pwmd5 = md5($password);
        $dataUser = cariUser($username);
        if ($dataUser != null) {
            if ($pwmd5 == $dataUser['pass']) {
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


?>