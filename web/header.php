<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg" href="https://mehoc.site/icon/favicon.svg"/>
    <link rel='shortcut icon' type='image/x-icon' href='https://mehoc.site/icon/favicon.svg' />
    <script data-ad-client="ca-pub-4404769381980158" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KM5JTBXNYE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KM5JTBXNYE');
</script>
<?php if(isset($_COOKIE['username'])){
    echo 'Chào, '. $_COOKIE['username'].' | <a href="https://mehoc.site/">TRANG CHỦ</a> 
    | <a href="https://mehoc.site/doc.php">TÀI LIỆU</a> | <a href="https://mehoc.site/question.php">CÂU HỎI</a> 
    | <a href="https://mehoc.site/add_doc.php">Thêm tài liệu</a> | <a href="https://mehoc.site/add_qs.php">Thêm câu hỏi</a>
    | <a href="https://mehoc.site/profile.php">Tài khoản</a> | <a href="https://mehoc.site/process.php?logout">Đăng xuất<a> <br> <br>';
} else {
    echo '<div align="center"><a href="https://mehoc.site/login">ĐĂNG NHẬP</a> </div> <br <br>';
}; 
?>
<body>