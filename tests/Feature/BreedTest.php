<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BreedTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetByName()
    {
        $response = $this->get('/breeds?name=sib');

        $response->assertStatus(200);
    }
    public function testGetByNameFail()
    {
        $response = $this->get('/breeds?name=pitbull');

        $response->assertStatus(404);
    }
    public function testGetByNameBadRequest()
    {
        $response = $this->get('/breeds?potato=yes');

        $response->assertStatus(400);
    }
    public function testGetByNameLike()
    {
        $response = $this->get('/breeds?name=a');

        $response->assertStatus(200);
    }

}
