<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Tool;

use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam\Function1;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ChatCompletionToolParamShape = array{
 *   function: Function1, type: value-of<Type>
 * }
 */
final class ChatCompletionToolParam implements BaseModel
{
    /** @use SdkModel<ChatCompletionToolParamShape> */
    use SdkModel;

    #[Api]
    public Function1 $function;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new ChatCompletionToolParam()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ChatCompletionToolParam::with(function: ..., type: ...)
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
     * @param Function1|array{
     *   name: string, description?: string|null, parameters?: array<string,mixed>|null
     * } $function
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Function1|array $function,
        Type|string $type
    ): self {
        $obj = new self;

        $obj['function'] = $function;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param Function1|array{
     *   name: string, description?: string|null, parameters?: array<string,mixed>|null
     * } $function
     */
    public function withFunction(Function1|array $function): self
    {
        $obj = clone $this;
        $obj['function'] = $function;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
