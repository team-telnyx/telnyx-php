<?php

namespace Tests\Services\Storage;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Storage\MigrationSources\MigrationSourceCreateParams\ProviderAuth;

/**
 * @internal
 */
#[CoversNothing]
final class MigrationSourcesTest extends TestCase
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
        $result = $this->client->storage->migrationSources->create(
            bucketName: 'bucket_name',
            provider: 'aws',
            providerAuth: (new ProviderAuth),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->storage->migrationSources->create(
            bucketName: 'bucket_name',
            provider: 'aws',
            providerAuth: (new ProviderAuth)
                ->withAccessKey('access_key')
                ->withSecretAccessKey('secret_access_key'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->storage->migrationSources->retrieve('');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->storage->migrationSources->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->storage->migrationSources->delete('');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
