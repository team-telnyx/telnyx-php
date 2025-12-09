<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\DefaultPagination;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddress;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressDeleteResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressGetResponse;
use Telnyx\DynamicEmergencyAddresses\DynamicEmergencyAddressNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DynamicEmergencyAddressesTest extends TestCase
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
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->dynamicEmergencyAddresses->create(
            administrativeArea: 'TX',
            countryCode: 'US',
            houseNumber: '600',
            locality: 'Austin',
            postalCode: '78701',
            streetName: 'Congress',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DynamicEmergencyAddressNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->dynamicEmergencyAddresses->create(
            administrativeArea: 'TX',
            countryCode: 'US',
            houseNumber: '600',
            locality: 'Austin',
            postalCode: '78701',
            streetName: 'Congress',
            extendedAddress: 'extended_address',
            houseSuffix: 'house_suffix',
            streetPostDirectional: 'street_post_directional',
            streetPreDirectional: 'street_pre_directional',
            streetSuffix: 'St',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DynamicEmergencyAddressNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->dynamicEmergencyAddresses->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DynamicEmergencyAddressGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $page = $this->client->dynamicEmergencyAddresses->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(DynamicEmergencyAddress::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->dynamicEmergencyAddresses->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            DynamicEmergencyAddressDeleteResponse::class,
            $result
        );
    }
}
