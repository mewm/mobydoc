<?php

class HomeControllerTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_it_loads_oage_ok()
	{
//		$crawler = $this->client->request('GET', '/');

//		$this->assertTrue($this->client->getResponse()->isOk());
	}
	
	public function test_it_loads_documentation_index()
	{
//		$crawler = $this->client->request('GET', '/index');

//		$this->assertTrue($this->client->getResponse()->isOk());
	}
	
	public function test_can_load_documentation_service()
	{
		$documentationService = $this->app->make('\\Mobydoc\\Documentation\\DocumentationServiceInterface');
		
		$this->assertInstanceOf('\\Mobydoc\\Documentation\\DocumentationServiceInterface', $documentationService);
	}
}
