<?php

namespace Tests\Services\Messaging10dlc;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PhoneNumberAssignmentByProfileTest extends TestCase
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
    public function testAssign(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->messaging10dlc
            ->phoneNumberAssignmentByProfile
            ->assign(messagingProfileID: '4001767e-ce0f-4cae-9d5f-0d5e636e7809')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PhoneNumberAssignmentByProfileAssignResponse::class,
            $result
        );
    }

    #[Test]
    public function testAssignWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->messaging10dlc
            ->phoneNumberAssignmentByProfile
            ->assign(
                messagingProfileID: '4001767e-ce0f-4cae-9d5f-0d5e636e7809',
                campaignID: '4b300178-131c-d902-d54e-72d90ba1620j',
                tcrCampaignID: 'CWZTFH1',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PhoneNumberAssignmentByProfileAssignResponse::class,
            $result
        );
    }

    #[Test]
    public function testListPhoneNumberStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->messaging10dlc
            ->phoneNumberAssignmentByProfile
            ->listPhoneNumberStatus('taskId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse::class,
            $result,
        );
    }

    #[Test]
    public function testRetrievePhoneNumberStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->messaging10dlc
            ->phoneNumberAssignmentByProfile
            ->retrievePhoneNumberStatus('taskId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->messaging10dlc
            ->phoneNumberAssignmentByProfile
            ->retrieveStatus('taskId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PhoneNumberAssignmentByProfileGetStatusResponse::class,
            $result
        );
    }
}
