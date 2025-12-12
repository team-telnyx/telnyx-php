<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type Function1Shape = array{arguments: string, name: string}
 */
final class Function1 implements BaseModel
{
    /** @use SdkModel<Function1Shape> */
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
     * `new Function1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Function1::with(arguments: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Function1)->withArguments(...)->withName(...)
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
