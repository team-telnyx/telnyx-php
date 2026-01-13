<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Assistants\AssistantChatResponse;
use Telnyx\AI\Assistants\AssistantCreateParams\WidgetSettings;
use Telnyx\AI\Assistants\AssistantDeleteResponse;
use Telnyx\AI\Assistants\AssistantImportsParams\Provider;
use Telnyx\AI\Assistants\AssistantSendSMSResponse;
use Telnyx\AI\Assistants\AssistantsList;
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
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\AssistantsContract;
use Telnyx\Services\AI\Assistants\CanaryDeploysService;
use Telnyx\Services\AI\Assistants\ScheduledEventsService;
use Telnyx\Services\AI\Assistants\TestsService;
use Telnyx\Services\AI\Assistants\ToolsService;
use Telnyx\Services\AI\Assistants\VersionsService;

/**
 * @phpstan-import-type WidgetSettingsShape from \Telnyx\AI\Assistants\AssistantCreateParams\WidgetSettings
 * @phpstan-import-type WidgetSettingsShape from \Telnyx\AI\Assistants\AssistantUpdateParams\WidgetSettings as WidgetSettingsShape1
 * @phpstan-import-type ConversationMetadataShape from \Telnyx\AI\Assistants\AssistantSendSMSParams\ConversationMetadata
 * @phpstan-import-type InsightSettingsShape from \Telnyx\AI\Assistants\InsightSettings
 * @phpstan-import-type MessagingSettingsShape from \Telnyx\AI\Assistants\MessagingSettings
 * @phpstan-import-type PrivacySettingsShape from \Telnyx\AI\Assistants\PrivacySettings
 * @phpstan-import-type TelephonySettingsShape from \Telnyx\AI\Assistants\TelephonySettings
 * @phpstan-import-type AssistantToolShape from \Telnyx\AI\Assistants\AssistantTool
 * @phpstan-import-type TranscriptionSettingsShape from \Telnyx\AI\Assistants\TranscriptionSettings
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\AI\Assistants\VoiceSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AssistantsService implements AssistantsContract
{
    /**
     * @api
     */
    public AssistantsRawService $raw;

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
        $this->raw = new AssistantsRawService($client);
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
     * @param array<string,mixed> $dynamicVariables Map of dynamic variables and their default values
     * @param string $dynamicVariablesWebhookURL If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     * @param string $greeting Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param InsightSettings|InsightSettingsShape $insightSettings
     * @param string $llmAPIKeyRef This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     * @param MessagingSettings|MessagingSettingsShape $messagingSettings
     * @param PrivacySettings|PrivacySettingsShape $privacySettings
     * @param TelephonySettings|TelephonySettingsShape $telephonySettings
     * @param list<AssistantToolShape> $tools The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param TranscriptionSettings|TranscriptionSettingsShape $transcription
     * @param VoiceSettings|VoiceSettingsShape $voiceSettings
     * @param WidgetSettings|WidgetSettingsShape $widgetSettings configuration settings for the assistant's web widget
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $instructions,
        string $model,
        string $name,
        ?string $description = null,
        ?array $dynamicVariables = null,
        ?string $dynamicVariablesWebhookURL = null,
        ?array $enabledFeatures = null,
        ?string $greeting = null,
        InsightSettings|array|null $insightSettings = null,
        ?string $llmAPIKeyRef = null,
        MessagingSettings|array|null $messagingSettings = null,
        PrivacySettings|array|null $privacySettings = null,
        TelephonySettings|array|null $telephonySettings = null,
        ?array $tools = null,
        TranscriptionSettings|array|null $transcription = null,
        VoiceSettings|array|null $voiceSettings = null,
        WidgetSettings|array|null $widgetSettings = null,
        RequestOptions|array|null $requestOptions = null,
    ): InferenceEmbedding {
        $params = Util::removeNulls(
            [
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
                'widgetSettings' => $widgetSettings,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve an AI Assistant configuration by `assistant_id`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $assistantID,
        ?string $callControlID = null,
        bool $fetchDynamicVariablesFromWebhook = false,
        ?string $from = null,
        ?string $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): InferenceEmbedding {
        $params = Util::removeNulls(
            [
                'callControlID' => $callControlID,
                'fetchDynamicVariablesFromWebhook' => $fetchDynamicVariablesFromWebhook,
                'from' => $from,
                'to' => $to,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an AI Assistant's attributes.
     *
     * @param array<string,mixed> $dynamicVariables Map of dynamic variables and their default values
     * @param string $dynamicVariablesWebhookURL If the dynamic_variables_webhook_url is set for the assistant, we will send a request at the start of the conversation. See our [guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for more information.
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     * @param string $greeting Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param InsightSettings|InsightSettingsShape $insightSettings
     * @param string $instructions System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param string $llmAPIKeyRef This is only needed when using third-party inference providers. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your LLM provider's API key. Warning: Free plans are unlikely to work with this integration.
     * @param MessagingSettings|MessagingSettingsShape $messagingSettings
     * @param string $model ID of the model to use. You can use the [Get models API](https://developers.telnyx.com/api/inference/inference-embedding/get-models-public-models-get) to see all of your available models,
     * @param PrivacySettings|PrivacySettingsShape $privacySettings
     * @param bool $promoteToMain Indicates whether the assistant should be promoted to the main version. Defaults to true.
     * @param TelephonySettings|TelephonySettingsShape $telephonySettings
     * @param list<AssistantToolShape> $tools The tools that the assistant can use. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param TranscriptionSettings|TranscriptionSettingsShape $transcription
     * @param VoiceSettings|VoiceSettingsShape $voiceSettings
     * @param \Telnyx\AI\Assistants\AssistantUpdateParams\WidgetSettings|WidgetSettingsShape1 $widgetSettings configuration settings for the assistant's web widget
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        ?string $description = null,
        ?array $dynamicVariables = null,
        ?string $dynamicVariablesWebhookURL = null,
        ?array $enabledFeatures = null,
        ?string $greeting = null,
        InsightSettings|array|null $insightSettings = null,
        ?string $instructions = null,
        ?string $llmAPIKeyRef = null,
        MessagingSettings|array|null $messagingSettings = null,
        ?string $model = null,
        ?string $name = null,
        PrivacySettings|array|null $privacySettings = null,
        bool $promoteToMain = true,
        TelephonySettings|array|null $telephonySettings = null,
        ?array $tools = null,
        TranscriptionSettings|array|null $transcription = null,
        VoiceSettings|array|null $voiceSettings = null,
        \Telnyx\AI\Assistants\AssistantUpdateParams\WidgetSettings|array|null $widgetSettings = null,
        RequestOptions|array|null $requestOptions = null,
    ): InferenceEmbedding {
        $params = Util::removeNulls(
            [
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
                'widgetSettings' => $widgetSettings,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of all AI Assistants configured by the user.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): AssistantsList {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an AI Assistant by `assistant_id`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): AssistantDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($assistantID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * This endpoint allows a client to send a chat message to a specific AI Assistant. The assistant processes the message and returns a relevant reply based on the current conversation context. Refer to the Conversation API to [create a conversation](https://developers.telnyx.com/api/inference/inference-embedding/create-new-conversation-public-conversations-post), [filter existing conversations](https://developers.telnyx.com/api/inference/inference-embedding/get-conversations-public-conversations-get), [fetch messages for a conversation](https://developers.telnyx.com/api/inference/inference-embedding/get-conversations-public-conversation-id-messages-get), and [manually add messages to a conversation](https://developers.telnyx.com/api/inference/inference-embedding/add-new-message).
     *
     * @param string $content The message content sent by the client to the assistant
     * @param string $conversationID A unique identifier for the conversation thread, used to maintain context
     * @param string $name The optional display name of the user sending the message
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function chat(
        string $assistantID,
        string $content,
        string $conversationID,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssistantChatResponse {
        $params = Util::removeNulls(
            [
                'content' => $content,
                'conversationID' => $conversationID,
                'name' => $name,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->chat($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Clone an existing assistant, excluding telephony and messaging settings.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function clone(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): InferenceEmbedding {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->clone($assistantID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get an assistant texml by `assistant_id`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getTexml(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getTexml($assistantID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Import assistants from external providers. Any assistant that has already been imported will be overwritten with its latest version from the importing provider.
     *
     * @param string $apiKeyRef Integration secret pointer that refers to the API key for the external provider. This should be an identifier for an integration secret created via /v2/integration_secrets.
     * @param Provider|value-of<Provider> $provider the external provider to import assistants from
     * @param list<string> $importIDs Optional list of assistant IDs to import from the external provider. If not provided, all assistants will be imported.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function imports(
        string $apiKeyRef,
        Provider|string $provider,
        ?array $importIDs = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssistantsList {
        $params = Util::removeNulls(
            [
                'apiKeyRef' => $apiKeyRef,
                'provider' => $provider,
                'importIDs' => $importIDs,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->imports(params: $params, requestOptions: $requestOptions);

        return $response->parse();
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
     * @param array<string,ConversationMetadataShape> $conversationMetadata
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function sendSMS(
        string $assistantID,
        string $from,
        string $to,
        ?array $conversationMetadata = null,
        ?bool $shouldCreateConversation = null,
        ?string $text = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssistantSendSMSResponse {
        $params = Util::removeNulls(
            [
                'from' => $from,
                'to' => $to,
                'conversationMetadata' => $conversationMetadata,
                'shouldCreateConversation' => $shouldCreateConversation,
                'text' => $text,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendSMS($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
