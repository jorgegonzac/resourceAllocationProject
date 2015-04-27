<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//get all the users
		$users = User::all();

		return View::make('admin.users.index')->with('users',$users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('admin.users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$rules = array(
            'email1'      => 'required|email',
            'email2'      => 'email',            
            'school_id'  => 'required|size:9|alpha_num',
        );        
        $messages = [
        	'required' 	=> 'Este campo es obligatorio ',
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
			Session::flash('message', 'Successfully created user');
			return Redirect::to('users');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$user = User::find($id);
		return View::make('admin.users.show')->with('user',$user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$user = User::find($id);
		return View::make('admin.users.edit')->with('user',$user);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$rules = array(
            'email1'      => 'required|email',
            'email2'      => 'email',            
            'school_id'  => 'required|size:9|alpha_num',
        );
		$messages = [
        	'required' 	=> 'Este campo es obligatorio ',
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

			Session::flash('message', 'Successfully updated user');
			return Redirect::to('users');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$user = User::find($id);
		$user->delete();
		Session::flash('message', 'Successfully deleted user');
		return Redirect::to('users');
	}


}
