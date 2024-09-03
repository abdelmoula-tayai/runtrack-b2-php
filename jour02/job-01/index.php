<?php

    function find_all_student(): array {
        $conn = new PDO("mysql:host=localhost;dbname=ip_official", "root" , "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM student");
        $stmt->execute();
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $result;
    }

    $result = find_all_student();

    if (count($result) > 0) {
        echo "<table border = 1>";
        echo "<tr> <th>Id</th> <th>grade_id</th> <th>email</th> <th>fullname</th> <th>birthdate</th> <th>gender</th>";

        foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "<td>";
            echo "<td>" . $row["grade_id"] . "<td>";
            echo "<td>" . $row["email"] . "<td>";
            echo "<td>" . $row["fullname"] . "<td>";
            echo "<td>" . $row["birthdate"] . "<td>";
            echo "<td>" . $row["gender"] . "<td>";
        }
    }

?>