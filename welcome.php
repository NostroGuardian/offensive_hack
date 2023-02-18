<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/welcome.css">
    <script src="js/welcome.js" defer></script>
    <title>Offensive Hack - Welcome</title>
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
    <div class="logo"><img src="img/logo_img.png" alt="logo">XSS</div>
    <div class="header">Offensive Hack Training Platform</div>
    <div class="user">
        Welcome,<br><span><?= htmlspecialchars($user, ENT_QUOTES);?></span>!<br>
        <a href="logout.php">logout</a>
    </div>
</header>

<section class="leveling">
    <h1>Choose your level</h1>
    <div class="leveling_row">
        <div class="leveling_item">
            <img src="img/starting_point.png" alt="starting_point_img" class="leveling_item_img">
            <h2>Starting point<img src="img/info.png" alt="info_icon" class="info_icon" id="starting_point_img"></h2>
            <p>An easier level for beginners</p>
            <a href="task/1/1-easy.php">Here goes</a>
        </div>
        <div class="leveling_item">
            <img src="img/advanced_level.png" alt="advanced_level_img" class="leveling_item_img">
            <h2>Advanced level<img src="img/info.png" alt="info_icon" class="info_icon" id="advanced_level_img"></h2>
            <p>More difficult level to hone skills</p>
            <a href="task/1/1-easy.php">Run it</a>
        </div>
    </div>
    <div id="starting_popup">
        <h3>Starting point</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    <div id="advanced_popup">
        <h3>Advanced level</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
</section>
</body>
</html>