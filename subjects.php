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
<a href="student.php"><button type="button">Lista uczniów</button></a>
<a href="marks.php"><button type="button">Oceny</button></a>
<a href="subjects.php"><button type="button">Przedmioty</button></a>
<a href="teachers.php"><button type="button">Nauczyciele</button></a>
<br>
<br>
<table>
<tr>
<td>id_przedmiotu</td><td>przedmiot</td><td>id_nauczyciela</td><td>nauczyciel</td>

<?php

$stmt = $db->prepare('SELECT przedmioty.id_przedmiotu, przedmioty.nazwa, przedmioty.id_nauczyciela, nauczyciele.nauczyciel FROM przedmioty, nauczyciele WHERE nauczyciele.id_nauczyciela = przedmioty.id_nauczyciela');

$stmt->execute();

while($row=$stmt->fetch()){
    echo "<tr><td>".$row['id_przedmiotu']."</td>";
    echo "<td>".$row['nazwa']."</td>";
    echo "<td>".$row['nauczyciel']."</td>";
    echo "<td>".$row['id_nauczyciela']."</td></tr>";
}

?>
   
</table>
</body>
</html>