<?php 
if(isset($_POST['add_qs'])){
    $question = $_POST['question'];
    $answer_a = $_POST['answer_a'];
    $answer_b = $_POST['answer_b'];
    $answer_c = $_POST['answer_b'];
    $answer_d = $_POST['answer_d'];
    $answer = $_POST['answer'];
    $auther = $_COOKIE["id_user"];
    $solution = $POST['solution'];

    require_once('config.php');
    $query = "INSERT INTO questions (question, answer_a, answer_b, answer_c, answer_d, answer, author, verify, solution) VALUES ('$question', '$answer_a', '$answer_b', '$answer_c', '$answer_d', '$answer', '$auther', 'false', '$solution')";
    if (mysqli_query($conn, $query)) {
        echo 'Thêm record thành công<a href="#" onclick="history.go(-1)">Go Back</a>';
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
     
    // Ngắt kết nối
    mysqli_close($conn);
}
//////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['register'])){
    header('Location: register.php');
};

if(isset($_POST['onback'])){
    header("location:javascript://history.go(-1)");
};
//////////////////////////////////////////////////////////////////////////////////////
if(isset($_GET['logout'])){
    setcookie('id_user',$id_user, 0, "/");
    setcookie('username', $username, 0, "/");
    setcookie('fullname', $fullname, 0, "/");
    header('Location: /auth/login.php');
}
/////////////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['add_gopy'])){
    $gopy_content = $_POST["gopy_content"];
    $gopy_auther = $_COOKIE["id_user"];
    $gopy_auther_fullname = $_COOKIE['fullname'];
    require_once('config.php');
    $sql = "INSERT INTO gopy (gopy_content, gopy_auther, gopy_auther_fullname, status) VALUES ('$gopy_content', '$gopy_auther', '$gopy_auther_fullname', '0')";
    if(mysqli_query($conn, $sql)){
        header('location: gopy.php');
    } else {
        echo "Lỗi: ". $sql ."<br>". mysqli_error($conn);
    };
    mysqli_close($conn);
};

?>