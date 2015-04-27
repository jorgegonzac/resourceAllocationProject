<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */


	public function testResourcesUserNoLog(){ //tests if the user can see the resources if they go directly to the index without being logged in 

		$this->call('GET','/index');
		$this->see('Recursos usados recientemente');

// the result should be false since the user can't visit index without being logged in.

	}


	public function testLoginPageRedirect(){ //tests if something is posted in login that it is redirected to index

		$response = $this->call('POST','/login');
		$this->assertRedirectTo('/index');

	}

	

	protected function see($text, $element = 'body'){

		$crawler=$this->client->getCrawler();

		$found = $crawler->filter("{$element}:contains('{$text}')");
		$this->assertGreaterThan(0,count($found), "Expected to see text with {$text} in the view");



	}

	/***************************************************

Admin view tests--Check that what is supposed to show is showing

	**************************************************/



	public function testAdminViewInicio(){ 
		$this->call('GET','/admin');
		$this->see('Admin Page','h2');


	}

	public function testAdminViewUsers(){

		$this->call('GET','/users');
		$this->see('Usuarios','h2');


	}

	public function testAdminViewLaboratorios(){

		$this->call('GET','/laboratories');
		$this->see('Laboratorios','h2');


	}

	public function testAdminViewCategories(){

		$this->call('GET','/categories');
		$this->see('Categorías','h2');


	}

	public function testAdminViewResources(){

		$this->call('GET','/resources');
		$this->see('Recursos','h2');

	}

	public function testAdminViewTimeTables(){

		$this->call('GET','/timetables');
		$this->see('Calendarios','h2');


	}

	public function testAdminViewSchedules(){

		$this->call('GET','/schedules');
		$this->see('Horarios','h2');


	}






}
