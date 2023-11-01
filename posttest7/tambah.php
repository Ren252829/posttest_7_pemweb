<?php
require 'connect.php';

if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];
    $date = date('Y-m-d');

     // UPLOAD GAMBAR
     $img = $_FILES['cover']['name'];
     $explode = explode('.', $img);
     $ekstensi = strtolower(end($explode));
     $cover = "$date.$nama.$ekstensi";
     $tmp = $_FILES ['cover']['tmp_name'];

     if (move_uploaded_file($tmp,'assets/'.$cover)) {
        $result = mysqli_query($conn, "INSERT INTO daftar_comic (id, cover, nama, genre, rating)
            VALUES ('', '$cover', '$nama', '$genre', '$rating')");

        if ($result) {
            echo "
            <script>
            alert('data berhasil ditambahkan !');
            document.location.href = 'dashboard.php'
            </script>";        
        }else {
            echo "
            <script>
            alert('data berhasil ditambahkan !');
            document.location.href = 'tambah.php'
            </script>";
        }
    }else {
        echo "gambar ga ke upload";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Tambah Data</h1><hr><br>
            <form action="" method="post"  enctype = "multipart/form-data">
                <label for="Cover">COVER</label>
                <input type="file" name="cover" id="">
                <label for="nama">NAMA</label>
                <input type="text" name="nama" class="textfield">
                <label for="genre">GENRE</label>
                <input type="text" name="genre" class="textfield">
                <label for="rating">RATING</label>
                <input type="text" name="rating" class="textfield">
                <input type="submit" name="tambah" value="Tambah Data" class="add-btn">
            </form>
        </div>
    </section>
</body>
</html>