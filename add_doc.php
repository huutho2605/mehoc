<title>Thêm tài liệu - mehoc.site</title>
<?php 
if(!isset($_COOKIE['id_user'])){
    header('Location: https://mehoc.site/login');
}
include('header.php'); 

$_POST['title_doc'] = '';

if(isset($_POST['upload_file'])){
    if (!isset($_FILES["file_upload"])){
      echo "Dữ liệu không đúng cấu trúc";
      die;}

  // Kiểm tra dữ liệu có bị lỗi không
    if ($_FILES["file_upload"]['error'] != 0){
        echo "Dữ liệu upload bị lỗi";
    die;}
    require_once('config.php');
    $target_file = $target_dir . basename($_FILES["file_upload"]["name"]);
    $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $file_name = $_POST['title_doc'];
    $size = $_FILES["file_upload"]["size"];
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $semester = $_POST['semester'];
    $school = $_POST['school'];
    $author = $_COOKIE['id_user'];
    $sql = "INSERT INTO files (name, size, type, author, download, view, class, subject, semester, school) VALUES ('$file_name','$size', '$FileType', '$author', 0, 0, '$class', '$subject', '$semester', '$school')";
    if (mysqli_query($conn, $sql)) {
        $last_id = mysqli_insert_id($conn);
        echo "Thêm thành công. File của bạn có id là " . $last_id;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    };
    mysqli_close($conn);
    move_uploaded_file($_FILES['file_upload']['tmp_name'], 'uploads/'. $last_id.'.'.$FileType);
};
?>


<form action="" method="post" enctype="multipart/form-data">
<label for="">Tiêu đề: </label> <br>
<textarea name="title_doc" cols="50" require><?php echo $_POST['title_doc']; ?></textarea> <br> <br>
<input type="file" name="file_upload" id=""> <br> <br>

<select name="class" id="" required>
    <option value="">Tên lớp</option>
    <option value="1">Lớp 1</option>
    <option value="2">Lớp 2</option>
    <option value="3">Lớp 3</option>
    <option value="4">Lớp 4</option>
    <option value="5">Lớp 5</option>
    <option value="6">Lớp 6</option>
    <option value="7">Lớp 7</option>
    <option value="8">Lớp 8</option>
    <option value="9">Lớp 9</option>
    <option value="10">Lớp 10</option>
    <option value="11">Lớp 11</option>
    <option value="12">Lớp 12</option>
</select> 

<select name="subject" id="" required>
    <option value="">Môn học</option>
    <option value="maths">Toán học</option>
    <option value="algebra">Toán số</option>
    <option value="geometry">Toán hình</option>
    <option value="physics">Vật lý</option>
    <option value="chemistry">Hóa học</option>
    <option value="biology">Sinh học</option>
    <option value="history">Lịch sử</option>
    <option value="geography">Địa lý</option>
    <option value="civic_edu">GDCD</option>
    <option value="english">Tiếng anh</option>
    <option value="literature">Ngữ văn</option>
    <option value="info_tech">Tin học</option>
</select> 

<select name="semester" id="" required>
    <option value="">Học kỳ</option>
    <option value="semester_center_1">Giữa HK1</option>
    <option value="semester_1">HK1</option>
    <option value="semester_center_2">Giữa HK2</option>
    <option value="semester_2">HK2</option>
</select> <br> <br>

<label for="" style="text-align: center">Trường:</label>
<input type="text" name="school" id="">

<br> <br>
<input type="submit" value="upload_file" name="upload_file">

</form>


<?php include('footer.php'); ?>