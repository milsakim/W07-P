<?php 
    $link = mysqli_connect('localhost', 'admin', 'admin', 'employees');
    $query = "SELECT emp_no FROM employees ORDER BY emp_no DESC LIMIT 1";
    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);
    // print_r($row);
    // print_r(gettype($row['emp_no']));

    $new_emp_no = strval((int)$row['emp_no'] + 1);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>직원 관리 시스템</title>
    </head>

    <body>
        <h2><a href="index.php">직원 관리 시스템</a> | 신규 직원 등록</h2>
        <form action="emp_insert_process.php" method="POST">
            <label>emp_no: </label>
            <input type="text" name="emp_no" placeholder="emp_no" value="<?=$new_emp_no?>" readonly><br>
            <label>birth_date(0000-00-00): </label>
            <input type="date" name="birth_date" placeholder="birth_date"><br>
            <label>first_name: </label>
            <input type="text" name="first_name" placeholder="first_name"><br>
            <label>last_name: </label>
            <input type="text" name="last_name" placeholder="last_name"><br>
            <label>gender(M or F): </label>
            <!-- <input type="text" name="gender" placeholder="gender"><br> -->
            <select name='gender'>
                <option value="F">Female</option>
                <option value="M">Male</option>
            </select> <br>
            <label>hire_date(0000-00-00): </label>
            <input type="date" name="hire_date" placeholder="hire_date"><br>
            <input type="submit" value="Create">
        </form>
    </body>
</html>