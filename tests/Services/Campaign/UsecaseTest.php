<?php

namespace Tests\Services\Campaign;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class UsecaseTest extends TestCase
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
    public function testGetCost(): void
    {
        $result = $this->client->campaign->usecase->getCost('usecase');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetCostWithOptionalParams(): void
    {
        $result = $this->client->campaign->usecase->getCost('usecase');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
