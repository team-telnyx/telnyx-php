<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FunctionShape = array{arguments: string, name: string}
 */
final class Function_ implements BaseModel
{
    /** @use SdkModel<FunctionShape> */
    use SdkModel;

    /**
     * JSON-formatted arguments to pass to the function.
     */
    #[Required]
    public string $arguments;

    /**
     * Name of the function to call.
     */
    #[Required]
    public string $name;

    /**
     * `new Function_()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Function_::with(arguments: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Function_)->withArguments(...)->withName(...)
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
    public static function with(string $arguments, string $name): self
    {
        $self = new self;

        $self['arguments'] = $arguments;
        $self['name'] = $name;

        return $self;
    }

    /**
     * JSON-formatted arguments to pass to the function.
     */
    public function withArguments(string $arguments): self
    {
        $self = clone $this;
        $self['arguments'] = $arguments;

        return $self;
    }

    /**
     * Name of the function to call.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
