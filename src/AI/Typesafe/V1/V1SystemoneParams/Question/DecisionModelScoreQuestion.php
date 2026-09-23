<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question;

use Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelScoreQuestion\Instructions;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Rate the state against an ordered rubric.
 *
 * @phpstan-import-type InstructionsVariants from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelScoreQuestion\Instructions
 * @phpstan-import-type InstructionsShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelScoreQuestion\Instructions
 *
 * @phpstan-type DecisionModelScoreQuestionShape = array{
 *   criteria: list<string>, instructions: InstructionsShape, type: 'score'
 * }
 */
final class DecisionModelScoreQuestion implements BaseModel
{
    /** @use SdkModel<DecisionModelScoreQuestionShape> */
    use SdkModel;

    /**
     * Question type.
     *
     * @var 'score' $type
     */
    #[Required]
    public string $type = 'score';

    /**
     * Between 2 and 64 description strings in ascending score order. Indices start at zero.
     *
     * @var list<string> $criteria
     */
    #[Required(list: 'string')]
    public array $criteria;

    /**
     * Required instructions describing what to decide about the shared state.
     *
     * @var InstructionsVariants $instructions
     */
    #[Required(union: Instructions::class)]
    public string|array $instructions;

    /**
     * `new DecisionModelScoreQuestion()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DecisionModelScoreQuestion::with(criteria: ..., instructions: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DecisionModelScoreQuestion)->withCriteria(...)->withInstructions(...)
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
     * @param list<string> $criteria
     * @param InstructionsShape $instructions
     */
    public static function with(
        array $criteria,
        string|array $instructions
    ): self {
        $self = new self;

        $self['criteria'] = $criteria;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * Between 2 and 64 description strings in ascending score order. Indices start at zero.
     *
     * @param list<string> $criteria
     */
    public function withCriteria(array $criteria): self
    {
        $self = clone $this;
        $self['criteria'] = $criteria;

        return $self;
    }

    /**
     * Required instructions describing what to decide about the shared state.
     *
     * @param InstructionsShape $instructions
     */
    public function withInstructions(string|array $instructions): self
    {
        $self = clone $this;
        $self['instructions'] = $instructions;

        return $self;
    }

    /**
     * Question type.
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
