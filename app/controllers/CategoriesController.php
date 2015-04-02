<?php

class CategoriesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$categories = Category::all();

		return View::make('admin.categories.index')->with('categories',$categories);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('admin.categories.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		//
		$rules = array(
            'name'      => 'required',
        );        
        $messages = [
        	'required' 	=> 'Este campo es obligatorio !',
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
		$category = Category::find($id);
		return View::make('admin.categories.show')->with('category',$category);
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
		$category = Category::find($id);
		return View::make('admin.categories.edit')->with('category',$category);
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
            'name'      => 'required',
        );        
        $messages = [
        	'required' 	=> 'Este campo es obligatorio !',
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
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function destroy($id)
	{
		$category = Category::find($id);
		$category->delete();
		Session::flash('message', 'Successfully deleted category!');
		return Redirect::to('categories');
	}


}
