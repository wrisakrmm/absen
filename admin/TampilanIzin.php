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
<body>
  <br>
  <br>
  <br>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand"> SMK Telkom Sandhy Putra Malang </img></a>
      </div>
      <ul class="nav navbar-nav">
        <li> <a href="murid.php"><span class="glyphicon glyphicon-list"></span> Data Siswa </a> </li>
        <li> <a  href="Kehadiran.php"><span class="glyphicon glyphicon-list-alt"></span> Kehadiran </a> </li>
        <li class="active"> <a href="Tampilanizin.php"><span class="glyphicon glyphicon-tasks"></span> Tidak Hadir </a></li>
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

  <div class="container">
    <div class="col-md-12">
      <div class="panel panel-info">
        <div class="panel-heading">
      <table border="0" width="1050" style="text-align:center">
        <tr>
          <td> <h1> SMK Telkom Sandhy Putra Malang </h1><br>
              Jalan Danau Ranau,Telepon 0341-712500, <br>
              Kota Malang - 65139 </td>
        </tr>
      </table>
    </div>
        <div class="panel-body">
      <nav class="navbar navbar-default navbar-top">
        <div class="container-fluid">
          <ul class="nav navbar-nav">
            <li class="active"> <a href="Tampilanizin.php"> <span class="glyphicon glyphicon-list"></span> Absen </a></li>
          </ul>
  <form class="navbar-form navbar-right" name="cari" method="GET" action="" >
    <div class="input-group ">
      <div class="input-grup-addon">
        <input type="text" name="search" class=" input-md text-center cool-sm" placeholder="Cari Nama">
        <button type="submit" name="cr" class="btn btn-info"><i class="glyphicon glyphicon-search"> </i> Cari </button>
      </div>
    </div>


  </div>
</nav>
    <table name="murid" class="table table-responsive">
      <tr class="info">
        <th> No </th>
        <th> NIS </td>
        <td> Nama Lengkap </td>
        <td> Kelas </td>
        <td colspan="2"> Alasan </td>
      </tr>
      <?php
        include "../connect.php";
        $halaman = 5;
        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
        $hasil = mysqli_query($link,"SELECT *FROM murid");
        $result = mysqli_num_rows($hasil);
        $pages = ceil($result/$halaman);
        $query = mysqli_query($link,"select *from murid LIMIT $mulai, $halaman");
        $no =$mulai+1;
        if(isset($_GET['cr'])){
          $cari = $_GET['search'];
          $hasil = mysqli_query($link,"Select *From murid where Namalengkap like '%".$cari."%' LIMIT $mulai, $halaman");
        }
        else{
        $queri = "Select *from murid LIMIT $mulai, $halaman"  ;
        $hasil = mysqli_query($link,$queri) ;
        }


        $n=1 ;
        while ($data = mysqli_fetch_array($hasil) ){
          echo "<tr>
              <td>".$n."</td>
              <td>".$data['NIS']."</td>
              <td>".$data['Namalengkap']."</td>
              <td>".$data['Kelas']."</td>
              <td> <a href =prosesSakit.php?NIS=".$data['NIS']." class='btn btn-danger btn-sm'> Sakit </a> </td>
              <td> <a href =prosesIzin.php?NIS=".$data['NIS']." class='btn btn-success btn-sm'> Izin </a> </td>
            </tr>"; $n++;
        }  ;
      ?>
</div>
</table>
<div class="panel-Footer">
  <ul class="pagination">
  <?php for ($i=1; $i<=$pages ; $i++){ ?>
  <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php } ?>
</div>
</div>
</div>
  </form>
</body>
</html>
