<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff;

use Telnyx\Core\Attributes\Required;
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
    #[Required]
    public string $id;

    /**
     * Helpful name for giving context on when to handoff to the assistant.
     */
    #[Required]
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
        $self = new self;

        $self['id'] = $id;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The ID of the assistant to hand off to.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Helpful name for giving context on when to handoff to the assistant.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
