<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPaginationForInexplicitNumberOrders;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderGetResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderNewResponse;
use Telnyx\InexplicitNumberOrders\InexplicitNumberOrderResponse;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->inexplicitNumberOrders->create(
            orderingGroups: [
                [
                    'countRequested' => 'count_requested',
                    'countryISO' => 'US',
                    'phoneNumberType' => 'phone_number_type',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InexplicitNumberOrderNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->inexplicitNumberOrders->create(
            orderingGroups: [
                [
                    'countRequested' => 'count_requested',
                    'countryISO' => 'US',
                    'phoneNumberType' => 'phone_number_type',
                    'administrativeArea' => 'administrative_area',
                    'excludeHeldNumbers' => true,
                    'features' => ['string'],
                    'locality' => 'locality',
                    'nationalDestinationCode' => 'national_destination_code',
                    'phoneNumber' => [
                        'contains' => 'contains',
                        'endsWith' => 'ends_with',
                        'startsWith' => 'starts_with',
                    ],
                    'quickship' => true,
                    'strategy' => 'always',
                ],
            ],
            billingGroupID: 'billing_group_id',
            connectionID: 'connection_id',
            customerReference: 'customer_reference',
            messagingProfileID: 'messaging_profile_id',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InexplicitNumberOrderNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->inexplicitNumberOrders->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            DefaultFlatPaginationForInexplicitNumberOrders::class,
            $page
        );

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(InexplicitNumberOrderResponse::class, $item);
        }
    }
}
