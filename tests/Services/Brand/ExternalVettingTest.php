<?php

namespace Tests\Services\Brand;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

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
        $result = $this->client->brand->externalVetting->list('brandId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testImport(): void
    {
        $result = $this->client->brand->externalVetting->import(
            'brandId',
            evpID: 'evpId',
            vettingID: 'vettingId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testImportWithOptionalParams(): void
    {
        $result = $this->client->brand->externalVetting->import(
            'brandId',
            evpID: 'evpId',
            vettingID: 'vettingId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testOrder(): void
    {
        $result = $this->client->brand->externalVetting->order(
            'brandId',
            evpID: 'evpId',
            vettingClass: 'vettingClass'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testOrderWithOptionalParams(): void
    {
        $result = $this->client->brand->externalVetting->order(
            'brandId',
            evpID: 'evpId',
            vettingClass: 'vettingClass'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
