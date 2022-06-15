
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login User</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="col-md-4 col-md-offset-4">
        <div align="center"><img src="img/klinik.png" width="232" height="243"> </div>
        <h3 align="center">
            Sistem Informasi Pelayanan Rawat Jalan
            Klinik G&G
            PT.Ungaran Sari Garment
        </h3>
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Silahkan Login</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="config/cek_login.php">
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Username" name="user" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" name="pass" class="form-control" placeholder="Password">
                        </div>
                        <!-- Change this to a button or input when using this as a form -->
                        <button class="btn btn-outline btn-info" type="submit" name="log" value="login">Masuk</button>

                    </fieldset>
                </form>
                <br>
                <center>
                    <p>Repost by <a href="https://stokcoding.com/" title="StokCoding.com" target="_blank">StokCoding.com</a></p>
                </center>

            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
</body>

</html>