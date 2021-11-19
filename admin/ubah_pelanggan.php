<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Ubah Siswa</title>
</head>
<body>
    <?php
    include "navbar.php";
    include "koneksi.php";
    $qry_get_pelanggan=mysqli_query($koneksi,"select * from pelanggan where id_pelanggan = '".$_GET['id_pelanggan']."'");
    $dt_pelanggan=mysqli_fetch_array($qry_get_pelanggan);
    ?>
    <div class="container">
    <h3>Ubah Pelanggan</h3>
    <form action="proses_ubah_pelanggan.php" method="post">
        <input type="hidden" name="id_pelanggan" value="<?=$dt_pelanggan['id_pelanggan']?>">
        Nama Pelanggan :
        <input type="text" name="nama_pelanggan" value="<?=$dt_pelanggan['nama_pelanggan']?>" class="form-control">
        Alamat :
        <textarea name="alamat" class="form-control"
        rows="4"><?=$dt_pelanggan['alamat']?></textarea>
        Telp :
        <input type="text" name="telp" value="<?=$dt_pelanggan['telp']?>" class="form-control">
        ?>
        </select>
        Username :
        <input type="text" name="username" value="<?=$dt_pelanggan['username']?>" class="form-control">
        Password :
        <input type="password" name="password" value="" class="form-control">
        <br>
        <input type="submit" name="simpan" value="Ubah Pelanggan" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>