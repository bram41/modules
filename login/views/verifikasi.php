<?php
require_once('SMTP.php');
require_once('PHPMailer.php');
require_once('Exception.php');

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

$mail=new PHPMailer(true); // Passing `true` enables exceptions

try {
    //settings
    $mail->SMTPDebug=0; // Enable verbose debug output
    $mail->isSMTP(); // Set mailer to use SMTP
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth=true; // Enable SMTP authentication
    $mail->Username='super090hero030@gmail.com'; // SMTP username
    $mail->Password='putra030090'; // SMTP password
    $mail->SMTPSecure='ssl';
    $mail->Port=465;

    $mail->setFrom('noreply@rentall.com', 'RENTALL');

    $this->db->where("id_user", $id_user);
    $row = $this->db->get("users")->row();
    $nama = $row->nama;
    $email = $row->email;
    $token = $row->token;

    //recipient
    $mail->addAddress("$email", "$nama");     // Add a recipient

    //content
    $mail->Subject='Token Verifikasi Akun Rentall';
    $mail->Body="Kami sampaikan bahwa email yang Anda gunakan untuk akun Rentall belum terverifikasi. Silahkan verifikasi dahulu agar bisa menggunakan akun tersebut \n Untuk token yaitu $token" ;
    $mail->AltBody="Kami sampaikan bahwa email yang Anda gunakan untuk akun Rentall belum terverifikasi. Silahkan verifikasi dahulu agar bisa menggunakan akun tersebut \n Untuk token yaitu $token";

    $mail->send();
} 
catch(Exception $e) {
    $this->session->set_flashdata('sukses',"$e");
    redirect("login");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Verifikasi</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-7 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Silahkan masukkan token verifikasi!</h1>
                    <?php
                    if($this->session->flashdata('sukses')) {
                    echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>'; }
                    ?>
                  </div>
                    <?php echo form_open('login/verif');?>
                         <div class="form-group">
                            <input type="text"name="id" value="<?= $id_user; ?>" hidden>
                            <input type="text" class="form-control form-control-user" placeholder="Masukkan Token..." name="token">
                         </div>
                         <input class="btn btn-primary btn-user btn-block" type="submit" name="btnSubmit" value="Verifikasi" />
                    <?php echo form_close();?>
                  <div class="text-center mt-3">
                    <a class="medium" href="<?= base_url(); ?>">Kembali ke beranda!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>
                        