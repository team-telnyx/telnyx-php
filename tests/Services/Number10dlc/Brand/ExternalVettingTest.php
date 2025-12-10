<?php

namespace Tests\Services\Number10dlc\Brand;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingExternalVettingResponse;
use Telnyx\Number10dlc\Brand\ExternalVetting\ExternalVettingUpdateExternalVettingResponse;
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
    public function testExternalVetting(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->number10dlc
            ->brand
            ->externalVetting
            ->externalVetting(
                'brandId',
                evpID: 'evpId',
                vettingClass: 'vettingClass'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalVettingExternalVettingResponse::class,
            $result
        );
    }

    #[Test]
    public function testExternalVettingWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->number10dlc
            ->brand
            ->externalVetting
            ->externalVetting(
                'brandId',
                evpID: 'evpId',
                vettingClass: 'vettingClass'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalVettingExternalVettingResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveExternalVetting(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->number10dlc
            ->brand
            ->externalVetting
            ->retrieveExternalVetting('brandId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testUpdateExternalVetting(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->number10dlc
            ->brand
            ->externalVetting
            ->updateExternalVetting(
                'brandId',
                evpID: 'evpId',
                vettingID: 'vettingId'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalVettingUpdateExternalVettingResponse::class,
            $result
        );
    }

    #[Test]
    public function testUpdateExternalVettingWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->number10dlc
            ->brand
            ->externalVetting
            ->updateExternalVetting(
                'brandId',
                evpID: 'evpId',
                vettingID: 'vettingId',
                vettingToken: 'vettingToken',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ExternalVettingUpdateExternalVettingResponse::class,
            $result
        );
    }
}
