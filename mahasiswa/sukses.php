<?php
  if(!isset($_SESSION))
  {
  session_start();
  }

  if( !isset($_SESSION['login']) )
  {
    header('location: login');
    exit();
  }  
?>
<!DOCTYPE html>
<html lang="en">
  <head>    
    <title>Sukses!</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="page-error">
            <h2><i class="fa fa-check" style="color: green;"></i> Sukses! Login</h2>
            <p>Meneruskan.....<span id="counter"> 2</span></p>            
          </div>          
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function countdown()
      {
          var i = document.getElementById('counter');
          if (parseInt(i.innerHTML)<=1) {
              location.href = './';
          }
          if (parseInt(i.innerHTML)!=1) {
              i.innerHTML = parseInt(i.innerHTML)-1;
          }
      }
      setInterval(function(){ countdown(); },1000);
    </script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></scrit>p            
  </body>
</html>