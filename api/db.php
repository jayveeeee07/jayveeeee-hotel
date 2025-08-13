<?php
$host = "dpg-d2e2pdur433s73cvb8tg-a";
$db   = "jayveeeee";
$user = "jayveeeee_user";
$pass = "f6IEwMp1oiGbjP6UuGWfUzzbUQkiD4ax";
$port = "5432";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Database Connection Failed: " . $e->getMessage();
}
?>
