<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question;

use Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelChoiceQuestion\Instructions;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;

/**
 * Select one of the supplied options.
 *
 * @phpstan-import-type InstructionsVariants from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelChoiceQuestion\Instructions
 * @phpstan-import-type InstructionsShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question\DecisionModelChoiceQuestion\Instructions
 *
 * @phpstan-type DecisionModelChoiceQuestionShape = array{
 *   criteria: array<string,string|null>,
 *   instructions: InstructionsShape,
 *   type: 'choice',
 * }
 */
final class DecisionModelChoiceQuestion implements BaseModel
{
    /** @use SdkModel<DecisionModelChoiceQuestionShape> */
    use SdkModel;

    /**
     * Question type.
     *
     * @var 'choice' $type
     */
    #[Required]
    public string $type = 'choice';

    /**
     * Between 2 and 64 option keys mapped to description strings or null. A null description uses the option key as its text.
     *
     * @var array<string,string|null> $criteria
     */
    #[Required(type: new MapOf('string', nullable: true))]
    public array $criteria;

    /**
     * Required instructions describing what to decide about the shared state.
     *
     * @var InstructionsVariants $instructions
     */
    #[Required(union: Instructions::class)]
    public string|array $instructions;

    /**
     * `new DecisionModelChoiceQuestion()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DecisionModelChoiceQuestion::with(criteria: ..., instructions: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DecisionModelChoiceQuestion)->withCriteria(...)->withInstructions(...)
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
     * @param array<string,string|null> $criteria
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
     * Between 2 and 64 option keys mapped to description strings or null. A null description uses the option key as its text.
     *
     * @param array<string,string|null> $criteria
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
     * @param 'choice' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
