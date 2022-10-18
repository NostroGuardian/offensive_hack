<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="main.css">
    <script src="formVal.js" defer></script>
	<title>Offensive Hack - Login</title>
</head>
<body>

	<div class="main_form">
		<div class="form">

			<div class="left_side">

				<div class="form_logo">
					<img src="img/logo_img.png" alt="Logo">
					<h1>Offensive Hack</h1>
				</div>

				<div class="fields">
					<form action="" method="post" name="logup">
						<input type="text" placeholder="User Name" name="login" required pattern="[A-Za-z0-9]+" title="Only A-Z, a-z, 0-9 characters" autocomplete="off">
						<input type="password" placeholder="Password" name="password" required pattern="[A-Za-z0-9]+" title="Only A-Z, a-z, 0-9 characters" autocomplete="off">
                        <button type="submit" class="log_btn" name="login_btn">Login</button>
					</form>
				</div>

			</div>

			<div class="reg">
				<h1>New user?</h1>
				<p>sign up to get started</p>
				<div class="reg_btn">Sing Up</div>
			</div>

		</div>
	</div>
<script type="text/javascript" src="script.js"></script>
    <?php
        require_once('db.php');

        session_start();
        session_name();

        $connection = new PDO('mysql:host='.host.';dbname='.database.';charset='.charset.';', user, password);

        if (isset($_POST['login_btn'])) {
            $user_login = trim($_POST['login']);
            $user_password = trim($_POST['password']);

            $user_login_filtered = htmlspecialchars($user_login, ENT_QUOTES);
            $user_password_filtered = htmlspecialchars($user_password, ENT_QUOTES);

            $query = 'SELECT * FROM `users` WHERE login = :user_login';
            $stmt = $connection->prepare($query);
            $params = [':user_login'=>$user_login_filtered];
            $stmt->execute($params);

            if ($stmt->rowCount() > 0) {
                $getRow = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($user_password,$getRow['password'])) {
                    $_SESSION['user_id'] = $getRow['id'];
                    $_SESSION['user_name'] = $getRow['login'];
                    header('location:dashboard.php');
                    exit();
                } else {
                    echo '<div class="bad_alert">Wrong login or password!</div>';
                }
            } else {
                echo '<div class="bad_alert">Wrong login or password!</div>';
            }
        }
    ?>
</body>
</html>