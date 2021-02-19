<?php
require_once 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        table, th, td {
         border: 1px solid black;
        border-collapse: collapse;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Education Platform</title>
</head>
<body>
<a href="index.php"><button type="button">Lista uczniów</button></a>
<a href="marks.php"><button type="button">Oceny</button></a>
<a href="subjects.php"><button type="button">Przedmioty</button></a>
<a href="teachers.php"><button type="button">Nauczyciele</button></a>
<br>
<br>
<table>
<tr>
<td>id_student</td><td>e_mail</td><td>name</td><td>surname</td>

<?php

$stmt = $db->prepare('SELECT * FROM uczniowie');

$stmt->execute();

while($row=$stmt->fetch()){
    echo "<tr><td>".$row['id_student']."</td>";
    echo "<td>".$row['surname']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['e_mail']."</td></tr>";
}

?>
   
</table>
</body>
</html>