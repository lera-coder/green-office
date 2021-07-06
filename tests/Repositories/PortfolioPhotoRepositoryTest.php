<?php namespace Tests\Repositories;

use App\Models\PortfolioPhoto;
use App\Repositories\PortfolioPhotoRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class PortfolioPhotoRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var PortfolioPhotoRepository
     */
    protected $portfolioPhotoRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->portfolioPhotoRepo = \App::make(PortfolioPhotoRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_portfolio_photo()
    {
        $portfolioPhoto = PortfolioPhoto::factory()->make()->toArray();

        $createdPortfolioPhoto = $this->portfolioPhotoRepo->create($portfolioPhoto);

        $createdPortfolioPhoto = $createdPortfolioPhoto->toArray();
        $this->assertArrayHasKey('id', $createdPortfolioPhoto);
        $this->assertNotNull($createdPortfolioPhoto['id'], 'Created PortfolioPhoto must have id specified');
        $this->assertNotNull(PortfolioPhoto::find($createdPortfolioPhoto['id']), 'PortfolioPhoto with given id must be in DB');
        $this->assertModelData($portfolioPhoto, $createdPortfolioPhoto);
    }

    /**
     * @test read
     */
    public function test_read_portfolio_photo()
    {
        $portfolioPhoto = PortfolioPhoto::factory()->create();

        $dbPortfolioPhoto = $this->portfolioPhotoRepo->find($portfolioPhoto->id);

        $dbPortfolioPhoto = $dbPortfolioPhoto->toArray();
        $this->assertModelData($portfolioPhoto->toArray(), $dbPortfolioPhoto);
    }

    /**
     * @test update
     */
    public function test_update_portfolio_photo()
    {
        $portfolioPhoto = PortfolioPhoto::factory()->create();
        $fakePortfolioPhoto = PortfolioPhoto::factory()->make()->toArray();

        $updatedPortfolioPhoto = $this->portfolioPhotoRepo->update($fakePortfolioPhoto, $portfolioPhoto->id);

        $this->assertModelData($fakePortfolioPhoto, $updatedPortfolioPhoto->toArray());
        $dbPortfolioPhoto = $this->portfolioPhotoRepo->find($portfolioPhoto->id);
        $this->assertModelData($fakePortfolioPhoto, $dbPortfolioPhoto->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_portfolio_photo()
    {
        $portfolioPhoto = PortfolioPhoto::factory()->create();

        $resp = $this->portfolioPhotoRepo->delete($portfolioPhoto->id);

        $this->assertTrue($resp);
        $this->assertNull(PortfolioPhoto::find($portfolioPhoto->id), 'PortfolioPhoto should not exist in DB');
    }
}
