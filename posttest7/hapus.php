<?php
require "connect.php";

$id = $_GET["id"];
$comic = [];

$result = mysqli_query($conn, "SELECT * FROM daftar_comic where id = '$id'");
while ($row = mysqli_fetch_assoc($results)){
    $comic[] = $row;
}
foreach($comic as $cmc) {
    $status=unlink('assets/'.$cmc['cover']);  
    if ($status) {
        $result = mysqli_query($conn,"DELETE FROM daftar_comic WHERE id = '$id'");
        echo "
        <script>
        alert('Data berhasil Hapus!');
        document.location.href = 'dashboard.php'
        </script>";
    } else {
        $result = mysqli_query($conn,"DELETE FROM daftar_comic WHERE id = '$id'");
        echo "
        <script>
            alert('Data Gagal Hapus!');
            document.location.href = 'dashboard.php'
        </script>";
    }
}
?>