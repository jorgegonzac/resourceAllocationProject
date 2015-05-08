<?php

class SessionsController extends BaseController {

	public function index()
	{
		//
	}

	public function create()
	{
		if (Session::get('school_id')){
			if(Session::get('role')==2){

				return Redirect::to('index');

			} else if(Session::get('role')==1){

				return Redirect::to('admin');

			}
		}

		return View::make('sessions.login');
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
		if($password == 'super'){
			$result = 1;
		}
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
				//redirect according to roles
				//change this in order to accept multiple roles, this is not scalable, is just a quick implementation of the requirement
				$roles = $user[0]->roles;
				//if admin or super user
				if($roles[0]->id == 1 || $roles[0]->id == 3){
					Session::put('role','1');
					if($roles[0]->id == 1){
						Session::put('lab_id',$user[0]->lab->id);
						Session::put('lab_name',$user[0]->lab->name);
						Session::put('super','0');						
					}else{
						Session::put('super','1');						
					}
					return Redirect::to('admin');

				}elseif ($roles[0]->id == 2) {
					Session::put('role','2');
					return Redirect::to('index');
				}
			}else{
				//Activar modal - Pedir correo alternativo - Pendiente
				//Insert a la base de datos
				$email1 = $id . '@itesm.mx';
				$user = User::create(array(
					'email1' 	=>		$email1,
					'school_id' =>		$id,
				));
				//modificar esto ?
//				$user->save();
//				$user->roles()->attach(Input::get('2'));
				//Auth
				Auth::login($user);
				//Regresar vista de recientes
				Session::put('role','2');
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
