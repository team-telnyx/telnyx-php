<?php

namespace Tests\Services\Texml\Accounts\Conferences;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetParticipantsResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantGetResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsResponse;
use Telnyx\Texml\Accounts\Conferences\Participants\ParticipantUpdateResponse;
use Tests\UnsupportedMockTests;

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
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->retrieve(
                'call_sid_or_participant_label',
                ['account_sid' => 'account_sid', 'conference_sid' => 'conference_sid'],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ParticipantGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->retrieve(
                'call_sid_or_participant_label',
                ['account_sid' => 'account_sid', 'conference_sid' => 'conference_sid'],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ParticipantGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->conferences->participants->update(
            'call_sid_or_participant_label',
            ['account_sid' => 'account_sid', 'conference_sid' => 'conference_sid'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ParticipantUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->conferences->participants->update(
            'call_sid_or_participant_label',
            [
                'account_sid' => 'account_sid',
                'conference_sid' => 'conference_sid',
                'AnnounceMethod' => 'GET',
                'AnnounceUrl' => 'https://www.example.com/announce.xml',
                'BeepOnExit' => false,
                'CallSidToCoach' => 'v3:9X2vxPDFY2RHSJ1EdMS0RHRksMTg7ldNxdjWbVr9zBjbGjGsSe-aiQ',
                'Coaching' => false,
                'EndConferenceOnExit' => false,
                'Hold' => true,
                'HoldMethod' => 'POST',
                'HoldUrl' => 'HoldUrl',
                'Muted' => true,
                'WaitUrl' => 'https://www.example.com/wait_music.mp3',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ParticipantUpdateResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->conferences->participants->delete(
            'call_sid_or_participant_label',
            ['account_sid' => 'account_sid', 'conference_sid' => 'conference_sid'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->texml->accounts->conferences->participants->delete(
            'call_sid_or_participant_label',
            ['account_sid' => 'account_sid', 'conference_sid' => 'conference_sid'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testParticipants(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->participants('conference_sid', ['account_sid' => 'account_sid'])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ParticipantParticipantsResponse::class, $result);
    }

    #[Test]
    public function testParticipantsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->participants(
                'conference_sid',
                [
                    'account_sid' => 'account_sid',
                    'AmdStatusCallback' => 'https://www.example.com/amd_result',
                    'AmdStatusCallbackMethod' => 'GET',
                    'Beep' => 'onExit',
                    'CallerId' => 'Info',
                    'CallSidToCoach' => 'v3:9X2vxPDFY2RHSJ1EdMS0RHRksMTg7ldNxdjWbVr9zBjbGjGsSe-aiQ',
                    'CancelPlaybackOnDetectMessageEnd' => false,
                    'CancelPlaybackOnMachineDetection' => false,
                    'Coaching' => false,
                    'ConferenceRecord' => 'record-from-start',
                    'ConferenceRecordingStatusCallback' => 'https://example.com/conference_recording_status_callback',
                    'ConferenceRecordingStatusCallbackEvent' => 'in-progress completed failed absent',
                    'ConferenceRecordingStatusCallbackMethod' => 'GET',
                    'ConferenceRecordingTimeout' => 5,
                    'ConferenceStatusCallback' => 'https://example.com/conference_status_callback',
                    'ConferenceStatusCallbackEvent' => 'start end join leave',
                    'ConferenceStatusCallbackMethod' => 'GET',
                    'ConferenceTrim' => 'trim-silence',
                    'CustomHeaders' => [
                        ['name' => 'X-Custom-Header', 'value' => 'custom-value'],
                    ],
                    'EarlyMedia' => true,
                    'EndConferenceOnExit' => true,
                    'From' => '+12065550200',
                    'MachineDetection' => 'Enable',
                    'MachineDetectionSilenceTimeout' => 2000,
                    'MachineDetectionSpeechEndThreshold' => 2000,
                    'MachineDetectionSpeechThreshold' => 2000,
                    'MachineDetectionTimeout' => 1000,
                    'MaxParticipants' => 30,
                    'Muted' => true,
                    'PreferredCodecs' => 'PCMA,PCMU',
                    'Record' => false,
                    'RecordingChannels' => 'dual',
                    'RecordingStatusCallback' => 'https://example.com/recording_status_callback',
                    'RecordingStatusCallbackEvent' => 'in-progress completed absent',
                    'RecordingStatusCallbackMethod' => 'GET',
                    'RecordingTrack' => 'inbound',
                    'SipAuthPassword' => '1234',
                    'SipAuthUsername' => 'user',
                    'StartConferenceOnEnter' => false,
                    'StatusCallback' => 'https://www.example.com/callback',
                    'StatusCallbackEvent' => 'answered completed',
                    'StatusCallbackMethod' => 'GET',
                    'TimeLimit' => 30,
                    'timeout_seconds' => 30,
                    'To' => '+12065550100',
                    'Trim' => 'trim-silence',
                    'WaitUrl' => 'https://www.example.com/wait_music.mp3',
                ],
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ParticipantParticipantsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveParticipants(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->retrieveParticipants(
                'conference_sid',
                ['account_sid' => 'account_sid']
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ParticipantGetParticipantsResponse::class, $result);
    }

    #[Test]
    public function testRetrieveParticipantsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->texml
            ->accounts
            ->conferences
            ->participants
            ->retrieveParticipants(
                'conference_sid',
                ['account_sid' => 'account_sid']
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ParticipantGetParticipantsResponse::class, $result);
    }
}
