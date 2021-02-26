<?php
session_start();

if (isset($_SESSION['logged_id'])) {
    header('Location: menu.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS platforms</title>
</head>
<body>
    <div class="conteiner">
        <header>
            <h1>Witaj na platformie edukacyjnej ZUZ-EDU</h1>
        </header>

    <main>
        <article>
            <form method="post" action="menu.php">
                <label>Login <input type="text" name="login"></label>
                <label>Hasło <input type="password" name="pass"></label>
                <input type="submit" value="Zaloguj się!">
                
                <?php
                if(isset($_SESSION['bad_attempt'])) {
                    echo '<p>Niepoprawny login lub hasło</p>';
                    unset($_SESSION['bad_attempt']);
                }
                ?>
                </form>
        </article>
    </main>
    </div>
</body>
</html>