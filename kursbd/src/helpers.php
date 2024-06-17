<?php 

session_start();

require_once __DIR__ . '/config.php';

function getPDO():PDO {
    try {
        return new \PDO('mysql:host=' . DB_HOST. ';charset=utf8;dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
        
    } catch (\PDOException $e) {
        echo 'no';
        die($e->getMessage());
    }
}

function redirect(string $path) {
    header("Location: $path");
    die();
}

function add_validation_error(string $field_name, string $message) {
    $_SESSION['validation'][$field_name] = $message;
}


function has_validation_error(string $field_name):bool {
    return isset($_SESSION['validation'][$field_name]);
}


function validation_error_message(string $field_name) {
   $message = $_SESSION['validation'][$field_name] ?? '';
   unset($_SESSION['validation'], $field_name);
   echo $message;
}

function add_old_value(string $key, mixed $value) {
    $_SESSION['old'][$key] = $value;
}

function old(string $key) {
    $value = $_SESSION['old'][$key] ?? '';
    unset($_SESSION['old'][$key]);
    return $value;
}

function get_flat() {
    
    $pdo = getPDO();

    $query_get_flat = "SELECT * FROM premises WHERE	category = :category";
    $param_get_flat = [
        'category' => 'flat'
    ];

    $stmt_get_falt = $pdo->prepare($query_get_flat);
    $stmt_get_falt->execute($param_get_flat);
    return $flat = $stmt_get_falt->fetchALL(PDO::FETCH_ASSOC);
}

function get_guest_house() {
    $pdo = getPDO();

    $query_get_flat = "SELECT * FROM premises WHERE	category = :category";
    $param_get_flat = [
        'category' => 'guest_house'
    ];

    $stmt_get_falt = $pdo->prepare($query_get_flat);
    $stmt_get_falt->execute($param_get_flat);
    return $flat = $stmt_get_falt->fetchALL(PDO::FETCH_ASSOC);
}

function get_rooms() {
    $pdo = getPDO();

    $query_get_flat = "SELECT * FROM premises WHERE	category = :category";
    $param_get_flat = [
        'category' => 'room'
    ];

    $stmt_get_falt = $pdo->prepare($query_get_flat);
    $stmt_get_falt->execute($param_get_flat);
    return $flat = $stmt_get_falt->fetchALL(PDO::FETCH_ASSOC);
}

function get_hotels() {
    $pdo = getPDO();

    $query_get_flat = "SELECT * FROM premises WHERE	category = :category";
    $param_get_flat = [
        'category' => 'hotel'
    ];

    $stmt_get_falt = $pdo->prepare($query_get_flat);
    $stmt_get_falt->execute($param_get_flat);
    return $flat = $stmt_get_falt->fetchALL(PDO::FETCH_ASSOC);
}

function get_hostel() {
    $pdo = getPDO();

    $query_get_flat = "SELECT * FROM premises WHERE	category = :category";
    $param_get_flat = [
        'category' => 'hotel'
    ];

    $stmt_get_falt = $pdo->prepare($query_get_flat);
    $stmt_get_falt->execute($param_get_flat);
    return $flat = $stmt_get_falt->fetchALL(PDO::FETCH_ASSOC);
}

function get_hostels() {
    $pdo = getPDO();

    $query_get_flat = "SELECT * FROM premises WHERE	category = :category";
    $param_get_flat = [
        'category' => 'hostel'
    ];

    $stmt_get_falt = $pdo->prepare($query_get_flat);
    $stmt_get_falt->execute($param_get_flat);
    return $flat = $stmt_get_falt->fetchALL(PDO::FETCH_ASSOC);
}

function add_session_premises($key, $value) {
    if (!isset($_SESSION[$key])) {
        $_SESSION[$key] = [];
    }
    $_SESSION[$key][] = $value;
}

function get_reservations() {
    $pdo = getPDO();

    $user_id = $_SESSION['user']['id'];

    $query_get_reservations = "SELECT users.username, premises.name, premises.category, premises.price, premises.image, premises.city, premises.address FROM reservations LEFT JOIN users ON reservations.user_id = users.id LEFT JOIN premises ON reservations.premises_id = premises.id WHERE users.id = :user_id";

    $param_get_reservations = ['user_id' => $user_id];

    $stmt_get_reservations = $pdo->prepare($query_get_reservations);
    $stmt_get_reservations->execute($param_get_reservations);
    return $reservations = $stmt_get_reservations->fetchALL(PDO::FETCH_ASSOC);

    var_dump($user_id);
}