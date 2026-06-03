<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantCreateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Reference a dynamic variable by name.
 *
 * Resolved at runtime from the assistant's dynamic-variables context (see
 * `Assistant.dynamic_variables` and the dynamic-variables webhook).
 *
 * @phpstan-type DynamicVariableExpressionShape = array{
 *   name: string, type: 'variable'
 * }
 */
final class DynamicVariableExpression implements BaseModel
{
    /** @use SdkModel<DynamicVariableExpressionShape> */
    use SdkModel;

    /** @var 'variable' $type */
    #[Required]
    public string $type = 'variable';

    /**
     * Variable name to look up in the runtime context.
     */
    #[Required]
    public string $name;

    /**
     * `new DynamicVariableExpression()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DynamicVariableExpression::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DynamicVariableExpression)->withName(...)
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
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * Variable name to look up in the runtime context.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param 'variable' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
