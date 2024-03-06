<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_database(){
        $this->assertDatabaseHas('users',['name'=>'handy']);
    }
    public function test_it_gets_all_the_users()
    {
        $response = $this->get('/api/v1/users');
        $response->assertStatus(200);
    }

    public function test_it_fetches_the_specific_user()
    {
        $response = $this->get('/api/v1/users/16');
        $response->assertStatus(200);
    }

    public function test_it_stores_new_user()
    {
        $response = $this->post('/api/v1/users', [
            'name' => 'green',
            'email' => 'green@mail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(200);
    }

    public function test_it_updates_the_user()
    {
        $response = $this->put('/api/v1/users/41', [
            'name' => 'blue'
        ]);
        $response->assertStatus(200);
    }

    public function test_it_deletes_the_user()
    {
        $user = User::where('name', 'green')->first();
        $userId = $user->id;
        $response = $this->delete("/api/v1/users/$userId");
        $response->assertStatus(200);
    }

}
