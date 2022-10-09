<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="singup.css">
    <script src="formVal.js" defer></script>
	<title>Offensive Hack - Sing Up</title>
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
					<form action="" method="post" name="signup">
						<input type="text" placeholder="User Name" name="login" required pattern="[A-Za-z0-9]+" title="Only A-Z, a-z, 0-9 characters" autocomplete="off">
						<input type="password" placeholder="Password" name="password" required pattern="[A-Za-z0-9]+" title="Only A-Z, a-z, 0-9 characters" autocomplete="off">
                        <button type="submit" class="log_btn" name="register">Sing Up</button>
                        <a href="index.php"><div class="back_btn">Back</div></a>
					</form>
				</div>
	
			</div>

		</div>
	</div>
    <?php
        require_once('db.php');

        session_start();
        session_name();

        $connection = new PDO('mysql:host='.host.';dbname='.database.';charset='.charset.';', user, password);

        if (isset($_POST['register'])) {
            $user_login = trim($_POST['login']);
            $user_password = trim($_POST['password']);

            $user_password_hash = password_hash($user_password, PASSWORD_BCRYPT);

            $query = 'SELECT * FROM `users` where login = :user_login';
            $stmt = $connection->prepare($query);
            $params = [':user_login'=>$user_login];
            $stmt->execute($params);

            if ($stmt->rowCount() == 0) {
                $query = 'INSERT INTO `users` (login, password) VALUES (:user_login, :user_password)';

                try {
                    $stmt = $connection->prepare($query);
                    $params = [
                            ':user_login'=>$user_login,
                            ':user_password'=>$user_password_hash
                    ];
                    $stmt->execute($params);
                    header('Refresh:2 url=index.php');
                    echo '<div class="success_alert">Successfully registered!</div>';
                    exit;
                } catch (PDOException $e) {
                    $errors[] = $e->getMessage();
                }
            } else {
                echo '<div class="bad_alert">Login is already exist!</div>';
            }
        }

    ?>
</body>
</html>