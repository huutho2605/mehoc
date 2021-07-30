<?php 
include 'header.php';
include 'config.php';

if(isset($_COOKIE['status']))
{
    echo '<p align="center" style="color: green"><b>Góp ý thành công. Tyno xin chân thành cảm ơn bạn rất nhiều <3</b></p>';
};

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $text_feed_back = $_POST['text_feed_back'];
    $sql = "INSERT INTO feedback (text_feed_back, status) VALUES ('$text_feed_back', 'true')";
    if (mysqli_query($conn, $sql)) {
        setcookie("status", "true", time() + 1, "/");
        header('Location: '.$_SERVER['REQUEST_URI']);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    };
} 
?>
<title>Góp ý - MeHoc.Site</title>
<form action="" method="post" align="center" style="margin-top: 30px">
    <label for="">Nội dung góp ý.</label> <br>
    <textarea name="text_feed_back" id="" cols="30" rows="10" required></textarea> <br>
    <input type="submit" value="GỬI">
</form>