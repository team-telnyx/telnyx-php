<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question;

use Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelNoulQuestion\Criteria;
use Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelNoulQuestion\Instructions;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Evaluate a yes/no question. Omit criteria to use Yes and No descriptions.
 *
 * @phpstan-import-type InstructionsVariants from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelNoulQuestion\Instructions
 * @phpstan-import-type InstructionsShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelNoulQuestion\Instructions
 * @phpstan-import-type CriteriaShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelNoulQuestion\Criteria
 *
 * @phpstan-type DecisionModelNoulQuestionShape = array{
 *   instructions: InstructionsShape,
 *   type: 'noul',
 *   criteria?: null|Criteria|CriteriaShape,
 * }
 */
final class DecisionModelNoulQuestion implements BaseModel
{
    /** @use SdkModel<DecisionModelNoulQuestionShape> */
    use SdkModel;

    /**
     * Question type.
     *
     * @var 'noul' $type
     */
    #[Required]
    public string $type = 'noul';

    /**
     * Required instructions describing what to decide about the shared state.
     *
     * @var InstructionsVariants $instructions
     */
    #[Required(union: Instructions::class)]
    public string|array $instructions;

    /**
     * Optional descriptions for the positive and negative outcomes. Descriptions must be strings.
     */
    #[Optional]
    public ?Criteria $criteria;

    /**
     * `new DecisionModelNoulQuestion()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DecisionModelNoulQuestion::with(instructions: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DecisionModelNoulQuestion)->withInstructions(...)
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
     * @param InstructionsShape $instructions
     * @param Criteria|CriteriaShape|null $criteria
     */
    public static function with(
        string|array $instructions,
        Criteria|array|null $criteria = null
    ): self {
        $self = new self;

        $self['instructions'] = $instructions;

        null !== $criteria && $self['criteria'] = $criteria;

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
     * @param 'noul' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Optional descriptions for the positive and negative outcomes. Descriptions must be strings.
     *
     * @param Criteria|CriteriaShape $criteria
     */
    public function withCriteria(Criteria|array $criteria): self
    {
        $self = clone $this;
        $self['criteria'] = $criteria;

        return $self;
    }
}
