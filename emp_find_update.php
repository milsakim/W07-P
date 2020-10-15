<?php 
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
    $filtered_id = mysqli_real_escape_string($link, $_POST['emp_no']);

    // print_r($filtered_id);

    $query = "SELECT * FROM employees WHERE emp_no={$filtered_id}";
    $result = mysqli_query($link, $query);

    // print_r($result);

    $row = mysqli_fetch_array($result);

    if ($row == false) {
        echo "존재하지 않는 직원 번호입니다. <a href=index.php>돌아가기</a>";
    }
    else {
        header("Location:emp_update.php?emp_no={$filtered_id}");
    }
?>