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

function getRoleUserArray($mode,$id)
{
	$roles = [
		'0' => 'Usuario Normal',
		'1' => 'Administrador'
	];
	if(!is_null($mode)):
		return $roles;
	else:
		return $roles[$id];
	endif;
}

function getUserStatusArray($mode,$id)
{
	$status = [
		'0' => 'Registrado',
		'1' => 'Verificado',
		'100' => 'Baneado'
	];
	if(!is_null($mode)):
		return $status;
	else:
		return $status[$id];
	endif;
}