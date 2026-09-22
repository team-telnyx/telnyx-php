<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A selected option and the distribution across all supplied option keys.
 *
 * @phpstan-type DecisionModelChoiceAnswerShape = array{
 *   choice: string,
 *   confidence: float,
 *   probabilities: array<string,float>,
 *   type: 'choice',
 * }
 */
final class DecisionModelChoiceAnswer implements BaseModel
{
    /** @use SdkModel<DecisionModelChoiceAnswerShape> */
    use SdkModel;

    /**
     * Answer type.
     *
     * @var 'choice' $type
     */
    #[Required]
    public string $type = 'choice';

    /**
     * The option key with the highest relative score. Ties favor the first option in request order.
     */
    #[Required]
    public string $choice;

    /**
     * Normalized entropy confidence: 1 - H(p) / ln(N), where H(p) = -sum(p * ln(p)) and N is the number of options. Zero indicates a uniform distribution; one indicates concentration on one option. This is neither the winning probability nor calibrated correctness.
     */
    #[Required]
    public float $confidence;

    /**
     * Relative scores normalized across the supplied options, summing approximately to 1. These are not calibrated probabilities of correctness.
     *
     * @var array<string,float> $probabilities
     */
    #[Required(map: 'float')]
    public array $probabilities;

    /**
     * `new DecisionModelChoiceAnswer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DecisionModelChoiceAnswer::with(
     *   choice: ..., confidence: ..., probabilities: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DecisionModelChoiceAnswer)
     *   ->withChoice(...)
     *   ->withConfidence(...)
     *   ->withProbabilities(...)
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
     * @param array<string,float> $probabilities
     */
    public static function with(
        string $choice,
        float $confidence,
        array $probabilities
    ): self {
        $self = new self;

        $self['choice'] = $choice;
        $self['confidence'] = $confidence;
        $self['probabilities'] = $probabilities;

        return $self;
    }

    /**
     * The option key with the highest relative score. Ties favor the first option in request order.
     */
    public function withChoice(string $choice): self
    {
        $self = clone $this;
        $self['choice'] = $choice;

        return $self;
    }

    /**
     * Normalized entropy confidence: 1 - H(p) / ln(N), where H(p) = -sum(p * ln(p)) and N is the number of options. Zero indicates a uniform distribution; one indicates concentration on one option. This is neither the winning probability nor calibrated correctness.
     */
    public function withConfidence(float $confidence): self
    {
        $self = clone $this;
        $self['confidence'] = $confidence;

        return $self;
    }

    /**
     * Relative scores normalized across the supplied options, summing approximately to 1. These are not calibrated probabilities of correctness.
     *
     * @param array<string,float> $probabilities
     */
    public function withProbabilities(array $probabilities): self
    {
        $self = clone $this;
        $self['probabilities'] = $probabilities;

        return $self;
    }

    /**
     * Answer type.
     *
     * @param 'choice' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
