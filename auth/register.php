<?php 
include('../header.php'); 
include('../config.php');
?>
<title>ĐĂNG KÝ - mehoc.site</title>
<?php
if(isset($_POST['onback'])){
  header("location: index.php");
};

if(isset($_POST['register'])){
  $secret_key = '6LeSms8bAAAAABbJ3EFQRhS2xC89V--kfskCg8Y3';
  $response = $_POST['g-recaptcha-response'];
  $userIP = $_SERVER['REMOTE_ADDR'];
  $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response&remoteip=$userIP";
  $responsecheck = file_get_contents($url);
  $responsecheck = json_decode($responsecheck);
  if($responsecheck->success){} else {echo "<p class='text-danger text-center'><b>Hãy xác nhận bạn không phải là robot!</b></p>";};
  
  $lastname = $_POST["lastname"];
  $firstname = $_POST["firstname"];
  $sex = $_POST["sex"];
  $email = $_POST["email"];
  $phone = $_POST["phone"];
  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  require_once('config.php');
  $sql = "SELECT * FROM account WHERE username = '$username' OR email = '$email'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0){
      echo '<script language="javascript">alert("Email hoặc tên đăng nhập đã có trên hệ thống, đã có tài khoản? vui lòng đăng nhập ở trang chủ!"); window.location="register.php";</script>';
      die ();
    } else {
      require_once('config.php');
      $sql = "INSERT INTO account (last_name, first_name, sex, email, phone, username, password) 
                VALUES ('$lastname', '$firstname', '$sex','$email', '$phone', '$username', '$password')";
      if(mysqli_query($conn, $sql)){echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="/login.php";</script>';};
    };
};
    
?>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"async defer></script>
<form action="register.php" method="post" align="center">
        <img src="<?php echo $domain_storage; ?>/icon/favicon.svg" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">ĐĂNG KÝ</h1>
        <label for="acccount">Họ:</label>
        <input type="text" id="" class="form-control" placeholder="Họ của bạn..." name="lastname" require> <br> <br>
        <label for="acccount">Tên:</label>
        <input type="text" id="" class="form-control" placeholder="Tên của bạn..." name="firstname" require> <br> <br>
        <label>Giới tính:</label> 
        <select class="form-control" name="sex">
          <option value="male">Nam</option>
          <option value="female">Nữ</option>
        </select> <br> <br>
        <label for="acccount">Email:</label>
        <input type="email" id="" class="form-control" placeholder="Điền email của bạn..." name="email" require> <br> <br>
        <label for="acccount">Số điện thoại:</label>
        <input type="text" id="" class="form-control" placeholder="Điền số điện thoại của bạn..." name="phone" require> <br> <br>
        <label for="acccount">Tên đăng nhập:</label>
        <input type="text" id="" class="form-control" placeholder="Điền tên đăng nhập của bạn..." name="username" require> <br> <br>
        <label for="inputPassword">Mật khẩu:</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mật khẩu của bạn..." name="password" require> <br> <br>
      <div class="g-recaptcha" data-sitekey="6LeSms8bAAAAAPB6hHIDoHsCvA4zi3dNqRP_408I" align="center"></div> <br>
      <input type="button" onclick="window.location.href='/'" value="TRANG CHỦ"/> <input type="submit" name="login" value="ĐĂNG NHẬP"> <input type="submit" name="register" value="ĐĂNG KÝ"/> 
    </form>
<?php include('../footer.php'); ?>