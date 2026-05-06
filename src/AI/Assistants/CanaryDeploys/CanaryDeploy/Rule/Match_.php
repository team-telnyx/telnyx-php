<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys\CanaryDeploy\Rule;

use Telnyx\AI\Assistants\CanaryDeploys\CanaryDeploy\Rule\Match_\Operator;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A single attribute/operator/values check.
 *
 * A clause matches when the routing context's value for ``attribute``
 * satisfies ``operator`` against any of ``values``.
 *
 * @phpstan-type MatchShape = array{
 *   attribute: string, operator: Operator|value-of<Operator>, values: list<string>
 * }
 */
final class Match_ implements BaseModel
{
    /** @use SdkModel<MatchShape> */
    use SdkModel;

    /**
     * Attribute name from the routing context.
     */
    #[Required]
    public string $attribute;

    /**
     * Match operator.
     *
     * @var value-of<Operator> $operator
     */
    #[Required(enum: Operator::class)]
    public string $operator;

    /** @var list<string> $values */
    #[Required(list: 'string')]
    public array $values;

    /**
     * `new Match_()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Match_::with(attribute: ..., operator: ..., values: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Match_)->withAttribute(...)->withOperator(...)->withValues(...)
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
     * @param Operator|value-of<Operator> $operator
     * @param list<string> $values
     */
    public static function with(
        string $attribute,
        Operator|string $operator,
        array $values
    ): self {
        $self = new self;

        $self['attribute'] = $attribute;
        $self['operator'] = $operator;
        $self['values'] = $values;

        return $self;
    }

    /**
     * Attribute name from the routing context.
     */
    public function withAttribute(string $attribute): self
    {
        $self = clone $this;
        $self['attribute'] = $attribute;

        return $self;
    }

    /**
     * Match operator.
     *
     * @param Operator|value-of<Operator> $operator
     */
    public function withOperator(Operator|string $operator): self
    {
        $self = clone $this;
        $self['operator'] = $operator;

        return $self;
    }

    /**
     * @param list<string> $values
     */
    public function withValues(array $values): self
    {
        $self = clone $this;
        $self['values'] = $values;

        return $self;
    }
}
