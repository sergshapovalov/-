<?php 

require_once __DIR__ . '/../helpers.php';

$premises_id = $_POST['action'];
$user_id = $_SESSION['user']['id'];


$pdo = getPDO();

$query_add_reservation = "INSERT INTO reservations (user_id, premises_id) VALUES (:user_id, :premises_id)";
$param_add_reservation = [
    'user_id' => $user_id, 
    'premises_id' => $premises_id
];


$stmt_add_reservation = $pdo->prepare($query_add_reservation);
$stmt_add_reservation->execute($param_add_reservation);

redirect('../../public/flats.php');