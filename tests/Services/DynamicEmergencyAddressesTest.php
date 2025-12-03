<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\DefaultPagination;
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

        $result = $this->client->dynamicEmergencyAddresses->create([
            'administrative_area' => 'TX',
            'country_code' => 'US',
            'house_number' => 'house_number',
            'locality' => 'Austin',
            'postal_code' => '78701',
            'street_name' => 'Congress',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DynamicEmergencyAddressNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->dynamicEmergencyAddresses->create([
            'administrative_area' => 'TX',
            'country_code' => 'US',
            'house_number' => 'house_number',
            'locality' => 'Austin',
            'postal_code' => '78701',
            'street_name' => 'Congress',
            'extended_address' => 'extended_address',
            'house_suffix' => 'house_suffix',
            'street_post_directional' => 'street_post_directional',
            'street_pre_directional' => 'street_pre_directional',
            'street_suffix' => 'St',
        ]);

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

        $result = $this->client->dynamicEmergencyAddresses->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $result);
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
