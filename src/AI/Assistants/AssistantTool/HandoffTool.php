<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The handoff tool allows the assistant to hand off control of the conversation to another AI assistant. By default, this will happen transparently to the end user.
 *
 * @phpstan-import-type HandoffShape from \Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff
 *
 * @phpstan-type HandoffToolShape = array{
 *   handoff: Handoff|HandoffShape, type: 'handoff'
 * }
 */
final class HandoffTool implements BaseModel
{
    /** @use SdkModel<HandoffToolShape> */
    use SdkModel;

    /** @var 'handoff' $type */
    #[Required]
    public string $type = 'handoff';

    #[Required]
    public Handoff $handoff;

    /**
     * `new HandoffTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HandoffTool::with(handoff: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HandoffTool)->withHandoff(...)
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
     * @param Handoff|HandoffShape $handoff
     */
    public static function with(Handoff|array $handoff): self
    {
        $self = new self;

        $self['handoff'] = $handoff;

        return $self;
    }

    /**
     * @param Handoff|HandoffShape $handoff
     */
    public function withHandoff(Handoff|array $handoff): self
    {
        $self = clone $this;
        $self['handoff'] = $handoff;

        return $self;
    }

    /**
     * @param 'handoff' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
