<?php

class ResourcesController extends BaseController {



	public function index()
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$result = null;
			if(Session::get('super')==1){
				$result = Resource::all();
			}else{
				$result = Resource::where('laboratory_id','=', Session::get('lab_id'))->get();
			}
			return View::make('admin.resources.index',['data' => $result]);
		}else{
			return Redirect::to('login');
		}
	}

	public function create()
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$laboratories = Laboratory::all();
			$categories = Category::all();
			$timetables = Timetable::all();
			return View::make('admin.resources.create', ['laboratories' => $laboratories, 'categories' => $categories, 'timetables' =>  $timetables]);
		}else{
			return Redirect::to('login');
		}
	}

	public function store()
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$rules = array(
	            'name'      => 'required',
	            'description'      => 'required',
	            'tags' 		=>	'required',
	            'laboratory'	=>	'required',
	            'category'	=>	'required',
	            'timetable'	=>	'required',
	            'image'		=>	'required',
	        );        
	        $messages = [
	        	'required' 	=> 'Este campo es obligatorio',
	       	];
			$validator = Validator::make(Input::all(), $rules, $messages);
			
			if($validator->fails()){
				return Redirect::to('resources/create')
				->withErrors($validator->messages())
				->withInput();
			}else{
				$resource = new Resource;
				$resource->name = Input::get('name');
				$resource->description = Input::get('description');
				$resource->laboratory_id = Input::get('laboratory');
				$resource->category_id = Input::get('category');
				$timetable_id = Input::get('timetable');
				$resource->tags = Input::get('tags');
				$name = Input::file('image')->getClientOriginalName();
				$resource->image = '/images/' . $name;
				$resource->save();
				Session::flash('message', 'Successfully created resource!');
				$resource->timetables()->attach([$timetable_id]);
				$file = Input::file('image');
				$destionationPath = public_path() . '/images/';
				$succes = $file->move($destionationPath, $name);
				return Redirect::to('resources');
			}
		}else{
			return Redirect::to('login');
		}
	}

	public function show($id)
	{	
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$resource = Resource::find($id);
			return View::make('admin.resources.show', ['resource' => $resource]);
		}else{
			return Redirect::to('login');
		}
	}

	public function edit($id)
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$resource = Resource::find($id);
			$laboratories = Laboratory::all();
			$categories = Category::all();
			$timetables = Timetable::all();
			return View::make('admin.resources.edit', ['resource' => $resource, 'laboratories' => $laboratories, 'categories' => $categories, 'timetables' =>  $timetables]);
		}else{
			return Redirect::to('login');
		}
	}

	public function update($id)
	{

		if (Session::get('school_id') && Session::get('role')==1)
		{
			$rules = array(
	            'name'      => 'required',
	            'description'      => 'required',
	            'tags' 		=>	'required',
	            'laboratory'	=>	'required',
	            'category'	=>	'required',
	            'timetable'	=>	'required',
	        );        
	        $messages = [
	        	'required' 	=> 'Este campo es obligatorio',
	       	];
			$validator = Validator::make(Input::all(), $rules, $messages);
			
			if($validator->fails()){
				return Redirect::to('resources/' . $id . '/edit')
				->withErrors($validator->messages())
				->withInput();
			}else{
				$resource = Resource::find($id);
				$resource->name = Input::get('name');
				$resource->description = Input::get('description');
				$resource->laboratory_id = Input::get('laboratory');
				$resource->category_id = Input::get('category');
				$timetable_id = Input::get('timetable');
				$resource->tags = Input::get('tags');
				if (Input::hasFile('image')){
					$name = Input::file('image')->getClientOriginalName();
					$resource->image = '/images/' . $name;	
					$file = Input::file('image');
					$destionationPath = public_path() . '/images/';
					$succes = $file->move($destionationPath, $name);
				}else{
					$resource->image = $resource->image;
				}
				$resource->save();
				Session::flash('message', 'Successfully created resource');
				$resource->timetables()->attach([$timetable_id]);
				return Redirect::to('resources');
			}
		}else{
			return Redirect::to('login');
		}
	}

	public function destroy($id)
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$resource = Resource::find($id);
			$resource->delete();
			Session::flash('message', 'Successfully deleted resource');
			return Redirect::to('resources');
		}else{
			return Redirect::to('login');
		}
	}
}
