<?php

namespace Tests\Services\Number10dlc;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumbersResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileResponse;
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->number10dlc
            ->phoneNumberAssignmentByProfile
            ->retrieve('taskId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PhoneNumberAssignmentByProfileGetResponse::class,
            $result
        );
    }

    #[Test]
    public function testPhoneNumberAssignmentByProfile(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->number10dlc
            ->phoneNumberAssignmentByProfile
            ->phoneNumberAssignmentByProfile(
                messagingProfileID: '4001767e-ce0f-4cae-9d5f-0d5e636e7809'
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileResponse::class,
            $result,
        );
    }

    #[Test]
    public function testPhoneNumberAssignmentByProfileWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->number10dlc
            ->phoneNumberAssignmentByProfile
            ->phoneNumberAssignmentByProfile(
                messagingProfileID: '4001767e-ce0f-4cae-9d5f-0d5e636e7809',
                campaignID: '4b300178-131c-d902-d54e-72d90ba1620j',
                tcrCampaignID: 'CWZTFH1',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileResponse::class,
            $result,
        );
    }

    #[Test]
    public function testRetrievePhoneNumbers(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->number10dlc
            ->phoneNumberAssignmentByProfile
            ->retrievePhoneNumbers('taskId')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PhoneNumberAssignmentByProfileGetPhoneNumbersResponse::class,
            $result
        );
    }
}
