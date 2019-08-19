<?php  
  if(!isset($_SESSION))
  {
  session_start();
  }

  if ( isset($_SESSION['login']) )
  {
    header('location: ./');
    exit();
  }  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login - Mahasiswa</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->    
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="assets/icons/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/icons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/icons/site.webmanifest">
    <link rel="mask-icon" href="assets/icons/safari-pinned-tab.svg" color="#5bbad5">
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h2>Pelayanan Online Mahasiswa Sekolah Pascasarjana</h2>
        <img src="assets/images/ipb.svg">
      </div>
      <div class="login-box">
        <form class="login-form" action="function/authenticate" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>&nbsp;SignIn</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input id="username" name="username" class="form-control form-control-lg" type="text" placeholder="ID-User IPB" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input id="password" name="password" class="form-control form-control-lg" type="password" placeholder="Kata Sandi">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox"><span class="label-text">Tetap masuk</span>
                </label>
              </div>
              <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Gagal Masuk ?</a></p>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="login" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>MASUK</button>
          </div>
        </form>
        <form class="forget-form" action="#">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Tidak dapat masuk ?</h3>
          <div class="form-group">
            <label class="control-label">Silahkan menghubungi DSITD untuk memastikan bahwa userid IPB anda tidak bermasalah </label>
          </div>
          <div><p><br></p></div>
          <div class="form-group btn-container">
            <a href="" data-toggle="flip" style="text-decoration: none;">
              <button class="btn btn-primary btn-block"><i class="fa fa-chevron-left fa-lg fa-fw"></i>Kembali ke Login</button>
            </a>
          </div>          
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>