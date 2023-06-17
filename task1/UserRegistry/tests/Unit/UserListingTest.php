<?php

namespace Tests\Unit\Repository;


use App\Repository\UserRepository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserListingTest extends TestCase implements RepoTest
{
    use RefreshDatabase;

    /**
     * @var UserRepository
     */
    private $userRepo;

  
    public function Test_DB_connection_down()
    {
        Config::set('database.default', 'mysql');

        $this->expectException(QueryException::class);

        DB::table('user')->first();
    }

    public function Test_StoreOrUpdate()
    {
        $record = factory(User::class, 3);
        $record->raw(['password' => 'password']);
        $this->assertDatabaseMissing('users', $record->make()->toArray());
        $record->create();
        $this->assertDatabaseHas('users', ['id' => 1]);
    }

    public function Test_list()
    {
        factory(User::class, 3)->create();
        $repo = $this->userRepo->usersIndex();

        $this->assertInstanceOf(Collection::class, $repo);
    }

    public function Test_findById()
    {
        $users = factory(User::class, 3)->create();
        $repo = $this->userRepo->findById(1);

        $this->assertEquals($users[0]->attributes, $repo->attributes);
    }

    public function Test_destroyById()
    {
        factory(User::class)->create();

        $this->userRepo->delete(1);
        $result = $this->userRepo->findById(1);

        $this->assertEmpty($result);
    }
}
