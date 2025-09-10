<?php

namespace Tests\Services\CampaignBuilder;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testQualifyByUsecase(): void
    {
        $result = $this->client->campaignBuilder->brand->qualifyByUsecase(
            'usecase',
            'brandId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testQualifyByUsecaseWithOptionalParams(): void
    {
        $result = $this->client->campaignBuilder->brand->qualifyByUsecase(
            'usecase',
            'brandId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
