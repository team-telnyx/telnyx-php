<?php

namespace Tests\Services\ExternalConnections;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\ExternalConnections\Uploads\Upload;
use Telnyx\ExternalConnections\Uploads\UploadGetResponse;
use Telnyx\ExternalConnections\Uploads\UploadNewResponse;
use Telnyx\ExternalConnections\Uploads\UploadPendingCountResponse;
use Telnyx\ExternalConnections\Uploads\UploadRefreshStatusResponse;
use Telnyx\ExternalConnections\Uploads\UploadRetryResponse;
use Tests\UnsupportedMockTests;

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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->uploads->create(
            '1293384261075731499',
            numberIDs: [
                '3920457616934164700',
                '3920457616934164701',
                '3920457616934164702',
                '3920457616934164703',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UploadNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->uploads->create(
            '1293384261075731499',
            numberIDs: [
                '3920457616934164700',
                '3920457616934164701',
                '3920457616934164702',
                '3920457616934164703',
            ],
            additionalUsages: ['calling_user_assignment'],
            civicAddressID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            locationID: '67ea7693-9cd5-4a68-8c76-abb3aa5bf5d2',
            usage: 'first_party_app_assignment',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UploadNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->uploads->retrieve(
            '7b6a6449-b055-45a6-81f6-f6f0dffa4cc6',
            id: '1293384261075731499'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UploadGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->uploads->retrieve(
            '7b6a6449-b055-45a6-81f6-f6f0dffa4cc6',
            id: '1293384261075731499'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UploadGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->externalConnections->uploads->list(
            '1293384261075731499'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(Upload::class, $item);
        }
    }

    #[Test]
    public function testPendingCount(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->uploads->pendingCount(
            '1293384261075731499'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UploadPendingCountResponse::class, $result);
    }

    #[Test]
    public function testRefreshStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->uploads->refreshStatus(
            '1293384261075731499'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UploadRefreshStatusResponse::class, $result);
    }

    #[Test]
    public function testRetry(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->uploads->retry(
            '7b6a6449-b055-45a6-81f6-f6f0dffa4cc6',
            id: '1293384261075731499'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UploadRetryResponse::class, $result);
    }

    #[Test]
    public function testRetryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalConnections->uploads->retry(
            '7b6a6449-b055-45a6-81f6-f6f0dffa4cc6',
            id: '1293384261075731499'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UploadRetryResponse::class, $result);
    }
}
