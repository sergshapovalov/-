<?php
require_once __DIR__ . '/../src/helpers.php';

if (!empty($_SESSION['user']['id'])) {
  redirect('flats.php');
}

?>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <title>The login page</title>
    <link rel="stylesheet" href="../CSS/style.css" />
    <link rel="icon" href="../images/favicon.jpg" type="image/x-icon" />
  </head>
  <body>
    <form action="../src/actions/sign_up.php" method="post">
        <div class="reg-container">
            <div class="reg-container__item">
                <h2>Регистрация</h2>
                <div class="validation__container">
                    <input type="text" name="username" placeholder="Укажите имяпользователя">
                    <?php if (has_validation_error('username')): ?>
                    <span class="reg-error_message">
                    <?php validation_error_message('username'); ?></span>
                    <?php endif; ?>
                </div>
                <div class="validation__container">
                    <input type="email" name="email" placeholder="Укажите email">
                    <?php if (has_validation_error('email')): ?>
                    <span class="reg-error_message">
                    <?php validation_error_message('email'); ?></span>
                    <?php endif; ?>
                </div>
                <div class="validation__container">                    
                    <div class="reg-password__container">
                        <input type="password" name="password" placeholder="Укажите пароль">
                        <input type="password" name="password_confirmation" placeholder="Подтвердите пароль ">
                    </div>
                    <?php if (has_validation_error('password')): ?>
                    <span class="reg-error_message">
                    <?php validation_error_message('password'); ?></span>
                    <?php endif; ?>
                </div>
                <button type="submit">Продолжить</button>
            </div>
        </div>
    </form>
  </body>
</html>
