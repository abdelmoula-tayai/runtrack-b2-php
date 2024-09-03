<?php
function find_ordered_students(): array {
    $conn = new PDO("mysql:host=localhost;dbname=ip_official", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("
        SELECT student.fullname, student.birthdate, student.email, grade.name as grade_name
        FROM student
        JOIN grade ON student.grade_id = grade.id
        ORDER BY grade.name ASC, student.fullname ASC
    ");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

$result = find_ordered_students();

$groupedByGrade = [];
foreach ($result as $row) {
    $groupedByGrade[$row['grade_name']][] = $row;
}

if (count($groupedByGrade) > 0) {
    foreach ($groupedByGrade as $grade => $students) {
        echo "<h2>" . htmlspecialchars($grade) . "</h2>";
        echo "<table border='1'>";
        echo "<tr> <th>Fullname</th> <th>Birthdate</th> <th>Email</th> </tr>";

        foreach ($students as $student) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($student["fullname"]) . "</td>";
            echo "<td>" . htmlspecialchars($student["birthdate"]) . "</td>";
            echo "<td>" . htmlspecialchars($student["email"]) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    }
}
?>