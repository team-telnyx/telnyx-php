<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

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
        $result = $this->client->phoneNumberAssignmentByProfile->assign(
            messagingProfileID: '4001767e-ce0f-4cae-9d5f-0d5e636e7809'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testAssignWithOptionalParams(): void
    {
        $result = $this->client->phoneNumberAssignmentByProfile->assign(
            messagingProfileID: '4001767e-ce0f-4cae-9d5f-0d5e636e7809'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrievePhoneNumberStatus(): void
    {
        $result = $this
            ->client
            ->phoneNumberAssignmentByProfile
            ->retrievePhoneNumberStatus('taskId')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveStatus(): void
    {
        $result = $this->client->phoneNumberAssignmentByProfile->retrieveStatus(
            'taskId'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
