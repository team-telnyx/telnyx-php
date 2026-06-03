<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbedding\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ArithmeticExpression\Right;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Constant string value.
 *
 * @phpstan-type StringLiteralExpressionShape = array{
 *   type: 'string_literal', value: string
 * }
 */
final class StringLiteralExpression implements BaseModel
{
    /** @use SdkModel<StringLiteralExpressionShape> */
    use SdkModel;

    /** @var 'string_literal' $type */
    #[Required]
    public string $type = 'string_literal';

    /**
     * Literal string value.
     */
    #[Required]
    public string $value;

    /**
     * `new StringLiteralExpression()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * StringLiteralExpression::with(value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new StringLiteralExpression)->withValue(...)
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
    public static function with(string $value): self
    {
        $self = new self;

        $self['value'] = $value;

        return $self;
    }

    /**
     * @param 'string_literal' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Literal string value.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
