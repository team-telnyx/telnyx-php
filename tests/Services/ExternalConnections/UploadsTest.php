<?php

namespace Tests\Services\ExternalConnections;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class UploadsTest extends TestCase
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
    public function testCreate(): void
    {
        $result = $this->client->externalConnections->uploads->create(
            'id',
            numberIDs: [
                '3920457616934164700',
                '3920457616934164701',
                '3920457616934164702',
                '3920457616934164703',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->externalConnections->uploads->create(
            'id',
            numberIDs: [
                '3920457616934164700',
                '3920457616934164701',
                '3920457616934164702',
                '3920457616934164703',
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->externalConnections->uploads->retrieve(
            '7b6a6449-b055-45a6-81f6-f6f0dffa4cc6',
            'id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        $result = $this->client->externalConnections->uploads->retrieve(
            '7b6a6449-b055-45a6-81f6-f6f0dffa4cc6',
            'id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->externalConnections->uploads->list('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPendingCount(): void
    {
        $result = $this->client->externalConnections->uploads->pendingCount('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRefreshStatus(): void
    {
        $result = $this->client->externalConnections->uploads->refreshStatus('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetry(): void
    {
        $result = $this->client->externalConnections->uploads->retry(
            '7b6a6449-b055-45a6-81f6-f6f0dffa4cc6',
            'id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetryWithOptionalParams(): void
    {
        $result = $this->client->externalConnections->uploads->retry(
            '7b6a6449-b055-45a6-81f6-f6f0dffa4cc6',
            'id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
