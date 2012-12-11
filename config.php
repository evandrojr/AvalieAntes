<?
$_SERVER["REMOTE_ADDR"];

if($_SERVER["REMOTE_ADDR"]=='10.200.229.127' || $_SERVER["REMOTE_ADDR"]=='127.0.0.1')
	$pdo = new PDO("mysql:host=localhost;dbname=procon;charset=utf-8", "root", "");
else
	$pdo = new PDO("mysql:host=localhost;dbname=evandro_procon;charset=utf-8", "root", "");
		
if(!$pdo){
    die('Erro ao criar a conexão');
}
$pdo -> exec("SET CHARACTER SET utf8");

?>
