<?php

class ExampleTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');

		$this->assertTrue($this->client->getResponse()->isOk());
	}

	public function testResourcesUser(){

		// $response=$this->call('GET','/index');
		// $this->assertTrue(strpos($response->getContent(),'i')!==false);

		$crawler=$this->client->request('GET','/index');
		$found=$crawler->filter("body:contains('Recursos')");
		$this->assertGreaterThan(0,count($found),'Expected to see text within the view.');

		// $this->assertTrue(true);
	}

}
