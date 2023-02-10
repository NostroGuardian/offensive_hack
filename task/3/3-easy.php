<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/chat.css">
    <link rel="stylesheet" href="../../css/3-easy.css">
    <script src="../../js/chat.js" defer></script>
    <title>Offensive Hack - XSS - 3 - Easy</title>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('Location: index.php');
    exit;
} else {
    $user = $_SESSION['user_name'];
}
?>
<header>
    <a href="../../dashboard.php"><div class="logo"><img src="../../img/logo_img.png" alt="logo">XSS</div></a>
    <h1>XSS - 3 - Easy</h1>
    <div class="user">
        Account:<br><span><?= htmlspecialchars($user, ENT_QUOTES);?></span><br>
        <a href="../../logout.php">logout</a>
    </div>
</header>

<section class="search">
    <div class="search_input">
        <div class="search_input_inner">
            <form action="" method="get">
                <input class="search_input_window" type="text" name="search" placeholder="Enter your search term..." required autofocus>
                <button class="search_button" type="submit" name="search_btn">Search</button>
            </form>
        </div>
    </div>
</section>
<?php
if (isset($_GET['search_btn']) && !empty($_GET['search'])) {
    echo '<h3>Ваш запрос <span class="chat_nickname">' . $_GET["search"] . ' </span>не найден</h3>';
}
?>
</body>
</html>