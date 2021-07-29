<?php include('header.php');
if(isset($_GET['id'])){
    $id_question = $_GET['id'];
    $conn = mysqli_connect("localhost", "root", "mehoc@2020", "mehoc");
    $query = "SELECT * FROM questions WHERE id='$id_question'";
    $conn->set_charset("utf8");
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        switch ($row['subject']) {
            case 'maths':
                    $subject = "Toán học";
                break;
            case 'algebra':
                    $subject = "Toán số";
                break;
            case 'geometry':
                    $subject = "Toán hình";
                break;
            case 'physics':
                    $subject = "Vật lý";
                break;
            case 'chemistry':
                    $subject = "Hóa học";
                break;
            case 'biology':
                    $subject = "Sinh học";
                break;
            case 'history':
                    $subject = "Lịch sử";
                break;
            case 'geography':
                    $subject = "Địa lý";
                break;
            case 'civic_edu':
                    $subject = "GDCD";
                break;
            case 'english':
                    $subject = "Tiếng anh";
                break;
            case 'literature':
                    $subject = "Ngữ văn";
                break;
            case 'info_tech':
                    $subject = "Tin học";
                break;
            default:
                    $subject = "Chưa phân loại";
                break;
        }
        switch ($row['semester']) {
            case 'semester_center_1':
                    $semester = "Giữa HK1";
                break;
            case 'semester_1':
                    $semester = "HK1";
                break;
            case 'semester_center_2':
                    $semester = "Giữa HK2";
                break;
            case 'semester_2':
                    $semester = "HK2";
                break;
            default:
                    $semester = "Loand...";
                break;
        }
        // $dated = $row['dated']; $dated = strtotime($dated); $dated = date("d/m/Y H:i:s", $dated);
        echo '
            <title>'. $row['question'] .' - mehoc.site</title>
            <a href="/">Trang chủ</a><br> <br>
            <b>CÂU HỎI: </b>'. $row['question'] .'</h4> <b><i>#'. $row['ID'] .'</i></b> <br> <br>
                <b>A. </b>'. $row['answer_a'] .' <br> 
                <b>B. </b>'. $row['answer_b'] .' <br>
                <b>C. </b>'. $row['answer_c'] .' <br> 
                <b>D. </b>'. $row['answer_d'] .' <br> <br>
            <b>ĐÁP ÁN:</b> '. $row['answer'] .' <br> <br>
            <b>LỜI GIẢI:</b> <br> <br>
            <b>Mã câu hỏi: </b>'. $row['ID'] .'<br>
            <b>Lớp:</b> '.$row['class'].' <br>
            <b>Môn học:</b> '.$subject.' <br>
            <b>Học kỳ:</b> '.$semester.' <br>
            <b>Thời gian: </b>'. $row['dated'] .'<br>
            <b>Lượt xem: </b>'. $row['view'] .' <br> <br>
            <a href="report.php?id='.$id_question.'">Câu hỏi có vấn đề...</a> <br> <br>'; 
        $count_view = $row['view']+1;
        $query2 = "UPDATE questions SET view='$count_view' WHERE id='$id_question'";
        if (mysqli_query($conn, $query2)) {
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        }
        echo '<b>BÌNH LUẬN:</b> <br>';

        $id_qs = $_GET['id'];
        $query = "SELECT author, content_report, date FROM report where id_qs like '%$id_qs%' ORDER BY date DESC";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {

            $id_user = $row['author'];
            $query1 = "SELECT last_name, first_name FROM account WHERE ID='$id_user'";
            $conn->set_charset("utf8");
            $result1 = mysqli_query($conn, $query1);
            while ($row1 = mysqli_fetch_array($result1)) {$fullname = $row1['last_name']. ' '. $row1['first_name'];};

            echo '* <b><a href="person.php?id='.$row['author'].'">'. $fullname .'</a></b> - <i>'.$row['date'].'</i> <b>| </b>'.$row['content_report'].'<br>';
        };
        mysqli_close($conn);
    }
    if(empty($_COOKIE['username'])){ echo '<br> <br><a href="login.php">Tham gia góp câu hỏi ^^</a>'; };

    include('footer.php');
} else {
    $conn = mysqli_connect("localhost", "root", "T26052k3h@", "mehoc");
    $query = "SELECT ID,question,answer_a,answer_b,answer_c,answer_d FROM questions ORDER BY ID DESC";
    $conn->set_charset("utf8");
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        echo '
        <title>HỎI ĐÁP - mehoc.site</title>
        <b>Câu hỏi: </b>'. $row['question'] .'</h4> <b><i>#'. $row['ID'] .'</i></b> <br> 
            <b>A. </b>'. $row['answer_a'] .' <br> 
            <b>B. </b>'. $row['answer_b'] .' <br>
            <b>C. </b>'. $row['answer_c'] .' <br> 
            <b>D. </b>'. $row['answer_d'] .' <br> 
        <a href="?id='.$row['ID'].'" class="btn btn-primary">Tiếp tục...</a> <br> <br>
      </div>
    </div>';
      }
      include('footer.php');
}
?>