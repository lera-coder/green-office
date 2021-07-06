<?php namespace Tests\Repositories;

use App\Models\Pool;
use App\Repositories\PoolRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PoolRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PoolRepository
     */
    protected $poolRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->poolRepo = \App::make(PoolRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_pool()
    {
        $pool = Pool::factory()->make()->toArray();

        $createdPool = $this->poolRepo->create($pool);

        $createdPool = $createdPool->toArray();
        $this->assertArrayHasKey('id', $createdPool);
        $this->assertNotNull($createdPool['id'], 'Created Pool must have id specified');
        $this->assertNotNull(Pool::find($createdPool['id']), 'Pool with given id must be in DB');
        $this->assertModelData($pool, $createdPool);
    }

    /**
     * @test read
     */
    public function test_read_pool()
    {
        $pool = Pool::factory()->create();

        $dbPool = $this->poolRepo->find($pool->id);

        $dbPool = $dbPool->toArray();
        $this->assertModelData($pool->toArray(), $dbPool);
    }

    /**
     * @test update
     */
    public function test_update_pool()
    {
        $pool = Pool::factory()->create();
        $fakePool = Pool::factory()->make()->toArray();

        $updatedPool = $this->poolRepo->update($fakePool, $pool->id);

        $this->assertModelData($fakePool, $updatedPool->toArray());
        $dbPool = $this->poolRepo->find($pool->id);
        $this->assertModelData($fakePool, $dbPool->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_pool()
    {
        $pool = Pool::factory()->create();

        $resp = $this->poolRepo->delete($pool->id);

        $this->assertTrue($resp);
        $this->assertNull(Pool::find($pool->id), 'Pool should not exist in DB');
    }
}
