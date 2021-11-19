<?php
    if($_POST){
        $nama_pelanggan=$_POST['nama_pelanggan'];
        $alamat=$_POST['alamat'];
        $telp=$_POST['telp'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        if (empty($nama_pelanggan)) {
            echo "<script>alert('Nama tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
        }

        elseif (empty($username)) {
            echo "<script>alert('Username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
        }

        elseif (empty($password)) {
            echo "<script>alert('Password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
        }

        else {
            include "koneksi.php";
            $insert=mysqli_query($koneksi,"insert into pelanggan (nama_pelanggan, alamat, telp, username, password)
            value
            ('".$nama_pelanggan."','".$alamat."','".$telp."','".$username."','".md5($password)."')") or die(mysqli_error($koneksi));
            if ($insert) {
                echo "<script>alert('Sukses Menambahkan Pelanggan');location.href='tambah_pelanggan.php';</script>";
            }

            else {
                echo "<script>alert('Gagal Menambahkan Pelanggan');location.href='tambah_pelanggan.php';</script>";
            }
        }
    }
?>