<?php

namespace Tests\Unit;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
	/* COMMAND : vendor/bin/phpunit --debug --filter UserTest */
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $user = factory(User::class)->create(['email' => 'testUser@gmail.com']);
        $user2 = factory(User::class)->create(['email' => 'testUser2@gmail.com']);
        $user3 = factory(User::class)->create(['email' => 'testUser3@gmail.com']);

        
    }

    public function testAssertUserType()
    {
    	$user = User::where('email','testUser@gmail.com')->first();
    	$user2 = User::where('email','testUser2@gmail.com')->first();
    	$user3 = User::where('email','testUser3@gmail.com')->first();
    	$this->assertEquals($user->usertype_id, 1);
    	$this->assertEquals($user2->usertype_id, 1);
    	$this->assertEquals($user3->usertype_id, 1);

    }

    public function testAssertEmail()
    {
    	 $this->assertDatabaseHas('users', [
        'email' => 'testUser@gmail.com'
    	]);

    	$this->assertDatabaseHas('users', [
        'email' => 'testUser2@gmail.com'
    	]);

    	$this->assertDatabaseHas('users', [
        'email' => 'testUser3@gmail.com'
    	]);

    }

    public function testDumpTestData()
    {
    	$user = User::where('email','testUser@gmail.com')->first();
    	$user2 = User::where('email','testUser2@gmail.com')->first();
    	$user3 = User::where('email','testUser3@gmail.com')->first();
    	var_dump($user->toJson());
    	var_dump($user2->toJson());
    	var_dump($user3->toJson());
    }
}
