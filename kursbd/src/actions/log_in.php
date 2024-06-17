<?php 

require_once __DIR__ . '/../helpers.php';


$email = $_POST['email'] ?? NULL;
$password = $_POST['password'] ?? NULL;


if (empty($email)) {
    add_validation_error('email', 'Email cannot be empty!');
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    add_validation_error('email', 'Invalid email format!');
}

if (empty($password)) {
    add_validation_error('password', 'Password is empty');
} 



if (!empty($_SESSION['validation'])) {
    // redirect('../../public/log_in.php');
}


$pdo = getPDO();

$query_user_by_email = "SELECT * FROM users WHERE `email` = :email";
$params_user_by_email = ['email' => $email];

$stmt_user = $pdo->prepare($query_user_by_email);
$stmt_user->execute($params_user_by_email);
$user = $stmt_user->fetch(PDO::FETCH_ASSOC);


if ($user) {
    if (password_verify($password, $user['password'])) {

        $_SESSION['user'] = [
            'id' => $user['id'],
            'username' => $user['username']
        ];

        redirect('../../public/flats.php');

    } else {
        add_validation_error('password', 'Invalid Password');
        redirect('../../public/log_in.php');
    }
} else {
    add_validation_error('password', "User not found!");
    redirect('../../public/log_in.php');
}
