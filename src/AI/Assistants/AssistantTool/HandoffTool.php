<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff\AIAssistant;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff\VoiceMode;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The handoff tool allows the assistant to hand off control of the conversation to another AI assistant. By default, this will happen transparently to the end user.
 *
 * @phpstan-type HandoffToolShape = array{handoff: Handoff, type: value-of<Type>}
 */
final class HandoffTool implements BaseModel
{
    /** @use SdkModel<HandoffToolShape> */
    use SdkModel;

    #[Required]
    public Handoff $handoff;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new HandoffTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HandoffTool::with(handoff: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HandoffTool)->withHandoff(...)->withType(...)
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
     * @param Handoff|array{
     *   aiAssistants: list<AIAssistant>, voiceMode?: value-of<VoiceMode>|null
     * } $handoff
     * @param Type|value-of<Type> $type
     */
    public static function with(Handoff|array $handoff, Type|string $type): self
    {
        $self = new self;

        $self['handoff'] = $handoff;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param Handoff|array{
     *   aiAssistants: list<AIAssistant>, voiceMode?: value-of<VoiceMode>|null
     * } $handoff
     */
    public function withHandoff(Handoff|array $handoff): self
    {
        $self = clone $this;
        $self['handoff'] = $handoff;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
