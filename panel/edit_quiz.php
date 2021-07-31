<title>Thêm câu hỏi - mehoc.site</title>
<?php 
include('header.php'); 
if(!isset($_COOKIE['id_user'])){
    header('Location: /auth/login.php');
}

$question = '';
$answer_a = ''; 
$answer_b = '';
$answer_c = '';
$answer_d = '';
$solution = '';

if(isset($_POST['add_qs'])){
    $question = $_POST['question'];
    $question = str_replace("'" , "\'"  , $question);
    $answer_a = $_POST['answer_a'];
    $question_a = str_replace("'" , "\'"  , $question_a);
    $answer_b = $_POST['answer_b'];
    $question_b = str_replace("'" , "\'"  , $question_b);
    $answer_c = $_POST['answer_b'];
    $question_c = str_replace("'" , "\'"  , $question_c);
    $answer_d = $_POST['answer_d'];
    $question_d = str_replace("'" , "\'"  , $question_d);
    $class = $_POST['class'];
    $subject = $_POST['subject'];
    $semester = $_POST['semester'];
    $answer = $_POST['answer'];
    $answer = str_replace("'" , "\'"  , $answer);
    $auther = $_COOKIE["id_user"];
    $solution = $POST['solution'];
    require_once('config.php');
    $query = "INSERT INTO questions (question, answer_a, answer_b, answer_c, answer_d, answer, solution, author, verify, view , class, subject,semester) VALUES 
                                    ('$question', '$answer_a', '$answer_b', '$answer_c', '$answer_d', '$answer', '$solution', '$auther', 0, 0, '$class', '$subject', '$semester')";
    if (mysqli_query($conn, $query)) {
        echo 'Thêm câu hỏi thành thành công.<br>';
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
};
?>
<button onclick="window.location.href='add_quiz.php'">THÊM CÂU HỎI</button>
<form action="add_qs.php" method="POST">
<div class="form-group">
    <label>CÂU HỎI:</label> <br>
    <textarea name="question" cols="30" rows="3" required><?php echo $question; ?></textarea> <br> 
    <label>A</label> <br>
    <textarea name="answer_a" cols="30" rows="2" required><?php echo $answer_a; ?></textarea> <br>
    <label>B</label> <br>
    <textarea name="answer_b" cols="30" rows="2" required><?php echo $answer_b; ?></textarea> <br>
    <label>C</label> <br>
    <textarea name="answer_c" cols="30" rows="2" required><?php echo $answer_c; ?></textarea> <br>
    <label>D</label> <br>
    <textarea name="answer_d" cols="30" rows="2" required><?php echo $answer_d; ?></textarea> <br> <br>
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

<select name="semester" id="" required>
    <option value="">Học kỳ</option>
    <option value="semester_center_1">Giữa HK1</option>
    <option value="semester_1">HK1</option>
    <option value="semester_center_2">Giữa HK2</option>
    <option value="semester_2">HK2</option>
</select> 

<br> <br>
    <label>Cách giải:</label> <br>
    <textarea name="solution" cols="30" rows="5"><?php echo $solution; ?></textarea> <br> <br>
    <input type="submit" value="Thêm câu hỏi" name="add_qs">
</div>
</form>
<?php include('../footer.php'); ?>