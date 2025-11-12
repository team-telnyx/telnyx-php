<?php

declare(strict_types=1);

namespace Telnyx\AI\FineTuning\Jobs;

use Telnyx\AI\FineTuning\Jobs\JobCreateParams\Hyperparameters;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new fine tuning job.
 *
 * @see Telnyx\STAINLESS_FIXME_AI\STAINLESS_FIXME_FineTuning\JobsService::create()
 *
 * @phpstan-type JobCreateParamsShape = array{
 *   model: string,
 *   training_file: string,
 *   hyperparameters?: Hyperparameters,
 *   suffix?: string,
 * }
 */
final class JobCreateParams implements BaseModel
{
    /** @use SdkModel<JobCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The base model that is being fine-tuned.
     */
    #[Api]
    public string $model;

    /**
     * The storage bucket or object used for training.
     */
    #[Api]
    public string $training_file;

    /**
     * The hyperparameters used for the fine-tuning job.
     */
    #[Api(optional: true)]
    public ?Hyperparameters $hyperparameters;

    /**
     * Optional suffix to append to the fine tuned model's name.
     */
    #[Api(optional: true)]
    public ?string $suffix;

    /**
     * `new JobCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JobCreateParams::with(model: ..., training_file: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JobCreateParams)->withModel(...)->withTrainingFile(...)
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
    public static function with(
        string $model,
        string $training_file,
        ?Hyperparameters $hyperparameters = null,
        ?string $suffix = null,
    ): self {
        $obj = new self;

        $obj->model = $model;
        $obj->training_file = $training_file;

        null !== $hyperparameters && $obj->hyperparameters = $hyperparameters;
        null !== $suffix && $obj->suffix = $suffix;

        return $obj;
    }

    /**
     * The base model that is being fine-tuned.
     */
    public function withModel(string $model): self
    {
        $obj = clone $this;
        $obj->model = $model;

        return $obj;
    }

    /**
     * The storage bucket or object used for training.
     */
    public function withTrainingFile(string $trainingFile): self
    {
        $obj = clone $this;
        $obj->training_file = $trainingFile;

        return $obj;
    }

    /**
     * The hyperparameters used for the fine-tuning job.
     */
    public function withHyperparameters(Hyperparameters $hyperparameters): self
    {
        $obj = clone $this;
        $obj->hyperparameters = $hyperparameters;

        return $obj;
    }

    /**
     * Optional suffix to append to the fine tuned model's name.
     */
    public function withSuffix(string $suffix): self
    {
        $obj = clone $this;
        $obj->suffix = $suffix;

        return $obj;
    }
}
