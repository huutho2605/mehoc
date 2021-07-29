<title>GÓP Ý - mehoc.site</title>
<?php include('header.php'); 
if(!isset($_COOKIE['username'])){
    header('Location: login.php');
}

if(isset($_POST['report'])){
    $id_qs = $_GET['id'];
    $content_report = $_POST['content_report'];
    $author = $_COOKIE['id_user'];
    require_once('config.php');
    $query = "INSERT INTO report (id_qs, content_report, author) VALUES 
                                    ('$id_qs', '$content_report','$author')";
    if (mysqli_query($conn, $query)) {
        echo '<p style="color: #4CAF50">Thêm góp ý thành thành công.</p><br>';
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}


if(isset($_GET['id'])){
    $id_qs = $_GET['id'];
    $conn = mysqli_connect("localhost", "mehocxyz_root", "T26052k3h@", "mehocxyz_index");
    $query = "SELECT * FROM questions WHERE id='$id_qs'";
    $conn->set_charset("utf8");
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo '
        <a href="javascript:history.back()">Trở về trang trước...</a><br> <br>
        <b>CÂU HỎI: </b>'. $row['question'] .'</h4> <b><i>#'. $row['ID'] .'</i></b> <br> <br>
                <b>A. </b>'. $row['answer_a'] .' <br> 
                <b>B. </b>'. $row['answer_b'] .' <br>
                <b>C. </b>'. $row['answer_c'] .' <br> 
                <b>D. </b>'. $row['answer_d'] .' <br> <br>
            <b>ĐÁP ÁN:</b> '. $row['answer'] .' <br> <br>
            <b>LỜI GIẢI:</b> <br> <br>
            <form action="" method="post">
                <b>Góp ý của bạn: <i name="id_qs">#'.$_GET['id'].'</i></b> <br>
                <textarea name="content_report">'.$_POST['content_report'].'</textarea> <br> <br>
                <input type="submit" value="Thêm góp ý" name="report">
            </form>
        ';
        
};
};


include('footer.php'); ?>