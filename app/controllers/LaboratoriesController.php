<?php

class LaboratoriesController extends \BaseController {

	public function showLaboratoryResources()
	{
		$returnResources = Input::get('returnResources');
		if($returnResources){
			//RECUPERA ID LAB
			$id = Input::get('id');
			$returnAll = Input::get('returnAll');
			if ($returnAll){
				//Todos los laboratorios
				return $resources = Resource::all();
			}else{
				//SACA RECURSOS DE LABORATORIO ESPECIFICO
				return $resources = Resource::where('laboratory_id', '=', $id)->get();				
			}
		}else{
			//NO ES EL POST DE LOS LABORATORIOS
		}
	}

	public function index()
	{
		//
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
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

	public function destroy($id)
	{
		//
	}

}
