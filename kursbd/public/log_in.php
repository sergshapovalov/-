<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="../CSS/style.css" />
</head>
<body>
    <form action="../src/actions/log_in.php" method="post">
        <div class="authorization-container">
            <div class="authorization-container__item">
                <h2>Авторизация</h2>
                <div class="validation__container">
                    <input type="email" name="email" placeholder="Укажите email">
                </div>
                <div class="validation__container">
                    <input type="password" name="password" placeholder="Укажите пароль">
                </div>
                <button type="submit">Продолжить</button>
            </div>
        </div>
    </form>
</body>
</html>