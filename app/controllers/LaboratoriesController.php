<?php

class LaboratoriesController extends BaseController 
{

	public function index()
	{
		//
		$laboratories = Laboratory::all();
		return View::make('admin.laboratories.index')->with('laboratories',$laboratories);
	}

	public function create()
	{
		//
		return View::make('admin.laboratories.create');
	}

	public function store()
	{
		//
		$rules = array(
            'name'      => 'required',
            'building'      => 'required|numeric',            
        );        
        $messages = [
        	'required' 	=> 'Este campo es obligatorio !',
        	'email'	   	=> 'Correo no valido',
        	'min'	   	=> 'La matrícula no es valida',
        	'size'		=> 'La matrícula no es valida',
        	'numeric'	=> 'Debes de poner el número del edificio!'
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
			$lab->save();

			Session::flash('message', 'Successfully created laboratory!');
			return Redirect::to('laboratories');
		}
	}

	public function show($id)
	{
		//
		$laboratory = Laboratory::find($id);
		return View::make('admin.laboratories.show')->with('laboratory',$laboratory);
	}

	public function edit($id)
	{
		//
		$laboratory = Laboratory::find($id);
		return View::make('admin.laboratories.edit')->with('laboratory',$laboratory);
	}

	public function update($id)
	{
		//
		$rules = array(
            'name'      => 'required',
            'building'      => 'required|numeric',            
        );        
        $messages = [
        	'required' 	=> 'Este campo es obligatorio !',
        	'email'	   	=> 'Correo no valido',
        	'min'	   	=> 'La matrícula no es valida',
        	'size'		=> 'La matrícula no es valida',
        	'numeric'	=> 'Debes de poner el número del edificio!'
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
			$lab->save();

			Session::flash('message', 'Successfully updated laboratory!');
			return Redirect::to('laboratories');
		}
	}

	public function destroy($id)
	{
		//
		$lab = Laboratory::find($id);
		$lab->delete();
		Session::flash('message', 'Successfully deleted laboratory!');
		return Redirect::to('laboratories');
	}

}
