<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- bootstrap 4 CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=BASEURL;?>/css/manarela.css">
    <title><?=$data['title'];?></title>
    <style>
    html,body {background: #d4a5a544; }
    </style>
</head>
<body>
    <div id="login-wrapper">
        <form action="<?=BASEURL?>/Admin/otentik" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group text-center">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
    </div>
    <?php
    $this->view('template/bs4js');
    ?>
</body>
</html>
<!--
markas:banjarnegara
_$_
adminpmi:relawanpmi
-->