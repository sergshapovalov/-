<?php

require_once __DIR__ . '/../helpers.php';

$username = $_POST['username'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$password_confirmation = $_POST['password_confirmation'] ?? null;


if (empty($username)) {
    add_validation_error('username', 'The field cannot be empty!');
}   elseif (strlen($username) < 5 || strlen($username) > 25) {
    add_validation_error('username', 'There must be at least 5 and no more than 25 sims!');
}

if (empty($email)) {
    add_validation_error('email', 'Email cannot be empty!');
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    add_validation_error('email', 'Invalid email format!');
}

if (empty($password)) {
    add_validation_error('password', 'Password is empty');
}   elseif (strlen($password) < 6 ) {
    add_validation_error('password', 'The password must be at least 6 characters long!');
}   elseif (!preg_match('/[A-Z]/', $password)) {
    add_validation_error('password', 'The password must contain at least one capital letter!');
}   elseif (!preg_match('/[a-z]/', $password)) {
    add_validation_error('password', 'The password must contain at least one lowercase letter!');
}   elseif (!preg_match('/\d/', $password)) {
    add_validation_error('password', 'The password must contain at least one digit!');
}   elseif (!preg_match('/[^a-zA-Z\d]/', $password)) {
    add_validation_error('password', 'The password must contain at least one special character!');
}

if ($password !== $password_confirmation) {
    add_validation_error('password', 'Passwords do not match');
}


print_r($_SESSION['validation']);

if (!empty($_SESSION['validation'])) {
    add_old_value('username', $username);
    add_old_value('email', $email);
    redirect('../../public/sign_up.php');
}

$pdo = getPDO();

$query = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
$params = [
    'username' => $username,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT)
];

$stmt = $pdo->prepare($query);

try {
    $stmt->execute($params);
} catch (Exception $e) {
    die($e->getMessage());
}

redirect('../../public/log_in.php');