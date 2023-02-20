<?php
include '../Connect.php';
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id'])){
die("<script language=\"Javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href = 'index.php' </script>");
}//jika belum login jangan lanjut..

?>
<html>
<head>
  <title> SMK Telkom Sandhy Putra Malang </title>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='../assets/css/bootstrap.css' rel='stylesheet' type='text/css'/>
</head>
<!-- Membuat Navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand"> SMK Telkom Sandhy Putra Malang </img></a>
    </div>
    <ul class="nav navbar-nav">
      <li> <a href="murid.php"><span class="glyphicon glyphicon-list"></span> Data Siswa </a> </li>
      <li> <a  href="Kehadiran.php"><span class="glyphicon glyphicon-list-alt"></span> Kehadiran </a> </li>
      <li> <a href="Tampilanizin.php"><span class="glyphicon glyphicon-tasks"></span> Tidak Hadir </a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span>
        <?php
        $queri1 = mysqli_query($link,"SELECT *FROM admin WHERE id LIKE '".$_SESSION['id']."'");
        $nama = mysqli_fetch_array($queri1);
        echo $nama['nama']; ?>
      </a></li>
      <li><a href="ProsesLogoutAdmin.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<nav class="navbar navbar-inverse navbar-fixed-bottom">
    <ul class="nav navbar-nav">
      <li> <a> <span class="glyphicon glyphicon-globe"></span> SMK Telkom Sandhy Putra Malang </a> </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li> <a> Copyright © 2023 </a> </li>
    </ul>
</nav>
</html>
