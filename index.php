<?php
session_start();


use App\Services\Router;
use App\Services\App;

/*
// Establish a connection using PDO
try {
    $pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'root', '1qaz!QAZ');
    // Setting PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
// Performing a sample query
$query = "SELECT * FROM table_name";
try {
    $stmt = $pdo->query($query);
    // Fetching and analyzing the result set
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Your code for processing each row will come here
    }
} catch (PDOException $e) {
    die('Query failed: ' . $e->getMessage());
}
*/

require_once __DIR__.DIRECTORY_SEPARATOR."vendor".DIRECTORY_SEPARATOR."autoload.php";
require_once __DIR__.DIRECTORY_SEPARATOR."config".DIRECTORY_SEPARATOR."config.php";

App::start();
require_once __DIR__.DIRECTORY_SEPARATOR."router".DIRECTORY_SEPARATOR."routes.php";


//вывод всех ошибок
error_reporting(E_ALL);

//получаю урл
//$url = $_SERVER['REQUEST_URI'];
//echo $url;

//read bean 1.35

//aria 1.35
//Остановился на полле ввода коментариев на странице coments_add.page
