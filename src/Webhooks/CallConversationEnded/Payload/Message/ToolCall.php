<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationEnded\Payload\Message;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationEnded\Payload\Message\ToolCall\Function_;
use Telnyx\Webhooks\CallConversationEnded\Payload\Message\ToolCall\Type;

/**
 * @phpstan-import-type FunctionShape from \Telnyx\Webhooks\CallConversationEnded\Payload\Message\ToolCall\Function_
 *
 * @phpstan-type ToolCallShape = array{
 *   id?: string|null,
 *   function?: null|Function_|FunctionShape,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class ToolCall implements BaseModel
{
    /** @use SdkModel<ToolCallShape> */
    use SdkModel;

    /**
     * Identifier of the tool call, referenced by the matching tool result's `tool_call_id`.
     */
    #[Optional]
    public ?string $id;

    #[Optional]
    public ?Function_ $function;

    /**
     * The type of tool call.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Function_|FunctionShape|null $function
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $id = null,
        Function_|array|null $function = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $function && $self['function'] = $function;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Identifier of the tool call, referenced by the matching tool result's `tool_call_id`.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param Function_|FunctionShape $function
     */
    public function withFunction(Function_|array $function): self
    {
        $self = clone $this;
        $self['function'] = $function;

        return $self;
    }

    /**
     * The type of tool call.
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
