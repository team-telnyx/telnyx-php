<?php

declare(strict_types=1);

namespace Telnyx\AI\FineTuning\Jobs;

use Telnyx\AI\FineTuning\Jobs\JobCreateParams\Hyperparameters;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new fine tuning job.
 *
 * @see Telnyx\Services\AI\FineTuning\JobsService::create()
 *
 * @phpstan-import-type HyperparametersShape from \Telnyx\AI\FineTuning\Jobs\JobCreateParams\Hyperparameters
 *
 * @phpstan-type JobCreateParamsShape = array{
 *   model: string,
 *   trainingFile: string,
 *   hyperparameters?: HyperparametersShape|null,
 *   suffix?: string|null,
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
    #[Required]
    public string $model;

    /**
     * The storage bucket or object used for training.
     */
    #[Required('training_file')]
    public string $trainingFile;

    /**
     * The hyperparameters used for the fine-tuning job.
     */
    #[Optional]
    public ?Hyperparameters $hyperparameters;

    /**
     * Optional suffix to append to the fine tuned model's name.
     */
    #[Optional]
    public ?string $suffix;

    /**
     * `new JobCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JobCreateParams::with(model: ..., trainingFile: ...)
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
     *
     * @param HyperparametersShape $hyperparameters
     */
    public static function with(
        string $model,
        string $trainingFile,
        Hyperparameters|array|null $hyperparameters = null,
        ?string $suffix = null,
    ): self {
        $self = new self;

        $self['model'] = $model;
        $self['trainingFile'] = $trainingFile;

        null !== $hyperparameters && $self['hyperparameters'] = $hyperparameters;
        null !== $suffix && $self['suffix'] = $suffix;

        return $self;
    }

    /**
     * The base model that is being fine-tuned.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * The storage bucket or object used for training.
     */
    public function withTrainingFile(string $trainingFile): self
    {
        $self = clone $this;
        $self['trainingFile'] = $trainingFile;

        return $self;
    }

    /**
     * The hyperparameters used for the fine-tuning job.
     *
     * @param HyperparametersShape $hyperparameters
     */
    public function withHyperparameters(
        Hyperparameters|array $hyperparameters
    ): self {
        $self = clone $this;
        $self['hyperparameters'] = $hyperparameters;

        return $self;
    }

    /**
     * Optional suffix to append to the fine tuned model's name.
     */
    public function withSuffix(string $suffix): self
    {
        $self = clone $this;
        $self['suffix'] = $suffix;

        return $self;
    }
}
