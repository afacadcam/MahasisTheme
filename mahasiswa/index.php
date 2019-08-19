<!DOCTYPE html>
<html lang="en">
  <head>    
    <title>User - Pelayanan SPs</title>
    <meta name="description" content="Website sistem pelayanan mahasiswa Pascasarjana IPB.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">    
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../mahasiswa/assets/icons/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="../mahasiswa/assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../mahasiswa/assets/icons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../mahasiswa/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../mahasiswa/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="../mahasiswa/assets/icons/site.webmanifest">
    <link rel="mask-icon" href="../mahasiswa/assets/icons/safari-pinned-tab.svg" color="#5bbad5">
  </head>
  <body>
    <?php include 'header.php';?>
    <main class="app-content">      
      <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info">
            <img class='user-img' src='assets/images/user.png'>                   
              <span>Nama User</span>
            </div>
            <div class="cover-image">
              <figure></figure>
              <figure></figure>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-welcome" data-toggle="tab">Welcome</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-profil" data-toggle="tab">Status</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">

            <!-- TAB USER TIMELINE -->
            <div class="tab-pane active" id="user-welcome">
              <div class="timeline-post">
                <div class="post-media"><a href="#"><img src="assets/images/logo.png"></a>
                  <div class="content">
                    <h5><a href="#">SPs IPB</a></h5>
                    <p class="text-muted">
                      <small>                                             
                      </small>
                    </p>
                  </div>
                </div>
                <div class="post-content">
                  <p>Selamat datang di website pelayanan pascasarjana IPB. Website ini dapat saudara pergunakan untuk keperluan pengajuan surat keterangan aktif ataupun Tesis.</p>
                </div>
              </div>
            </div>
            <!-- /TAB USER TIMELINE -->

            <!-- TAB USER SETTINGS -->
            <div class="tab-pane fade" id="user-profil">
              <div class="tile user-settings">
                <h4 class="line-head">Status</h4>
                
                <div class="datamhs">
                  <ul class="datamhs">
                  
                    <li class="datamhs nilai"><a class="datamhs"><div class="profil">NIM</div><div class="titikdua">: </div><div class="isiprofil"><!-- nim --></div></a></li>
                    <li class="datamhs nilai"><a class="datamhs"><div class="profil">Strata</div><div class="titikdua">: </div><div class="isiprofil"><!-- echo strata==4 ? 'S3' : 'S2' --> </div></a></li>
                    <li class="datamhs nilai"><a class="datamhs"><div class="profil">Mayor</div><div class="titikdua">: </div><div class="isiprofil"><!-- kodeps (mayor) --> </div></a></li>
                    <li class="datamhs nilai"><a class="datamhs"><div class="profil">Jalur Masuk</div><div class="titikdua">: </div><div class="isiprofil"><!-- jalur --></div></a></li>
                    <li class="datamhs nilai"><a class="datamhs"><div class="profil">Status</div><div class="titikdua">: </div><div class="isiprofil"><!-- echo strata==4 ? status3 : status2 --> </div></a></li>
                  
                  </ul>
                </div>
                
              </div>
            </div>
            <!-- /TAB USER SETTINGS -->

          </div>
        </div>
      </div>
    </main>
    
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>    
    <!-- Tampilan loading garis diatas -->
    <script src="js/plugins/pace.min.js"></script>    
  </body>
</html>