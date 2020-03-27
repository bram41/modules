<!DOCTYPE html>
<html lang="en">

<head>
    <title>Notifikasi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/'); ?>vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/'); ?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/'); ?>vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/'); ?>vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/'); ?>vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/'); ?>css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/template_login/'); ?>css/main.css">
    <!--===============================================================================================-->
</head>

<body>
<?php
header('Refresh:5; url= ' . base_url() . 'beranda');
?>
<div class="limiter">
    <div class="container-login100">
        <div class="card" style="height: 100px; width: 600px">
            <div class="card-body">
                <center>
                    <span class="card-text" style="font-size: 30px;">Pendaftaran Berhasil, silahkan login! </span>
                </center>
            </div>
        </div>
    </div>
</div>
<!--===============================================================================================-->
<script src="<?= base_url('assets/template_login/'); ?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url('assets/template_login/'); ?>vendor/bootstrap/js/popper.js"></script>
<script src="<?= base_url('assets/template_login/'); ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url('assets/template_login/'); ?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="<?= base_url('assets/template_login/'); ?>vendor/tilt/tilt.jquery.min.js"></script>
<script>
    $('.js-tilt').tilt({
        scale: 1.1
    })
</script>
<!--===============================================================================================-->
<script src="<?= base_url('assets/template_login/'); ?>js/main.js"></script>

</body>

</html>