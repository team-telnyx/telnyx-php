<?php

declare(strict_types=1);

namespace Telnyx\AI\Typesafe\V1;

use Telnyx\AI\Typesafe\V1\V1SystemoneParams\Model;
use Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question;
use Telnyx\AI\Typesafe\V1\V1SystemoneParams\State;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * **Beta API.** Choose telnyx/decision-flash for the lowest cost and latency, or telnyx/decision-pro for decisions that require long context, including inputs beyond Jev’s 32k per-decision limit. Omitted model defaults to telnyx/decision-flash.
 *
 * Evaluate shared context using named choice, noul (yes/no), and score questions. Returns TypeSafe System One-compatible answer shapes, the selected public model alias, and token usage. See the [decision model guide](https://developers.telnyx.com/docs/inference/decision-models) for examples and compatibility limits.
 *
 * The supported request subset requires instructions for every question, string descriptions for criteria (or null for choice descriptions), 1–64 questions, and 2–64 options for choice and score questions. The model field accepts only telnyx/decision-flash or telnyx/decision-pro. Unsupported model values and unknown fields are rejected. The endpoint is synchronous and does not stream.
 *
 * Use the TypeSafe Python SDK with base_url set to https://api.telnyx.com/v2/ai/typesafe and a Telnyx API key. The SDK appends /v1/systemone; explicitly set model to a supported Telnyx alias because its own default model is not supported. Compatibility covers this operation and the documented request subset; it does not include TypeSafe model listing. Scores describe relative preference, not calibrated correctness.
 *
 * @see Telnyx\Services\AI\Typesafe\V1Service::systemone()
 *
 * @phpstan-import-type QuestionVariants from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question
 * @phpstan-import-type StateVariants from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\State
 * @phpstan-import-type QuestionShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\Question
 * @phpstan-import-type StateShape from \Telnyx\AI\Typesafe\V1\V1SystemoneParams\State
 *
 * @phpstan-type V1SystemoneParamsShape = array{
 *   questions: array<string,QuestionShape>,
 *   state: StateShape,
 *   model?: null|Model|value-of<Model>,
 * }
 */
final class V1SystemoneParams implements BaseModel
{
    /** @use SdkModel<V1SystemoneParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Between 1 and 64 named questions. Each key identifies the corresponding answer.
     *
     * @var array<string,QuestionVariants> $questions
     */
    #[Required(map: Question::class)]
    public array $questions;

    /**
     * Shared context evaluated by every question.
     *
     * @var StateVariants $state
     */
    #[Required(union: State::class)]
    public string|array $state;

    /**
     * Public model alias. telnyx/decision-flash offers the lowest cost and latency; telnyx/decision-pro supports decisions that require long context, including inputs beyond Jev’s 32k per-decision limit. Applies to every question in the request. Other values are rejected.
     *
     * @var value-of<Model>|null $model
     */
    #[Optional(enum: Model::class)]
    public ?string $model;

    /**
     * `new V1SystemoneParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * V1SystemoneParams::with(questions: ..., state: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new V1SystemoneParams)->withQuestions(...)->withState(...)
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
     * @param array<string,QuestionShape> $questions
     * @param StateShape $state
     * @param Model|value-of<Model>|null $model
     */
    public static function with(
        array $questions,
        string|array $state,
        Model|string|null $model = null
    ): self {
        $self = new self;

        $self['questions'] = $questions;
        $self['state'] = $state;

        null !== $model && $self['model'] = $model;

        return $self;
    }

    /**
     * Between 1 and 64 named questions. Each key identifies the corresponding answer.
     *
     * @param array<string,QuestionShape> $questions
     */
    public function withQuestions(array $questions): self
    {
        $self = clone $this;
        $self['questions'] = $questions;

        return $self;
    }

    /**
     * Shared context evaluated by every question.
     *
     * @param StateShape $state
     */
    public function withState(string|array $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Public model alias. telnyx/decision-flash offers the lowest cost and latency; telnyx/decision-pro supports decisions that require long context, including inputs beyond Jev’s 32k per-decision limit. Applies to every question in the request. Other values are rejected.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }
}
