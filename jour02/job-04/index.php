<?php

    function insert_student(int $grade_id, string $email, string $fullname, DateTime $birthdate, string $gender): void {
        $conn = new PDO("mysql:host=localhost;dbname=ip_official", "root" , "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("INSERT INTO student (grade_id, email, fullname, birthdate, gender) VALUES (:grade_id, :email, :fullname, :birthdate, :gender)");
        $stmt->bindValue(":grade_id", $grade_id);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":fullname", $fullname);
        $stmt->bindValue(":birthdate", $birthdate->format("Y-m-d"));
        $stmt->bindValue("gender", $gender);
        $stmt->execute();
    }

    $grade_id = isset($_GET["input-grade-id"]) ? $_GET["input-grade-id"] : '';
    $email = isset($_GET["input-email"]) ? $_GET["input-email"] : '';
    $fullname = isset($_GET["input-fullname"]) ? $_GET["input-fullname"] : '';
    $birthdate = isset($_GET["input-birthdate"]) ? $_GET["input-birthdate"] : '';
    $gender = isset($_GET["input-gender"]) ? $_GET["input-gender"] : '';

    $result = [];

    if ($grade_id !== '' && $email !== '' && $fullname !== '' && $birthdate !== '' && $gender !== '') {
        $result = insert_student($grade_id, $email, $fullname, new DateTime($birthdate), $gender);
    }

    echo "<form method='get'>"; 
    echo "<input type = 'text' name = 'input-grade-id' placeholder = 'grade_id'>";
    echo "<input type = 'text' name = 'input-email' placeholder = 'email'>";
    echo "<input type = 'text' name = 'input-fullname' placeholder = 'fullname'>";
    echo "<input type = 'text' name = 'input-birthdate' placeholder = 'birthdate'>";
    echo "<input type = 'text' name = 'input-gender' placeholder = 'gender'>";
    echo "<input type = 'submit' value = 'Submit'>";
    echo "</form>";
?>