<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Target;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Target\AssistantTarget\Position;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Target\AssistantTarget\VoiceMode;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Edge target referencing a different assistant.
 *
 * When the edge fires, the conversation hands off to `assistant_id`: the
 * active assistant on the conversation row is rewritten and the new
 * assistant's flow starts at its own `start_node_id`. The current turn's
 * LLM response is delivered to the user as-is; subsequent turns route
 * to the new assistant.
 *
 * @phpstan-import-type PositionShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Target\AssistantTarget\Position
 *
 * @phpstan-type AssistantTargetShape = array{
 *   assistantID: string,
 *   type: 'assistant',
 *   position?: null|Position|PositionShape,
 *   voiceMode?: null|VoiceMode|value-of<VoiceMode>,
 * }
 */
final class AssistantTarget implements BaseModel
{
    /** @use SdkModel<AssistantTargetShape> */
    use SdkModel;

    /** @var 'assistant' $type */
    #[Required]
    public string $type = 'assistant';

    /**
     * ID of the assistant the conversation transitions to.
     */
    #[Required('assistant_id')]
    public string $assistantID;

    /**
     * Optional canvas coordinates for rendering the target assistant as a node in authoring UIs. Pure presentation — the runtime ignores it; round-trips so frontends can persist graph layout across reloads. When multiple edges target the same assistant, each edge's `position` is independent (frontends typically use the first non-null one).
     */
    #[Optional]
    public ?Position $position;

    /**
     * Voice behavior when handing off to the target assistant, mirroring the handoff tool's `voice_mode`. `unified` (default) keeps the current voice across the handoff; `distinct` lets the target assistant speak with its own configured voice. Only applies to assistant targets — node targets override voice via the node's own `voice_settings`.
     *
     * @var value-of<VoiceMode>|null $voiceMode
     */
    #[Optional('voice_mode', enum: VoiceMode::class)]
    public ?string $voiceMode;

    /**
     * `new AssistantTarget()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AssistantTarget::with(assistantID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AssistantTarget)->withAssistantID(...)
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
     * @param Position|PositionShape|null $position
     * @param VoiceMode|value-of<VoiceMode>|null $voiceMode
     */
    public static function with(
        string $assistantID,
        Position|array|null $position = null,
        VoiceMode|string|null $voiceMode = null,
    ): self {
        $self = new self;

        $self['assistantID'] = $assistantID;

        null !== $position && $self['position'] = $position;
        null !== $voiceMode && $self['voiceMode'] = $voiceMode;

        return $self;
    }

    /**
     * ID of the assistant the conversation transitions to.
     */
    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }

    /**
     * @param 'assistant' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Optional canvas coordinates for rendering the target assistant as a node in authoring UIs. Pure presentation — the runtime ignores it; round-trips so frontends can persist graph layout across reloads. When multiple edges target the same assistant, each edge's `position` is independent (frontends typically use the first non-null one).
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
     * Voice behavior when handing off to the target assistant, mirroring the handoff tool's `voice_mode`. `unified` (default) keeps the current voice across the handoff; `distinct` lets the target assistant speak with its own configured voice. Only applies to assistant targets — node targets override voice via the node's own `voice_settings`.
     *
     * @param VoiceMode|value-of<VoiceMode> $voiceMode
     */
    public function withVoiceMode(VoiceMode|string $voiceMode): self
    {
        $self = clone $this;
        $self['voiceMode'] = $voiceMode;

        return $self;
    }
}
