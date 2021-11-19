<?php 
    session_start();
    include "koneksi.php";

    $cart=@$_SESSION['cart'];
    if(count($cart)>0){

        $id_petugas = 4;
        $tgl = date('Y-m-d');
        mysqli_query($koneksi,"INSERT INTO `transaksi` (`id_pelanggan`, `id_petugas`, `tgl_transaksi`) VALUES ('".$_SESSION['id_pelanggan']."', '".$id_petugas."', '".$tgl."')");
        
        $id=mysqli_insert_id($koneksi);
        
        foreach ($cart as $key_produk => $val_produk) {
            $qry_harga = mysqli_query($koneksi,"select * from produk where id_produk = '".$val_produk['id_produk']."'");
            $data_harga=mysqli_fetch_array($qry_harga);
            $harga = $data_harga['harga'];
            $subtotal = $val_produk['qty'] * $harga;

            mysqli_query($koneksi,"INSERT INTO `detail_transaksi` ( `id_transaksi`, `id_produk`, `qty`, `subtotal`) VALUES ('".$id."', '".$val_produk['id_produk']."', '".$val_produk['qty']."', '".$subtotal."')");
        }

        unset($_SESSION['cart']);

        echo '<script>alert("Anda berhasil membeli produk");location.href="pembelian.php"</script>';

    }