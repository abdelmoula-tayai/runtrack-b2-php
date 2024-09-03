<?php
function find_full_rooms() : array {

    try {
       
        $pdo = new PDO('mysql:host=localhost;dbname=ip_official', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "
            SELECT 
                r.name AS name, 
                r.capacity AS capacity, 
                COUNT(s.id) AS students_count
            FROM room r
            LEFT JOIN grade g ON r.id = g.room_id
            LEFT JOIN student s ON g.id = s.grade_id
            GROUP BY r.id
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];
        foreach ($rooms as $room) {
            $is_full = $room['students_count'] >= $room['capacity'] ? 'Yes' : 'No';
            $result[] = [
                'name' => $room['name'],
                'capacity' => $room['capacity'],
                'is_full' => $is_full
            ];
        }

        return $result;

    } catch (PDOException $e) {
        
        echo 'Connection failed: ' . $e->getMessage();
        return [];
    }
}

$rooms = find_full_rooms();

if (count($rooms) > 0) {
    echo "<table border = 1>";
    echo "<tr> <th>Name</th> <th>Capacity</th> <th>Is Full</th> </tr>";

    foreach ($rooms as $room) {
        echo "<tr>";
        echo "<td>" . $room['name'] . "</td>";
        echo "<td>" . $room['capacity'] . "</td>";
        echo "<td>" . $room['is_full'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
?>
