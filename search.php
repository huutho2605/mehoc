<?php
if(isset($_GET['submit'])){
    header('Location: webhp.php');
}
$search = $_GET['q'];
echo '
<h1>MÊ HỌC</h1><form action="search.php" method="get">
<input type="text" name="q" value="'.$search.'">
<input type="submit" value="Tìm kiếm">
</form>';
// echo $search;
include('config.php');
$sql = "SELECT * FROM quiz WHERE question LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result))
{
    echo '
        <b>Câu hỏi: </b>'. $row['question'] .'</h4> <b><i>#'. $row['ID'] .'</i></b> <br> 
            <b>A. </b>'. $row['answer_a'] .' <br> 
            <b>B. </b>'. $row['answer_b'] .' <br>
            <b>C. </b>'. $row['answer_c'] .' <br> 
            <b>D. </b>'. $row['answer_d'] .' <br> 
        <a href="quiz?id='.$row['ID'].'" class="btn btn-primary">Tiếp tục...</a> <br> <br>
      </div>
    </div>';
}

?>
