<?php
$host = "dpg-d2e2pdur433s73cvb8tg-a";
$db = "jayveeeee";
$user = "jayveeeee_user";
$pass = "f6IEwMp1oiGbjP6UuGWfUzzbUQkiD4ax";
$dsn = "pgsql:host=$host;dbname=$db";

try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo "Database Connection Failed: ".$e->getMessage();
    exit;
}
?>
