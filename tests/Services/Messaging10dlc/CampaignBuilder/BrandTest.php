<?php

namespace Tests\Services\Messaging10dlc\CampaignBuilder;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Messaging10dlc\CampaignBuilder\Brand\BrandQualifyByUsecaseResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BrandTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testQualifyByUsecase(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->messaging10dlc
            ->campaignBuilder
            ->brand
            ->qualifyByUsecase('usecase', brandID: 'brandId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandQualifyByUsecaseResponse::class, $result);
    }

    #[Test]
    public function testQualifyByUsecaseWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->messaging10dlc
            ->campaignBuilder
            ->brand
            ->qualifyByUsecase('usecase', brandID: 'brandId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandQualifyByUsecaseResponse::class, $result);
    }
}
