<?php

namespace Tests\Services\Brand;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Brand\ExternalVetting\ExternalVettingImportResponse;
use Telnyx\Brand\ExternalVetting\ExternalVettingOrderResponse;
use Telnyx\Client;
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

        $result = $this->client->brand->externalVetting->list('brandId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testImport(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->brand->externalVetting->import(
            'brandId',
            evpID: 'evpId',
            vettingID: 'vettingId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalVettingImportResponse::class, $result);
    }

    #[Test]
    public function testImportWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->brand->externalVetting->import(
            'brandId',
            evpID: 'evpId',
            vettingID: 'vettingId',
            vettingToken: 'vettingToken',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalVettingImportResponse::class, $result);
    }

    #[Test]
    public function testOrder(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->brand->externalVetting->order(
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

        $result = $this->client->brand->externalVetting->order(
            'brandId',
            evpID: 'evpId',
            vettingClass: 'vettingClass'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ExternalVettingOrderResponse::class, $result);
    }
}
