<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialGetResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialNewResponse;
use Telnyx\CustomStorageCredentials\CustomStorageCredentialUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CustomStorageCredentialsTest extends TestCase
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

        $result = $this->client->customStorageCredentials->create(
            'connection_id',
            backend: 'gcs',
            configuration: ['backend' => 'gcs']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomStorageCredentialNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customStorageCredentials->create(
            'connection_id',
            backend: 'gcs',
            configuration: [
                'backend' => 'gcs',
                'bucket' => 'example-bucket',
                'credentials' => 'OPAQUE_CREDENTIALS_TOKEN',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomStorageCredentialNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customStorageCredentials->retrieve(
            'connection_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CustomStorageCredentialGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customStorageCredentials->update(
            'connection_id',
            backend: 'gcs',
            configuration: ['backend' => 'gcs']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CustomStorageCredentialUpdateResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customStorageCredentials->update(
            'connection_id',
            backend: 'gcs',
            configuration: [
                'backend' => 'gcs',
                'bucket' => 'example-bucket',
                'credentials' => 'OPAQUE_CREDENTIALS_TOKEN',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            CustomStorageCredentialUpdateResponse::class,
            $result
        );
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->customStorageCredentials->delete('connection_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
