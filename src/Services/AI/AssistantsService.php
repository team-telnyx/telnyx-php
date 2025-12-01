<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Assistants\AssistantChatParams;
use Telnyx\AI\Assistants\AssistantChatResponse;
use Telnyx\AI\Assistants\AssistantCreateParams;
use Telnyx\AI\Assistants\AssistantDeleteResponse;
use Telnyx\AI\Assistants\AssistantImportParams;
use Telnyx\AI\Assistants\AssistantRetrieveParams;
use Telnyx\AI\Assistants\AssistantSendSMSParams;
use Telnyx\AI\Assistants\AssistantSendSMSResponse;
use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\AssistantTool;
use Telnyx\AI\Assistants\AssistantUpdateParams;
use Telnyx\AI\Assistants\EnabledFeatures;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\AI\Assistants\InsightSettings;
use Telnyx\AI\Assistants\MessagingSettings;
use Telnyx\AI\Assistants\PrivacySettings;
use Telnyx\AI\Assistants\TelephonySettings;
use Telnyx\AI\Assistants\TranscriptionSettings;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\AssistantsContract;
use Telnyx\Services\AI\Assistants\CanaryDeploysService;
use Telnyx\Services\AI\Assistants\ScheduledEventsService;
use Telnyx\Services\AI\Assistants\TestsService;
use Telnyx\Services\AI\Assistants\ToolsService;
use Telnyx\Services\AI\Assistants\VersionsService;

final class AssistantsService implements AssistantsContract
{
    /**
     * @api
     */
    public TestsService $tests;

    /**
     * @api
     */
    public CanaryDeploysService $canaryDeploys;

    /**
     * @api
     */
    public ScheduledEventsService $scheduledEvents;

    /**
     * @api
     */
    public ToolsService $tools;

