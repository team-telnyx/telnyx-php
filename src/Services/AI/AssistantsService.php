<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Assistants\AssistantA2AAgent;
use Telnyx\AI\Assistants\AssistantChatResponse;
use Telnyx\AI\Assistants\AssistantDeleteResponse;
use Telnyx\AI\Assistants\AssistantImportsParams\Provider;
use Telnyx\AI\Assistants\AssistantIntegration;
use Telnyx\AI\Assistants\AssistantMcpServer;
use Telnyx\AI\Assistants\AssistantSendSMSResponse;
use Telnyx\AI\Assistants\AssistantsList;
use Telnyx\AI\Assistants\ConversationFlowReq;
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
use Telnyx\Core\Omitted;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\AssistantsContract;
use Telnyx\Services\AI\Assistants\CanaryDeploysService;
use Telnyx\Services\AI\Assistants\InstructionsService;
use Telnyx\Services\AI\Assistants\ScheduledEventsService;
use Telnyx\Services\AI\Assistants\TagsService;
use Telnyx\Services\AI\Assistants\TestsService;
use Telnyx\Services\AI\Assistants\ToolsService;
use Telnyx\Services\AI\Assistants\VersionsService;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type ConversationMetadataShape from \Telnyx\AI\Assistants\AssistantSendSMSParams\ConversationMetadata
 * @phpstan-import-type AssistantA2AAgentShape from \Telnyx\AI\Assistants\AssistantA2AAgent
 * @phpstan-import-type ConversationFlowReqShape from \Telnyx\AI\Assistants\ConversationFlowReq
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
     * @api
     */
    public TagsService $tags;

    /**
     * @api
     */
    public InstructionsService $instructions;

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
        $this->tags = new TagsService($client);
        $this->instructions = new InstructionsService($client);
    }

    /**
     * @api
     *
     * Creates a new AI assistant from the provided configuration, including its model, instructions, and attached tools, and returns the created assistant.
     *
     * @param string $instructions Body param: System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param string $name Body param
     * @param list<AssistantA2AAgent|AssistantA2AAgentShape> $a2aAgents Body param: A2A agents this assistant can delegate to. Tools are not stored here: at the start of every conversation each agent's card is fetched and one tool is derived per skill the card advertises, named `a2a_<name>_<skill_id>`. The following limits are not enforced when the assistant is saved, and anything past them is dropped when the conversation starts: 64 agents per assistant, 64 skills per card, 128 derived tools per assistant, and a 6 second budget for all card fetches combined. An agent whose card cannot be fetched costs the assistant that capability for the conversation; it does not fail the call.
     * @param ConversationFlowReq|ConversationFlowReqShape $conversationFlow Body param: Conversation flow as supplied by API clients (create / update).
     *
     * A directed graph of `FlowNodeReq` connected by `FlowEdge`s. Validation
     * enforces unique node/edge IDs, that `start_node_id` references a real
     * node, and that every edge's endpoints reference real nodes.
     * @param string $description Body param
     * @param array<string,mixed> $dynamicVariables Body param: Map of dynamic variables and their default values
     * @param int $dynamicVariablesWebhookTimeoutMs Body param: Timeout in milliseconds for the dynamic variables webhook. Must be between 1 and 10000 ms. If the webhook does not respond within this timeout, the call proceeds with default values. See the [dynamic variables guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     * @param string $dynamicVariablesWebhookURL Body param: If `dynamic_variables_webhook_url` is set, Telnyx sends a POST request to this URL at the start of the conversation to resolve dynamic variables. **Gotcha:** the webhook response must wrap variables under a top-level `dynamic_variables` object, e.g. `{"dynamic_variables": {"customer_name": "Jane"}}`. Returning a flat object will be ignored and variables will fall back to their defaults. See the [dynamic variables guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for the full request/response format and timeout behavior.
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures Body param
     * @param ExternalLlmReq|ExternalLlmReqShape $externalLlm Body param
     * @param FallbackConfigReq|FallbackConfigReqShape $fallbackConfig Body param
     * @param string $greeting Body param: Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables). Use an empty string to have the assistant wait for the user to speak first. Use the special value `<assistant-speaks-first-with-model-generated-message>` to have the assistant generate the greeting based on the system instructions.
     * @param InsightSettings|InsightSettingsShape $insightSettings Body param
     * @param list<AssistantIntegration|AssistantIntegrationShape> $integrations Body param: Connected integrations attached to the assistant. The catalog of available integrations is at `/ai/integrations`; the user's connected integrations are at `/ai/integrations/connections`. Each item references a catalog integration by `integration_id`.
     * @param InferenceEmbeddingInterruptionSettings|InferenceEmbeddingInterruptionSettingsShape $interruptionSettings Body param: Settings for interruptions and how the assistant decides the user has finished speaking. These timings are most relevant when using non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn behavior is controlled by the transcription end-of-turn settings under `transcription.settings` (`eot_threshold`, `eot_timeout_ms`, `eager_eot_threshold`).
     * @param string $llmAPIKeyRef Body param: This is only needed when using third-party inference providers selected by `model`. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) that refers to your LLM provider's API key. For bring-your-own endpoint authentication, use `external_llm.llm_api_key_ref` instead. Warning: Free plans are unlikely to work with this integration.
     * @param list<AssistantMcpServer|AssistantMcpServerShape> $mcpServers Body param: MCP servers attached to the assistant. Create MCP servers with `/ai/mcp_servers`, then reference them by `id` here.
     * @param MessagingSettings|MessagingSettingsShape $messagingSettings Body param
     * @param string $model Body param: ID of the model to use when `external_llm` is not set. You can use the [Get models API](https://developers.telnyx.com/api-reference/openai-chat/get-available-models-openai-compatible) to see available models. If `external_llm` is provided, the assistant uses `external_llm` instead of this field. If neither `model` nor `external_llm` is provided, Telnyx applies the default model.
     * @param ObservabilityReq|ObservabilityReqShape $observabilitySettings Body param
     * @param PostConversationSettingsReq|PostConversationSettingsReqShape $postConversationSettings Body param: Configuration for post-conversation processing. When enabled, the assistant receives one additional LLM turn after the conversation ends, allowing it to execute tool calls such as logging to a CRM or sending a summary. The assistant can execute multiple parallel or sequential tools during this phase. Telephony-control tools (e.g. hangup, transfer) are unavailable post-conversation. Beta feature.
     * @param PrivacySettings|PrivacySettingsShape $privacySettings Body param
     * @param list<string> $tags Body param: Tags associated with the assistant. Tags can also be managed with the assistant tag endpoints.
     * @param TelephonySettings|TelephonySettingsShape $telephonySettings Body param
     * @param list<string> $toolIDs Body param: IDs of shared tools to attach to the assistant. New integrations should prefer `tool_ids` over inline `tools`.
     * @param list<AssistantToolShape> $tools Body param: Deprecated for new integrations. Inline tool definitions available to the assistant. Prefer `tool_ids` to attach shared tools created with the AI Tools endpoints.
     * @param TranscriptionSettings|TranscriptionSettingsShape $transcription Body param
     * @param VoiceSettings|VoiceSettingsShape $voiceSettings Body param
     * @param WidgetSettings|WidgetSettingsShape $widgetSettings body param: Configuration settings for the assistant's web widget
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $instructions,
        string $name,
        array $a2aAgents = [],
        ConversationFlowReq|array|null $conversationFlow = null,
        ?string $description = null,
        ?array $dynamicVariables = null,
        int $dynamicVariablesWebhookTimeoutMs = 1500,
        ?string $dynamicVariablesWebhookURL = null,
        ?array $enabledFeatures = null,
        ExternalLlmReq|array|null $externalLlm = null,
        FallbackConfigReq|array|null $fallbackConfig = null,
        ?string $greeting = null,
        InsightSettings|array|null $insightSettings = null,
        array $integrations = [],
        InferenceEmbeddingInterruptionSettings|array|null $interruptionSettings = null,
        ?string $llmAPIKeyRef = null,
        array $mcpServers = [],
        MessagingSettings|array|null $messagingSettings = null,
        ?string $model = null,
        ObservabilityReq|array|null $observabilitySettings = null,
        PostConversationSettingsReq|array|null $postConversationSettings = null,
        PrivacySettings|array|null $privacySettings = null,
        array $tags = [],
        TelephonySettings|array|null $telephonySettings = null,
        ?array $toolIDs = null,
        ?array $tools = null,
        TranscriptionSettings|array|null $transcription = null,
        VoiceSettings|array|null $voiceSettings = null,
        WidgetSettings|array|null $widgetSettings = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): InferenceEmbedding {
        $params = array_filter(
            [
                'instructions' => $instructions,
                'name' => $name,
                'a2aAgents' => $a2aAgents,
                'conversationFlow' => $conversationFlow ?? Omitted::VALUE,
                'description' => $description ?? Omitted::VALUE,
                'dynamicVariables' => $dynamicVariables ?? Omitted::VALUE,
                'dynamicVariablesWebhookTimeoutMs' => $dynamicVariablesWebhookTimeoutMs,
                'dynamicVariablesWebhookURL' => $dynamicVariablesWebhookURL ?? Omitted::VALUE,
                'enabledFeatures' => $enabledFeatures ?? Omitted::VALUE,
                'externalLlm' => $externalLlm ?? Omitted::VALUE,
                'fallbackConfig' => $fallbackConfig ?? Omitted::VALUE,
                'greeting' => $greeting ?? Omitted::VALUE,
                'insightSettings' => $insightSettings ?? Omitted::VALUE,
                'integrations' => $integrations,
                'interruptionSettings' => $interruptionSettings ?? Omitted::VALUE,
                'llmAPIKeyRef' => $llmAPIKeyRef ?? Omitted::VALUE,
                'mcpServers' => $mcpServers,
                'messagingSettings' => $messagingSettings ?? Omitted::VALUE,
                'model' => $model ?? Omitted::VALUE,
                'observabilitySettings' => $observabilitySettings ?? Omitted::VALUE,
                'postConversationSettings' => $postConversationSettings ?? Omitted::VALUE,
                'privacySettings' => $privacySettings ?? Omitted::VALUE,
                'tags' => $tags,
                'telephonySettings' => $telephonySettings ?? Omitted::VALUE,
                'toolIDs' => $toolIDs ?? Omitted::VALUE,
                'tools' => $tools ?? Omitted::VALUE,
                'transcription' => $transcription ?? Omitted::VALUE,
                'voiceSettings' => $voiceSettings ?? Omitted::VALUE,
                'widgetSettings' => $widgetSettings ?? Omitted::VALUE,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
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
     * @param string $assistantID unique identifier of the assistant
     * @param string $callControlID filter results by call control id
     * @param bool $fetchDynamicVariablesFromWebhook whether to fetch dynamic variables from the configured webhook
     * @param string $from start of the filter range
     * @param string $to end of the filter range
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
        $params = array_filter(
            [
                'callControlID' => $callControlID ?? Omitted::VALUE,
                'fetchDynamicVariablesFromWebhook' => $fetchDynamicVariablesFromWebhook,
                'from' => $from ?? Omitted::VALUE,
                'to' => $to ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the specified AI assistant's attributes and returns the updated assistant. The request can also control how the change is promoted across assistant versions.
     *
     * @param string $assistantID unique identifier of the assistant
     * @param list<AssistantA2AAgent|AssistantA2AAgentShape> $a2aAgents A2A agents this assistant can delegate to. Tools are not stored here: at the start of every conversation each agent's card is fetched and one tool is derived per skill the card advertises, named `a2a_<name>_<skill_id>`. The following limits are not enforced when the assistant is saved, and anything past them is dropped when the conversation starts: 64 agents per assistant, 64 skills per card, 128 derived tools per assistant, and a 6 second budget for all card fetches combined. An agent whose card cannot be fetched costs the assistant that capability for the conversation; it does not fail the call. Omit this field to leave the assistant's agents unchanged; send an empty array to remove them all.
     * @param ConversationFlowReq|ConversationFlowReqShape $conversationFlow Conversation flow as supplied by API clients (create / update).
     *
     * A directed graph of `FlowNodeReq` connected by `FlowEdge`s. Validation
     * enforces unique node/edge IDs, that `start_node_id` references a real
     * node, and that every edge's endpoints reference real nodes.
     * @param array<string,mixed> $dynamicVariables Map of dynamic variables and their default values
     * @param int $dynamicVariablesWebhookTimeoutMs Timeout in milliseconds for the dynamic variables webhook. Must be between 1 and 10000 ms. If the webhook does not respond within this timeout, the call proceeds with default values. See the [dynamic variables guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables).
     * @param string $dynamicVariablesWebhookURL If `dynamic_variables_webhook_url` is set, Telnyx sends a POST request to this URL at the start of the conversation to resolve dynamic variables. **Gotcha:** the webhook response must wrap variables under a top-level `dynamic_variables` object, e.g. `{"dynamic_variables": {"customer_name": "Jane"}}`. Returning a flat object will be ignored and variables will fall back to their defaults. See the [dynamic variables guide](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables) for the full request/response format and timeout behavior.
     * @param list<EnabledFeatures|value-of<EnabledFeatures>> $enabledFeatures
     * @param ExternalLlmReq|ExternalLlmReqShape $externalLlm
     * @param FallbackConfigReq|FallbackConfigReqShape $fallbackConfig
     * @param string $greeting Text that the assistant will use to start the conversation. This may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables). Use an empty string to have the assistant wait for the user to speak first. Use the special value `<assistant-speaks-first-with-model-generated-message>` to have the assistant generate the greeting based on the system instructions.
     * @param InsightSettings|InsightSettingsShape $insightSettings
     * @param string $instructions System instructions for the assistant. These may be templated with [dynamic variables](https://developers.telnyx.com/docs/inference/ai-assistants/dynamic-variables)
     * @param list<AssistantIntegration|AssistantIntegrationShape> $integrations Connected integrations attached to the assistant. The catalog of available integrations is at `/ai/integrations`; the user's connected integrations are at `/ai/integrations/connections`. Each item references a catalog integration by `integration_id`.
     * @param InferenceEmbeddingInterruptionSettings|InferenceEmbeddingInterruptionSettingsShape $interruptionSettings Settings for interruptions and how the assistant decides the user has finished speaking. These timings are most relevant when using non turn-taking transcription models. For turn-taking models like `deepgram/flux`, end-of-turn behavior is controlled by the transcription end-of-turn settings under `transcription.settings` (`eot_threshold`, `eot_timeout_ms`, `eager_eot_threshold`).
     * @param string $llmAPIKeyRef This is only needed when using third-party inference providers selected by `model`. The `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) that refers to your LLM provider's API key. For bring-your-own endpoint authentication, use `external_llm.llm_api_key_ref` instead. Warning: Free plans are unlikely to work with this integration.
     * @param list<AssistantMcpServer|AssistantMcpServerShape> $mcpServers MCP servers attached to the assistant. Create MCP servers with `/ai/mcp_servers`, then reference them by `id` here.
     * @param MessagingSettings|MessagingSettingsShape $messagingSettings
     * @param string $model ID of the model to use when `external_llm` is not set. You can use the [Get models API](https://developers.telnyx.com/api-reference/openai-chat/get-available-models-openai-compatible) to see available models. If `external_llm` is provided, the assistant uses `external_llm` instead of this field. If neither `model` nor `external_llm` is provided, Telnyx applies the default model.
     * @param ObservabilityReq|ObservabilityReqShape $observabilitySettings
     * @param PostConversationSettingsReq|PostConversationSettingsReqShape $postConversationSettings Configuration for post-conversation processing. When enabled, the assistant receives one additional LLM turn after the conversation ends, allowing it to execute tool calls such as logging to a CRM or sending a summary. The assistant can execute multiple parallel or sequential tools during this phase. Telephony-control tools (e.g. hangup, transfer) are unavailable post-conversation. Beta feature.
     * @param PrivacySettings|PrivacySettingsShape $privacySettings
     * @param bool $promoteToMain Indicates whether the assistant should be promoted to the main version. Defaults to true.
     * @param list<string> $tags Tags associated with the assistant. Tags can also be managed with the assistant tag endpoints.
     * @param TelephonySettings|TelephonySettingsShape $telephonySettings
     * @param list<string> $toolIDs IDs of shared tools to attach to the assistant. New integrations should prefer `tool_ids` over inline `tools`.
     * @param list<AssistantToolShape> $tools Deprecated for new integrations. Inline tool definitions available to the assistant. Prefer `tool_ids` to attach shared tools created with the AI Tools endpoints.
     * @param TranscriptionSettings|TranscriptionSettingsShape $transcription
     * @param string $versionName human-readable name for the assistant version
     * @param VoiceSettings|VoiceSettingsShape $voiceSettings
     * @param WidgetSettings|WidgetSettingsShape $widgetSettings configuration settings for the assistant's web widget
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $assistantID,
        ?array $a2aAgents = null,
        ConversationFlowReq|array|null $conversationFlow = null,
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
        bool $promoteToMain = true,
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
        $params = array_filter(
            [
                'a2aAgents' => $a2aAgents ?? Omitted::VALUE,
                'conversationFlow' => $conversationFlow ?? Omitted::VALUE,
                'description' => $description ?? Omitted::VALUE,
                'dynamicVariables' => $dynamicVariables ?? Omitted::VALUE,
                'dynamicVariablesWebhookTimeoutMs' => $dynamicVariablesWebhookTimeoutMs,
                'dynamicVariablesWebhookURL' => $dynamicVariablesWebhookURL ?? Omitted::VALUE,
                'enabledFeatures' => $enabledFeatures ?? Omitted::VALUE,
                'externalLlm' => $externalLlm ?? Omitted::VALUE,
                'fallbackConfig' => $fallbackConfig ?? Omitted::VALUE,
                'greeting' => $greeting ?? Omitted::VALUE,
                'insightSettings' => $insightSettings ?? Omitted::VALUE,
                'instructions' => $instructions ?? Omitted::VALUE,
                'integrations' => $integrations,
                'interruptionSettings' => $interruptionSettings ?? Omitted::VALUE,
                'llmAPIKeyRef' => $llmAPIKeyRef ?? Omitted::VALUE,
                'mcpServers' => $mcpServers,
                'messagingSettings' => $messagingSettings ?? Omitted::VALUE,
                'model' => $model ?? Omitted::VALUE,
                'name' => $name ?? Omitted::VALUE,
                'observabilitySettings' => $observabilitySettings ?? Omitted::VALUE,
                'postConversationSettings' => $postConversationSettings ?? Omitted::VALUE,
                'privacySettings' => $privacySettings ?? Omitted::VALUE,
                'promoteToMain' => $promoteToMain,
                'tags' => $tags,
                'telephonySettings' => $telephonySettings ?? Omitted::VALUE,
                'toolIDs' => $toolIDs ?? Omitted::VALUE,
                'tools' => $tools ?? Omitted::VALUE,
                'transcription' => $transcription ?? Omitted::VALUE,
                'versionName' => $versionName,
                'voiceSettings' => $voiceSettings ?? Omitted::VALUE,
                'widgetSettings' => $widgetSettings ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
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
     * @param string $assistantID unique identifier of the assistant
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
     * This endpoint allows a client to send a chat message to a specific AI Assistant. The assistant processes the message and returns a relevant reply based on the current conversation context. Refer to the Conversation API to [create a conversation](https://developers.telnyx.com/api-reference/conversations/create-a-conversation), [filter existing conversations](https://developers.telnyx.com/api-reference/conversations/list-conversations), [fetch messages for a conversation](https://developers.telnyx.com/api-reference/conversations/get-conversation-messages), and [manually add messages to a conversation](https://developers.telnyx.com/api-reference/conversations/create-message).
     *
     * @param string $assistantID unique identifier of the assistant
     * @param string $content The message content sent by the client to the assistant
     * @param string $conversationID A unique identifier for the conversation thread, used to maintain context
     * @param string $name The optional display name of the user sending the message
     * @param bool $stream When true, the response is streamed as Server-Sent Events (`text/event-stream`): `delta` events carry content fragments as they are generated, a final `done` event carries the full content plus `whatsapp_template`, and a terminal `error` event reports failures that happen after streaming started. When false (default), the response is a single JSON object.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function chat(
        string $assistantID,
        string $content,
        string $conversationID,
        ?string $name = null,
        bool $stream = false,
        RequestOptions|array|null $requestOptions = null,
    ): AssistantChatResponse {
        $params = array_filter(
            [
                'content' => $content,
                'conversationID' => $conversationID,
                'name' => $name ?? Omitted::VALUE,
                'stream' => $stream,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
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
     * @param string $assistantID unique identifier of the assistant
     * @param string $idempotencyKey Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function clone(
        string $assistantID,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): InferenceEmbedding {
        $params = array_filter(
            ['idempotencyKey' => $idempotencyKey ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->clone($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get an assistant texml by `assistant_id`.
     *
     * @param string $assistantID unique identifier of the assistant
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
     * @param string $apiKeyRef Body param: Integration secret pointer that refers to the API key for the external provider. This should be an identifier for an integration secret created via /v2/integration_secrets.
     * @param Provider|value-of<Provider> $provider body param: The external provider to import assistants from
     * @param list<string> $importIDs Body param: Optional list of assistant IDs to import from the external provider. If not provided, all assistants will be imported.
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function imports(
        string $apiKeyRef,
        Provider|string $provider,
        ?array $importIDs = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssistantsList {
        $params = array_filter(
            [
                'apiKeyRef' => $apiKeyRef,
                'provider' => $provider,
                'importIDs' => $importIDs ?? Omitted::VALUE,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
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
     * @param string $assistantID path param: Unique identifier of the assistant
     * @param string $from Body param
     * @param string $to Body param
     * @param array<string,ConversationMetadataShape> $conversationMetadata Body param
     * @param bool $shouldCreateConversation Body param
     * @param string $text Body param
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
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
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): AssistantSendSMSResponse {
        $params = array_filter(
            [
                'from' => $from,
                'to' => $to,
                'conversationMetadata' => $conversationMetadata ?? Omitted::VALUE,
                'shouldCreateConversation' => $shouldCreateConversation ?? Omitted::VALUE,
                'text' => $text ?? Omitted::VALUE,
                'idempotencyKey' => $idempotencyKey ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->sendSMS($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
