<?php 
if(isset($_POST['CHANGE_FILE'])){
    if (!isset($_FILES["file_upload"])){
        echo "Dữ liệu không đúng cấu trúc";
        die;}
    if ($_FILES["file_upload"]['error'] != 0){
    echo "Dữ liệu upload bị lỗi";
    die;}

    $title = $_POST['id'];
    $target_file   = $target_dir . basename($_FILES["file_upload"]["name"]);
    $FileType = pathinfo($target_file,PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['file_upload']['tmp_name'], 'uploads/'. $title.'.'.$FileType);
    echo "Thay đổi thành công. File của bạn có id là " . $title;
};
?>

<form action="changefile.php" method="post">
    <label for="">Tên file</label> <br>
    <input type="text" name="id" id=""> <br>
    <input type="file" id="file_upload" name="file_upload"> <br>
    <input type="submit" value="OK" name="CHANGE_FILE">
</form>