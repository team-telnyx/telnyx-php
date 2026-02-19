<?php

namespace Tests\Services\Storage\Buckets;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;
use Telnyx\Storage\Buckets\Usage\UsageGetBucketUsageResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class UsageTest extends TestCase
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
    public function testGetAPIUsage(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->storage->buckets->usage->getAPIUsage(
            '',
            filter: [
                'endTime' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'startTime' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UsageGetAPIUsageResponse::class, $result);
    }

    #[Test]
    public function testGetAPIUsageWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->storage->buckets->usage->getAPIUsage(
            '',
            filter: [
                'endTime' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                'startTime' => new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UsageGetAPIUsageResponse::class, $result);
    }

    #[Test]
    public function testGetBucketUsage(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->storage->buckets->usage->getBucketUsage('');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UsageGetBucketUsageResponse::class, $result);
    }
}
