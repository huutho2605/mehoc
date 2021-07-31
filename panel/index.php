<?php 
if(!isset($_COOKIE['id_user'])){
    header('Location: /auth/login.php');
}
?>

<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div align="center">
        <h1>Chào mừng bạn đến với hệ thống quản trị MÊ HỌC</h1>
        <button onclick="window.location.href='add_quiz.php'">Thêm câu hỏi.</button>
        <button onclick="window.location.href='edit_quiz.php'">Chỉnh sửa câu hỏi</button>
    </div>
</body>
</html>