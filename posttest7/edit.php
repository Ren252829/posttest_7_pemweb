<?php
require "connect.php";
$id = $_GET["id"];

$result = mysqli_query($conn, "SELECT * FROM daftar_comic WHERE id = '$id'");

$comic = [];

while ($row = mysqli_fetch_assoc($result)){
    $comic [] = $row;
}

$comic = $comic[0];

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $genre = $_POST['genre'];
    $rating = $_POST['rating'];;

    //gambar
    $img = $_FILES['cover']['name'];
    $explode = explode(',', $img);
    $ekstensi = strtolower(end($explode));
    $cover = "$nama.$ekstensi";
    $tmp = $_FILES['cover']['tmp_name'];

    if (move_uploaded_file($tmp,'assets/'.$cover)){
        $result = mysqli_query($conn, "UPDATE daftar_comic SET cover = '$cover', nama = '$nama', genre='$genre', rating = '$rating' WHERE id = '$id' ");
    
        if ($result) {
            echo "
            <script>
                alert('Data berhasil Diubah!');
                document.location.href = 'dashboard.php'
            </script>";
        } else {
            echo "
            <script>
                alert('Data Gagal Diubah!');
                document.location.href = 'edit.php'
            </script>";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="add-data">
        <div class="add-form-container">
            <h1>Edit Data</h1><hr><br>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="Cover">cover</label>
                <input type="file" name="cover" value="<?php echo $comic['cover']?>" id="">
                <label for="nama">Nama</label>
                <input type="text" name="nama" value="<?php echo $comic['nama']?>" class="textfield">
                <label for="genre">genre</label>
                <input type="text" name="genre" value="<?php echo $comic['genre']?>" class="textfield">
                <label for="rating">rating</label>
                <input type="text" name="rating" value="<?php echo $comic['rating']?>" class="textfield">
                <input type="submit" name="edit" value="Edit Data" class="login-btn">
            </form>
        </div>
    </section>
</body>
</html>