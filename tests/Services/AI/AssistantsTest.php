<?php

namespace Tests\Services\AI;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Assistants\AssistantChatResponse;
use Telnyx\AI\Assistants\AssistantDeleteResponse;
use Telnyx\AI\Assistants\AssistantSendSMSResponse;
use Telnyx\AI\Assistants\AssistantsList;
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

        $result = $this->client->ai->assistants->create([
            'instructions' => 'instructions', 'model' => 'model', 'name' => 'name',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->create([
            'instructions' => 'instructions',
            'model' => 'model',
            'name' => 'name',
            'description' => 'description',
            'dynamic_variables' => ['foo' => 'bar'],
            'dynamic_variables_webhook_url' => 'dynamic_variables_webhook_url',
            'enabled_features' => ['telephony'],
            'greeting' => 'greeting',
            'insight_settings' => ['insight_group_id' => 'insight_group_id'],
            'llm_api_key_ref' => 'llm_api_key_ref',
            'messaging_settings' => [
                'default_messaging_profile_id' => 'default_messaging_profile_id',
                'delivery_status_webhook_url' => 'delivery_status_webhook_url',
            ],
            'privacy_settings' => ['data_retention' => true],
            'telephony_settings' => [
                'default_texml_app_id' => 'default_texml_app_id',
                'supports_unauthenticated_web_calls' => true,
            ],
            'tools' => [
                [
                    'type' => 'webhook',
                    'webhook' => [
                        'description' => 'description',
                        'name' => 'name',
                        'url' => 'https://example.com/api/v1/function',
                        'body_parameters' => [
                            'properties' => ['age' => 'bar', 'location' => 'bar'],
                            'required' => ['age', 'location'],
                            'type' => 'object',
                        ],
                        'headers' => [['name' => 'name', 'value' => 'value']],
                        'method' => 'GET',
                        'path_parameters' => [
                            'properties' => ['id' => 'bar'],
                            'required' => ['id'],
                            'type' => 'object',
                        ],
                        'query_parameters' => [
                            'properties' => ['page' => 'bar'],
                            'required' => ['page'],
                            'type' => 'object',
                        ],
                    ],
                ],
            ],
            'transcription' => [
                'language' => 'language',
                'model' => 'deepgram/flux',
                'region' => 'region',
                'settings' => [
                    'eot_threshold' => 0,
                    'eot_timeout_ms' => 0,
                    'numerals' => true,
                    'smart_format' => true,
                ],
            ],
            'voice_settings' => [
                'voice' => 'voice',
                'api_key_ref' => 'api_key_ref',
                'background_audio' => [
                    'type' => 'predefined_media', 'value' => 'silence',
                ],
                'voice_speed' => 0,
            ],
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->retrieve('assistant_id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->update('assistant_id', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertTrue($result);
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
            [
                'content' => 'Tell me a joke about cats',
                'conversation_id' => '42b20469-1215-4a9a-8964-c36f66b406f4',
            ],
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
            [
                'content' => 'Tell me a joke about cats',
                'conversation_id' => '42b20469-1215-4a9a-8964-c36f66b406f4',
                'name' => 'Charlie',
            ],
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

        $result = $this->client->ai->assistants->import([
            'api_key_ref' => 'api_key_ref', 'provider' => 'elevenlabs',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantsList::class, $result);
    }

    #[Test]
    public function testImportWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->ai->assistants->import([
            'api_key_ref' => 'api_key_ref', 'provider' => 'elevenlabs',
        ]);

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
            ['from' => 'from', 'text' => 'text', 'to' => 'to']
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
            [
                'from' => 'from',
                'text' => 'text',
                'to' => 'to',
                'conversation_metadata' => ['foo' => 'string'],
                'should_create_conversation' => true,
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AssistantSendSMSResponse::class, $result);
    }
}
