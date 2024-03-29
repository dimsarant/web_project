
<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crowdsourcing System</title>
    <script src="/external/jquery-3.4.1.js"></script>
    <link href="/external/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/external/fontawesome/css/all.css">
    <link rel="stylesheet" href="/main/css/main.css">
</head>

<body>
    <div class="design">
        <div id="top-header">
            <p>Welcome to the crowdsourcing system!</p>
        </div>
        <div class="transparent-background">
          <div class="form-box" id="box-1">
              <i class="fa fa-users fa-5x" id="fa-users"></i>
              <ul class="entry-list">
                  <li>If you are a new member, you must Register first, else Log in to the system.</li>
                  <li>In order to Register, your password must contain at least 8 characters, one capital letter, one number and one symbol.</li>
              </ul>
          </div>
          <div class="form-box" id="box-2">
              <div class="button-box">
                  <div class="btn-group btn-group-justified">
                  <button type="button" class="btn btn-primary" onclick="login()" id="login_btn" >Log In</button>
                  <button type="button" class="btn btn-primary" onclick="register()" id="register_btn">Register</button>
                  </div>
              </div>
              <form id="login" class="input-group" name="login_form" action="/main/login.php" method="POST">
                  <div class="input-group">
                      <i class="fa fa-user fa-2x"></i>
                      <input id="username" type="text" class="form-control" name="username" placeholder="Username" >
                  </div>
                  <div class="input-group">
                      <i class="fa fa-lock fa-2x"></i>
                      <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <button id="btnLogin" type="submit" name="submit" class="btn btn-success btn-lg">Log in</button>
              </form>
              <form id="register" class="input-group" name="register_form" action="/main/register.php" method="POST" style="display: none">
                  <div class="input-group">
                      <i class="fa fa-user fa-2x"></i>
                      <input id="username" type="text" class="form-control" name="username" placeholder="Username">
                  </div>
                  <div class="input-group">
                      <i class="fa fa-lock fa-2x"></i>
                      <input id="password" type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <div class="input-group">
                      <i class="fa fa-envelope fa-2x"></i>
                      <input id="email" type="email" class="form-control" name="email" placeholder="Email" >
                  </div>
                  <div class="input-group">
                    <div id="argee"><input type="checkbox" name="agree" value="agree" /> <label for='agree'>Do you agree to upload your geolocation data?</label></div>
                  </div>
                  <button id="btnRegister" type="submit" name="submit" class="btn btn-success btn-lg">Register</button>
              </form>
          </div>
        </div>
    </div>

    <script src="/main/main.js"></script>
    <!--Show Error/Success Message (Register/Log In) | jQuery-->
    <script>
    //when the webpage is loaded
    jQuery(document).ready(function($){
      var $msg = "<?php echo $_SESSION['msg']?>";
      <?php unset($_SESSION['msg']);?>
      alert($msg);
    });
    </script>
</body>
</html>
