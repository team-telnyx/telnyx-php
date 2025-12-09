<?php

namespace Tests\Services\AI\Assistants;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\EnabledFeatures;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\Client;
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

        $result = $this->client->ai->assistants->versions->retrieve(
            'version_id',
            ['assistant_id' => 'assistant_id']
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
            ['assistant_id' => 'assistant_id', 'include_mcp_servers' => true],
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
            ['assistant_id' => 'assistant_id']
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
            [
                'assistant_id' => 'assistant_id',
                'description' => 'description',
                'dynamic_variables' => ['foo' => 'bar'],
                'dynamic_variables_webhook_url' => 'dynamic_variables_webhook_url',
                'enabled_features' => [EnabledFeatures::TELEPHONY],
                'greeting' => 'greeting',
                'insight_settings' => ['insight_group_id' => 'insight_group_id'],
                'instructions' => 'instructions',
                'llm_api_key_ref' => 'llm_api_key_ref',
                'messaging_settings' => [
                    'default_messaging_profile_id' => 'default_messaging_profile_id',
                    'delivery_status_webhook_url' => 'delivery_status_webhook_url',
                ],
                'model' => 'model',
                'name' => 'name',
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
            ['assistant_id' => 'assistant_id']
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
            ['assistant_id' => 'assistant_id']
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
            ['assistant_id' => 'assistant_id']
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
            ['assistant_id' => 'assistant_id']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(InferenceEmbedding::class, $result);
    }
}
