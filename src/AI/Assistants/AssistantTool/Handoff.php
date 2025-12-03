<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The handoff tool allows the assistant to hand off control of the conversation to another AI assistant. By default, this will happen transparently to the end user.
 *
 * @phpstan-type HandoffShape = array{
 *   handoff: \Telnyx\AI\Assistants\AssistantTool\Handoff\Handoff, type: 'handoff'
 * }
 */
final class Handoff implements BaseModel
{
    /** @use SdkModel<HandoffShape> */
    use SdkModel;

    /** @var 'handoff' $type */
    #[Api]
    public string $type = 'handoff';

    #[Api]
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
     */
    public static function with(
        Handoff\Handoff $handoff
    ): self {
        $obj = new self;

        $obj->handoff = $handoff;

        return $obj;
    }

    public function withHandoff(
        Handoff\Handoff $handoff
    ): self {
        $obj = clone $this;
        $obj->handoff = $handoff;

        return $obj;
    }
}
