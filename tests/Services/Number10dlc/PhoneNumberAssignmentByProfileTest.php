<?php

namespace Tests\Services\Number10dlc;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetTaskStatusResponse;
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

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
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
            ->number10dlc
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
            ->number10dlc
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
    public function testGetPhoneNumberStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->number10dlc
            ->phoneNumberAssignmentByProfile
            ->getPhoneNumberStatus('taskId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse::class,
            $result
        );
    }

    #[Test]
    public function testGetTaskStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->number10dlc
            ->phoneNumberAssignmentByProfile
            ->getTaskStatus('taskId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PhoneNumberAssignmentByProfileGetTaskStatusResponse::class,
            $result
        );
    }
}
