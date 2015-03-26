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
            'first_name' => 'required',
            'email'      => 'required|email',
            'school_id'  => 'required|min:9',
            'career_id'	 => 'exists:careers,id'
        );
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::to('user/create')
			->withErrors($validator);
			//->withInput(Input::except('password'))
		}else{
			$user = new User;
			$user->first_name	=	Input::get('first_name');
			$user->last_name	=	Input::get('last_name');
			$user->email 		=	Input::get('email');
			$user->school_id	=	Input::get('school_id');
			$user->career_id	=	Input::get('career_id');
			$user->save();

			Session::flash('message', 'Successfully created user!');
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
		$rules = array(
            'first_name' => 'required',
            'email'      => 'required|email',
            'school_id'  => 'required|min:9',
            'career_id'	 => 'exists:careers,id'
        );
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()){
			return Redirect::to('user/' . $id . '/edit')
			->withErrors($validator);
			//->withInput(Input::except('password'))
		}else{
			$user = User::find($id);
			$user->first_name	=	Input::get('first_name');
			$user->last_name	=	Input::get('last_name');
			$user->email 		=	Input::get('email');
			$user->school_id	=	Input::get('school_id');
			$user->career_id	=	Input::get('career_id');
			$user->save();

			Session::flash('message', 'Successfully updated user!');
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
		Session::flash('message', 'Successfully deleted user!');
		return Redirect::to('users');
	}


}
