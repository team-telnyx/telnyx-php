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
                accountSid: 'account_sid',
                conferenceSid: 'conference_sid',
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
                accountSid: 'account_sid',
                conferenceSid: 'conference_sid',
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
            accountSid: 'account_sid',
            conferenceSid: 'conference_sid',
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
            accountSid: 'account_sid',
            conferenceSid: 'conference_sid',
            announceMethod: 'GET',
            announceURL: 'https://www.example.com/announce.xml',
            beepOnExit: false,
            callSidToCoach: 'v3:9X2vxPDFY2RHSJ1EdMS0RHRksMTg7ldNxdjWbVr9zBjbGjGsSe-aiQ',
            coaching: false,
            endConferenceOnExit: false,
            hold: true,
            holdMethod: 'POST',
            holdURL: 'https://www.example.com/hold-music.xml',
            muted: true,
            waitURL: 'https://www.example.com/wait_music.mp3',
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
            accountSid: 'account_sid',
            conferenceSid: 'conference_sid',
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
            accountSid: 'account_sid',
            conferenceSid: 'conference_sid',
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
            ->participants('conference_sid', accountSid: 'account_sid')
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
                accountSid: 'account_sid',
                amdStatusCallback: 'https://www.example.com/amd_result',
                amdStatusCallbackMethod: 'GET',
                beep: 'onExit',
                callerID: 'Info',
                callSidToCoach: 'v3:9X2vxPDFY2RHSJ1EdMS0RHRksMTg7ldNxdjWbVr9zBjbGjGsSe-aiQ',
                cancelPlaybackOnDetectMessageEnd: false,
                cancelPlaybackOnMachineDetection: false,
                coaching: false,
                conferenceRecord: 'record-from-start',
                conferenceRecordingStatusCallback: 'https://example.com/conference_recording_status_callback',
                conferenceRecordingStatusCallbackEvent: 'in-progress completed failed absent',
                conferenceRecordingStatusCallbackMethod: 'GET',
                conferenceRecordingTimeout: 5,
                conferenceStatusCallback: 'https://example.com/conference_status_callback',
                conferenceStatusCallbackEvent: 'start end join leave',
                conferenceStatusCallbackMethod: 'GET',
                conferenceTrim: 'trim-silence',
                customHeaders: [['name' => 'X-Custom-Header', 'value' => 'custom-value']],
                earlyMedia: true,
                endConferenceOnExit: true,
                from: '+12065550200',
                machineDetection: 'Enable',
                machineDetectionSilenceTimeout: 2000,
                machineDetectionSpeechEndThreshold: 2000,
                machineDetectionSpeechThreshold: 2000,
                machineDetectionTimeout: 1000,
                maxParticipants: 30,
                muted: true,
                preferredCodecs: 'PCMA,PCMU',
                record: false,
                recordingChannels: 'dual',
                recordingStatusCallback: 'https://example.com/recording_status_callback',
                recordingStatusCallbackEvent: 'in-progress completed absent',
                recordingStatusCallbackMethod: 'GET',
                recordingTrack: 'inbound',
                sipAuthPassword: '1234',
                sipAuthUsername: 'user',
                startConferenceOnEnter: false,
                statusCallback: 'https://www.example.com/callback',
                statusCallbackEvent: 'answered completed',
                statusCallbackMethod: 'GET',
                timeLimit: 30,
                timeoutSeconds: 30,
                to: '+12065550100',
                trim: 'trim-silence',
                waitURL: 'https://www.example.com/wait_music.mp3',
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
            ->retrieveParticipants('conference_sid', accountSid: 'account_sid')
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
            ->retrieveParticipants('conference_sid', accountSid: 'account_sid')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ParticipantGetParticipantsResponse::class, $result);
    }
}
