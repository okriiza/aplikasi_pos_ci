<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Log in</title>
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?= base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/AdminLTE.min.css">
   <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- <script>
   function myFunction() {
      alert("Login Berhasil");
   }
</script> -->

<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href="<?= base_url('auth/login') ?>"><b>Admin</b>Ku</a>
      </div>
      <div class="login-box-body">
         <p class="login-box-msg">Sign in to start your session</p>
         <form action="<?= site_url('auth/process') ?>" method="post">
            <div class="form-group has-feedback">
               <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
               <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
               <input type="password" name="password" class="form-control" placeholder="Password" required>
               <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
               <div class="col-xs-8"></div>
               <div class="col-xs-4">
                  <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  <!-- onclick="myFunction()" -->
               </div>
            </div>
         </form>
      </div>
   </div>

   <!-- <script src="<?= base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
   <script src="<?= base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
   <script>
      $(function() {
         $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
         });
      });
   </script>
</body>

</html>