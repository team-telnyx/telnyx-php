<?php

declare(strict_types=1);

namespace Telnyx\AI\Tests\TestFramework\V1\Aiagents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type TestAgentShape = array{
 *   id: int,
 *   agentName: string,
 *   assistantID: string,
 *   createdAt: \DateTimeInterface,
 *   updatedAt: \DateTimeInterface,
 *   autoUpdateDropoffNodes?: bool|null,
 *   autoUpdateTopicNodes?: bool|null,
 *   chatAssistantID?: string|null,
 *   contactNumber?: string|null,
 *   description?: string|null,
 *   enabledPersonalities?: list<int>|null,
 *   hallucinationMetricKBFiles?: list<int>|null,
 *   inbound?: bool|null,
 *   knowledgeBaseFiles?: list<mixed>|null,
 *   language?: string|null,
 *   llmMaxTokens?: int|null,
 *   llmModel?: string|null,
 *   llmSystemPrompt?: string|null,
 *   llmTemperature?: float|null,
 *   outboundAutoCall?: bool|null,
 *   outboundNumbers?: list<mixed>|null,
 *   sipAuth?: array<string,string>|null,
 *   sipEndpoint?: string|null,
 * }
 */
final class TestAgent implements BaseModel
{
    /** @use SdkModel<TestAgentShape> */
    use SdkModel;

    #[Required]
    public int $id;

    /**
     * Name of the test agent.
     */
    #[Required('agent_name')]
    public string $agentName;

    /**
     * ID of the Telnyx AI assistant under test.
     */
    #[Required('assistant_id')]
    public string $assistantID;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    #[Optional('auto_update_dropoff_nodes')]
    public ?bool $autoUpdateDropoffNodes;

    #[Optional('auto_update_topic_nodes')]
    public ?bool $autoUpdateTopicNodes;

    /**
     * ID of the chat assistant under test, when testing text channels.
     */
    #[Optional('chat_assistant_id')]
    public ?string $chatAssistantID;

    /**
     * Contact phone number for the test agent.
     */
    #[Optional('contact_number')]
    public ?string $contactNumber;

    #[Optional]
    public ?string $description;

    /**
     * IDs of the test personalities enabled for this agent.
     *
     * @var list<int>|null $enabledPersonalities
     */
    #[Optional('enabled_personalities', list: 'int')]
    public ?array $enabledPersonalities;

    /** @var list<int>|null $hallucinationMetricKBFiles */
    #[Optional('hallucination_metric_kb_files', list: 'int')]
    public ?array $hallucinationMetricKBFiles;

    /**
     * Whether the test agent accepts inbound calls.
     */
    #[Optional]
    public ?bool $inbound;

    /**
     * Knowledge-base files associated with the test agent.
     *
     * @var list<mixed>|null $knowledgeBaseFiles
     */
    #[Optional('knowledge_base_files', list: 'mixed')]
    public ?array $knowledgeBaseFiles;

    /**
     * ISO language code the test agent converses in.
     */
    #[Optional]
    public ?string $language;

    #[Optional('llm_max_tokens')]
    public ?int $llmMaxTokens;

    /**
     * Model used to drive the test agent's side of the conversation.
     */
    #[Optional('llm_model')]
    public ?string $llmModel;

    #[Optional('llm_system_prompt')]
    public ?string $llmSystemPrompt;

    #[Optional('llm_temperature')]
    public ?float $llmTemperature;

    #[Optional('outbound_auto_call')]
    public ?bool $outboundAutoCall;

    /**
     * Outbound numbers associated with the test agent.
     *
     * @var list<mixed>|null $outboundNumbers
     */
    #[Optional('outbound_numbers', list: 'mixed', nullable: true)]
    public ?array $outboundNumbers;

    /** @var array<string,string>|null $sipAuth */
    #[Optional('sip_auth', map: 'string', nullable: true)]
    public ?array $sipAuth;

    #[Optional('sip_endpoint')]
    public ?string $sipEndpoint;

