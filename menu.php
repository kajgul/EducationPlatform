<?php 
session_start();
require_once 'database.php';
if (!isset($_SESSION['logged_id'])){
    if (isset($_POST['login'])) {
        
        $login = filter_input(INPUT_POST, 'login');
        $password = filter_input(INPUT_POST, 'pass');

        //echo $login . " " . $password;

        $userQuery = $db->prepare('SELECT id_nauczyciela, pass FROM nauczyciele WHERE login = :login');
        $userQuery->bindValue(':login', $login, PDO::PARAM_STR);
        $userQuery->execute();

        //echo $userQuery->rowCount();

        $user = $userQuery->fetch();
        
        if ($user && $password){
            $_SESSION['logged_id'] = $user['id_nauczyciela'];
            unset($_SESSION['bad_attempt']);
        } else {
            $_SESSION['bad_attempt'] = true;
            header('Location: index.php');
            exit();
        }
    } else {
        header('Location:index.php');
        exit();
    }
}

$usersQuery = $db->query('SELECT * FROM uczniowie');
$users = $usersQuery->fetchAll();

//print_r($users);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS - platform</title>
</head>
<body>
    <div class="container">
        <header><h1>Lista uczniów</h1></header>
        <main>
            <article>
                <table>
                    <thead>
                        <tr><th colspan="2">Łącznie rekordów: <?= $usersQuery->rowCount()?></th></tr>
                        <tr><th>imie</th><th>nazwisko</th></tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($users as $user){
                                echo "<tr><td>{$user['name']}</td><td>{$user['surname']}</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </article>
            <p><a href="logout.php">Wyloguj się!</a></p>
        </main>
    </div>
</body>
</html>