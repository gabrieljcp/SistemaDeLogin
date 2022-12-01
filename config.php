
<?php

//	define('HOST', 'localhost');
//	define('USER', 'id19599346_admin');
//	define('PASS', '^WZp\W7h4^07?pLB');
//	define('BASE', 'id19599346_ticket');

//	$conn = new MySQLi(HOST,USER,PASS,BASE);

//	if(mysqli_connect_errno()){
//		printf("Erro ao conectar: ", mysqli_connect_error());
//		exit();
//	}


define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'cadastro');

$conn = new MySQLi(HOST,USER,PASS,BASE);

if(mysqli_connect_errno()){
	printf("Erro ao conectar: ", mysqli_connect_error());
	exit();
}	