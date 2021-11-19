<?php
include "koneksi.php";
if($_POST['simpan']){
 $nama_produk=$_POST['nama_produk'];
//  $foto=$_POST['foto'];
 $deskripsi=$_POST['deskripsi'];
 $harga=$_POST['harga'];
 //upload foto
 $ekstensi = array("png","jpg","jpeg");
 $namafile = $_FILES['foto_produk']['name'];
 $tmp = $_FILES['foto_produk']['tmp_name'];
 $tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
 $ukuran = $_FILES['foto_produk']['size'];

 if(empty($nama_produk)){
 echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
}
else {
    if(!in_array($tipe_file, $ekstensi)){
        header("location:tambah_produk.php?alert=gagal_ekstensi");
    }
    else{
      if($ukuran < 104407000){
        move_uploaded_file($tmp, 'images/foto_produk/'.$namafile);
        $query = mysqli_query($koneksi,"INSERT INTO produk (nama_produk,deskripsi,foto_produk) VALUE ('".$nama_produk."','".$deskripsi."','".$namafile."')");
        if($query){
            echo "<script>alert('sukses menambahkan produk');location.href='tampil_produk.php';</script>";
        }
        else{
            echo "<script>alert('gagal upload gambar');location.href='tambah_produk.php';</script>";
        }
    }
      else{
        echo "<script>alert('File terlalu besar');location.href='tambah_produk.php';</script>";
    }
}   

 }
}
?>