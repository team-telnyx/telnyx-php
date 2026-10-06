<?php

namespace Tests\Services\Whatsapp\PhoneNumbers;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingListResponse;
use Telnyx\Whatsapp\PhoneNumbers\CallingRouting\CallingRoutingPatchAllResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CallingRoutingTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->whatsapp->phoneNumbers->callingRouting->list(
            '+13125550100'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallingRoutingListResponse::class, $result);
    }

    #[Test]
    public function testPatchAll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->whatsapp->phoneNumbers->callingRouting->patchAll(
            '+13125550100',
            connectionID: '1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallingRoutingPatchAllResponse::class, $result);
    }

    #[Test]
    public function testPatchAllWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->whatsapp->phoneNumbers->callingRouting->patchAll(
            '+13125550100',
            connectionID: '1234567890'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallingRoutingPatchAllResponse::class, $result);
    }
}
