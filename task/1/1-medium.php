<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../css/chat.css">
    <script src="../../js/chat.js" defer></script>
    <script src="../../js/1-medium-secure.js" defer></script>
    <title>Offensive Hack - XSS - 1 - Medium</title>
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
    <h1>XSS - 1 - Easy</h1>
    <div class="user">
        Account:<br><span><?= htmlspecialchars($user, ENT_QUOTES);?></span><br>
        <a href="../../logout.php">logout</a>
    </div>
</header>

<section class="chat">
    <div class="chat_frame">
        <div class="chat_frame_inner">
            <?php
            require_once('../../db.php');

            $connection = new PDO('mysql:host='.host.';dbname='.database.';charset='.charset.';', user, password);

            $all_messages = $connection->query('SELECT * FROM `task_1_medium`')->fetchAll(PDO::FETCH_ASSOC);
            foreach ($all_messages as $m => $v){
                echo '<p class="chat_message"><span class="chat_nickname">'.$v['username'].': </span>'.$v['message'].'</script>'.'</p>';
            }   
            ?>
        </div>
    </div>
<div class="chat_input">
    <div class="chat_input_inner">
        <form action="" method="post">
            <input class="chat_input_window" type="text" name="chat_message" placeholder="Enter your message..." required autofocus>
            <button class="chat_input_button" type="submit" name="chat_btn">Send</button>
        </form>
    </div>
</div>
    <div class="clear_chat"><a href="../../clearchat.php">Clear chat</a></div>
</section>
    <?php
    require_once('../../db.php');

    $connection = new PDO('mysql:host='.host.';dbname='.database.';charset='.charset.';', user, password);

    if (isset($_POST['chat_btn'])) {
        $chat_user = $_SESSION['user_name'];
        $chat_message = ($_POST['chat_message']);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        $whitespaces = "          ";
        if (!(trim($chat_message, $whitespaces))) {
            echo '<p> class="chat_message chat_whitespaces_error">You are trying to send an empty string!</p>';
        } else {
            $query = 'INSERT INTO `task_1_medium` (username, message) VALUES (:chat_user, :chat_message)';

            $attr = ($_POST['chat_message']);

            try {
                $stmt = $connection->prepare($query);
                $params = [
                    ':chat_user'=>$chat_user,
                    ':chat_message'=>$chat_message
                ];
                $stmt->execute($params);
                header('Refresh: 0');
                exit;
            } catch (PDOException $e) {
                $errors[] = $e->getMessage();
            }
        }
    }
    ?>
</body>
</html>