    /**
     * @api
     */
    public VersionsService $versions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->tests = new TestsService($client);
        $this->canaryDeploys = new CanaryDeploysService($client);
        $this->scheduledEvents = new ScheduledEventsService($client);
        $this->tools = new ToolsService($client);
        $this->versions = new VersionsService($client);
    }

    /**
     * @api
     *
     * Create a new AI Assistant.
     *
     * @param array{
     *   instructions: string,
     *   model: string,
     *   name: string,
     *   description?: string,
     *   dynamic_variables?: array<string,mixed>,
     *   dynamic_variables_webhook_url?: string,
     *   enabled_features?: list<'telephony'|'messaging'|EnabledFeatures>,
     *   greeting?: string,
     *   insight_settings?: array{insight_group_id?: string}|InsightSettings,
     *   llm_api_key_ref?: string,
     *   messaging_settings?: array{
     *     default_messaging_profile_id?: string, delivery_status_webhook_url?: string
     *   }|MessagingSettings,
     *   privacy_settings?: array{data_retention?: bool}|PrivacySettings,
     *   telephony_settings?: array{
     *     default_texml_app_id?: string, supports_unauthenticated_web_calls?: bool
     *   }|TelephonySettings,
     *   tools?: list<AssistantTool|array<string,mixed>>,
     *   transcription?: array{
     *     language?: string,
     *     model?: 'deepgram/flux'|'deepgram/nova-3'|'deepgram/nova-2'|'azure/fast'|'distil-whisper/distil-large-v2'|'openai/whisper-large-v3-turbo',
     *     region?: string,
     *     settings?: array{
     *       eot_threshold?: float,
     *       eot_timeout_ms?: int,
     *       numerals?: bool,
     *       smart_format?: bool,
     *     },
     *   }|TranscriptionSettings,
     *   voice_settings?: array{
     *     voice: string,
     *     api_key_ref?: string,
     *     background_audio?: array<string,mixed>,
     *     voice_speed?: float,
     *   }|VoiceSettings,
     * }|AssistantCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AssistantCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): InferenceEmbedding {
        [$parsed, $options] = AssistantCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ai/assistants',
            body: (object) $parsed,
            options: $options,
            convert: InferenceEmbedding::class,
        );
    }

    /**
     * @api
     *
     * Retrieve an AI Assistant configuration by `assistant_id`.
     *
     * @param array{
     *   call_control_id?: string,
     *   fetch_dynamic_variables_from_webhook?: bool,
     *   from?: string,
     *   to?: string,
     * }|AssistantRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        array|AssistantRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding {
        [$parsed, $options] = AssistantRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s', $assistantID],
            query: $parsed,
            options: $options,
            convert: InferenceEmbedding::class,
        );
    }

    /**
     * @api
     *
     * Update an AI Assistant's attributes.
     *
     * @param array{
     *   description?: string,
     *   dynamic_variables?: array<string,mixed>,
     *   dynamic_variables_webhook_url?: string,
     *   enabled_features?: list<'telephony'|'messaging'|EnabledFeatures>,
     *   greeting?: string,
     *   insight_settings?: array{insight_group_id?: string}|InsightSettings,
     *   instructions?: string,
     *   llm_api_key_ref?: string,
     *   messaging_settings?: array{
     *     default_messaging_profile_id?: string, delivery_status_webhook_url?: string
     *   }|MessagingSettings,
     *   model?: string,
     *   name?: string,
     *   privacy_settings?: array{data_retention?: bool}|PrivacySettings,
     *   promote_to_main?: bool,
     *   telephony_settings?: array{
     *     default_texml_app_id?: string, supports_unauthenticated_web_calls?: bool
     *   }|TelephonySettings,
     *   tools?: list<AssistantTool|array<string,mixed>>,
     *   transcription?: array{
     *     language?: string,
     *     model?: 'deepgram/flux'|'deepgram/nova-3'|'deepgram/nova-2'|'azure/fast'|'distil-whisper/distil-large-v2'|'openai/whisper-large-v3-turbo',
     *     region?: string,
     *     settings?: array{
     *       eot_threshold?: float,
     *       eot_timeout_ms?: int,
     *       numerals?: bool,
     *       smart_format?: bool,
     *     },
     *   }|TranscriptionSettings,
     *   voice_settings?: array{
     *     voice: string,
     *     api_key_ref?: string,
     *     background_audio?: array<string,mixed>,
     *     voice_speed?: float,
     *   }|VoiceSettings,
     * }|AssistantUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        array|AssistantUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): InferenceEmbedding {
        [$parsed, $options] = AssistantUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s', $assistantID],
            body: (object) $parsed,
            options: $options,
            convert: InferenceEmbedding::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a list of all AI Assistants configured by the user.
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): AssistantsList
    {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'ai/assistants',
            options: $requestOptions,
            convert: AssistantsList::class,
        );
    }

    /**
     * @api
     *
     * Delete an AI Assistant by `assistant_id`.
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): AssistantDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['ai/assistants/%1$s', $assistantID],
            options: $requestOptions,
            convert: AssistantDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * This endpoint allows a client to send a chat message to a specific AI Assistant. The assistant processes the message and returns a relevant reply based on the current conversation context. Refer to the Conversation API to [create a conversation](https://developers.telnyx.com/api/inference/inference-embedding/create-new-conversation-public-conversations-post), [filter existing conversations](https://developers.telnyx.com/api/inference/inference-embedding/get-conversations-public-conversations-get), [fetch messages for a conversation](https://developers.telnyx.com/api/inference/inference-embedding/get-conversations-public-conversation-id-messages-get), and [manually add messages to a conversation](https://developers.telnyx.com/api/inference/inference-embedding/add-new-message).
     *
     * @param array{
     *   content: string, conversation_id: string, name?: string
     * }|AssistantChatParams $params
     *
     * @throws APIException
     */
    public function chat(
        string $assistantID,
        array|AssistantChatParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssistantChatResponse {
        [$parsed, $options] = AssistantChatParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/chat', $assistantID],
            body: (object) $parsed,
            options: $options,
            convert: AssistantChatResponse::class,
        );
    }

    /**
     * @api
     *
     * Clone an existing assistant, excluding telephony and messaging settings.
     *
     * @throws APIException
     */
    public function clone(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): InferenceEmbedding {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/clone', $assistantID],
            options: $requestOptions,
            convert: InferenceEmbedding::class,
        );
    }

    /**
     * @api
     *
     * Get an assistant texml by `assistant_id`.
     *
     * @throws APIException
     */
    public function getTexml(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s/texml', $assistantID],
            options: $requestOptions,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Import assistants from external providers. Any assistant that has already been imported will be overwritten with its latest version from the importing provider.
     *
     * @param array{
     *   api_key_ref: string, provider: 'elevenlabs'|'vapi'|'retell'
     * }|AssistantImportParams $params
     *
     * @throws APIException
     */
    public function import(
        array|AssistantImportParams $params,
        ?RequestOptions $requestOptions = null
    ): AssistantsList {
        [$parsed, $options] = AssistantImportParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ai/assistants/import',
            body: (object) $parsed,
            options: $options,
            convert: AssistantsList::class,
        );
    }

    /**
     * @api
     *
     * Send an SMS message for an assistant. This endpoint:
     * 1. Validates the assistant exists and has messaging profile configured
     * 2. If should_create_conversation is true, creates a new conversation with metadata
     * 3. Sends the SMS message (If `text` is set, this will be sent. Otherwise, if this is the first message in the conversation and the assistant has a `greeting` configured, this will be sent. Otherwise the assistant will generate the text to send.)
     * 4. Updates conversation metadata if provided
     * 5. Returns the conversation ID
     *
     * @param array{
     *   from: string,
     *   text: string,
     *   to: string,
     *   conversation_metadata?: array<string,string|int|bool>,
     *   should_create_conversation?: bool,
     * }|AssistantSendSMSParams $params
     *
     * @throws APIException
     */
    public function sendSMS(
        string $assistantID,
        array|AssistantSendSMSParams $params,
        ?RequestOptions $requestOptions = null,
    ): AssistantSendSMSResponse {
        [$parsed, $options] = AssistantSendSMSParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/chat/sms', $assistantID],
            body: (object) $parsed,
            options: $options,
            convert: AssistantSendSMSResponse::class,
        );
    }
}
