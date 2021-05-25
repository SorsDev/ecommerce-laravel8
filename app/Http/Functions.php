<?php

function getModulesArray()
{
	$a = [
		'0' => 'Productos',
		'1' =>	'Blog',
		'3' => 'Testimonios'
	];

	return $a;
}

function getRoleUserArrayKey($id)
{
	$roles = [
		'0' => 'Usuario Normal',
		'1' => 'Administrador'
	];
	return $roles[$id];
}

function getUserStatusArrayKey($id)
{
	$status = [
		'0' => 'Registrado',
		'1' => 'Verificado',
		'100' => 'Baneado'
	];
	return $status[$id];
}