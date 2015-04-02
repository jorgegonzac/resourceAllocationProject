<?php

class SessionsController extends BaseController {

	public function index()
	{
		//
	}

	public function create()
	{
		if (Session::get('school_id')){
			return Redirect::to('index');
		}

		return View::make('sessions.create');
	}

	public function store()
	{
		$validation = Validator::make(Input::all(), 
			['school_id' => 'required|regex:/^[A a L l]\d{8}/', 'password' => 'required']);
		if ($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation->messages());
		}
		$id = ucfirst(Input::get('school_id'));
		$password = Input::get('password');
		$popserver = 'pop.itesm.mx';
		$result = auth_pop3_ssl($id, $password, $popserver);
		if ($result)
		{
		//Variables de session
			Session::put('school_id', $id);
		//Validar existencia en la base de datos
		//Si existe
			$user = User::where('school_id', '=', $id)->get();
			$vacio = empty($user[0]);
			if (!$vacio){
				//Auth
				Auth::login($user[0]);
				return Redirect::to('index');
			}else{
				//Activar modal - Pedir correo alternativo - Pendiente
				//Insert a la base de datos
				$email1 = $id . '@itesm.mx';
				$user = User::create(array(
					'email1' 	=>		$email1,
					'school_id' =>		$id,
				));
				//Auth
				Auth::login($user);
				//Regresar vista de recientes
				return Redirect::to('index');
			}
		}else{

			//Regresar a la vista con validaciones
			return Redirect::back()->withInput()->withErrors(['failed_login' => 'Los datos de sesión son incorrectos. Verifiquelos porfavor.']);
		}
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy()
	{
		Session::flush();

		return Redirect::to('login');
	}

}
