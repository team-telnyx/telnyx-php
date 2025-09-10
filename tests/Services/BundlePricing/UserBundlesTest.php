<?php

namespace Tests\Services\BundlePricing;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class UserBundlesTest extends TestCase
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
        $result = $this->client->bundlePricing->userBundles->create();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->bundlePricing->userBundles->retrieve(
            'ca1d2263-d1f1-43ac-ba53-248e7a4bb26a'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->bundlePricing->userBundles->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeactivate(): void
    {
        $result = $this->client->bundlePricing->userBundles->deactivate(
            'ca1d2263-d1f1-43ac-ba53-248e7a4bb26a'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListResources(): void
    {
        $result = $this->client->bundlePricing->userBundles->listResources(
            'ca1d2263-d1f1-43ac-ba53-248e7a4bb26a'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListUnused(): void
    {
        $result = $this->client->bundlePricing->userBundles->listUnused();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
