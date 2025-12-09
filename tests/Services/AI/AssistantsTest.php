<?php

namespace Tests\Services\AI;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Assistants\AssistantChatResponse;
use Telnyx\AI\Assistants\AssistantDeleteResponse;
use Telnyx\AI\Assistants\AssistantSendSMSResponse;
use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\EnabledFeatures;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AssistantsTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->create(
            instructions: 'instructions',
            model: 'model',
            name: 'name'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->create(
            instructions: 'instructions',
            model: 'model',
            name: 'name',
            description: 'description',
            dynamicVariables: ['foo' => 'bar'],
            dynamicVariablesWebhookURL: 'dynamic_variables_webhook_url',
            enabledFeatures: [EnabledFeatures::TELEPHONY],
            greeting: 'greeting',
            insightSettings: ['insightGroupID' => 'insight_group_id'],
            llmAPIKeyRef: 'llm_api_key_ref',
            messagingSettings: [
                'defaultMessagingProfileID' => 'default_messaging_profile_id',
                'deliveryStatusWebhookURL' => 'delivery_status_webhook_url',
            ],
            privacySettings: ['dataRetention' => true],
            telephonySettings: [
                'defaultTexmlAppID' => 'default_texml_app_id',
                'supportsUnauthenticatedWebCalls' => true,
            ],
            tools: [
                [
                    'type' => 'webhook',
                    'webhook' => [
                        'description' => 'description',
                        'name' => 'name',
                        'url' => 'https://example.com/api/v1/function',
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
                    ],
                ],
            ],
            transcription: [
                'language' => 'language',
                'model' => 'deepgram/flux',
                'region' => 'region',
                'settings' => [
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
                'voiceSpeed' => 0,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->retrieve('assistant_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->update('assistant_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantsList::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->delete('assistant_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantDeleteResponse::class, $result);
    }

    #[Test]
    public function testChat(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->chat(
            'assistant_id',
            content: 'Tell me a joke about cats',
            conversationID: '42b20469-1215-4a9a-8964-c36f66b406f4',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantChatResponse::class, $result);
    }

    #[Test]
    public function testChatWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->chat(
            'assistant_id',
            content: 'Tell me a joke about cats',
            conversationID: '42b20469-1215-4a9a-8964-c36f66b406f4',
            name: 'Charlie',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantChatResponse::class, $result);
    }

    #[Test]
    public function testClone(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->clone('assistant_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testGetTexml(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->getTexml('assistant_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testImport(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->import(
            apiKeyRef: 'api_key_ref',
            provider: 'elevenlabs'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantsList::class, $result);
    }

    #[Test]
    public function testImportWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->import(
            apiKeyRef: 'api_key_ref',
            provider: 'elevenlabs'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantsList::class, $result);
    }

    #[Test]
    public function testSendSMS(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->sendSMS(
            'assistant_id',
            from: 'from',
            text: 'text',
            to: 'to'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantSendSMSResponse::class, $result);
    }

    #[Test]
    public function testSendSMSWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->sendSMS(
            'assistant_id',
            from: 'from',
            text: 'text',
            to: 'to',
            conversationMetadata: ['foo' => 'string'],
            shouldCreateConversation: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantSendSMSResponse::class, $result);
    }
}
