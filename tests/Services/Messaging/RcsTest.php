<?php

namespace Tests\Services\Messaging;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class RcsTest extends TestCase
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
    public function testInviteTestNumber(): void
    {
        $result = $this->client->messaging->rcs->inviteTestNumber(
            'phone_number',
            'id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testInviteTestNumberWithOptionalParams(): void
    {
        $result = $this->client->messaging->rcs->inviteTestNumber(
            'phone_number',
            'id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListBulkCapabilities(): void
    {
        $result = $this->client->messaging->rcs->listBulkCapabilities(
            agentID: 'TestAgent',
            phoneNumbers: ['+13125551234']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListBulkCapabilitiesWithOptionalParams(): void
    {
        $result = $this->client->messaging->rcs->listBulkCapabilities(
            agentID: 'TestAgent',
            phoneNumbers: ['+13125551234']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveCapabilities(): void
    {
        $result = $this->client->messaging->rcs->retrieveCapabilities(
            'phone_number',
            'agent_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveCapabilitiesWithOptionalParams(): void
    {
        $result = $this->client->messaging->rcs->retrieveCapabilities(
            'phone_number',
            'agent_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
