<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function testExample(){

        $response = $this->get('/login');

        $response->assertStatus(200);

        /*
        .\vendor\bin\phpunit
            Comando para lanzar todos los tests
        .\vendor\bin\phpunit --filter testExample
            Comando para lanzar el test llamado testExample
        */
    }
}
