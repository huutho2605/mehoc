<?php 
include '../config.php';
if(!isset($_COOKIE['id_user'])){
    header('Location: /auth/login.php');
};

// if(isset($_POST['change_quiz'])){
//     $id_questio = $_POST['id_question'];
//     $question = $_POST['question'];
//     $question = str_replace("'" , "\'"  , $question);
//     $answer_a = $_POST['answer_a'];
//     $question_a = str_replace("'" , "\'"  , $question_a);
//     $answer_b = $_POST['answer_b'];
//     $question_b = str_replace("'" , "\'"  , $question_b);
//     $answer_c = $_POST['answer_b'];
//     $question_c = str_replace("'" , "\'"  , $question_c);
//     $answer_d = $_POST['answer_d'];
//     $query = "UPDATE questions SET question='.$question.', answer_a='$answer_a', answer_b='$answer_b', 
//     answer_c='$answer_c', answer_d='$answer_d' WHERE id='.$id_question.'";
//     if (mysqli_query($conn, $query)) {
//         echo 'Thay đổi câu hỏi thành thành công.<br>';
//         header('Location: '.$_SERVER['REQUEST_URI']);
//     } else {
//         echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
//     };
//     mysqli_close($conn);
// }

if(isset($_GET['id']))
{
    echo '<form action="" method="POST" style="margin-top: 30px">MÃ CÂU HỎI: <input type="text" name="id" id="" ><input type="submit" value="TÌM KIẾM"></form>';
} 
else {
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
<title>Chỉnh sửa câu hỏi - mehoc.site</title>
<?php include('../footer.php'); ?>