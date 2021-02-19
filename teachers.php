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
<td>nauczyciel</td><td>id_nauczyciela</td>

<?php

$stmt = $db->prepare('SELECT * FROM nauczyciele');

$stmt->execute();

while($row=$stmt->fetch()){
    echo "<tr><td>".$row['nauczyciel']."</td>";
    echo "<td>".$row['id_nauczyciela']."</td></tr>";
}

?>
   
</table>
</body>
</html>