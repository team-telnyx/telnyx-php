<?php

namespace Tests\Services\AI\Assistants;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\EnabledFeatures;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class VersionsTest extends TestCase
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->versions->retrieve(
            'version_id',
            assistantID: 'assistant_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->versions->retrieve(
            'version_id',
            assistantID: 'assistant_id',
            includeMcpServers: true
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->versions->update(
            'version_id',
            assistantID: 'assistant_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->versions->update(
            'version_id',
            assistantID: 'assistant_id',
            description: 'description',
            dynamicVariables: ['foo' => 'bar'],
            dynamicVariablesWebhookURL: 'dynamic_variables_webhook_url',
            enabledFeatures: [EnabledFeatures::TELEPHONY],
            greeting: 'greeting',
            insightSettings: ['insightGroupID' => 'insight_group_id'],
            instructions: 'instructions',
            llmAPIKeyRef: 'llm_api_key_ref',
            messagingSettings: [
                'conversationInactivityMinutes' => 1,
                'defaultMessagingProfileID' => 'default_messaging_profile_id',
                'deliveryStatusWebhookURL' => 'delivery_status_webhook_url',
            ],
            model: 'model',
            name: 'name',
            privacySettings: ['dataRetention' => true],
            telephonySettings: [
                'defaultTexmlAppID' => 'default_texml_app_id',
                'noiseSuppression' => 'krisp',
                'noiseSuppressionConfig' => [
                    'attenuationLimit' => 0, 'mode' => 'advanced',
                ],
                'recordingSettings' => ['channels' => 'single', 'format' => 'wav'],
                'supportsUnauthenticatedWebCalls' => true,
                'timeLimitSecs' => 30,
                'userIdleTimeoutSecs' => 30,
                'voicemailDetection' => [
                    'onVoicemailDetected' => [
                        'action' => 'stop_assistant',
                        'voicemailMessage' => [
                            'message' => 'message', 'prompt' => 'prompt', 'type' => 'prompt',
                        ],
                    ],
                ],
            ],
            tools: [
                [
                    'type' => 'webhook',
                    'webhook' => [
                        'description' => 'description',
                        'name' => 'name',
                        'url' => 'https://example.com/api/v1/function',
                        'async' => true,
                        'bodyParameters' => [
                            'properties' => ['age' => 'bar', 'location' => 'bar'],
                            'required' => ['age', 'location'],
                            'type' => 'object',
                        ],
                        'headers' => [['name' => 'name', 'value' => 'value']],
                        'method' => 'GET',
                        'pathParameters' => [
                            'properties' => ['id' => 'bar'],
                            'required' => ['id'],
                            'type' => 'object',
                        ],
                        'queryParameters' => [
                            'properties' => ['page' => 'bar'],
                            'required' => ['page'],
                            'type' => 'object',
                        ],
                        'timeoutMs' => 500,
                    ],
                ],
            ],
            transcription: [
                'language' => 'language',
                'model' => 'deepgram/flux',
                'region' => 'region',
                'settings' => [
                    'eagerEotThreshold' => 0.3,
                    'eotThreshold' => 0,
                    'eotTimeoutMs' => 0,
                    'numerals' => true,
                    'smartFormat' => true,
                ],
            ],
            voiceSettings: [
                'voice' => 'voice',
                'apiKeyRef' => 'api_key_ref',
                'backgroundAudio' => [
                    'type' => 'predefined_media', 'value' => 'silence',
                ],
                'languageBoost' => 'auto',
                'similarityBoost' => 0,
                'speed' => 0,
                'style' => 0,
                'temperature' => 0,
                'useSpeakerBoost' => true,
                'voiceSpeed' => 0,
            ],
            widgetSettings: [
                'agentThinkingText' => 'agent_thinking_text',
                'audioVisualizerConfig' => ['color' => 'verdant', 'preset' => 'preset'],
                'defaultState' => 'expanded',
                'giveFeedbackURL' => 'give_feedback_url',
                'logoIconURL' => 'logo_icon_url',
                'position' => 'fixed',
                'reportIssueURL' => 'report_issue_url',
                'speakToInterruptText' => 'speak_to_interrupt_text',
                'startCallText' => 'start_call_text',
                'theme' => 'light',
                'viewHistoryURL' => 'view_history_url',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->versions->list('assistant_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantsList::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->versions->delete(
            'version_id',
            assistantID: 'assistant_id'
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

        $result = $this->client->ai->assistants->versions->delete(
            'version_id',
            assistantID: 'assistant_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testPromote(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->versions->promote(
            'version_id',
            assistantID: 'assistant_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testPromoteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->versions->promote(
            'version_id',
            assistantID: 'assistant_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }
}
