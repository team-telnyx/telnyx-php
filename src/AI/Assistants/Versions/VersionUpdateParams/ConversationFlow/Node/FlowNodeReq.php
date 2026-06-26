<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node;

use Telnyx\AI\Assistants\TranscriptionSettings;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\FlowNodeReq\ExternalLlm;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\FlowNodeReq\InstructionsMode;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\FlowNodeReq\Position;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\FlowNodeReq\ToolsMode;
use Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\FlowNodeReq\Type;
use Telnyx\AI\Assistants\VoiceSettings;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * One step in a conversation flow, as supplied by API clients.
 *
 * Each node carries the prompt, tool scope, and optional overrides for
 * model/voice/transcription. Unset overrides cascade from the assistant.
 *
 * @phpstan-import-type ExternalLlmShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\FlowNodeReq\ExternalLlm
 * @phpstan-import-type PositionShape from \Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Node\FlowNodeReq\Position
 * @phpstan-import-type TranscriptionSettingsShape from \Telnyx\AI\Assistants\TranscriptionSettings
 * @phpstan-import-type VoiceSettingsShape from \Telnyx\AI\Assistants\VoiceSettings
 *
 * @phpstan-type FlowNodeReqShape = array{
 *   id: string,
 *   instructions: string,
 *   externalLlm?: null|ExternalLlm|ExternalLlmShape,
 *   instructionsMode?: null|InstructionsMode|value-of<InstructionsMode>,
 *   llmAPIKeyRef?: string|null,
 *   model?: string|null,
 *   name?: string|null,
 *   position?: null|Position|PositionShape,
 *   sharedToolIDs?: list<string>|null,
 *   toolsMode?: null|ToolsMode|value-of<ToolsMode>,
 *   transcription?: null|TranscriptionSettings|TranscriptionSettingsShape,
 *   type?: null|Type|value-of<Type>,
 *   voiceSettings?: null|VoiceSettings|VoiceSettingsShape,
 * }
 */
final class FlowNodeReq implements BaseModel
{
    /** @use SdkModel<FlowNodeReqShape> */
    use SdkModel;

    /**
     * Caller-supplied unique identifier for this node within the flow.
     */
    #[Required]
    public string $id;

    /**
     * Prompt that drives the LLM while this node is active. Required.
     */
    #[Required]
    public string $instructions;

    /**
     * Override for `Assistant.external_llm` while this node is active. Use this to route a node's turns to a different external LLM (different `model`, `base_url`, credentials). Part of the LLM bundle — see `model` for cascade semantics. Mutually exclusive with `model` on the node (a single LLM identity per node).
     */
    #[Optional('external_llm')]
    public ?ExternalLlm $externalLlm;

    /**
     * How `instructions` combine with the assistant-level instructions. `replace` (default): the node's instructions are used alone. `append`: the node's instructions are concatenated after the assistant's instructions.
     *
     * @var value-of<InstructionsMode>|null $instructionsMode
     */
    #[Optional('instructions_mode', enum: InstructionsMode::class)]
    public ?string $instructionsMode;

    /**
     * Override for `Assistant.llm_api_key_ref` while this node is active. Part of the LLM bundle — see `model` for cascade semantics.
     */
    #[Optional('llm_api_key_ref')]
    public ?string $llmAPIKeyRef;

    /**
     * Override for `Assistant.model` while this node is active. Part of the LLM bundle (`model` + `llm_api_key_ref` + `external_llm`): when any of the three is set on the node, all three are taken from the node and the assistant-level LLM identity is not consulted. When none of the three is set, the assistant's bundle cascades unchanged.
     */
    #[Optional]
    public ?string $model;

    /**
     * Optional human-readable label, displayed in authoring UIs.
     */
    #[Optional]
    public ?string $name;

    /**
     * Optional canvas coordinates used by authoring UIs to lay out the graph. Ignored by the runtime; round-trips so frontends can persist graph layout across reloads.
     */
    #[Optional]
    public ?Position $position;

    /**
     * IDs of shared (org-level) tools available at this node. Knowledge bases are attached the same way — via a shared retrieval tool. Tools not listed here are not callable while this node is active.
     *
     * @var list<string>|null $sharedToolIDs
     */
    #[Optional('shared_tool_ids', list: 'string')]
    public ?array $sharedToolIDs;

    /**
     * How `shared_tool_ids` combine with the assistant-level tool set. `replace` (default): only the node's tools are callable. `append`: the node's tools are added to the assistant's tools. Ignored when `shared_tool_ids` is null.
     *
     * @var value-of<ToolsMode>|null $toolsMode
     */
    #[Optional('tools_mode', enum: ToolsMode::class)]
    public ?string $toolsMode;

    /**
     * Per-node transcription override (model/language/region). Unset fields cascade from the assistant-level transcription.
     */
    #[Optional]
    public ?TranscriptionSettings $transcription;

    /**
     * Node kind discriminator. `prompt` (default) is an LLM-driven step; `tool` is a standalone tool execution (see `ToolNodeReq`).
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * Per-node voice override. Only fields set here override the assistant-level voice settings; unset fields cascade.
     */
    #[Optional('voice_settings')]
    public ?VoiceSettings $voiceSettings;

