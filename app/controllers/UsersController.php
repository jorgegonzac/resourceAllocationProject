<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the users.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
			//get all the users
			$users = User::all();

			return View::make('admin.users.index')->with('users',$users);
		}else{
			return Redirect::to('login');
		}
	}

	/**
	 * Show the form for creating a new user.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
			//
			return View::make('admin.users.create');
		}else{
			return Redirect::to('login');
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
		//
			$rules = array(
	            'email1'      => 'required|email',
	            'email2'      => 'email',            
	            'school_id'  => 'required|size:9|alpha_num',
	            'rol'		=> 'required',
	        );        
	        $messages = [
	        	'required' 	=> 'Este campo es obligatorio',
	        	'email'	   	=> 'Correo no valido',
	        	'min'	   	=> 'La matrícula no es válida',
	        	'size'	=> 'La matrícula no es válida'
	       	];
			$validator = Validator::make(Input::all(), $rules, $messages);
			
			if($validator->fails()){
				return Redirect::to('users/create')
				->withErrors($validator->messages())
				->withInput(Input::except('password'));
			}else{
				$user = new User;
				$user->first_name		=	Input::get('first_name');
				$user->first_last_name	=	Input::get('first_last_name');
				$user->second_last_name	=	Input::get('second_last_name');
				$user->email1 			=	Input::get('email1');
				$user->email2 			=	Input::get('email2');
				$user->password 		=	Input::get('password');
				$user->school_id		=	Input::get('school_id');
				$user->career 			=	Input::get('career');
				if($user->email2 != ""){
					$user->alternative = 1;
				}
				$user->save(); 

				$user->roles()->attach(Input::get('rol'));
				Session::flash('message', 'Successfully created user');
				return Redirect::to('users');
			}
		}else{
			return Redirect::to('login');
		}

	}


	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
			//
			$user = User::find($id);
			$roles = $user->roles;
			if($roles[0]->id == 1){
				$user->role_description = 'Administrador';
			}elseif ($roles[0]->id == 2) {
				$user->role_description = 'Estudiante';
			}elseif ($roles[0]->id == 3) {
				$user->role_description = 'Super Usuario';
			}
			return View::make('admin.users.show')->with('user',$user);

		}else{
			return Redirect::to('login');
		}
	}

	/**
	 * Display info of user currently logged in.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showCurrent()
	{
		if (Session::get('school_id') && Session::get('role')==2)
		{
			//
			$id = Session::get('school_id');
			$user = User::where('school_id', '=', $id)->get();
			$userInfo= "";
			foreach($user as $usr){
				
				$name= $usr->first_name;
				$lastName=$usr->first_last_name;
				$lastName2=$usr->second_last_name;
				$mail1=$usr->email1;
				$mail2=$usr->email2;
				$major=$usr->career;
				$userInfo.="<h4>Nombre: " . $name . " " . $lastName ." ".$lastName2 ."<br> 
				Correo: ". $mail1 ."<br> 
				Correo alternativo: " . $mail2." <br> 
				Carrera: " .$major."<br></h4>";
			 	
			 }

			 return $userInfo;
		}else{
			return Redirect::to('login');
		}
	}


	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
		//
			$user = User::find($id);
			return View::make('admin.users.edit')->with('user',$user);
		}else{
			return Redirect::to('login');
		}
	}


	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
			//
			$rules = array(
	            'email1'      => 'required|email',
	            'email2'      => 'email',            
	            'school_id'  => 'required|size:9|alpha_num',
	            'rol'		=>	'required',
	        );
			$messages = [
	        	'required' 	=> 'Este campo es obligatorio',
	        	'email'	   	=> 'Correo no valido',
	        	'size'	   	=> 'La matrícula no es válida',
	        	'alpha_num'	=> 'La matrícula no es válida'
	       	];	
			$validator = Validator::make(Input::all(), $rules, $messages);

			if($validator->fails()){
				return Redirect::to('users/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
			}else{
				$user = User::find($id);
				$user->first_name		=	Input::get('first_name');
				$user->first_last_name	=	Input::get('first_last_name');
				$user->second_last_name	=	Input::get('second_last_name');
				$user->email1 			=	Input::get('email1');
				$user->email2 			=	Input::get('email2');
				$user->password 		=	Input::get('password');
				$user->school_id		=	Input::get('school_id');
				$user->career 			=	Input::get('career');
				if($user->email2 != ""){
					$user->alternative = 1;
				}
				$user->save();
				$roles = $user->roles;
				$user->roles()->detach($roles[0]);
				$user->roles()->attach(Input::get('rol'));
				
				Session::flash('message', 'Successfully updated user');
				return Redirect::to('users');
			}
		}else{
			return Redirect::to('login');
		}
	}


	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
			//
			$user = User::find($id);
			$user->delete();
			Session::flash('message', 'Successfully deleted user');
			return Redirect::to('users');
		}else{
			return Redirect::to('login');
		}
	}


}
