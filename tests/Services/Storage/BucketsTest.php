<?php

namespace Tests\Services\Storage;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class BucketsTest extends TestCase
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
    public function testCreatePresignedURL(): void
    {
        $result = $this->client->storage->buckets->createPresignedURL(
            '',
            bucketName: ''
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreatePresignedURLWithOptionalParams(): void
    {
        $result = $this->client->storage->buckets->createPresignedURL(
            '',
            bucketName: ''
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
