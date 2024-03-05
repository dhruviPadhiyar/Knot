<?php

namespace Tests\Unit;

use App\Models\User;
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


    public function test_it_gets_all_the_users(){
        $response = $this->get('/api/v1/users');
        $response->assertStatus(200);
    }

    public function test_it_fetches_the_specific_user(){
        $response = $this->get('/api/v1/users/16');
        $response->assertStatus(200);
    }

    public function test_it_creates_new_user()
    {
        $response = $this->post('/api/v1/users', [
            'name' => 'new',
            'email' => 'newUser@mail.com',
            'password' => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(200);
    }

    public function test_it_updates_the_user(){
        // $rep
    }

    public function test_it_deletes_the_user(){
        $user = User::where('name','new')->first();
        $userId = $user->id;
        $response = $this->delete("/api/v1/users/$userId");
        $response->assertStatus(200);
    }

}
