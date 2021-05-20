<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Hash, Auth;
use App\User;

class ConnectController extends Controller
{

	public function __Construct()
	{
		$this->middleware('guest')->except(['getLogout']);
	}

    public function getLogin()
    {
    	return view('connect.login');
    }


    public function postLogin(Request $request)
    {
    	$rules = [
    		'email' => 'required|email',
    		'password' => 'required|min:8'
    	];

    	$messages = [
    		'email.required' => 'El campo email es requerido',
    		'email.email' => 'El formato email es inválido',
    		'password.required' => 'El campo contraseña es requerido',
    		'password.min' => 'La contraseña debe tener al menos 8 caracteres',
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
    	else:

    		if(Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')],true)):
    			return redirect('/');
    		else:
    			return back()->with('message','Correo electrónico y/o contraseña errónea')->with('typealert','danger');
    		endif;

    	endif;
    }



    public function getRegister()
    {
    	return view('connect.register');
    }

    public function postRegister(Request $request)
    {
    	$rules = [
    		'name' => 'required',
    		'lastname' => 'required',
    		'email' => 'required|email|unique:users,email',
    		'password' => 'required|min:8',
    		'cpassword' => 'required|min:8|same:password'
    	];

    	$messages = [
    		'name.required' => 'El campo nombre es requerido.',
    		'lastname.required' => 'El campo apellido es requerido',
    		'email.required' => 'El campo email es requerido',
    		'email.email' => 'El formato email es inválido',
    		'email.unique' => 'El email ya se encuentra registrado',
    		'password.required' => 'El campo contraseña es requerido',
    		'password.min' => 'La contraseña debe tener al menos 8 caracteres',
    		'cpassword.required' => 'Es necesario confirmar la contraseña',
    		'cpassword.min' => 'La confirmación de la contraseña debe de tener al menos 8 caracteres',
    		'cpassword.same' => 'Las contraseñas no coinciden'
    	];

    	$validator = Validator::make($request->all(), $rules, $messages);
    	if($validator->fails()):
    		return back()->withErrors($validator)->with('message','Se ha producido un error')->with('typealert','danger');
    	else:
    		$user = new User;
    		$user->name = e($request->input('name'));
    		$user->lastname = e($request->input('lastname'));
    		$user->email = e($request->input('email'));
    		$user->password = Hash::make($request->input('password'));

    		if($user->save()):
    			return redirect('/login')->with('message','Se registró correctamente, ya puede iniciar sesión')->with('typealert','success');
    		endif;
    	endif;
    }


    public function getLogout()
    {
    	Auth::logout();
    	return redirect('/');
    }
}
