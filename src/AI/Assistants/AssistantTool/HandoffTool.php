<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Type;
use Telnyx\Core\Attributes\Api;
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

    #[Api]
    public Handoff $handoff;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
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
     * @param Type|value-of<Type> $type
     */
    public static function with(Handoff $handoff, Type|string $type): self
    {
        $obj = new self;

        $obj->handoff = $handoff;
        $obj['type'] = $type;

        return $obj;
    }

    public function withHandoff(Handoff $handoff): self
    {
        $obj = clone $this;
        $obj->handoff = $handoff;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
