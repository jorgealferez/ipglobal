<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_post()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/posts/store',[
            'title' => 'Publicación de prueba',
            'body' => 'Contenido de la publicación de prueba',
            'user_id' => $user->id
        ]);
        $response->assertStatus(201);
    }
    public function test_get_post()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/posts/store',[
            'title' => 'Publicación de prueba',
            'body' => 'Contenido de la publicación de prueba',
            'user_id' => $user->id
        ]);
        $response = $this->get('/api/posts/get/'.$response['data']['id']);

        $response->assertStatus(200);
    }
}
