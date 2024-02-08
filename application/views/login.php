<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/iCheck/square/blue.css">
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style >
      .body
      {
        background-color: #ffffff;
      }
      .kotak
      {
        background-color: #2877C6;
        border: 4px solid #000000;
      }
      .bawah
      {
        position: fixed;
         bottom: 0;
      }
     
    </style>
  </head>

  <body class="hold-transition login-page body">
    <div class="login-box">

      <!-- judul aplikasi -->
      <div class="login-logo" >
        
        <?php foreach ($aplikasi->result_array() as $row) { ?>
          <center>
            <img src="<?= base_url('assets/logo/').$row['logo'] ?>" alt="" class="img-responsive" width="50%" style="margin-bottom: 15px">
          </center>
          <a href="<?= base_url('index.php/home') ?>">
            <b  style="color: #000000;"><?= $row['nama'] ?></b>
          </a>
        <?php } ?>

      </div>

      <!-- /.login-logo -->
      <div class="login-box-body kotak">

        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>
        <p class="login-box-msg" style="color: #ffffff;">Masukkan username dan password</p>
        <form action="<?= base_url('index.php/home/auth') ?>" method="POST"> <!-- dikirim ke sin -->
          <input type="hidden" name="<?= $this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none; ">

            <!-- username -->
            <div class="form-group has-feedback"> 
              <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
              <span class="glyphicon glyphicon-user form-control-feedback" style="color: #EB455F"></span>
            </div>

            <!-- Password -->
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
              <span class="glyphicon glyphicon-lock form-control-feedback" style="color: #EB455F"></span>
            </div>

         <div style="color: #ffffff;">
            <?= $captcha ?>
         </div>
     
         <!--  hitung angka -->
          <div class="form-group">
            <input type="text" class="form-control" name="jawaban" placeholder="Hitung angka diatas">
          </div> 

          <div class="row">
            <div class="col-xs-8" style="color: #ffffff;">
              <input type="checkbox" id="checkbox" > Show Password
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" style="color: #EB455F; background-color: #ffffff;">
                <div class="fa fa-sign-in" style="color: #EB455F"></div> Sign In
              </button>
            </div>
            <!-- /.col -->
          </div>

        </form>

        <!-- <a href="<?= base_url('index.php/home/register') ?>" class="text-center">Register a new membership</a> -->

      </div>
      <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- Sweet Alert -->
    <script src="<?= base_url('assets') ?>/bower_components/sweetalert/sweetalert.min.js"></script>
    <!-- jQuery 3 -->
    <script src="<?= base_url('assets') ?>/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?= base_url('assets') ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url('assets') ?>/plugins/iCheck/icheck.min.js"></script>

    <script>
      // Notifikasi
      const flashData = $('.flash-data').data('flashdata');
      if (flashData){
        swal({
          title: "Failed!",
          text: flashData,
          icon: "error",
        });
      }

      // Sow Password
      $(document).ready(function() {
        $('#checkbox').click(function() {
          if($(this).is(':checked')){
            $('#password').attr('type','text');
          } else {
            $('#password').attr('type','password');
          }
        });
      });
    </script>

  </body>
  <div class="footer-copyright text-center py-3" style="color: #ffffff;">.
    <a href="/"> </a>
  </div>

</html>
