<?php 
include("header.php");
include "config.php";

$sql_quiz = "SELECT * FROM quiz";
$result = mysqli_query($conn, $sql_quiz);
if (mysqli_num_rows($result) > 0) 
{
    $count_quiz = mysqli_num_rows($result);
};

$sql_account = "SELECT * FROM account";
$result_account = mysqli_query($conn, $sql_account);
if (mysqli_num_rows($result_account) > 0) 
{
    $count_account = mysqli_num_rows($result_account);
};

?>
    <meta name="description" content="Mê Học - Mang tri thức đến kế bên bạn.">
    <meta name="author" content="Nguyễn Hữu Thọ (AI Tyno) + JustPhuoc">
    <title>MÊ HỌC - MeHoc.Site</title>
    <div align="center">
    <h1>MÊ HỌC</h1>
    <p><i>Mang tri thức đến kế bên bạn.</i></p>
    <br>
    <h4>Chào, mình là Tyno</h4>
    <h3>Chào mừng bạn đến với Mê Học</h3>
    <p>Giao diện website hơi đơn giản, đừng chê mình nhé ^^</p>
    <button onclick="window.location.href='webhp.php'">TÌM KIẾM CÂU HỎI</button>
    <!-- <button onclick="window.location.href=''">TÀI LIỆU</button> -->
    <h4> Số nguời dùng: <?php echo $count_account; ?> | Số câu hỏi: <?php echo $count_quiz; ?> | Số tài liệu: 13 </h4>
       
    </div>
<?php include('footer.php') ?>