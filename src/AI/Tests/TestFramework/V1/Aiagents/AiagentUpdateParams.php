<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Aiagents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates the specified test agent.
 *
 * @see Telnyx\Services\AI\Tests\TestFramework\V1\AiagentsService::update()
 *
 * @phpstan-type AiagentUpdateParamsShape = array{
 *   agentName?: string|null,
 *   assistantID?: string|null,
 *   autoFetchCallsEnabled?: bool|null,
 *   autoSyncPromptEnabled?: bool|null,
 *   autoUpdateDropoffNodes?: bool|null,
 *   autoUpdateTopicNodes?: bool|null,
 *   contactNumber?: string|null,
 *   description?: string|null,
 *   inbound?: bool|null,
 *   language?: string|null,
 *   llmMaxTokens?: int|null,
 *   llmModel?: string|null,
 *   llmSystemPrompt?: string|null,
 *   llmTemperature?: float|null,
 *   outboundAutoCall?: bool|null,
 *   sipEndpoint?: string|null,
 * }
 */
final class AiagentUpdateParams implements BaseModel
{
    /** @use SdkModel<AiagentUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Name of the test agent.
     */
    #[Optional('agent_name')]
    public ?string $agentName;

    /**
     * ID of the Telnyx AI assistant under test.
     */
    #[Optional('assistant_id')]
    public ?string $assistantID;

    #[Optional('auto_fetch_calls_enabled')]
    public ?bool $autoFetchCallsEnabled;

    #[Optional('auto_sync_prompt_enabled')]
    public ?bool $autoSyncPromptEnabled;

    #[Optional('auto_update_dropoff_nodes')]
    public ?bool $autoUpdateDropoffNodes;

    #[Optional('auto_update_topic_nodes')]
    public ?bool $autoUpdateTopicNodes;

    #[Optional('contact_number')]
    public ?string $contactNumber;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?bool $inbound;

    /**
     * ISO language code the test agent converses in.
     */
    #[Optional]
    public ?string $language;

    #[Optional('llm_max_tokens')]
    public ?int $llmMaxTokens;

    #[Optional('llm_model')]
    public ?string $llmModel;

    #[Optional('llm_system_prompt')]
    public ?string $llmSystemPrompt;

    #[Optional('llm_temperature')]
    public ?float $llmTemperature;

    #[Optional('outbound_auto_call')]
    public ?bool $outboundAutoCall;

    #[Optional('sip_endpoint')]
    public ?string $sipEndpoint;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $agentName = null,
        ?string $assistantID = null,
        ?bool $autoFetchCallsEnabled = null,
        ?bool $autoSyncPromptEnabled = null,
        ?bool $autoUpdateDropoffNodes = null,
        ?bool $autoUpdateTopicNodes = null,
        ?string $contactNumber = null,
        ?string $description = null,
        ?bool $inbound = null,
        ?string $language = null,
        ?int $llmMaxTokens = null,
        ?string $llmModel = null,
        ?string $llmSystemPrompt = null,
        ?float $llmTemperature = null,
        ?bool $outboundAutoCall = null,
        ?string $sipEndpoint = null,
    ): self {
        $self = new self;

        null !== $agentName && $self['agentName'] = $agentName;
        null !== $assistantID && $self['assistantID'] = $assistantID;
        null !== $autoFetchCallsEnabled && $self['autoFetchCallsEnabled'] = $autoFetchCallsEnabled;
        null !== $autoSyncPromptEnabled && $self['autoSyncPromptEnabled'] = $autoSyncPromptEnabled;
        null !== $autoUpdateDropoffNodes && $self['autoUpdateDropoffNodes'] = $autoUpdateDropoffNodes;
        null !== $autoUpdateTopicNodes && $self['autoUpdateTopicNodes'] = $autoUpdateTopicNodes;
        null !== $contactNumber && $self['contactNumber'] = $contactNumber;
        null !== $description && $self['description'] = $description;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $language && $self['language'] = $language;
        null !== $llmMaxTokens && $self['llmMaxTokens'] = $llmMaxTokens;
        null !== $llmModel && $self['llmModel'] = $llmModel;
        null !== $llmSystemPrompt && $self['llmSystemPrompt'] = $llmSystemPrompt;
        null !== $llmTemperature && $self['llmTemperature'] = $llmTemperature;
        null !== $outboundAutoCall && $self['outboundAutoCall'] = $outboundAutoCall;
        null !== $sipEndpoint && $self['sipEndpoint'] = $sipEndpoint;

        return $self;
    }

    /**
     * Name of the test agent.
     */
    public function withAgentName(string $agentName): self
    {
        $self = clone $this;
        $self['agentName'] = $agentName;

        return $self;
    }

    /**
     * ID of the Telnyx AI assistant under test.
     */
    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }

    public function withAutoFetchCallsEnabled(bool $autoFetchCallsEnabled): self
    {
        $self = clone $this;
        $self['autoFetchCallsEnabled'] = $autoFetchCallsEnabled;

        return $self;
    }

    public function withAutoSyncPromptEnabled(bool $autoSyncPromptEnabled): self
    {
        $self = clone $this;
        $self['autoSyncPromptEnabled'] = $autoSyncPromptEnabled;

        return $self;
    }

    public function withAutoUpdateDropoffNodes(
        bool $autoUpdateDropoffNodes
    ): self {
        $self = clone $this;
        $self['autoUpdateDropoffNodes'] = $autoUpdateDropoffNodes;

        return $self;
    }

    public function withAutoUpdateTopicNodes(bool $autoUpdateTopicNodes): self
    {
        $self = clone $this;
        $self['autoUpdateTopicNodes'] = $autoUpdateTopicNodes;

        return $self;
    }

    public function withContactNumber(string $contactNumber): self
    {
        $self = clone $this;
        $self['contactNumber'] = $contactNumber;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withInbound(bool $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * ISO language code the test agent converses in.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    public function withLlmMaxTokens(int $llmMaxTokens): self
    {
        $self = clone $this;
        $self['llmMaxTokens'] = $llmMaxTokens;

        return $self;
    }

    public function withLlmModel(string $llmModel): self
    {
        $self = clone $this;
        $self['llmModel'] = $llmModel;

        return $self;
    }

    public function withLlmSystemPrompt(string $llmSystemPrompt): self
    {
        $self = clone $this;
        $self['llmSystemPrompt'] = $llmSystemPrompt;

        return $self;
    }

    public function withLlmTemperature(float $llmTemperature): self
    {
        $self = clone $this;
        $self['llmTemperature'] = $llmTemperature;

        return $self;
    }

    public function withOutboundAutoCall(bool $outboundAutoCall): self
    {
        $self = clone $this;
        $self['outboundAutoCall'] = $outboundAutoCall;

        return $self;
    }

    public function withSipEndpoint(string $sipEndpoint): self
    {
        $self = clone $this;
        $self['sipEndpoint'] = $sipEndpoint;

        return $self;
    }
}
