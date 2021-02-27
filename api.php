<?php
header('Content-TYPE: application/json');

if (empty($_GET['api_key'])) {
    echo 'Error1!';
    exit();
}

$dbh = new PDO('mysql:host=db;dbname=artur_shop', 'artur_base', 'artur_pwd');

$sql = "SELECT * FROM `users` WHERE `api_key` = :api_key";
$stmt = $dbh->prepare($sql);
$stmt->execute(['api_key' => $_GET['api_key']]);

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $result = [
        'id' => $result['id'],
        'login' => $result['login'],
        'money' => $result['money'],
    ];
    echo json_encode($result);
} else {
    echo 'Error!';
    exit();
}
