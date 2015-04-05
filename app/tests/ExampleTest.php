<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */

	public function __construct()
  	{
      // We have no interest in testing Eloquent
      $this->mock = Mockery::mock('Eloquent', 'Post');
  	}


	public function testStore()
	{
	    Input::replace($input = [
	    	'school_id' => 'A01320622',
	    	'password' => 'Naruto22.'
		]);
	 
	    $this->mock
	         ->shouldReceive('SessionsController@store')
	         ->once()
	         ->with($input);
	 
	    $this->app->instance('Post', $this->mock);
	 
	    $this->call('POST', '/login');
	 
	    $this->assertRedirectedToRoute('/index');


	}


// 	public function testResourcesUserNoLog(){ //tests if the user can see the resources if they go directly to the index without being logged in 

// 		$this->call('GET','/index');
// 		$this->see('Recursos usados recientemente');

// // the result should be false since the user can't visit index without being logged in.

// 	}

	public function testAdminView(){ //tests if the user can see the resources if they go directly to the index without being logged in 

		$this->call('GET','/admin');
		$this->see('Horarios');

// the result should be false since the user can't visit index without being logged in.

	}

// 	public function testResourcesUserYesLog(){ //tests if the user can see the resources if they go directly to the index without being logged in 
// 		$user = new User(array('school_id' => 'A01320622'));

// 		$this->be($user);
// 		$this->call('GET','/index');
// 		$this->see('Recursos usados recientemente');

// // the result should be false since the user can't visit index without being logged in.

// 	}


	public function testLoginPageRedirect(){ //tests if something is posted in login that it is redirected to index

		$response = $this->call('POST','/login');
		$this->assertRedirectTo('/index');

	}

	protected function see($text, $element = 'body'){

		$crawler=$this->client->getCrawler();

		$found = $crawler->filter("{$element}:contains('{$text}')");
		$this->assertGreaterThan(0,count($found), "Expected to see text with {$text} in the view");



	}




}
