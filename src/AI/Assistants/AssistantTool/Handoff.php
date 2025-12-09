<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\Handoff\Handoff\AIAssistant;
use Telnyx\AI\Assistants\AssistantTool\Handoff\Handoff\VoiceMode;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The handoff tool allows the assistant to hand off control of the conversation to another AI assistant. By default, this will happen transparently to the end user.
 *
 * @phpstan-type HandoffShape = array{
 *   handoff: \Telnyx\AI\Assistants\AssistantTool\Handoff\Handoff, type?: 'handoff'
 * }
 */
final class Handoff implements BaseModel
{
    /** @use SdkModel<HandoffShape> */
    use SdkModel;

    /** @var 'handoff' $type */
    #[Required]
    public string $type = 'handoff';

    #[Required]
    public Handoff\Handoff $handoff;

    /**
     * `new Handoff()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Handoff::with(handoff: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Handoff)->withHandoff(...)
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
     * @param Handoff\Handoff|array{
     *   aiAssistants: list<AIAssistant>, voiceMode?: value-of<VoiceMode>|null
     * } $handoff
     */
    public static function with(
        Handoff\Handoff|array $handoff
    ): self {
        $self = new self;

        $self['handoff'] = $handoff;

        return $self;
    }

    /**
     * @param Handoff\Handoff|array{
     *   aiAssistants: list<AIAssistant>, voiceMode?: value-of<VoiceMode>|null
     * } $handoff
     */
    public function withHandoff(
        Handoff\Handoff|array $handoff
    ): self {
        $self = clone $this;
        $self['handoff'] = $handoff;

        return $self;
    }
}
