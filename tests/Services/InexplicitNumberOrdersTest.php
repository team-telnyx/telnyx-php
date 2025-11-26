<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderListResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class InexplicitNumberOrdersTest extends TestCase
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

        $result = $this->client->inexplicitNumberOrders->create([
            'ordering_groups' => [
                [
                    'count_requested' => 'count_requested',
                    'country_iso' => 'US',
                    'phone_number_type' => 'phone_number_type',
                ],
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InexplicitNumberOrderNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->inexplicitNumberOrders->create([
            'ordering_groups' => [
                [
                    'count_requested' => 'count_requested',
                    'country_iso' => 'US',
                    'phone_number_type' => 'phone_number_type',
                    'administrative_area' => 'administrative_area',
                    'features' => ['string'],
                    'locality' => 'locality',
                    'national_destination_code' => 'national_destination_code',
                    'phone_number' => [
                        'contains' => 'contains',
                        'ends_with' => 'ends_with',
                        'starts_with' => 'starts_with',
                    ],
                    'strategy' => 'always',
                ],
            ],
            'billing_group_id' => 'billing_group_id',
            'connection_id' => 'connection_id',
            'customer_reference' => 'customer_reference',
            'messaging_profile_id' => 'messaging_profile_id',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InexplicitNumberOrderNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->inexplicitNumberOrders->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InexplicitNumberOrderGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->inexplicitNumberOrders->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InexplicitNumberOrderListResponse::class, $result);
    }
}
