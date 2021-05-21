<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {

        public function test_an_action_that_requires_authentication()
        {
            $user = User::factory()->create();
    
            $response = $this->actingAs($user)
                             ->withSession(['banned' => false])
                             ->get('/');
        }
}