<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/chat.css">
    <link rel="stylesheet" href="../../css/4-easy.css">
    <script src="../../js/chat.js" defer></script>
    <title>Offensive Hack - XSS - 4 - Easy</title>
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
    <h1>XSS - 4 - Easy</h1>
    <div class="user">
        Account:<br><span><?= htmlspecialchars($user, ENT_QUOTES);?></span><br>
        <a href="../../logout.php">logout</a>
    </div>
</header>

<section class="upload">
    <div class="upload_input">
        <div class="upload_inner">
            <form action="" method="post" enctype="multipart/form-data">
                <input class="upload_window" type="file" name="fileToUpload">
                <button class="upload_button" type="submit" name="upload_btn">Upload</button>
            </form>
        </div>
    </div>
</section>
<?php
if (isset($_POST['upload_btn'])) {
    if (isset($_FILES["fileToUpload"]) && !empty($_FILES["fileToUpload"]["name"])) {
        echo '<h3>You have just uploaded <span class="second_color">' . $_FILES["fileToUpload"]["name"] . '</span></h3>';
    }
}
?>
</body>
</html>