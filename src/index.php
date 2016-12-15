<?php
echo "<pre>";
var_dump($_SERVER);
die;

echo "Hello, world!";
$pdo = new PDO('mysql:host=mysql-inst-1;port=3306;dbname=admin', "admin", "admin");

/*$stmt = $pdo->prepare('INSERT INTO users set name = :name');
$stmt->execute([':name' => "artyom"]);*/

$mc = new Memcached();
$mc->addServer('memcache-inst-1', 11211);

$usersFromCache = $mc->get('allUsers');
if ($usersFromCache === false) {
    $stmt1 = $pdo->prepare('SELECT id, name FROM users');
    $stmt1->execute();
    $users = $stmt1->fetchAll(PDO::FETCH_CLASS);
    $mc->set('allUsers', $users, 60);
    var_dump('usersFromDB', $users);
} else {
    var_dump('usersFromCache', $usersFromCache);
}

var_dump($mc);

print_r(PDO::getAvailableDrivers());


