<title>THÔNG TIN CỦA TÔI - mehoc.xyz</title>
<?php include('header.php');

if(!isset($_COOKIE['username'])){
    header('Location: /auth/login.php');
}
    $id_user = $_COOKIE['id_user'];
    require_once('config.php');
    $sql = "SELECT * FROM account WHERE id='$id_user'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $full_name = $row['last_name'] .' '. $row['first_name']; 
        $username = $row['username'];
        $birthday = $row['birthday'];
        $birthday = strtotime( $birthday );
        $birthday = date("d/m/Y", $birthday);
        $email = $row['email'];
        $registered = $row['registered']; $registered = strtotime($registered); $registered = date("d/m/Y H:i:s", $registered);
        $sex = $row['sex'];
        switch ($sex) {
            case 'male':
                $sex = "Nam";
                $avt = "male.svg";
                break;
            
            case 'female':
                $sex = "Nữ";
                $avt = "female.svg";
                break;
        }
        echo '
            <div align="center" style="margin-top: 30px">
                <img src="'.$domain_storage.'/icons/'.$avt.'"> <br>
                <b>ID: </b> '.$id_user.' <br>
                <b>Username: </b> '.$username.'<br>
                <b>Họ và tên: </b> '.$full_name.'<br>
                <b>Sinh nhật: </b> '.$birthday.'<br>
                <b>Giới tính: </b> '.$sex.'<br>
                <b>Email:</b> </b> '.$email.'<br>
                <b>Ngày đăng kí tài khoảng: </b> '.$registered.'
            </div>
        ';
    };
    mysqli_close($conn);
?>

<?php include('footer.php') ?>
