<?php

class CategoriesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			//
			$categories = Category::all();

			return View::make('admin.categories.index')->with('categories',$categories);
		}else{
			return Redirect::to('login');
		}
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
		//
			return View::make('admin.categories.create');
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
		if (Session::get('school_id') && Session::get('role')==1)
		{
			//
			//
			$rules = array(
	            'name'      => 'required',
	        );        
	        $messages = [
	        	'required' 	=> 'Este campo es obligatorio',
	        	'email'	   	=> 'Correo no valido',
	        	'min'	   	=> 'La matrícula no es valida',
	        	'size'	=> 'La matrícula no es valida'
	       	];
			$validator = Validator::make(Input::all(), $rules, $messages);
			
			if($validator->fails()){
				return Redirect::to('categories/create')
				->withErrors($validator->messages())
				->withInput();
			}else{
				$category = new Category;
				$category->name		=	Input::get('name');
				$category->description	=	Input::get('description');			
				$category->save(); 
				Session::flash('message', 'Successfully created category!');
				return Redirect::to('categories');
			}	
		}else{
			return Redirect::to('login');
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
		if (Session::get('school_id') && Session::get('role')==1)
		{
			//
			$category = Category::find($id);
			return View::make('admin.categories.show')->with('category',$category);
		}else{
			return Redirect::to('login');
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			//
			$category = Category::find($id);
			return View::make('admin.categories.edit')->with('category',$category);
		}else{
			return Redirect::to('login');
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			//
			$rules = array(
	            'name'      => 'required',
	        );        
	        $messages = [
	        	'required' 	=> 'Este campo es obligatorio',
	        	'email'	   	=> 'Correo no valido',
	        	'min'	   	=> 'La matrícula no es valida',
	        	'size'	=> 'La matrícula no es valida'
	       	];
			$validator = Validator::make(Input::all(), $rules, $messages);
			
			if($validator->fails()){
				return Redirect::to('categories/' . $id . '/edit')
				->withErrors($validator->messages())
				->withInput();
			}else{
				$category = Category::find($id);
				$category->name		=	Input::get('name');
				$category->description	=	Input::get('description');			
				$category->save(); 
				Session::flash('message', 'Successfully updated category!');
				return Redirect::to('categories');
			}		
		}else{
			return Redirect::to('login');
		}
	}

	public function destroy($id)
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$category = Category::find($id);
			$category->delete();
			Session::flash('message', 'Successfully deleted category!');
			return Redirect::to('categories');
		}else{
			return Redirect::to('login');
		}
	}


}
