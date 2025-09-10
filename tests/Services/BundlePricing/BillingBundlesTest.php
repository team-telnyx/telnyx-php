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
final class BillingBundlesTest extends TestCase
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
    public function testRetrieve(): void
    {
        $result = $this->client->bundlePricing->billingBundles->retrieve(
            '8661948c-a386-4385-837f-af00f40f111a'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->bundlePricing->billingBundles->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
