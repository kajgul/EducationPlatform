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
<td>id_oceny</td><td>ocena</td><td>komentarz</td><td>przedmiot</td><td>imie ucznia</td><td>nazwisko ucznia</td><td>nauczyciel wpisujący ocenę</td>

<?php

$stmt = $db->prepare('SELECT oceny.id_oceny, oceny.ocena, oceny.komentarz, przedmioty.nazwa, uczniowie.name, 
uczniowie.surname, nauczyciele.nauczyciel FROM oceny, przedmioty, uczniowie, nauczyciele 
WHERE nauczyciele.id_nauczyciela = oceny.id_nauczyciela AND przedmioty.id_przedmiotu = oceny.id_przedmiotu 
AND uczniowie.id_student=oceny.id_ucznia');

$stmt->execute();

while($row=$stmt->fetch()){
    echo "<tr><td>".$row['id_oceny']."</td>";
    echo "<td>".$row['ocena']."</td>";
    echo "<td>".$row['komentarz']."</td>";
    echo "<td>".$row['nazwa']."</td>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['surname']."</td>";
    echo "<td>".$row['nauczyciel']."</td></tr>";
}

?>
   
</table>
</body>
</html>