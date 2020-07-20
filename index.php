<?php

require_once("config.php");

$user = new Usuarios;

$user->loadById(3);

echo $user;