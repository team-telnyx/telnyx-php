<?php

namespace Tests\Services\PhoneNumbers;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\PhoneNumbers\Actions\ActionChangeBundleStatusResponse;
use Telnyx\PhoneNumbers\Actions\ActionEnableEmergencyResponse;
use Telnyx\PhoneNumbers\Actions\ActionVerifyOwnershipResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ActionsTest extends TestCase
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
    public function testChangeBundleStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->actions->changeBundleStatus(
            '1293384261075731499',
            bundleID: '5194d8fc-87e6-4188-baa9-1c434bbe861b'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionChangeBundleStatusResponse::class, $result);
    }

    #[Test]
    public function testChangeBundleStatusWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->actions->changeBundleStatus(
            '1293384261075731499',
            bundleID: '5194d8fc-87e6-4188-baa9-1c434bbe861b'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionChangeBundleStatusResponse::class, $result);
    }

    #[Test]
    public function testEnableEmergency(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->actions->enableEmergency(
            '1293384261075731499',
            emergencyAddressID: '53829456729313',
            emergencyEnabled: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionEnableEmergencyResponse::class, $result);
    }

    #[Test]
    public function testEnableEmergencyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->actions->enableEmergency(
            '1293384261075731499',
            emergencyAddressID: '53829456729313',
            emergencyEnabled: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionEnableEmergencyResponse::class, $result);
    }

    #[Test]
    public function testVerifyOwnership(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->actions->verifyOwnership(
            phoneNumbers: ['+15551234567']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionVerifyOwnershipResponse::class, $result);
    }

    #[Test]
    public function testVerifyOwnershipWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->actions->verifyOwnership(
            phoneNumbers: ['+15551234567']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionVerifyOwnershipResponse::class, $result);
    }
}
