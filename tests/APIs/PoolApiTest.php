<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Pool;

class PoolApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_pool()
    {
        $pool = Pool::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/pools', $pool
        );

        $this->assertApiResponse($pool);
    }

    /**
     * @test
     */
    public function test_read_pool()
    {
        $pool = Pool::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/pools/'.$pool->id
        );

        $this->assertApiResponse($pool->toArray());
    }

    /**
     * @test
     */
    public function test_update_pool()
    {
        $pool = Pool::factory()->create();
        $editedPool = Pool::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/pools/'.$pool->id,
            $editedPool
        );

        $this->assertApiResponse($editedPool);
    }

    /**
     * @test
     */
    public function test_delete_pool()
    {
        $pool = Pool::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/pools/'.$pool->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/pools/'.$pool->id
        );

        $this->response->assertStatus(404);
    }
}
