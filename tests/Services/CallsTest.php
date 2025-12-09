<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Calls\Actions\GoogleTranscriptionLanguage;
use Telnyx\Calls\CallDialResponse;
use Telnyx\Calls\CallGetStatusResponse;
use Telnyx\Calls\StreamBidirectionalCodec;
use Telnyx\Calls\StreamBidirectionalMode;
use Telnyx\Calls\StreamBidirectionalSamplingRate;
use Telnyx\Calls\StreamBidirectionalTargetLegs;
use Telnyx\Calls\StreamCodec;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CallsTest extends TestCase
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
    public function testDial(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->dial([
            'connectionID' => '7267xxxxxxxxxxxxxx',
            'from' => '+18005550101',
            'to' => '+18005550100 or sip:username@sip.telnyx.com',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallDialResponse::class, $result);
    }

    #[Test]
    public function testDialWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->dial([
            'connectionID' => '7267xxxxxxxxxxxxxx',
            'from' => '+18005550101',
            'to' => '+18005550100 or sip:username@sip.telnyx.com',
            'answeringMachineDetection' => 'detect',
            'answeringMachineDetectionConfig' => [
                'afterGreetingSilenceMillis' => 1000,
                'betweenWordsSilenceMillis' => 1000,
                'greetingDurationMillis' => 1000,
                'greetingSilenceDurationMillis' => 2000,
                'greetingTotalAnalysisTimeMillis' => 50000,
                'initialSilenceMillis' => 1000,
                'maximumNumberOfWords' => 1000,
                'maximumWordLengthMillis' => 2000,
                'silenceThreshold' => 512,
                'totalAnalysisTimeMillis' => 5000,
            ],
            'audioURL' => 'http://www.example.com/sounds/greeting.wav',
            'billingGroupID' => 'f5586561-8ff0-4291-a0ac-84fe544797bd',
            'bridgeIntent' => true,
            'bridgeOnAnswer' => true,
            'clientState' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
            'commandID' => '891510ac-f3e4-11e8-af5b-de00688a4901',
            'conferenceConfig' => [
                'id' => '0ccc7b54-4df3-4bca-a65a-3da1ecc777f0',
                'beepEnabled' => 'on_exit',
                'conferenceName' => 'telnyx-conference',
                'earlyMedia' => false,
                'endConferenceOnExit' => true,
                'hold' => true,
                'holdAudioURL' => 'http://example.com/message.wav',
                'holdMediaName' => 'my_media_uploaded_to_media_storage_api',
                'mute' => true,
                'softEndConferenceOnExit' => true,
                'startConferenceOnCreate' => false,
                'startConferenceOnEnter' => true,
                'supervisorRole' => 'whisper',
                'whisperCallControlIDs' => [
                    'v2:Sg1xxxQ_U3ixxxyXT_VDNI3xxxazZdg6Vxxxs4-GNYxxxVaJPOhFMRQ',
                    'v2:qqpb0mmvd-ovhhBr0BUQQn0fld5jIboaaX3-De0DkqXHzbf8d75xkw',
                ],
            ],
            'customHeaders' => [
                ['name' => 'head_1', 'value' => 'val_1'],
                ['name' => 'head_2', 'value' => 'val_2'],
            ],
            'dialogflowConfig' => [
                'analyzeSentiment' => false, 'partialAutomatedAgentReply' => false,
            ],
            'enableDialogflow' => false,
            'fromDisplayName' => 'Company Name',
            'linkTo' => 'ilditnZK_eVysupV21KzmzN_sM29ygfauQojpm4BgFtfX5hXAcjotg==',
            'mediaEncryption' => 'SRTP',
            'mediaName' => 'my_media_uploaded_to_media_storage_api',
            'parkAfterUnbridge' => 'self',
            'preferredCodecs' => 'G722,PCMU,PCMA,G729,OPUS,VP8,H264',
            'record' => 'record-from-answer',
            'recordChannels' => 'single',
            'recordCustomFileName' => 'my_recording_file_name',
            'recordFormat' => 'wav',
            'recordMaxLength' => 1000,
            'recordTimeoutSecs' => 100,
            'recordTrack' => 'outbound',
            'recordTrim' => 'trim-silence',
            'sendSilenceWhenIdle' => true,
            'sipAuthPassword' => 'password',
            'sipAuthUsername' => 'username',
            'sipHeaders' => [['name' => 'User-to-User', 'value' => '12345']],
            'sipRegion' => 'Canada',
            'sipTransportProtocol' => 'TLS',
            'soundModifications' => [
                'octaves' => 0.1, 'pitch' => 0.8, 'semitone' => -2, 'track' => 'both',
            ],
            'streamBidirectionalCodec' => StreamBidirectionalCodec::G722,
            'streamBidirectionalMode' => StreamBidirectionalMode::RTP,
            'streamBidirectionalSamplingRate' => StreamBidirectionalSamplingRate::_16000,
            'streamBidirectionalTargetLegs' => StreamBidirectionalTargetLegs::BOTH,
            'streamCodec' => StreamCodec::PCMA,
            'streamEstablishBeforeCallOriginate' => true,
            'streamTrack' => 'both_tracks',
            'streamURL' => 'wss://www.example.com/websocket',
            'superviseCallControlID' => 'v3:MdI91X4lWFEs7IgbBEOT9M4AigoY08M0WWZFISt1Yw2axZ_IiE4pqg',
            'supervisorRole' => 'barge',
            'timeLimitSecs' => 600,
            'timeoutSecs' => 60,
            'transcription' => true,
            'transcriptionConfig' => [
                'clientState' => 'aGF2ZSBhIG5pY2UgZGF5ID1d',
                'commandID' => '891510ac-f3e4-11e8-af5b-de00688a4901',
                'transcriptionEngine' => 'Google',
                'transcriptionEngineConfig' => [
                    'enableSpeakerDiarization' => true,
                    'hints' => ['string'],
                    'interimResults' => true,
                    'language' => GoogleTranscriptionLanguage::EN,
                    'maxSpeakerCount' => 4,
                    'minSpeakerCount' => 4,
                    'model' => 'latest_long',
                    'profanityFilter' => true,
                    'speechContext' => [['boost' => 1, 'phrases' => ['string']]],
                    'transcriptionEngine' => 'Google',
                    'useEnhanced' => true,
                ],
                'transcriptionTracks' => 'both',
            ],
            'webhookURL' => 'https://www.example.com/server-b/',
            'webhookURLMethod' => 'POST',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallDialResponse::class, $result);
    }

    #[Test]
    public function testRetrieveStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->calls->retrieveStatus('call_control_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CallGetStatusResponse::class, $result);
    }
}
