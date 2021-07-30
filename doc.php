<?php include('header.php');
    
if(isset($_GET['id'])){
    $file_id = $_GET['id'];
    require_once('config.php');
    $sql = "SELECT * FROM files WHERE id='$file_id'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $file_id = $row['ID'];
        $file_name = $row['name'];
        $file_size = $row['size'];
        $file_type = $row['type'];
        $file_author = $row['author'];
        $file_view = $row['view'];
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
        $dated = $row['dated']; $dated = strtotime($dated); $dated = date("d/m/Y H:i:s", $dated);
        echo '  <h1><b>Lớp '.$row['class'].' - '.$semester.' - '.$subject.' - '.$row['name'].' - '.$row['type'].' - '.$dated.'</b><b> <i>#'. $row['ID'] .'</i></b> <br> </h1>
                <title>'.$file_name.' - mehoc.site</title>
                <div align="center"><iframe src="uploads/'.$file_id.'.pdf" width="100%" height="500"></iframe></div> <br>
                <b>Mã tài liệu:</b> '.$file_id .' <br>
                <b>Tên tài liệu:</b> '.$file_name.' <br>
                <b>Lớp:</b> '.$row['class'].' <br>
                <b>Môn học:</b> '.$subject.' <br>
                <b>Học kỳ:</b> '.$semester.' <br>
                <b>Kích thước:</b> '.$file_size.' <br>
                <b>Loại:</b> '.$file_type.' <br>
                <b>Người đăng:</b> '.$file_author.' <br>
                <b>Lượt xem:</b> '.$file_view.' <br> <br>
                <a href="uploads/'.$file_id.'.pdf">Xem online</a> <br> <br>
                <a href="uploads/'.$file_id.'.pdf" download>Tải xuống</a>
                ';
        $count_view = $row['view']+1;
        $query2 = "UPDATE files SET view='$count_view' WHERE id='$file_id'";
        if (mysqli_query($conn, $query2)) {
        } else {
            echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
        };
        mysqli_close($conn);
    };
} else {
    echo '<br> <br>';
    require_once('config.php');
    $query = "SELECT * FROM files ORDER BY ID DESC";
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
        $dated = $row['dated']; $dated = strtotime($dated); $dated = date("d/m/Y H:i:s", $dated);
        echo '
        <title>TÀI LIỆU - mehoc.site</title>
        <b>[Lớp '.$row['class'].'] - ['.$semester.'] - ['.$subject.'] - '.$row['name'].' - ['.$row['type'].'] - ['.$dated.']</b><b> <i>#'. $row['ID'] .'</i></b> <br> 
        <a href="?id='.$row['ID'].'" class="btn btn-primary">Tiếp tục...</a> <br> <br>
      </div>
    </div>';
    };
};

include('footer.php'); ?>