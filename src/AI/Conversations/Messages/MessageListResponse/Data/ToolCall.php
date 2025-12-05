<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages\MessageListResponse\Data;

use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall\Function1;
use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ToolCallShape = array{
 *   id: string, function: Function1, type: value-of<Type>
 * }
 */
final class ToolCall implements BaseModel
{
    /** @use SdkModel<ToolCallShape> */
    use SdkModel;

    /**
     * Unique identifier for the tool call.
     */
    #[Api]
    public string $id;

    #[Api]
    public Function1 $function;

    /**
     * Type of the tool call.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
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
     * @param Function1|array{arguments: string, name: string} $function
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        Function1|array $function,
        Type|string $type
    ): self {
        $obj = new self;

        $obj['id'] = $id;
        $obj['function'] = $function;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Unique identifier for the tool call.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param Function1|array{arguments: string, name: string} $function
     */
    public function withFunction(Function1|array $function): self
    {
        $obj = clone $this;
        $obj['function'] = $function;

        return $obj;
    }

    /**
     * Type of the tool call.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
