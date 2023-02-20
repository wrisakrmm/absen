<html>
<?php
include "../connect.php";
session_start();
//cek apakah user sudah login
if(!isset($_SESSION['id'])){
die("<script language=\"Javascript\">alert(\"Silahkan Login Terlebih Dahulu\");document.location.href = 'index.php' </script>");
}//jika belum login jangan lanjut..

?>
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
      <li class="active"> <a><span class="glyphicon glyphicon-list"></span> Data Siswa </a> </li>
      <li> <a href="Kehadiran.php"><span class="glyphicon glyphicon-list-alt"></span> Kehadiran </a> </li>
      <li> <a href="TampilanIzin.php"><span class="glyphicon glyphicon-tasks"></span> Tidak Hadir </a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a><span class="glyphicon glyphicon-user"></span>
        <?php
        $queri1 = mysqli_query($link,"SELECT *FROM admin WHERE Id LIKE '".$_SESSION['id']."'");
        $nama = mysqli_fetch_array($queri1);
        echo $nama['nama']; ?>
      </a></li>
      <li><a href="ProsesLogoutAdmin.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<?php $queri2 = mysqli_query($link,"SELECT max(NIS) as maxNIS FROM murid");
$code = mysqli_fetch_array($queri2);
$codeR = $code['maxNIS'];
$codeR++ ?>
<body>
  <br>
  <br>
  <br>

<div class="container">
  <div class="col-md-12">
    <div class="panel panel-info">
      <div class="panel-heading">
    <table border="0" width="1050" style="text-align:center">
      <tr>
        <td> <h1> SMK Telkom Sandhy Putra Malang </h1><br>
              Jalan Danau Ranau,Telepon 0341-712500,
              Kota Malang - 65139 </td>
      </tr>
    </table>
  </div>
      <div class="panel-body">
        <nav class="navbar navbar-default navbar-top">
          <div class="container-fluid">
            <ul class="nav navbar-nav">
              <li> <a href="murid.php"> <span class="glyphicon glyphicon-list"></span> Data Siswa </a></li>
              <li class="active"> <a> <span class="glyphicon glyphicon-list"></span> Siswa Baru </a></li>
              <li class="disabled"> <a> <span class="glyphicon glyphicon-list"></span> Edit Siswa </a></li>
              <li class="disabled"> <a> <span class="glyphicon glyphicon-list"></span> Cek Rekap Absen </a></li>
            </ul>
          </div>
        </nav>
        <h1> DATA SISWA BARU </h1>
      <form method="POST" action="prosessiswabaru.php">
        <table border="0" class="table-responsive">
          <tr>
            <td> <h3> NIS </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="NIS" class="form-control input-lg" value="<?php echo $codeR ; ?>" required> </input> </td>
          </tr>
          <tr>
            <td> <h3> Nama Lengkap </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <input type="text" name="nama" class="form-control input-lg" required> </td>
          </tr>
          <tr>
            <td> <h3> Kelas </h3> </td>
            <td> <h3> : </h3> </td>
            <td> <select name="kls" class="form-control" required>
                    <option value="XI - TKJ 1"> XI-TKJ 1 </option>
                    <option value="XI - TKJ 2"> XI-TKJ 2 </option>
                    <option value="XI - RPL 1"> XI-RPL 1 </option>
                </select>
             </td>
          </tr>
          <tr>
            <td colspan="3" style="text-align:right"> <button type="submit" name="tambah" class="btn btn-info ">  <i class="glyphicon glyphicon-plus"> </i>  Simpan  </button> </td>
          </tr>
        </table>
      </form>

      </div>
    </div>
  </div>
</div>
</body>
</html>
