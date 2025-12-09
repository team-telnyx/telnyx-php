<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Assistants\AssistantChatParams;
use Telnyx\AI\Assistants\AssistantChatResponse;
use Telnyx\AI\Assistants\AssistantCreateParams;
use Telnyx\AI\Assistants\AssistantDeleteResponse;
use Telnyx\AI\Assistants\AssistantImportsParams;
use Telnyx\AI\Assistants\AssistantImportsParams\Provider;
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
use Telnyx\AI\Assistants\TranscriptionSettings\Model;
use Telnyx\AI\Assistants\TranscriptionSettingsConfig;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\AssistantsRawContract;

final class AssistantsRawService implements AssistantsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

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
     *   dynamicVariables?: array<string,mixed>,
     *   dynamicVariablesWebhookURL?: string,
     *   enabledFeatures?: list<'telephony'|'messaging'|EnabledFeatures>,
     *   greeting?: string,
     *   insightSettings?: array{insightGroupID?: string}|InsightSettings,
     *   llmAPIKeyRef?: string,
     *   messagingSettings?: array{
     *     defaultMessagingProfileID?: string, deliveryStatusWebhookURL?: string
     *   }|MessagingSettings,
     *   privacySettings?: array{dataRetention?: bool}|PrivacySettings,
     *   telephonySettings?: array{
     *     defaultTexmlAppID?: string, supportsUnauthenticatedWebCalls?: bool
     *   }|TelephonySettings,
     *   tools?: list<AssistantTool|array<string,mixed>>,
     *   transcription?: array{
     *     language?: string,
     *     model?: 'deepgram/flux'|'deepgram/nova-3'|'deepgram/nova-2'|'azure/fast'|'distil-whisper/distil-large-v2'|'openai/whisper-large-v3-turbo'|Model,
     *     region?: string,
     *     settings?: array<mixed>|TranscriptionSettingsConfig,
     *   }|TranscriptionSettings,
     *   voiceSettings?: array{
     *     voice: string,
     *     apiKeyRef?: string,
     *     backgroundAudio?: array<string,mixed>,
     *     voiceSpeed?: float,
     *   }|VoiceSettings,
     * }|AssistantCreateParams $params
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function create(
        array|AssistantCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = AssistantCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   callControlID?: string,
     *   fetchDynamicVariablesFromWebhook?: bool,
     *   from?: string,
     *   to?: string,
     * }|AssistantRetrieveParams $params
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        array|AssistantRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssistantRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s', $assistantID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'callControlID' => 'call_control_id',
                    'fetchDynamicVariablesFromWebhook' => 'fetch_dynamic_variables_from_webhook',
                ],
            ),
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
     *   dynamicVariables?: array<string,mixed>,
     *   dynamicVariablesWebhookURL?: string,
     *   enabledFeatures?: list<'telephony'|'messaging'|EnabledFeatures>,
     *   greeting?: string,
     *   insightSettings?: array{insightGroupID?: string}|InsightSettings,
     *   instructions?: string,
     *   llmAPIKeyRef?: string,
     *   messagingSettings?: array{
     *     defaultMessagingProfileID?: string, deliveryStatusWebhookURL?: string
     *   }|MessagingSettings,
     *   model?: string,
     *   name?: string,
     *   privacySettings?: array{dataRetention?: bool}|PrivacySettings,
     *   promoteToMain?: bool,
     *   telephonySettings?: array{
     *     defaultTexmlAppID?: string, supportsUnauthenticatedWebCalls?: bool
     *   }|TelephonySettings,
     *   tools?: list<AssistantTool|array<string,mixed>>,
     *   transcription?: array{
     *     language?: string,
     *     model?: 'deepgram/flux'|'deepgram/nova-3'|'deepgram/nova-2'|'azure/fast'|'distil-whisper/distil-large-v2'|'openai/whisper-large-v3-turbo'|Model,
     *     region?: string,
     *     settings?: array<mixed>|TranscriptionSettingsConfig,
     *   }|TranscriptionSettings,
     *   voiceSettings?: array{
     *     voice: string,
     *     apiKeyRef?: string,
     *     backgroundAudio?: array<string,mixed>,
     *     voiceSpeed?: float,
     *   }|VoiceSettings,
     * }|AssistantUpdateParams $params
     *
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        array|AssistantUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssistantUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<AssistantsList>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<AssistantDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *   content: string, conversationID: string, name?: string
     * }|AssistantChatParams $params
     *
     * @return BaseResponse<AssistantChatResponse>
     *
     * @throws APIException
     */
    public function chat(
        string $assistantID,
        array|AssistantChatParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssistantChatParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<InferenceEmbedding>
     *
     * @throws APIException
     */
    public function clone(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function getTexml(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     *   apiKeyRef: string, provider: 'elevenlabs'|'vapi'|'retell'|Provider
     * }|AssistantImportsParams $params
     *
     * @return BaseResponse<AssistantsList>
     *
     * @throws APIException
     */
    public function imports(
        array|AssistantImportsParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = AssistantImportsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   conversationMetadata?: array<string,string|int|bool>,
     *   shouldCreateConversation?: bool,
     * }|AssistantSendSMSParams $params
     *
     * @return BaseResponse<AssistantSendSMSResponse>
     *
     * @throws APIException
     */
    public function sendSMS(
        string $assistantID,
        array|AssistantSendSMSParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AssistantSendSMSParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/chat/sms', $assistantID],
            body: (object) $parsed,
            options: $options,
            convert: AssistantSendSMSResponse::class,
        );
    }
}
