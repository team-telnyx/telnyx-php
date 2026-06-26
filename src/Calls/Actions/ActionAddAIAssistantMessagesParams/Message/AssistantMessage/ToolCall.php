<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\AssistantMessage;

use Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\AssistantMessage\ToolCall\Function_;
use Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\AssistantMessage\ToolCall\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A call to a function tool created by the model.
 *
 * @phpstan-import-type FunctionShape from \Telnyx\Calls\Actions\ActionAddAIAssistantMessagesParams\Message\AssistantMessage\ToolCall\Function_
 *
 * @phpstan-type ToolCallShape = array{
 *   id: string, function: Function_|FunctionShape, type: Type|value-of<Type>
 * }
 */
final class ToolCall implements BaseModel
{
    /** @use SdkModel<ToolCallShape> */
    use SdkModel;

    /**
     * The ID of the tool call.
     */
    #[Required]
    public string $id;

    /**
     * The function that the model called.
     */
    #[Required]
    public Function_ $function;

    /**
     * The type of the tool. Currently, only `function` is supported.
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
     * @param Function_|FunctionShape $function
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $id,
        Function_|array $function,
        Type|string $type
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['function'] = $function;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The ID of the tool call.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The function that the model called.
     *
     * @param Function_|FunctionShape $function
     */
    public function withFunction(Function_|array $function): self
    {
        $self = clone $this;
        $self['function'] = $function;

        return $self;
    }

    /**
     * The type of the tool. Currently, only `function` is supported.
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
