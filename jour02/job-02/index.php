<?php

    function find_one_student(string $email): array {
        $conn = new PDO("mysql:host=localhost;dbname=ip_official", "root" , "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM student WHERE email = :email");
        $stmt->bindValue(":email", $email);
        $stmt->execute();   
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    

    $email = isset($_GET["input-email-student"]) ? $_GET["input-email-student"] : '';

    $result = [];
    if ($email !== '') {
        $result = find_one_student($email);
    }

    echo "<form method='get'>";
    echo "<input type = 'text' name = 'input-email-student' placeholder = 'Enter email'>";
    echo "<input type = 'submit' value = 'Submit'>";
    echo "</form>";

    if (count($result) > 0) {
        echo "<table border = 1>";
        echo "<tr> <th>Id</th> <th>grade_id</th> <th>email</th> <th>fullname</th> <th>birthdate</th>";
        echo "<tr>"; 
        echo "<td>" . $result["id"] . "<td>";
        echo "<td>" . $result["grade_id"] . "<td>";
        echo "<td>" . $result["email"] . "<td>";
        echo "<td>" . $result["fullname"] . "<td>";
        echo "<td>" . $result["birthdate"] . "<td>";
        echo "<td>" . $result["gender"] . "<td>";
        echo '</tr>';
        
    }

        
?>