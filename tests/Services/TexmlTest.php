<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Texml\TexmlInitiateAICallResponse;
use Telnyx\Texml\TexmlSecretsResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TexmlTest extends TestCase
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
    public function testInitiateAICall(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->initiateAICall(
            'connection_id',
            aiAssistantID: 'ai-assistant-id-123',
            from: '+13120001234',
            to: '+13121230000',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TexmlInitiateAICallResponse::class, $result);
    }

    #[Test]
    public function testInitiateAICallWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->initiateAICall(
            'connection_id',
            aiAssistantID: 'ai-assistant-id-123',
            from: '+13120001234',
            to: '+13121230000',
            aiAssistantDynamicVariables: [
                'customer_name' => 'John Doe', 'account_id' => '12345',
            ],
            aiAssistantVersion: 'AIAssistantVersion',
            asyncAmd: true,
            asyncAmdStatusCallback: 'https://www.example.com/callback',
            asyncAmdStatusCallbackMethod: 'GET',
            callerID: 'Info',
            conversationCallback: 'https://www.example.com/conversation-callback',
            conversationCallbackMethod: 'GET',
            conversationCallbacks: [
                'https://www.example.com/conversation-callback1',
                'https://www.example.com/conversation-callback2',
            ],
            customHeaders: [['name' => 'X-Custom-Header', 'value' => 'custom-value']],
            detectionMode: 'Premium',
            machineDetection: 'Enable',
            machineDetectionSilenceTimeout: 2000,
            machineDetectionSpeechEndThreshold: 2000,
            machineDetectionSpeechThreshold: 2000,
            machineDetectionTimeout: 5000,
            passports: 'Passports',
            preferredCodecs: 'PCMA,PCMU',
            record: false,
            recordingChannels: 'dual',
            recordingStatusCallback: 'https://example.com/recording_status_callback',
            recordingStatusCallbackEvent: 'in-progress completed absent',
            recordingStatusCallbackMethod: 'GET',
            recordingTimeout: 5,
            recordingTrack: 'inbound',
            sendRecordingURL: false,
            sipAuthPassword: '1234',
            sipAuthUsername: 'user',
            sipRegion: 'Canada',
            statusCallback: 'https://www.example.com/callback',
            statusCallbackEvent: 'initiated answered',
            statusCallbackMethod: 'GET',
            statusCallbacks: [
                'https://www.example.com/callback1', 'https://www.example.com/callback2',
            ],
            timeLimit: 3600,
            timeoutSeconds: 60,
            trim: 'trim-silence',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TexmlInitiateAICallResponse::class, $result);
    }

    #[Test]
    public function testSecrets(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->secrets(
            name: 'My Secret Name',
            value: 'My Secret Value'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TexmlSecretsResponse::class, $result);
    }

    #[Test]
    public function testSecretsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->texml->secrets(
            name: 'My Secret Name',
            value: 'My Secret Value'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TexmlSecretsResponse::class, $result);
    }
}
