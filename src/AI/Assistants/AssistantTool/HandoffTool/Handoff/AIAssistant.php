<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AIAssistantShape = array{id: string, name: string}
 */
final class AIAssistant implements BaseModel
{
    /** @use SdkModel<AIAssistantShape> */
    use SdkModel;

    /**
     * The ID of the assistant to hand off to.
     */
    #[Api]
    public string $id;

    /**
     * Helpful name for giving context on when to handoff to the assistant.
     */
    #[Api]
    public string $name;

    /**
     * `new AIAssistant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AIAssistant::with(id: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AIAssistant)->withID(...)->withName(...)
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
    public static function with(string $id, string $name): self
    {
        $obj = new self;

        $obj['id'] = $id;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The ID of the assistant to hand off to.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Helpful name for giving context on when to handoff to the assistant.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
