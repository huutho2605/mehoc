<title>Chỉnh sửa câu hỏi - mehoc.site</title>
<?php 
include '../config.php';
include('header.php'); 
if(!isset($_COOKIE['id_user'])){
    header('Location: /auth/login.php');
}

if(isset($_POST['change_quiz'])){
    $id_questio = $_POST['id_question'];
    $question = $_POST['question'];
    $question = str_replace("'" , "\'"  , $question);
    $answer_a = $_POST['answer_a'];
    $question_a = str_replace("'" , "\'"  , $question_a);
    $answer_b = $_POST['answer_b'];
    $question_b = str_replace("'" , "\'"  , $question_b);
    $answer_c = $_POST['answer_b'];
    $question_c = str_replace("'" , "\'"  , $question_c);
    $answer_d = $_POST['answer_d'];
    require_once('../config.php');
    $query = "UPDATE questions SET question='.$question.', answer_a='$answer_a', answer_b='$answer_b', answer_c='$answer_c', answer_d='$answer_d' WHERE id='.$id_question.'";
    if (mysqli_query($conn, $query)) {
        echo 'Thay đổi câu hỏi thành thành công.<br>';
        header('Location: '.$_SERVER['REQUEST_URI']);
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}

if(!isset($_GET['id'])){
    // echo '<form action="" method="POST" style="margin-top: 30px">MÃ CÂU HỎI: <input type="text" name="id" id="" ><input type="submit" value="TÌM KIẾM"></form>';
};
    $id_quiz = $_GET['id'];
    $sql = "SELECT * FROM quiz WHERE id='$id_quiz'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $question = $row['question'];
        $answer_a = $row['answer_a'];
        $answer_b = $row['answer_b'];
        $answer_c = $row['answer_b'];
        $answer_d = $row['answer_d'];
        $class = $row['class'];
        $subject = $row['subject'];
        $semester = $row['semester'];
        $answer = $row['answer'];
        $auther = $row["author"];
        $solution = $row['solution'];
    }
    mysqli_close($conn);
?>
<button onclick="window.location.href='add_quiz.php'">THÊM CÂU HỎI</button> <br>
<form action="" method="POST" style="margin-top: 30px">MÃ CÂU HỎI: <input type="text" name="id" id="" ><input type="submit" value="TÌM KIẾM"></form>
<form action="add_qs.php" method="POST" style="">
<div class="form-group">
    <label>CÂU HỎI:</label> <label for=""></label>
    <textarea name="question" cols="50" rows="3" required><?php echo $question; ?></textarea> <br> 
    <label>A</label> <br>
    <textarea name="answer_a" cols="50" rows="2" required><?php echo $answer_a; ?></textarea> <br>
    <label>B</label> <br>
    <textarea name="answer_b" cols="50" rows="2" required><?php echo $answer_b; ?></textarea> <br>
    <label>C</label> <br>
    <textarea name="answer_c" cols="50" rows="2" required><?php echo $answer_c; ?></textarea> <br>
    <label>D</label> <br>
    <textarea name="answer_d" cols="50" rows="2" required><?php echo $answer_d; ?></textarea> <br> <br>

<?php // $answer = array('a' => 'A', 'b' => 'B', 'c' => 'C', 'd' => 'D'); echo $answer['a']; ?>
<!--
<select class="form-control" name="answer" require>
    <option value="">Đáp án</option>
    <option value="A">A</option>
    <option value="B">B</option>
    <option value="C">C</option>
    <option value="D">D</option> 
</select> <br> <br>


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

<select name="semester" id="" value="<?php // echo $semester; ?>" required>
    <option value="">Học kỳ</option>
    <option value="semester_center_1">Giữa HK1</option>
    <option value="semester_1">HK1</option>
    <option value="semester_center_2" selected>Giữa HK2</option>
    <option value="semester_2">HK2</option>
</select> 

<br> <br>
    <label>Cách giải:</label> <br>
    <textarea name="solution" cols="50" rows="5"><?php  // echo $solution; ?></textarea> <br> <br> -->
    <input type="submit" value="Thay đổi" name="change_quiz">
</div> 
</form>
<?php include('../footer.php'); ?>