<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class SimCardOrderPreviewTest extends TestCase
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
    public function testPreview(): void
    {
        $result = $this->client->simCardOrderPreview->preview(
            addressID: '1293384261075731499',
            quantity: 21
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPreviewWithOptionalParams(): void
    {
        $result = $this->client->simCardOrderPreview->preview(
            addressID: '1293384261075731499',
            quantity: 21
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
