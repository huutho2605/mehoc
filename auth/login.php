
<?php
if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $conn = mysqli_connect("14.168.73.24", "root", "mehoc@2020", "mehoc");
  $conn->set_charset("utf8");
  $sql = "SELECT * FROM account WHERE username='$username' and password='$password'";
  $conn->real_escape_string($sql);
  $result = mysqli_query($conn, $sql);
  $row = mysqli_num_rows($result);
  if ($row == 1) {
      while ($row1 = mysqli_fetch_array($result)) {
          $id_user = $row1['ID'];
          $fullname = $row1['last_name'] .' '. $row1['first_name'];
          setcookie('id_user', $id_user, time() + (86400 * 30), "/");
          setcookie('username', $username, time() + (86400 * 30), "/");
          setcookie('fullname', $fullname, time() + (86400 * 30), "/");
          header('Location: ../index.php');
      }
  } else {
      setcookie('error', $username, time() + 1, "/");
      header('Location: /login/');
  }
  mysqli_close($conn);
}

include('../header.php'); ?>
<title>ĐĂNG NHẬP - mehoc.site</title>
<?php 
if(isset($_COOKIE['error'])){
  echo '<div class="alert alert-danger" role="alert">
  Đăng nhập thất bại! Thông tin không chính xác, vui lòng thử lại.
</div>';
}
?>
<form align="center" action="index.php" method="POST">
  <img src="../icon/favicon.svg" width="72" height="72">
  <h1>ĐĂNG NHẬP</h1>
  <label>Tên tài khoản: </label>
  <input type="text" placeholder="Điền tên đăng nhập của bạn..." name="username"> <br> <br>
  <label>Mật khẩu: </label>
  <input type="password" placeholder="Điền mật khẩu của bạn..." name="password"> <br> <br>
  <input type="submit" name="login" value="ĐĂNG NHẬP"> <input type="button" onclick="window.location.href='/auth/register.php'" value="ĐĂNG KÝ"> <input type="button" onclick="window.location.href='/auth/resetpassword.php'" value="QUÊN MẬT KHẨU">
</form>

<?php include('../footer.php'); ?>