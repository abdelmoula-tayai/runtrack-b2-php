<?php

    function find_all_student(): array {
        $conn = new PDO("mysql:host=localhost;dbname=ip_official", "root" , "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("
            SELECT student.email, student.fullname, grade.name as grade_name
            FROM student
            JOIN grade ON student.grade_id = grade.id");
        $stmt->execute();
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    $result = find_all_student();

    if (count($result) > 0) {
        echo "<table border = 1>";
        echo "<tr>  <th>email</th> <th>fullname</th> <th>grade</th>", "</tr>";

        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["fullname"] . "</td>";
            echo "<td>" . $row["grade_name"] . "</td>";
            echo "</tr>";
        }
    }

?>