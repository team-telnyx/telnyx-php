<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEnded\Payload\Message\ToolCall;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FunctionShape = array{arguments?: string|null, name?: string|null}
 */
final class Function_ implements BaseModel
{
    /** @use SdkModel<FunctionShape> */
    use SdkModel;

    /**
     * The arguments passed to the tool, as a JSON-encoded string.
     */
    #[Optional]
    public ?string $arguments;

    /**
     * The name of the tool that was called.
     */
    #[Optional]
    public ?string $name;

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
        ?string $arguments = null,
        ?string $name = null
    ): self {
        $self = new self;

        null !== $arguments && $self['arguments'] = $arguments;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * The arguments passed to the tool, as a JSON-encoded string.
     */
    public function withArguments(string $arguments): self
    {
        $self = clone $this;
        $self['arguments'] = $arguments;

        return $self;
    }

    /**
     * The name of the tool that was called.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