    /**
     * `new FlowNodeReq()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FlowNodeReq::with(id: ..., instructions: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FlowNodeReq)->withID(...)->withInstructions(...)
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
     * @param ExternalLlm|ExternalLlmShape|null $externalLlm
     * @param InstructionsMode|value-of<InstructionsMode>|null $instructionsMode
     * @param Position|PositionShape|null $position
     * @param list<string>|null $sharedToolIDs
     * @param ToolsMode|value-of<ToolsMode>|null $toolsMode
     * @param TranscriptionSettings|TranscriptionSettingsShape|null $transcription
     * @param Type|value-of<Type>|null $type
     * @param VoiceSettings|VoiceSettingsShape|null $voiceSettings
     */
    public static function with(
        string $id,
        string $instructions,
        ExternalLlm|array|null $externalLlm = null,
        InstructionsMode|string|null $instructionsMode = null,
        ?string $llmAPIKeyRef = null,
        ?string $model = null,
        ?string $name = null,
        Position|array|null $position = null,
        ?array $sharedToolIDs = null,
        ToolsMode|string|null $toolsMode = null,
        TranscriptionSettings|array|null $transcription = null,
        Type|string|null $type = null,
        VoiceSettings|array|null $voiceSettings = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['instructions'] = $instructions;

        null !== $externalLlm && $self['externalLlm'] = $externalLlm;
        null !== $instructionsMode && $self['instructionsMode'] = $instructionsMode;
        null !== $llmAPIKeyRef && $self['llmAPIKeyRef'] = $llmAPIKeyRef;
        null !== $model && $self['model'] = $model;
        null !== $name && $self['name'] = $name;
        null !== $position && $self['position'] = $position;
        null !== $sharedToolIDs && $self['sharedToolIDs'] = $sharedToolIDs;
        null !== $toolsMode && $self['toolsMode'] = $toolsMode;
        null !== $transcription && $self['transcription'] = $transcription;
        null !== $type && $self['type'] = $type;
        null !== $voiceSettings && $self['voiceSettings'] = $voiceSettings;

        return $self;
    }

    /**
     * Caller-supplied unique identifier for this node within the flow.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Prompt that drives the LLM while this node is active. Required.
     */
    public function withInstructions(string $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * Override for `Assistant.external_llm` while this node is active. Use this to route a node's turns to a different external LLM (different `model`, `base_url`, credentials). Part of the LLM bundle — see `model` for cascade semantics. Mutually exclusive with `model` on the node (a single LLM identity per node).
     *
     * @param ExternalLlm|ExternalLlmShape $externalLlm
     */
    public function withExternalLlm(ExternalLlm|array $externalLlm): self
    {
        $self = clone $this;
        $self['externalLlm'] = $externalLlm;

        return $self;
    }

    /**
     * How `instructions` combine with the assistant-level instructions. `replace` (default): the node's instructions are used alone. `append`: the node's instructions are concatenated after the assistant's instructions.
     *
     * @param InstructionsMode|value-of<InstructionsMode> $instructionsMode
     */
    public function withInstructionsMode(
        InstructionsMode|string $instructionsMode
    ): self {
        $self = clone $this;
        $self['instructionsMode'] = $instructionsMode;

        return $self;
    }

    /**
     * Override for `Assistant.llm_api_key_ref` while this node is active. Part of the LLM bundle — see `model` for cascade semantics.
     */
    public function withLlmAPIKeyRef(string $llmAPIKeyRef): self
    {
        $self = clone $this;
        $self['llmAPIKeyRef'] = $llmAPIKeyRef;

        return $self;
    }

    /**
     * Override for `Assistant.model` while this node is active. Part of the LLM bundle (`model` + `llm_api_key_ref` + `external_llm`): when any of the three is set on the node, all three are taken from the node and the assistant-level LLM identity is not consulted. When none of the three is set, the assistant's bundle cascades unchanged.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Optional human-readable label, displayed in authoring UIs.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Optional canvas coordinates used by authoring UIs to lay out the graph. Ignored by the runtime; round-trips so frontends can persist graph layout across reloads.
     *
     * @param Position|PositionShape $position
     */
    public function withPosition(Position|array $position): self
    {
        $self = clone $this;
        $self['position'] = $position;

        return $self;
    }

    /**
     * IDs of shared (org-level) tools available at this node. Knowledge bases are attached the same way — via a shared retrieval tool. Tools not listed here are not callable while this node is active.
     *
     * @param list<string> $sharedToolIDs
     */
    public function withSharedToolIDs(array $sharedToolIDs): self
    {
        $self = clone $this;
        $self['sharedToolIDs'] = $sharedToolIDs;

        return $self;
    }

    /**
     * How `shared_tool_ids` combine with the assistant-level tool set. `replace` (default): only the node's tools are callable. `append`: the node's tools are added to the assistant's tools. Ignored when `shared_tool_ids` is null.
     *
     * @param ToolsMode|value-of<ToolsMode> $toolsMode
     */
    public function withToolsMode(ToolsMode|string $toolsMode): self
    {
        $self = clone $this;
        $self['toolsMode'] = $toolsMode;

        return $self;
    }

    /**
     * Per-node transcription override (model/language/region). Unset fields cascade from the assistant-level transcription.
     *
     * @param TranscriptionSettings|TranscriptionSettingsShape $transcription
     */
    public function withTranscription(
        TranscriptionSettings|array $transcription
    ): self {
        $self = clone $this;
        $self['transcription'] = $transcription;

        return $self;
    }

    /**
     * Node kind discriminator. `prompt` (default) is an LLM-driven step; `tool` is a standalone tool execution (see `ToolNodeReq`).
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Per-node voice override. Only fields set here override the assistant-level voice settings; unset fields cascade.
     *
     * @param VoiceSettings|VoiceSettingsShape $voiceSettings
     */
    public function withVoiceSettings(VoiceSettings|array $voiceSettings): self
    {
        $self = clone $this;
        $self['voiceSettings'] = $voiceSettings;

        return $self;
    }
}
