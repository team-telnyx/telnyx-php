<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Left;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Constant boolean value. Useful for unconditional ('always') edges.
 *
 * @phpstan-type BooleanLiteralExpressionShape = array{
 *   type: 'bool_literal', value: bool
 * }
 */
final class BooleanLiteralExpression implements BaseModel
{
    /** @use SdkModel<BooleanLiteralExpressionShape> */
    use SdkModel;

    /** @var 'bool_literal' $type */
    #[Required]
    public string $type = 'bool_literal';

    /**
     * Literal boolean value.
     */
    #[Required]
    public bool $value;

    /**
     * `new BooleanLiteralExpression()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BooleanLiteralExpression::with(value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BooleanLiteralExpression)->withValue(...)
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
    public static function with(bool $value): self
    {
        $self = new self;

        $self['value'] = $value;

        return $self;
    }

    /**
     * @param 'bool_literal' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Literal boolean value.
     */
    public function withValue(bool $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
