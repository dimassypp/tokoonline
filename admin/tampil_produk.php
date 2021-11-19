<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
    <?php
        include "navbar.php";
    ?>
    <div class="container">
    <h1>Data Produk</h1>
        <form action="tampil_pelanggan.php" method="POST">
            <input type="text" name="cari" class="form-control" placeholder="Silahkan Masukkan Keyword">
        </form>
        <table>
    <thead>
        <tr>
            <<th>NO</th><th>Nama Produk</th>
            <th>Deskripsi</th><th>Harga</th>
            <th>Foto</th><th>AKSI</th>


        </tr>
  </thead>
  <tbody>
      <?php
      include "koneksi.php";
      if (isset($_POST["cari"])) {
          //jika ada keyword pencarian
          $cari = $_POST['cari'];
          $qry_produk = mysqli_query($koneksi, "select * from produk where id_produk='$cari' or nama_produk like'%$cari%' or harga like'%$cari%'");
      }
      else {
      $qry_produk=mysqli_query($koneksi,"select * from produk");
      }

      while($data_produk=mysqli_fetch_array($qry_produk)){
      ?>
        <tr>
            <td><?php echo $data_produk["id_produk"]; ?></td>
            <td><?php echo $data_produk["nama_produk"]; ?></td>
            <td><?php echo $data_produk["deskripsi"]; ?></td>
            <td><?php echo $data_produk["harga"]; ?></td>
            <td><img src="images/foto_produk<?=$data_produk['foto_produk']?>"style="width: 120px;float: left;margin-bottom: 5px;"></td>
            <td>
            <a href="ubah_produk.php?id_produk=<?=$data_produk['id_produk']?>" class="btn btn-primary">Update</a>
            <a href="hapus_produk.php?id_produk=<?=$data_buku['id_produk']?>"
            onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Delete</a></td>
        </tr>
    <?php
    }
    ?>
  </tbody>
</table>

    </div>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>