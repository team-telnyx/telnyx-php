<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages\MessageListResponse\Data;

use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall\CallFunction;
use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ToolCallShape = array{
 *   id: string, function: CallFunction, type: value-of<Type>
 * }
 */
final class ToolCall implements BaseModel
{
    /** @use SdkModel<ToolCallShape> */
    use SdkModel;

    /**
     * Unique identifier for the tool call.
     */
    #[Required]
    public string $id;

    #[Required]
    public CallFunction $function;

    /**
     * Type of the tool call.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new ToolCall()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ToolCall::with(id: ..., function: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ToolCall)->withID(...)->withFunction(...)->withType(...)
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
     * @param CallFunction|array{arguments: string, name: string} $function
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        CallFunction|array $function,
        Type|string $type
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['function'] = $function;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Unique identifier for the tool call.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param CallFunction|array{arguments: string, name: string} $function
     */
    public function withFunction(CallFunction|array $function): self
    {
        $self = clone $this;
        $self['function'] = $function;

        return $self;
    }

    /**
     * Type of the tool call.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
