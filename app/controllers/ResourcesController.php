<?php

class ResourcesController extends BaseController {


	public function index()
	{
		$resources = Resource::all();
		return View::make('admin.resources.index',['resources' => $resources]);
	}

	public function create()
	{
		return View::make('admin.resources.create');
	}

	public function store()
	{
		//
	}

	public function show($id)
	{	
		$resource = Resource::find($id);
		return View::make('admin.resources.show', ['resource' => $resource]);
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
		$resource = Resource::find($id);
		$resource->delete();
		Session::flash('message', 'Successfully deleted resource!');
		return Redirect::to('resources');
	}

	public function book()
	{
		return View::make('booking');
	}

	


}
