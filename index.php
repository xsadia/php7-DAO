<?php

require_once("config.php");

//$user = new Usuarios;
/*
$user->loadById(4);
echo "<br>";*/

/*$list = Usuarios::getList();

echo json_encode($list);*/

//$search = Usuarios::search("fe");

//echo json_encode($search);

$usuario = new Usuarios();

$usuario->login("fefe", "1234");

echo $usuario;