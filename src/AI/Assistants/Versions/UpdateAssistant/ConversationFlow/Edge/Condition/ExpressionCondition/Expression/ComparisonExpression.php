<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Left;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Op;
use Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Right;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Compare two sub-expressions with a relational or membership operator.
 *
 * Evaluates to a boolean. Used in edge conditions to gate transitions on
 * runtime values, e.g. `user_age >= 18` or `tier == "gold"`.
 *
 * @phpstan-import-type LeftVariants from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Left
 * @phpstan-import-type RightVariants from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Right
 * @phpstan-import-type LeftShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Left
 * @phpstan-import-type RightShape from \Telnyx\AI\Assistants\Versions\UpdateAssistant\ConversationFlow\Edge\Condition\ExpressionCondition\Expression\ComparisonExpression\Right
 *
 * @phpstan-type ComparisonExpressionShape = array{
 *   left: LeftShape, op: Op|value-of<Op>, right: RightShape, type: 'comparison'
 * }
 */
final class ComparisonExpression implements BaseModel
{
    /** @use SdkModel<ComparisonExpressionShape> */
    use SdkModel;

    /** @var 'comparison' $type */
    #[Required]
    public string $type = 'comparison';

    /**
     * Left-hand operand sub-expression.
     *
     * @var LeftVariants $left
     */
    #[Required(union: Left::class)]
    public mixed $left;

    /**
     * Relational/membership operator. `contains` / `not_contains` apply to strings (substring) and arrays (membership).
     *
     * @var value-of<Op> $op
     */
    #[Required(enum: Op::class)]
    public string $op;

    /**
     * Right-hand operand sub-expression.
     *
     * @var RightVariants $right
     */
    #[Required(union: Right::class)]
    public mixed $right;

    /**
     * `new ComparisonExpression()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ComparisonExpression::with(left: ..., op: ..., right: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ComparisonExpression)->withLeft(...)->withOp(...)->withRight(...)
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
     * @param LeftShape $left
     * @param Op|value-of<Op> $op
     * @param RightShape $right
     */
    public static function with(mixed $left, Op|string $op, mixed $right): self
    {
        $self = new self;

        $self['left'] = $left;
        $self['op'] = $op;
        $self['right'] = $right;

        return $self;
    }

    /**
     * Left-hand operand sub-expression.
     *
     * @param LeftShape $left
     */
    public function withLeft(mixed $left): self
    {
        $self = clone $this;
        $self['left'] = $left;

        return $self;
    }

    /**
     * Relational/membership operator. `contains` / `not_contains` apply to strings (substring) and arrays (membership).
     *
     * @param Op|value-of<Op> $op
     */
    public function withOp(Op|string $op): self
    {
        $self = clone $this;
        $self['op'] = $op;

        return $self;
    }

    /**
     * Right-hand operand sub-expression.
     *
     * @param RightShape $right
     */
    public function withRight(mixed $right): self
    {
        $self = clone $this;
        $self['right'] = $right;

        return $self;
    }

    /**
     * @param 'comparison' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
