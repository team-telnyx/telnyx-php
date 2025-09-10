<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Tool;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam\Function1;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type chat_completion_tool_param = array{
 *   function1: Function1, type: value-of<Type>
 * }
 */
final class ChatCompletionToolParam implements BaseModel
{
    /** @use SdkModel<chat_completion_tool_param> */
    use SdkModel;

    #[Api]
    public Function1 $function1;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new ChatCompletionToolParam()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatCompletionToolParam::with(function1: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ChatCompletionToolParam)->withFunction(...)->withType(...)
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
    public static function with(Function1 $function1, Type|string $type): self
    {
        $obj = new self;

        $obj->function1 = $function1;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    public function withFunction(Function1 $function1): self
    {
        $obj = clone $this;
        $obj->function1 = $function1;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
