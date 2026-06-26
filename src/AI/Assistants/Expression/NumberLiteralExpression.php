<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Expression;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Constant numeric value (float; integers are accepted and stored as float).
 *
 * @phpstan-type NumberLiteralExpressionShape = array{
 *   type: 'number_literal', value: float
 * }
 */
final class NumberLiteralExpression implements BaseModel
{
    /** @use SdkModel<NumberLiteralExpressionShape> */
    use SdkModel;

    /** @var 'number_literal' $type */
    #[Required]
    public string $type = 'number_literal';

    /**
     * Literal numeric value.
     */
    #[Required]
    public float $value;

    /**
     * `new NumberLiteralExpression()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NumberLiteralExpression::with(value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NumberLiteralExpression)->withValue(...)
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
    public static function with(float $value): self
    {
        $self = new self;

        $self['value'] = $value;

        return $self;
    }

    /**
     * @param 'number_literal' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Literal numeric value.
     */
    public function withValue(float $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
