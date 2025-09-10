<?php

namespace Tests\Services\PortingOrders;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\PortingOrders\ActionRequirements\ActionRequirementInitiateParams\Params;

/**
 * @internal
 */
#[CoversNothing]
final class ActionRequirementsTest extends TestCase
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
        $result = $this->client->portingOrders->actionRequirements->list(
            'porting_order_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testInitiate(): void
    {
        $result = $this->client->portingOrders->actionRequirements->initiate(
            'id',
            portingOrderID: 'porting_order_id',
            params: Params::with(firstName: 'John', lastName: 'Doe'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testInitiateWithOptionalParams(): void
    {
        $result = $this->client->portingOrders->actionRequirements->initiate(
            'id',
            portingOrderID: 'porting_order_id',
            params: Params::with(firstName: 'John', lastName: 'Doe'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
