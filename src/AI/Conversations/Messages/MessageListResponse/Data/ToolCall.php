<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\Messages\MessageListResponse\Data;

use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall\Function1;
use Telnyx\AI\Conversations\Messages\MessageListResponse\Data\ToolCall\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type tool_call = array{
 *   id: string, function1: Function1, type: value-of<Type>
 * }
 */
final class ToolCall implements BaseModel
{
    /** @use SdkModel<tool_call> */
    use SdkModel;

    /**
     * Unique identifier for the tool call.
     */
    #[Api]
    public string $id;

    #[Api]
    public Function1 $function1;

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
     * ToolCall::with(id: ..., function1: ..., type: ...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        Function1 $function1,
        Type|string $type
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->function1 = $function1;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Unique identifier for the tool call.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withFunction(Function1 $function1): self
    {
        $obj = clone $this;
        $obj->function1 = $function1;

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
