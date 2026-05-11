<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\AssistantIntegration;
use Telnyx\AI\Assistants\AssistantMcpServer;
use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\EnabledFeatures;
use Telnyx\AI\Assistants\ExternalLlmReq;
use Telnyx\AI\Assistants\FallbackConfigReq;
use Telnyx\AI\Assistants\InferenceEmbedding;
use Telnyx\AI\Assistants\InferenceEmbeddingInterruptionSettings;
use Telnyx\AI\Assistants\InsightSettings;
use Telnyx\AI\Assistants\MessagingSettings;
use Telnyx\AI\Assistants\ObservabilityReq;
use Telnyx\AI\Assistants\PostConversationSettingsReq;
use Telnyx\AI\Assistants\PrivacySettings;
use Telnyx\AI\Assistants\TelephonySettings;
use Telnyx\AI\Assistants\TranscriptionSettings;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\AI\Assistants\WidgetSettings;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\VersionsContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type ExternalLlmReqShape from \Telnyx\AI\Assistants\ExternalLlmReq
 * @phpstan-import-type FallbackConfigReqShape from \Telnyx\AI\Assistants\FallbackConfigReq
 * @phpstan-import-type InsightSettingsShape from \Telnyx\AI\Assistants\InsightSettings
 * @phpstan-import-type AssistantIntegrationShape from \Telnyx\AI\Assistants\AssistantIntegration
 * @phpstan-import-type InferenceEmbeddingInterruptionSettingsShape from \Telnyx\AI\Assistants\InferenceEmbeddingInterruptionSettings
 * @phpstan-import-type AssistantMcpServerShape from \Telnyx\AI\Assistants\AssistantMcpServer
 * @phpstan-import-type MessagingSettingsShape from \Telnyx\AI\Assistants\MessagingSettings
 * @phpstan-import-type ObservabilityReqShape from \Telnyx\AI\Assistants\ObservabilityReq
 * @phpstan-import-type PostConversationSettingsReqShape from \Telnyx\AI\Assistants\PostConversationSettingsReq
 * @phpstan-import-type PrivacySettingsShape from \Telnyx\AI\Assistants\PrivacySettings
 * @phpstan-import-type TelephonySettingsShape from \Telnyx\AI\Assistants\TelephonySettings
 * @phpstan-import-type AssistantToolShape from \Telnyx\AI\Assistants\AssistantTool
 * @phpstan-import-type TranscriptionSettingsShape from \Telnyx\AI\Assistants\TranscriptionSettings
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\AI\Assistants\VoiceSettings
 * @phpstan-import-type WidgetSettingsShape from \Telnyx\AI\Assistants\WidgetSettings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class VersionsService implements VersionsContract
{
    /**
     * @api
     */
    public VersionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new VersionsRawService($client);
    }

    /**
     * @api
     *
     * Retrieves a specific version of an assistant by assistant_id and version_id
     *
     * @param string $versionID Path param
     * @param string $assistantID Path param
     * @param bool $includeMcpServers Query param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $versionID,
        string $assistantID,
        ?bool $includeMcpServers = null,
        RequestOptions|array|null $requestOptions = null,
    ): InferenceEmbedding {
        $params = Util::removeNulls(
            ['assistantID' => $assistantID, 'includeMcpServers' => $includeMcpServers]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($versionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the configuration of a specific assistant version. Can not update main version
     *
     * @param string $versionID Path param
     * @param string $assistantID Path param
     * @param string $description Body param
     * @param array<string,mixed> $dynamicVariables Body param: Map of dynamic variables and their default values
     * @param int $dynamicVariablesWebhookTimeoutMs Body param: Timeout in milliseconds for the dynamic variables webhook. Must be between 1 and 10000 ms. If the webhook does not respond within this timeout, the call proceeds with default values. See the [dynamic variables guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     * @param string $dynamicVariablesWebhookURL Body param: If `dynamic_variables_webhook_url` is set, Telnyx sends a POST request to this URL at the start of the conversation to resolve dynamic variables. **Gotcha:** the webhook response must wrap variables under a top-level `dynamic_variables` object, e.g. `{"dynamic_variables": {"customer_name": "Jane"}}`. Returning a flat object will be ignored and variables will fall back to their defaults. See the [dynamic variables guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for the full request/response format and timeout behavior.
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures Body param
     * @param ExternalLlmReq|ExternalLlmReqShape $externalLlm Body param
     * @param FallbackConfigReq|FallbackConfigReqShape $fallbackConfig Body param
     * @param string $greeting Body param: Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables). Use an empty string to have the assistant wait for the user to speak first. Use the special value `<assistant-speaks-first-with-model-generated-message>` to have the assistant generate the greeting based on the system instructions.
     * @param InsightSettings|InsightSettingsShape $insightSettings Body param
     * @param string $instructions Body param: System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param list<AssistantIntegration|AssistantIntegrationShape> $integrations Body param: Connected integrations attached to the assistant. The catalog of available integrations is at `/ai/integrations`; the user's connected integrations are at `/ai/integrations/connections`. Each item references a catalog integration by `integration_id`.
     * @param InferenceEmbeddingInterruptionSettings|InferenceEmbeddingInterruptionSettingsShape $interruptionSettings Body param: Settings for interruptions and how the assistant decides the user has finished speaking. These timings are most relevant when using non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn behavior is controlled by the transcription end-of-turn settings under `transcription.settings` (`eot_threshold`, `eot_timeout_ms`, `eager_eot_threshold`).
     * @param string $llmAPIKeyRef Body param: This is only needed when using third-party inference providers selected by `model`. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) that refers to your LLM provider's API key. For bring-your-own endpoint authentication, use `external_llm.llm_api_key_ref` instead. Warning: Free plans are unlikely to work with this integration.
     * @param list<AssistantMcpServer|AssistantMcpServerShape> $mcpServers Body param: MCP servers attached to the assistant. Create MCP servers with `/ai/mcp_servers`, then reference them by `id` here.
     * @param MessagingSettings|MessagingSettingsShape $messagingSettings Body param
     * @param string $model Body param: ID of the model to use when `external_llm` is not set. You can use the [Get models API](https://developers.telnyx.com/api-reference/openai-chat/get-available-models-openai-compatible) to see available models. If `external_llm` is provided, the assistant uses `external_llm` instead of this field. If neither `model` nor `external_llm` is provided, Telnyx applies the default model.
     * @param string $name Body param
     * @param ObservabilityReq|ObservabilityReqShape $observabilitySettings Body param
     * @param PostConversationSettingsReq|PostConversationSettingsReqShape $postConversationSettings Body param: Configuration for post-conversation processing. When enabled, the assistant receives one additional LLM turn after the conversation ends, allowing it to execute tool calls such as logging to a CRM or sending a summary. The assistant can execute multiple parallel or sequential tools during this phase. Telephony-control tools (e.g. hangup, transfer) are unavailable post-conversation. Beta feature.
     * @param PrivacySettings|PrivacySettingsShape $privacySettings Body param
     * @param list<string> $tags Body param: Tags associated with the assistant. Tags can also be managed with the assistant tag endpoints.
     * @param TelephonySettings|TelephonySettingsShape $telephonySettings Body param
     * @param list<string> $toolIDs Body param: IDs of shared tools to attach to the assistant. New integrations should prefer `tool_ids` over inline `tools`.
     * @param list<AssistantToolShape> $tools Body param: Deprecated for new integrations. Inline tool definitions available to the assistant. Prefer `tool_ids` to attach shared tools created with the AI Tools endpoints.
     * @param TranscriptionSettings|TranscriptionSettingsShape $transcription Body param
     * @param string $versionName body param: Human-readable name for the assistant version
     * @param VoiceSettings|VoiceSettingsShape $voiceSettings Body param
     * @param WidgetSettings|WidgetSettingsShape $widgetSettings body param: Configuration settings for the assistant's web widget
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $versionID,
        string $assistantID,
        ?string $description = null,
        ?array $dynamicVariables = null,
        int $dynamicVariablesWebhookTimeoutMs = 1500,
        ?string $dynamicVariablesWebhookURL = null,
        ?array $enabledFeatures = null,
        ExternalLlmReq|array|null $externalLlm = null,
        FallbackConfigReq|array|null $fallbackConfig = null,
        ?string $greeting = null,
        InsightSettings|array|null $insightSettings = null,
        ?string $instructions = null,
        array $integrations = [],
        InferenceEmbeddingInterruptionSettings|array|null $interruptionSettings = null,
        ?string $llmAPIKeyRef = null,
        array $mcpServers = [],
        MessagingSettings|array|null $messagingSettings = null,
        ?string $model = null,
        ?string $name = null,
        ObservabilityReq|array|null $observabilitySettings = null,
        PostConversationSettingsReq|array|null $postConversationSettings = null,
        PrivacySettings|array|null $privacySettings = null,
        array $tags = [],
        TelephonySettings|array|null $telephonySettings = null,
        ?array $toolIDs = null,
        ?array $tools = null,
        TranscriptionSettings|array|null $transcription = null,
        string $versionName = 'New assistant',
        VoiceSettings|array|null $voiceSettings = null,
        WidgetSettings|array|null $widgetSettings = null,
        RequestOptions|array|null $requestOptions = null,
    ): InferenceEmbedding {
        $params = Util::removeNulls(
            [
                'assistantID' => $assistantID,
                'description' => $description,
                'dynamicVariables' => $dynamicVariables,
                'dynamicVariablesWebhookTimeoutMs' => $dynamicVariablesWebhookTimeoutMs,
                'dynamicVariablesWebhookURL' => $dynamicVariablesWebhookURL,
                'enabledFeatures' => $enabledFeatures,
                'externalLlm' => $externalLlm,
                'fallbackConfig' => $fallbackConfig,
                'greeting' => $greeting,
                'insightSettings' => $insightSettings,
                'instructions' => $instructions,
                'integrations' => $integrations,
                'interruptionSettings' => $interruptionSettings,
                'llmAPIKeyRef' => $llmAPIKeyRef,
                'mcpServers' => $mcpServers,
                'messagingSettings' => $messagingSettings,
                'model' => $model,
                'name' => $name,
                'observabilitySettings' => $observabilitySettings,
                'postConversationSettings' => $postConversationSettings,
                'privacySettings' => $privacySettings,
                'tags' => $tags,
                'telephonySettings' => $telephonySettings,
                'toolIDs' => $toolIDs,
                'tools' => $tools,
                'transcription' => $transcription,
                'versionName' => $versionName,
                'voiceSettings' => $voiceSettings,
                'widgetSettings' => $widgetSettings,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($versionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all versions of a specific assistant with complete configuration and metadata
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): AssistantsList {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($assistantID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Permanently removes a specific version of an assistant. Can not delete main version
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $versionID,
        string $assistantID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['assistantID' => $assistantID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($versionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Promotes a specific version to be the main/current version of the assistant. This will delete any existing canary deploy configuration and send all live production traffic to this version.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function promote(
        string $versionID,
        string $assistantID,
        RequestOptions|array|null $requestOptions = null,
    ): InferenceEmbedding {
        $params = Util::removeNulls(['assistantID' => $assistantID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->promote($versionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
