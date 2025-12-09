<?php

namespace Tests\Services\Number10dlc\Brand;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingImportsResponse;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingOrderResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ExternalVettingTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->externalVetting->list(
            'brandId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testImports(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->externalVetting->imports(
            'brandId',
            evpID: 'evpId',
            vettingID: 'vettingId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalVettingImportsResponse::class, $result);
    }

    #[Test]
    public function testImportsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->externalVetting->imports(
            'brandId',
            evpID: 'evpId',
            vettingID: 'vettingId',
            vettingToken: 'vettingToken',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalVettingImportsResponse::class, $result);
    }

    #[Test]
    public function testOrder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->externalVetting->order(
            'brandId',
            evpID: 'evpId',
            vettingClass: 'vettingClass'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalVettingOrderResponse::class, $result);
    }

    #[Test]
    public function testOrderWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->externalVetting->order(
            'brandId',
            evpID: 'evpId',
            vettingClass: 'vettingClass'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalVettingOrderResponse::class, $result);
    }
}
