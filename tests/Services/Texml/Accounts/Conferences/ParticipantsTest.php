<?php

namespace Tests\Services\Texml\Accounts\Conferences;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class ParticipantsTest extends TestCase
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
        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->retrieve(
                'call_sid_or_participant_label',
                accountSid: 'account_sid',
                conferenceSid: 'conference_sid',
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->retrieve(
                'call_sid_or_participant_label',
                accountSid: 'account_sid',
                conferenceSid: 'conference_sid',
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        $result = $this->client->texml->accounts->conferences->participants->update(
            'call_sid_or_participant_label',
            accountSid: 'account_sid',
            conferenceSid: 'conference_sid',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        $result = $this->client->texml->accounts->conferences->participants->update(
            'call_sid_or_participant_label',
            accountSid: 'account_sid',
            conferenceSid: 'conference_sid',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->texml->accounts->conferences->participants->delete(
            'call_sid_or_participant_label',
            accountSid: 'account_sid',
            conferenceSid: 'conference_sid',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        $result = $this->client->texml->accounts->conferences->participants->delete(
            'call_sid_or_participant_label',
            accountSid: 'account_sid',
            conferenceSid: 'conference_sid',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testParticipants(): void
    {
        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->participants('conference_sid', accountSid: 'account_sid')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testParticipantsWithOptionalParams(): void
    {
        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->participants('conference_sid', accountSid: 'account_sid')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveParticipants(): void
    {
        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->retrieveParticipants('conference_sid', 'account_sid')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveParticipantsWithOptionalParams(): void
    {
        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->retrieveParticipants('conference_sid', 'account_sid')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
