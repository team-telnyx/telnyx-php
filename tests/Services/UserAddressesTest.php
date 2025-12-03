<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\DefaultPagination;
use Telnyx\UserAddresses\UserAddressGetResponse;
use Telnyx\UserAddresses\UserAddressNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class UserAddressesTest extends TestCase
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

        $result = $this->client->userAddresses->create([
            'business_name' => 'Toy-O\'Kon',
            'country_code' => 'US',
            'first_name' => 'Alfred',
            'last_name' => 'Foster',
            'locality' => 'Austin',
            'street_address' => '600 Congress Avenue',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserAddressNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->userAddresses->create([
            'business_name' => 'Toy-O\'Kon',
            'country_code' => 'US',
            'first_name' => 'Alfred',
            'last_name' => 'Foster',
            'locality' => 'Austin',
            'street_address' => '600 Congress Avenue',
            'administrative_area' => 'TX',
            'borough' => 'Guadalajara',
            'customer_reference' => 'MY REF 001',
            'extended_address' => '14th Floor',
            'neighborhood' => 'Ciudad de los deportes',
            'phone_number' => '+12125559000',
            'postal_code' => '78701',
            'skip_address_verification' => 'skip_address_verification',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserAddressNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->userAddresses->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(UserAddressGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->userAddresses->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $result);
    }
}
