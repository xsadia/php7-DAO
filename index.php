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

//$usuario = new Usuarios();

//$usuario->login("karinne", "alfacinho123");

//echo $usuario;

/*$usuario = new Usuarios("fofoxu", "liaria");

$usuario->insert();

echo $usuario;*/

/*$usuario = new Usuarios();

$usuario->loadById(1);

$usuario->update("Kurinne", "Gostosa123");

echo $usuario;*/

$usuario = new Usuarios();

$usuario->loadById(6);

$usuario->delete();

echo $usuario;