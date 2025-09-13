<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Assistants\AssistantChatParams;
use Telnyx\AI\Assistants\AssistantChatResponse;
use Telnyx\AI\Assistants\AssistantCloneResponse;
use Telnyx\AI\Assistants\AssistantCreateParams;
use Telnyx\AI\Assistants\AssistantDeleteResponse;
use Telnyx\AI\Assistants\AssistantGetResponse;
use Telnyx\AI\Assistants\AssistantImportParams;
use Telnyx\AI\Assistants\AssistantImportParams\Provider;
use Telnyx\AI\Assistants\AssistantNewResponse;
use Telnyx\AI\Assistants\AssistantRetrieveParams;
use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\AssistantTool\DtmfTool;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool;
use Telnyx\AI\Assistants\AssistantUpdateParams;
use Telnyx\AI\Assistants\EnabledFeatures;
use Telnyx\AI\Assistants\HangupTool;
use Telnyx\AI\Assistants\InsightSettings;
use Telnyx\AI\Assistants\MessagingSettings;
use Telnyx\AI\Assistants\PrivacySettings;
use Telnyx\AI\Assistants\RetrievalTool;
use Telnyx\AI\Assistants\TelephonySettings;
use Telnyx\AI\Assistants\TranscriptionSettings;
use Telnyx\AI\Assistants\TransferTool;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\AI\Assistants\WebhookTool;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\AssistantsContract;
use Telnyx\Services\AI\Assistants\CanaryDeploysService;
use Telnyx\Services\AI\Assistants\ScheduledEventsService;
use Telnyx\Services\AI\Assistants\TestsService;
use Telnyx\Services\AI\Assistants\ToolsService;
use Telnyx\Services\AI\Assistants\VersionsService;

use const Telnyx\Core\OMIT as omit;

final class AssistantsService implements AssistantsContract
{
    /**
     * @@api
     */
    public TestsService $tests;

    /**
     * @@api
     */
    public CanaryDeploysService $canaryDeploys;

    /**
     * @@api
     */
    public ScheduledEventsService $scheduledEvents;

    /**
     * @@api
     */
    public ToolsService $tools;

