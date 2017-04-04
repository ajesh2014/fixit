<?php

namespace Tests\Unit;
use App\User;
use App\Address;
use App\Job;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JobTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateJob()
    {
        $user = User::where('email','testUser@gmail.com')->first();
    	$user2 = User::where('email','testUser2@gmail.com')->first();
    	$user3 = User::where('email','testUser3@gmail.com')->first();

    	//$address = User::find($user->id)->addresses()->where('is_default', true)->first();
    	//$addres2 = User::find($user->id)->addresses()->where('is_default', true)->first();
    	//$addres3 = User::find($user->id)->addresses()->where('is_default', true)->first();

       $job = factory(Address::class)->create(['user_id' => $user->id ]);
       $job2 = factory(Address::class)->create(['user_id' => $user2->id]);
       $job3 = factory(Address::class)->create(['user_id' => $user3->id ]);

    }


    public function testAssertSingleRealtionship(){
    	$user = User::where('email','testUser@gmail.com')->first();
    	$jobs = $user->jobs;
    	foreach ($jobs as $job) {
    		$this->assertInstanceOf(Job::class, $job) ;
    	}
    }

    public function testAssertMultipleRealtionship(){

    	$user = User::where('email','testUser@gmail.com')->first();
    	$job = factory(Job::class)->create(['user_id' => $user->id]);
        $job2 = factory(Job::class)->create(['user_id' => $user->id]);
        $job3 = factory(Job::class)->create(['user_id' => $user->id]);

    	$jobs = $user->jobs;
    	foreach ($jobs as $job) {
    		$this->assertInstanceOf(Job::class, $job) ;
    	}
    }

    public function testDumpTestData(){
    	$user = User::where('email','testUser@gmail.com')->first();
    	$adds = $user->addresses;
    	$jobs = $user->jobs;
    	foreach ($jobs as $job) {
    		var_dump($job->toArray()) ;
    	}

    }
}
