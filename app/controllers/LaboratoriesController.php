<?php

class LaboratoriesController extends BaseController 
{

	public function index()
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
			$laboratories = Laboratory::all();
			return View::make('admin.laboratories.index')->with('laboratories',$laboratories);
		}else{
			return Redirect::to('login');
		}
	}

	public function create()
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
			//
			$admins = array();
			$users = User::all();

			foreach ($users as $key => $user) {
				$roles = $user->roles;
				if($roles->contains(1)){
					$admins[] = $user;
				}
			}
			return View::make('admin.laboratories.create')->with('users',$admins);
		}else{
			return Redirect::to('login');
		}
	}

	public function store()
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
			$rules = array(
	            'name'      => 'required',
	            'building'      => 'required|numeric',            
	            'user'		=> 'required',
	        );        
	        $messages = [
	        	'required' 	=> 'Este campo es obligatorio',
	        	'email'	   	=> 'Correo no valido',
	        	'min'	   	=> 'La matrícula no es valida',
	        	'size'		=> 'La matrícula no es valida',
	        	'numeric'	=> 'Debes de poner el número del edificio',
	       	];
			$validator = Validator::make(Input::all(), $rules, $messages);
			
			if($validator->fails()){
				return Redirect::to('laboratories/create')
				->withErrors($validator->messages())
				->withInput();
			}else{
				$lab = new Laboratory;
				$lab->name = Input::get('name');
				$lab->building = Input::get('building');
				$lab->user_id = Input::get('user');
				$lab->save();

				Session::flash('message', 'Successfully created laboratory');
				return Redirect::to('laboratories');
			}
		}else{
			return Redirect::to('login');
		}
	}

	public function show($id)
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
		//
			$laboratory = Laboratory::find($id);
			return View::make('admin.laboratories.show')->with('laboratory',$laboratory);
		}else{
			return Redirect::to('login');
		}
	}

	public function edit($id)
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
			//
			$laboratory = Laboratory::find($id);

			$admins = array();		
			$users = User::all();
			foreach ($users as $key => $user) {
				$roles = $user->roles;
				if($roles->contains(1)){
					$admins[] = $user;
				}
			}
			return View::make('admin.laboratories.edit',['laboratory' => $laboratory, 'users' => $admins]);
		}else{
			return Redirect::to('login');
		}
	}

	public function update($id)
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
			//
			$rules = array(
	            'name'      => 'required',
	            'building'      => 'required|numeric',       
	            'user'		=>'required',     
	        );        
	        $messages = [
	        	'required' 	=> 'Este campo es obligatorio ',
	        	'email'	   	=> 'Correo no valido',
	        	'min'	   	=> 'La matrícula no es valida',
	        	'size'		=> 'La matrícula no es valida',
	        	'numeric'	=> 'Debes de poner el número del edificio'
	       	];
			$validator = Validator::make(Input::all(), $rules, $messages);
			
			if($validator->fails()){
				return Redirect::to('laboratories/' . $id . '/edit')
				->withErrors($validator->messages())
				->withInput();
			}else{
				$lab = Laboratory::find($id);
				$lab->name = Input::get('name');
				$lab->building = Input::get('building');
				$lab->user_id = Input::get('user');
				$lab->save();

				Session::flash('message', 'Successfully updated laboratory');
				return Redirect::to('laboratories');
			}
		}else{
			return Redirect::to('login');
		}
	}

	public function destroy($id)
	{
		if (Session::get('school_id') && Session::get('super')==1)
		{
			//
			$lab = Laboratory::find($id);
			$lab->delete();
			Session::flash('message', 'Successfully deleted laboratory');
			return Redirect::to('laboratories');
		}else{
			return Redirect::to('login');
		}
	}

}
