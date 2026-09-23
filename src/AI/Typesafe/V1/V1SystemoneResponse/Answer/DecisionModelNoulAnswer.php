<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A yes/no score with no separate confidence or probabilities fields.
 *
 * @phpstan-type DecisionModelNoulAnswerShape = array{noul: float, type: 'noul'}
 */
final class DecisionModelNoulAnswer implements BaseModel
{
    /** @use SdkModel<DecisionModelNoulAnswerShape> */
    use SdkModel;

    /**
     * Answer type.
     *
     * @var 'noul' $type
     */
    #[Required]
    public string $type = 'noul';

    /**
     * Score of the positive outcome. Values near 1 favor yes; values near 0 favor no. This is a number, not a Boolean, and is not calibrated correctness.
     */
    #[Required]
    public float $noul;

    /**
     * `new DecisionModelNoulAnswer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DecisionModelNoulAnswer::with(noul: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DecisionModelNoulAnswer)->withNoul(...)
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
    public static function with(float $noul): self
    {
        $self = new self;

        $self['noul'] = $noul;

        return $self;
    }

    /**
     * Score of the positive outcome. Values near 1 favor yes; values near 0 favor no. This is a number, not a Boolean, and is not calibrated correctness.
     */
    public function withNoul(float $noul): self
    {
        $self = clone $this;
        $self['noul'] = $noul;

        return $self;
    }

    /**
     * Answer type.
     *
     * @param 'noul' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
