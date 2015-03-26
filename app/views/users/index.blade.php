@extends('layouts.layout')
@section('content')

<h2> USERS INDEX</h2>

	<table class="table table-striped table-bordered">
	    <thead>
	        <tr>
	            <td>ID</td>
	            <td>First Name</td>
	            <td>Last Name</td>
	            <td>email</td>
	            <td>school_id</td>
	            <td>career_id</td>
	            <td>acciones </td>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach($users as $key => $value)
	        <tr>
	            <td>{{ $value->id }}</td>
	            <td>{{ $value->first_name }}</td>
	            <td>{{ $value->last_name }}</td>
	            <td>{{ $value->email }}</td>
	            <td>{{ $value->school_id }}</td>
	            <td>{{ $value->career_id }}</td>
	            <td>

                {{ Form::open(array('url' => 'users/' . $value->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                {{ Form::close() }}

                <a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}">Show</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('users/' . $value->id . '/edit') }}">Edit</a>

            </td>
	        </tr>	        
	        @endforeach
	    </tbody>
	</table>
@stop
