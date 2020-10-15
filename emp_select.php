<?php 
    $link = mysqli_connect("localhost", "admin", "admin", "employees");
    $query = "SELECT * FROM employees ORDER BY emp_no DESC LIMIT 10";
    $result = mysqli_query($link, $query);

    // print_r($result); // 잘 가지고 오는지 확인

    // $row = mysqli_fetch_array($result);

    // print_r($row); // $row 어떻게 나오나 확인

    $number_of_rows_query = "SELECT COUNT(*) AS total_count FROM employees";
    $number_of_rows_result = mysqli_query($link, $number_of_rows_query);
    $total_number_of_rows = (int)(mysqli_fetch_array($number_of_rows_result)['total_count']);
    $number_of_rows_per_page = 10;
    $total_number_of_pages = (int)($total_number_of_rows / $number_of_rows_per_page);

    if ($total_number_of_rows > $number_of_rows_per_page * $total_number_of_pages) {
        $total_number_of_pages += 1;
    }

    $current_page_number = 1;
    $start_row = ($current_page_number - 1) * $number_of_rows_per_page + 1;
    $end_row = $current_page_number * $number_of_rows_per_page;

    // print_r($total_number_of_pages);

    // print_r(mysqli_fetch_array($number_of_rows_result)['total_count']);

    $emp_info = '';

    while($row = mysqli_fetch_array($result)) {
        $emp_info .= '<tr>';
        $emp_info .= '<td>'.$row['emp_no'].'</td>';
        $emp_info .= '<td>'.$row['birth_date'].'</td>';
        $emp_info .= '<td>'.$row['first_name'].'</td>';
        $emp_info .= '<td>'.$row['last_name'].'</td>';
        $emp_info .= '<td>'.$row['gender'].'</td>';
        $emp_info .= '<td>'.$row['hire_date'].'</td>';
        $emp_info .= '<td><a href="emp_update.php?emp_no='.$row['emp_no'].'">update</a></td>';
        $emp_info .= '<td><a href="emp_delete.php?emp_no='.$row['emp_no'].'">delete</a></td>';
        $emp_info .= '</tr>';
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>직원 관리 시스템</title>
    </head>

    <body>
        <h2><a href="index.php">직원 관리 시스템</a> | 직원 정보 조회</h2>

        <table border="1">
            <tr>
                <th>emp_no</th>
                <th>birth_date</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>gender</th>
                <th>hire_date</th>
                <th>udpate</th>
                <th>delete</th>
            </tr>
            <?=$emp_info?>
        </table>
    </body>
</html>