    /**
     * `new TestAgent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TestAgent::with(
     *   id: ..., agentName: ..., assistantID: ..., createdAt: ..., updatedAt: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TestAgent)
     *   ->withID(...)
     *   ->withAgentName(...)
     *   ->withAssistantID(...)
     *   ->withCreatedAt(...)
     *   ->withUpdatedAt(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<mixed>|Omitted|null $outboundNumbers
     * @param Omitted|array<string,string>|null $sipAuth
     * @param list<int>|null $enabledPersonalities
     * @param list<int>|null $hallucinationMetricKBFiles
     * @param list<mixed>|null $knowledgeBaseFiles
     */
    public static function with(
        int $id,
        string $agentName,
        string $assistantID,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        array|Omitted|null $outboundNumbers = Omitted::VALUE,
        Omitted|array|null $sipAuth = Omitted::VALUE,
        ?bool $autoUpdateDropoffNodes = null,
        ?bool $autoUpdateTopicNodes = null,
        ?string $chatAssistantID = null,
        ?string $contactNumber = null,
        ?string $description = null,
        ?array $enabledPersonalities = null,
        ?array $hallucinationMetricKBFiles = null,
        ?bool $inbound = null,
        ?array $knowledgeBaseFiles = null,
        ?string $language = null,
        ?int $llmMaxTokens = null,
        ?string $llmModel = null,
        ?string $llmSystemPrompt = null,
        ?float $llmTemperature = null,
        ?bool $outboundAutoCall = null,
        ?string $sipEndpoint = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['agentName'] = $agentName;
        $self['assistantID'] = $assistantID;
        $self['createdAt'] = $createdAt;
        $self['updatedAt'] = $updatedAt;

        null !== $autoUpdateDropoffNodes && $self['autoUpdateDropoffNodes'] = $autoUpdateDropoffNodes;
        null !== $autoUpdateTopicNodes && $self['autoUpdateTopicNodes'] = $autoUpdateTopicNodes;
        null !== $chatAssistantID && $self['chatAssistantID'] = $chatAssistantID;
        null !== $contactNumber && $self['contactNumber'] = $contactNumber;
        null !== $description && $self['description'] = $description;
        null !== $enabledPersonalities && $self['enabledPersonalities'] = $enabledPersonalities;
        null !== $hallucinationMetricKBFiles && $self['hallucinationMetricKBFiles'] = $hallucinationMetricKBFiles;
        null !== $inbound && $self['inbound'] = $inbound;
        null !== $knowledgeBaseFiles && $self['knowledgeBaseFiles'] = $knowledgeBaseFiles;
        null !== $language && $self['language'] = $language;
        null !== $llmMaxTokens && $self['llmMaxTokens'] = $llmMaxTokens;
        null !== $llmModel && $self['llmModel'] = $llmModel;
        null !== $llmSystemPrompt && $self['llmSystemPrompt'] = $llmSystemPrompt;
        null !== $llmTemperature && $self['llmTemperature'] = $llmTemperature;
        null !== $outboundAutoCall && $self['outboundAutoCall'] = $outboundAutoCall;
        Omitted::VALUE !== $outboundNumbers && $self['outboundNumbers'] = $outboundNumbers;
        Omitted::VALUE !== $sipAuth && $self['sipAuth'] = $sipAuth;
        null !== $sipEndpoint && $self['sipEndpoint'] = $sipEndpoint;

        return $self;
    }

    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

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

    /**
     * ID of the chat assistant under test, when testing text channels.
     */
    public function withChatAssistantID(string $chatAssistantID): self
    {
        $self = clone $this;
        $self['chatAssistantID'] = $chatAssistantID;

        return $self;
    }

    /**
     * Contact phone number for the test agent.
     */
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

    /**
     * IDs of the test personalities enabled for this agent.
     *
     * @param list<int> $enabledPersonalities
     */
    public function withEnabledPersonalities(array $enabledPersonalities): self
    {
        $self = clone $this;
        $self['enabledPersonalities'] = $enabledPersonalities;

        return $self;
    }

    /**
     * @param list<int> $hallucinationMetricKBFiles
     */
    public function withHallucinationMetricKBFiles(
        array $hallucinationMetricKBFiles
    ): self {
        $self = clone $this;
        $self['hallucinationMetricKBFiles'] = $hallucinationMetricKBFiles;

        return $self;
    }

    /**
     * Whether the test agent accepts inbound calls.
     */
    public function withInbound(bool $inbound): self
    {
        $self = clone $this;
        $self['inbound'] = $inbound;

        return $self;
    }

    /**
     * Knowledge-base files associated with the test agent.
     *
     * @param list<mixed> $knowledgeBaseFiles
     */
    public function withKnowledgeBaseFiles(array $knowledgeBaseFiles): self
    {
        $self = clone $this;
        $self['knowledgeBaseFiles'] = $knowledgeBaseFiles;

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

    /**
     * Model used to drive the test agent's side of the conversation.
     */
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

    /**
     * Outbound numbers associated with the test agent.
     *
     * @param list<mixed>|null $outboundNumbers
     */
    public function withOutboundNumbers(?array $outboundNumbers): self
    {
        $self = clone $this;
        $self['outboundNumbers'] = $outboundNumbers;

        return $self;
    }

    /**
     * @param array<string,string>|null $sipAuth
     */
    public function withSipAuth(?array $sipAuth): self
    {
        $self = clone $this;
        $self['sipAuth'] = $sipAuth;

        return $self;
    }

    public function withSipEndpoint(string $sipEndpoint): self
    {
        $self = clone $this;
        $self['sipEndpoint'] = $sipEndpoint;

        return $self;
    }
}
