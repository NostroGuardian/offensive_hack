<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="dashboard.css">
    <script src="difficulty.js" defer></script>
    <title>Offensive Hack - Dashboard</title>
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
    <div class="difficulty">Difficulty:
        <div class="level_easy" id="level_current">Easy</div>
        <div class="level_change" id="level_change">
            <a href="dashboard_medium.php"><div class="level_medium" id="level_medium">Medium</div></a>
            <a href="dashboard_hard.php"><div class="level_hard level_item" id="level_hard">Hard</div></a>
        </div>
    </div>
    <div class="user">
        Welcome,<br><span><?= $user?></span>!<br>
        <a href="logout.php">logout</a>
    </div>
</header>

<section class="vulnerabilities">
    <h1>Vulnerabilities</h1>
    <div class="vulnerabilities_row">
        <a href="easy/1.html"><div class="vulnerabilities_item">№1</div></a>
        <a href="easy/2.html"><div class="vulnerabilities_item">№2</div></a>
        <a href="easy/3.html"><div class="vulnerabilities_item">№3</div></a>
        <a href="easy/4.html"><div class="vulnerabilities_item">№4</div></a>
        <a href="easy/5.html"><div class="vulnerabilities_item">№5</div></a>
    </div>
    <div class="vulnerabilities_row">
        <a href="easy/6.html"><div class="vulnerabilities_item">№6</div></a>
        <a href="easy/7.html"><div class="vulnerabilities_item">№7</div></a>
        <a href="easy/8.html"><div class="vulnerabilities_item">№8</div></a>
        <a href="easy/9.html"><div class="vulnerabilities_item">№9</div></a>
        <a href="easy/10.html"><div class="vulnerabilities_item">№10</div></a>
    </div>
    <div class="vulnerabilities_row">
        <a href="easy/11.html"><div class="vulnerabilities_item">№11</div></a>
        <a href="easy/12.html"><div class="vulnerabilities_item">№12</div></a>
        <a href="easy/13.html"><div class="vulnerabilities_item">№13</div></a>
        <a href="easy/14.html"><div class="vulnerabilities_item">№14</div></a>
        <a href="easy/15.html"><div class="vulnerabilities_item">№15</div></a>
    </div>
</section>
</body>
</html>