<?php

namespace Tests\Unit;
use App\User;
use App\Address;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddressTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateAddress()
    {
        $user = User::where('email','testUser@gmail.com')->first();
    	$user2 = User::where('email','testUser2@gmail.com')->first();
    	$user3 = User::where('email','testUser3@gmail.com')->first();

    	$add = factory(Address::class)->create(['user_id' => $user->id]);
        $add2 = factory(Address::class)->create(['user_id' => $user2->id]);
        $add3 = factory(Address::class)->create(['user_id' => $user3->id]);
    }

    public function testAssertSingleRealtionship(){
    	$user = User::where('email','testUser@gmail.com')->first();
    	$adds = $user->addresses;
    	foreach ($adds as $address) {
    		$this->assertInstanceOf(Address::class, $address);
    	}
    }

    public function testAssertMultipleRealtionship(){

    	$user = User::where('email','testUser@gmail.com')->first();
    	$add = factory(Address::class)->create(['user_id' => $user->id, 'is_default'=>false]);
        $add2 = factory(Address::class)->create(['user_id' => $user->id, 'is_default'=>false]);
        $add3 = factory(Address::class)->create(['user_id' => $user->id, 'is_default'=>false]);

    	$adds = $user->addresses;
    	foreach ($adds as $address) {
    		$this->assertInstanceOf(Address::class, $address);
    	}
    }

    public function testDumpTestData(){
    	$user = User::where('email','testUser@gmail.com')->first();
    	$adds = $user->addresses;
    	foreach ($adds as $address) {
    		var_dump($address->toJson());
    	}

    }
}
