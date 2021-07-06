<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\PortfolioPhoto;

class PortfolioPhotoApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_portfolio_photo()
    {
        $portfolioPhoto = PortfolioPhoto::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/portfolio_photos', $portfolioPhoto
        );

        $this->assertApiResponse($portfolioPhoto);
    }

    /**
     * @test
     */
    public function test_read_portfolio_photo()
    {
        $portfolioPhoto = PortfolioPhoto::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/portfolio_photos/'.$portfolioPhoto->id
        );

        $this->assertApiResponse($portfolioPhoto->toArray());
    }

    /**
     * @test
     */
    public function test_update_portfolio_photo()
    {
        $portfolioPhoto = PortfolioPhoto::factory()->create();
        $editedPortfolioPhoto = PortfolioPhoto::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/portfolio_photos/'.$portfolioPhoto->id,
            $editedPortfolioPhoto
        );

        $this->assertApiResponse($editedPortfolioPhoto);
    }

    /**
     * @test
     */
    public function test_delete_portfolio_photo()
    {
        $portfolioPhoto = PortfolioPhoto::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/portfolio_photos/'.$portfolioPhoto->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/portfolio_photos/'.$portfolioPhoto->id
        );

        $this->response->assertStatus(404);
    }
}