    /**
     * @@api
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
     * @param string $instructions System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param string $model ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,
     * @param string $name
     * @param string $description
     * @param array<string,
     * mixed,> $dynamicVariables Map of dynamic variables and their default values
     * @param string $dynamicVariablesWebhookURL If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     * @param string $greeting Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param InsightSettings $insightSettings
     * @param string $llmAPIKeyRef This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     * @param MessagingSettings $messagingSettings
     * @param PrivacySettings $privacySettings
     * @param TelephonySettings $telephonySettings
     * @param list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool> $tools The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param TranscriptionSettings $transcription
     * @param VoiceSettings $voiceSettings
     *
     * @return AssistantNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $instructions,
        $model,
        $name,
        $description = omit,
        $dynamicVariables = omit,
        $dynamicVariablesWebhookURL = omit,
        $enabledFeatures = omit,
        $greeting = omit,
        $insightSettings = omit,
        $llmAPIKeyRef = omit,
        $messagingSettings = omit,
        $privacySettings = omit,
        $telephonySettings = omit,
        $tools = omit,
        $transcription = omit,
        $voiceSettings = omit,
        ?RequestOptions $requestOptions = null,
    ): AssistantNewResponse {
        $params = [
            'instructions' => $instructions,
            'model' => $model,
            'name' => $name,
            'description' => $description,
            'dynamicVariables' => $dynamicVariables,
            'dynamicVariablesWebhookURL' => $dynamicVariablesWebhookURL,
            'enabledFeatures' => $enabledFeatures,
            'greeting' => $greeting,
            'insightSettings' => $insightSettings,
            'llmAPIKeyRef' => $llmAPIKeyRef,
            'messagingSettings' => $messagingSettings,
            'privacySettings' => $privacySettings,
            'telephonySettings' => $telephonySettings,
            'tools' => $tools,
            'transcription' => $transcription,
            'voiceSettings' => $voiceSettings,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AssistantNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AssistantNewResponse {
        [$parsed, $options] = AssistantCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'ai/assistants',
            body: (object) $parsed,
            options: $options,
            convert: AssistantNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve an AI Assistant configuration by `assistant_id`.
     *
     * @param string $callControlID
     * @param bool $fetchDynamicVariablesFromWebhook
     * @param string $from
     * @param string $to
     *
     * @return AssistantGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        $callControlID = omit,
        $fetchDynamicVariablesFromWebhook = omit,
        $from = omit,
        $to = omit,
        ?RequestOptions $requestOptions = null,
    ): AssistantGetResponse {
        $params = [
            'callControlID' => $callControlID,
            'fetchDynamicVariablesFromWebhook' => $fetchDynamicVariablesFromWebhook,
            'from' => $from,
            'to' => $to,
        ];

        return $this->retrieveRaw($assistantID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AssistantGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $assistantID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AssistantGetResponse {
        [$parsed, $options] = AssistantRetrieveParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s', $assistantID],
            query: $parsed,
            options: $options,
            convert: AssistantGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update an AI Assistant's attributes.
     *
     * @param string $description
     * @param array<string,
     * mixed,> $dynamicVariables Map of dynamic variables and their default values
     * @param string $dynamicVariablesWebhookURL If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     * @param string $greeting Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param InsightSettings $insightSettings
     * @param string $instructions System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param string $llmAPIKeyRef This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     * @param MessagingSettings $messagingSettings
     * @param string $model ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,
     * @param string $name
     * @param PrivacySettings $privacySettings
     * @param bool $promoteToMain Indicates whether the assistant should be promoted to the main version. Defaults to true.
     * @param TelephonySettings $telephonySettings
     * @param list<WebhookTool|RetrievalTool|HandoffTool|HangupTool|TransferTool|SipReferTool|DtmfTool> $tools The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param TranscriptionSettings $transcription
     * @param VoiceSettings $voiceSettings
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        $description = omit,
        $dynamicVariables = omit,
        $dynamicVariablesWebhookURL = omit,
        $enabledFeatures = omit,
        $greeting = omit,
        $insightSettings = omit,
        $instructions = omit,
        $llmAPIKeyRef = omit,
        $messagingSettings = omit,
        $model = omit,
        $name = omit,
        $privacySettings = omit,
        $promoteToMain = omit,
        $telephonySettings = omit,
        $tools = omit,
        $transcription = omit,
        $voiceSettings = omit,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        $params = [
            'description' => $description,
            'dynamicVariables' => $dynamicVariables,
            'dynamicVariablesWebhookURL' => $dynamicVariablesWebhookURL,
            'enabledFeatures' => $enabledFeatures,
            'greeting' => $greeting,
            'insightSettings' => $insightSettings,
            'instructions' => $instructions,
            'llmAPIKeyRef' => $llmAPIKeyRef,
            'messagingSettings' => $messagingSettings,
            'model' => $model,
            'name' => $name,
            'privacySettings' => $privacySettings,
            'promoteToMain' => $promoteToMain,
            'telephonySettings' => $telephonySettings,
            'tools' => $tools,
            'transcription' => $transcription,
            'voiceSettings' => $voiceSettings,
        ];

        return $this->updateRaw($assistantID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $assistantID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = AssistantUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s', $assistantID],
            body: (object) $parsed,
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Retrieve a list of all AI Assistants configured by the user.
     *
     * @return AssistantsList<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): AssistantsList
    {
        $params = [];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @return AssistantsList<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): AssistantsList {
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
     * @return AssistantDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): AssistantDeleteResponse {
        $params = [];

        return $this->deleteRaw($assistantID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return AssistantDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $assistantID,
        mixed $params,
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
     * @param string $content The message content sent by the client to the assistant
     * @param string $conversationID A unique identifier for the conversation thread, used to maintain context
     * @param string $name The optional display name of the user sending the message
     *
     * @return AssistantChatResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function chat(
        string $assistantID,
        $content,
        $conversationID,
        $name = omit,
        ?RequestOptions $requestOptions = null,
    ): AssistantChatResponse {
        $params = [
            'content' => $content,
            'conversationID' => $conversationID,
            'name' => $name,
        ];

        return $this->chatRaw($assistantID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AssistantChatResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function chatRaw(
        string $assistantID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AssistantChatResponse {
        [$parsed, $options] = AssistantChatParams::parseRequest(
            $params,
            $requestOptions
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
     * @return AssistantCloneResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function clone(
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): AssistantCloneResponse {
        $params = [];

        return $this->cloneRaw($assistantID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return AssistantCloneResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function cloneRaw(
        string $assistantID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): AssistantCloneResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/clone', $assistantID],
            options: $requestOptions,
            convert: AssistantCloneResponse::class,
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
        $params = [];

        return $this->getTexmlRaw($assistantID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function getTexmlRaw(
        string $assistantID,
        mixed $params,
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
     * @param string $apiKeyRef Integration secret pointer that refers to the API key for the external provider. This should be an identifier for an integration secret created via /v2/integration_secrets.
     * @param Provider|value-of<Provider> $provider the external provider to import assistants from
     *
     * @return AssistantsList<HasRawResponse>
     *
     * @throws APIException
     */
    public function import(
        $apiKeyRef,
        $provider,
        ?RequestOptions $requestOptions = null
    ): AssistantsList {
        $params = ['apiKeyRef' => $apiKeyRef, 'provider' => $provider];

        return $this->importRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return AssistantsList<HasRawResponse>
     *
     * @throws APIException
     */
    public function importRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AssistantsList {
        [$parsed, $options] = AssistantImportParams::parseRequest(
            $params,
            $requestOptions
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
}
