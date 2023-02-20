<?php include 'ProsesLoginAdmin.php'; ?>
<html>

<head>
    <title> SMK Telkom Sandhy Putra Malang </title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href='../assets/css/bootstrap.css' rel='stylesheet' type='text/css'/>
</head>
<body>
<div class="container">
    <div class="panel panel-info" style="margin-top: 100px">
        <div class="panel-heading">
            <table border="0" width="100%" style="text-align:center">
                <tr>
                    <td><h1> SMK Telkom Sandhy Putra Malang </h1><br>
                        Jalan Danau Ranau,Telepon 0341-712500, <br>
                        Kota Malang - 65139
                    </td>
                </tr>
            </table>
        </div>
        <div class="panel-body">
            <form name="login" method="post" action="" class="">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-user"> </i>
                        </div>
                        <input type="text" name="admin" id="admin" placeholder="Masukan ID Pengguna"
                               class="form-control input-lg text-center"
                               required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-lock"> </i>
                        </div>
                        <input type="password" name="pass" placeholder="Masukan Kata Sandi Pengguna"
                               class="form-control input-lg text-center" required>
                    </div>
                </div>
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col-md-6">
                    <button type="button" name="kembali" class="btn btn-success btn-lg btn-block"
                            onclick="window.location = '../index.php'"><i class="glyphicon glyphicon-home"> </i> Kembali
                    </button>
                </div>
                <div class="col-md-6">
                    <button type="submit" name="masuk" class="btn btn-primary btn-lg btn-block"><i
                                class="glyphicon glyphicon-log-in"> </i> Masuk
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
