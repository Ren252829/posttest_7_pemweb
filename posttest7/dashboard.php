<?php

require "connect.php";

$result = mysqli_query($conn, "SELECT * FROM daftar_comic");

$comic = [];

while ($row = mysqli_fetch_assoc($result)){
    $comic [] = $row;
}

// $username = $_POST['username'];
// $password = $_POST['password'];

// echo "Username : $username <br> Password : $password"

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
      <h1>POSTTEST 06 MADE BY RENALDI PRATAMA/2209106054</h1>
      <img src="assets/sun1.png" id="ikon">
    </header>

    <nav>
      <div class="logo">
        <a href="index.html">
          <img src="assets/logo01.webp" alt="#" />
        </a>
      </div>
      <div class="nav-items">
        <ul>
          <li><a href="index.html">HOME</a></li>
          <li><a href="#">GENRE</a></li>
          <li><a href="#">BOOKMARK</a></li>
          <li><a href="#">COMICS</a></li>
          <li><a href="abtme.html">ABOUT ME</a></li>
          <li><a href="logout.php">LOGOUT</a></li>
        </ul>
      </div>
    <div class="menu-toggle">
      <input type="checkbox">
      <span></span>
      <span></span>
      <span></span>
    </div>


  </nav>

    <div class="waktu">
      <h1>Halo!</h1>
          <p>Hari Ini: <?php date_default_timezone_set("Asia/Makassar"); echo date("l, d-m-y  |  h:i:sa")?></p>
        <hr><br>
    </div>
  <div class="menu-crud">
    <div class="leading-btn">
        <a href="tambah.php"><button class="add-btn">Tambah</button>
        <button class="history-btn">Histori</button>
    </div>
    <table>
      <thead>
          <tr>
              <th>ID</th>
              <th>Cover</th>
              <th>Nama</th>
              <th>Genre</th>
              <th>Rating</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody>
          <?php $i = 1; foreach($comic as $cmc) :?>
              <tr>
                <td><?php echo $i ?></td>
                <td><img src="assets/<?=$cmc["cover"]?>" alt="ini gambar" width="250px" height="350px"></td>
                <td><?php echo $cmc["nama"] ?></td>
                <td><?php echo $cmc["genre"] ?></td>
                <td><?php echo $cmc["rating"] ?></td>x
                <td class="action">
                  <a href="edit.php?id=<?php echo $cmc["id"]?>">
                    <button class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white"><path d="M200-200h56l345-345-56-56-345 345v56Zm572-403L602-771l56-56q23-23 56.5-23t56.5 23l56 56q23 23 24 55.5T829-660l-57 57Zm-58 59L290-120H120v-170l424-424 170 170Zm-141-29-28-28 56 56-28-28Z"/></svg></button>
                  </a>
                  <a href="hapus.php?id=<?php echo $cmc["id"]?>">
                    <button class="delete-btn"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24" fill="white"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg></button>
                  </a>
                </td>
              </tr>
          <?php $i++; endforeach;?>
      </tbody>
  </div>

    <!-- <div class="bar-bwh">
      <a href="#">Pivacy Policy</a>
      <a href="#">Copyright Act</a>
      <a href="#">Terms of Service</a>
    </div>
    <footer>
      <img src="assets/logo01.webp" alt="" />
    </footer> -->

    <script src="script.js"></script>    

</body>
</html>