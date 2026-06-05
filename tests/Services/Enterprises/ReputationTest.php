<?php

namespace Tests\Services\Enterprises;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Enterprises\Reputation\ReputationEnableResponse;
use Telnyx\Enterprises\Reputation\ReputationGetResponse;
use Telnyx\Enterprises\Reputation\ReputationUpdateFrequencyResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ReputationTest extends TestCase
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->retrieve(
            '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReputationGetResponse::class, $result);
    }

    #[Test]
    public function testDisable(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->disable(
            '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testEnable(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->enable(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            loaDocumentID: '2a7e8337-e803-4057-a4ae-26c40eb0bc6c',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReputationEnableResponse::class, $result);
    }

    #[Test]
    public function testEnableWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->enable(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            loaDocumentID: '2a7e8337-e803-4057-a4ae-26c40eb0bc6c',
            checkFrequency: 'business_daily',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReputationEnableResponse::class, $result);
    }

    #[Test]
    public function testUpdateFrequency(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->updateFrequency(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            checkFrequency: 'weekly'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReputationUpdateFrequencyResponse::class, $result);
    }

    #[Test]
    public function testUpdateFrequencyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->updateFrequency(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            checkFrequency: 'weekly'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReputationUpdateFrequencyResponse::class, $result);
    }
}
