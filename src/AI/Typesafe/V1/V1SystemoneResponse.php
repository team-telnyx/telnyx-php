<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1;

use Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer;
use Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Model;
use Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Usage;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A complete synchronous evaluation. Answers are returned directly without a data wrapper.
 *
 * @phpstan-import-type AnswerVariants from \Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer
 * @phpstan-import-type AnswerShape from \Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Answer
 * @phpstan-import-type UsageShape from \Telnyx\AI\Typesafe\V1\V1SystemoneResponse\Usage
 *
 * @phpstan-type V1SystemoneResponseShape = array{
 *   answers: array<string,AnswerShape>,
 *   model: Model|value-of<Model>,
 *   usage: Usage|UsageShape,
 * }
 */
final class V1SystemoneResponse implements BaseModel
{
    /** @use SdkModel<V1SystemoneResponseShape> */
    use SdkModel;

    /**
     * Answers keyed by exactly the question IDs in the request. Each answer type matches its question.
     *
     * @var array<string,AnswerVariants> $answers
     */
    #[Required(map: Answer::class)]
    public array $answers;

    /**
     * Public model alias used to evaluate the request. Returns telnyx/decision-flash when model was omitted. The underlying model is managed by Telnyx.
     *
     * @var value-of<Model> $model
     */
    #[Required(enum: Model::class)]
    public string $model;

    /**
     * Token usage for the completed evaluation.
     */
    #[Required]
    public Usage $usage;

    /**
     * `new V1SystemoneResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V1SystemoneResponse::with(answers: ..., model: ..., usage: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V1SystemoneResponse)->withAnswers(...)->withModel(...)->withUsage(...)
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
     * @param array<string,AnswerShape> $answers
     * @param Model|value-of<Model> $model
     * @param Usage|UsageShape $usage
     */
    public static function with(
        array $answers,
        Model|string $model,
        Usage|array $usage
    ): self {
        $self = new self;

        $self['answers'] = $answers;
        $self['model'] = $model;
        $self['usage'] = $usage;

        return $self;
    }

    /**
     * Answers keyed by exactly the question IDs in the request. Each answer type matches its question.
     *
     * @param array<string,AnswerShape> $answers
     */
    public function withAnswers(array $answers): self
    {
        $self = clone $this;
        $self['answers'] = $answers;

        return $self;
    }

    /**
     * Public model alias used to evaluate the request. Returns telnyx/decision-flash when model was omitted. The underlying model is managed by Telnyx.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Token usage for the completed evaluation.
     *
     * @param Usage|UsageShape $usage
     */
    public function withUsage(Usage|array $usage): self
    {
        $self = clone $this;
        $self['usage'] = $usage;

        return $self;
    }
}
