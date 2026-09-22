<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An expected rating over the ordered criteria.
 *
 * @phpstan-type DecisionModelScoreAnswerShape = array{
 *   confidence: float,
 *   legend: array<string,string>,
 *   probabilities: array<string,float>,
 *   score: float,
 *   type: 'score',
 * }
 */
final class DecisionModelScoreAnswer implements BaseModel
{
    /** @use SdkModel<DecisionModelScoreAnswerShape> */
    use SdkModel;

    /**
     * Answer type.
     *
     * @var 'score' $type
     */
    #[Required]
    public string $type = 'score';

    /**
     * Normalized entropy confidence: 1 - H(p) / ln(N), where H(p) = -sum(p * ln(p)) and N is the number of options. Zero indicates a uniform distribution; one indicates concentration on one option. This is neither the winning probability nor calibrated correctness.
     */
    #[Required]
    public float $confidence;

    /**
     * Criterion descriptions keyed by stringified zero-based indices, such as "0", "1", and "2".
     *
     * @var array<string,string> $legend
     */
    #[Required(map: 'string')]
    public array $legend;

    /**
     * Relative scores keyed by the same stringified indices as legend.
     *
     * @var array<string,float> $probabilities
     */
    #[Required(map: 'float')]
    public array $probabilities;

    /**
     * Expected zero-based criterion index: sum(index * probability). Ranges from 0 to N-1 for N criteria; fractional values are valid.
     */
    #[Required]
    public float $score;

    /**
     * `new DecisionModelScoreAnswer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DecisionModelScoreAnswer::with(
     *   confidence: ..., legend: ..., probabilities: ..., score: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DecisionModelScoreAnswer)
     *   ->withConfidence(...)
     *   ->withLegend(...)
     *   ->withProbabilities(...)
     *   ->withScore(...)
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
     * @param array<string,string> $legend
     * @param array<string,float> $probabilities
     */
    public static function with(
        float $confidence,
        array $legend,
        array $probabilities,
        float $score
    ): self {
        $self = new self;

        $self['confidence'] = $confidence;
        $self['legend'] = $legend;
        $self['probabilities'] = $probabilities;
        $self['score'] = $score;

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
     * Criterion descriptions keyed by stringified zero-based indices, such as "0", "1", and "2".
     *
     * @param array<string,string> $legend
     */
    public function withLegend(array $legend): self
    {
        $self = clone $this;
        $self['legend'] = $legend;

        return $self;
    }

    /**
     * Relative scores keyed by the same stringified indices as legend.
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
     * Expected zero-based criterion index: sum(index * probability). Ranges from 0 to N-1 for N criteria; fractional values are valid.
     */
    public function withScore(float $score): self
    {
        $self = clone $this;
        $self['score'] = $score;

        return $self;
    }

    /**
     * Answer type.
     *
     * @param 'score' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
