<?php
$db_host = "localhost"; //資料庫位址
$db_user = "root"; //使用者
$db_pass = "root"; //密碼
$db_name = "database"; //資料庫名稱
$db_charset = "utf8"; //資料庫字元設定
$db_attr = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true);

try {
  $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=$db_charset", $db_user, $db_pass, $db_attr);
} catch (PDOException $e) {
  print "<h1>資料庫連接錯誤!</h1>";
  die();
}

?>
