<?php

namespace Tests\Services\Storage\Buckets;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageParams\Filter;

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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testGetAPIUsage(): void
    {
        $result = $this->client->storage->buckets->usage->getAPIUsage(
            '',
            Filter::with(
                endTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                startTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            ),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetAPIUsageWithOptionalParams(): void
    {
        $result = $this->client->storage->buckets->usage->getAPIUsage(
            '',
            Filter::with(
                endTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
                startTime: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            ),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetBucketUsage(): void
    {
        $result = $this->client->storage->buckets->usage->getBucketUsage('');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
