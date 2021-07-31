<?php 
if(!isset($_COOKIE['id_user'])){
    header('Location: /auth/login.php');
}
if($_COOKIE['permission'] !== '2'){
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
include 'header.php';
?>
<title>HỆ THÔNG QUẢN TRỊ - MeHoc.Site</title>
    <div align="center">
        <h1>Chào mừng bạn đến với hệ thống quản trị MÊ HỌC</h1>
        <button onclick="window.location.href='add_quiz.php'">Thêm câu hỏi.</button>
        <button onclick="window.location.href='edit_quiz.php'">Chỉnh sửa câu hỏi</button>
    </div>
<?php include '../footer.php'; ?>