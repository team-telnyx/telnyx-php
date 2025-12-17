<?php

declare(strict_types=1);

namespace Telnyx\AI\FineTuning\Jobs;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob\Hyperparameters;
use Telnyx\AI\FineTuning\Jobs\FineTuningJob\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The `fine_tuning.job` object represents a fine-tuning job that has been created through the API.
 *
 * @phpstan-import-type HyperparametersShape from \Telnyx\AI\FineTuning\Jobs\FineTuningJob\Hyperparameters
 *
 * @phpstan-type FineTuningJobShape = array{
 *   id: string,
 *   createdAt: int,
 *   finishedAt: int|null,
 *   hyperparameters: Hyperparameters|HyperparametersShape,
 *   model: string,
 *   organizationID: string,
 *   status: Status|value-of<Status>,
 *   trainedTokens: int|null,
 *   trainingFile: string,
 * }
 */
final class FineTuningJob implements BaseModel
{
    /** @use SdkModel<FineTuningJobShape> */
    use SdkModel;

    /**
     * The name of the fine-tuned model that is being created.
     */
    #[Required]
    public string $id;

    /**
     * The Unix timestamp (in seconds) for when the fine-tuning job was created.
     */
    #[Required('created_at')]
    public int $createdAt;

    /**
     * The Unix timestamp (in seconds) for when the fine-tuning job was finished. The value will be null if the fine-tuning job is still running.
     */
    #[Required('finished_at')]
    public ?int $finishedAt;

    /**
     * The hyperparameters used for the fine-tuning job.
     */
    #[Required]
    public Hyperparameters $hyperparameters;

    /**
     * The base model that is being fine-tuned.
     */
    #[Required]
    public string $model;

    /**
     * The organization that owns the fine-tuning job.
     */
    #[Required('organization_id')]
    public string $organizationID;

    /**
     * The current status of the fine-tuning job.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * The total number of billable tokens processed by this fine-tuning job. The value will be null if the fine-tuning job is still running.
     */
    #[Required('trained_tokens')]
    public ?int $trainedTokens;

    /**
     * The storage bucket or object used for training.
     */
    #[Required('training_file')]
    public string $trainingFile;

    /**
     * `new FineTuningJob()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FineTuningJob::with(
     *   id: ...,
     *   createdAt: ...,
     *   finishedAt: ...,
     *   hyperparameters: ...,
     *   model: ...,
     *   organizationID: ...,
     *   status: ...,
     *   trainedTokens: ...,
     *   trainingFile: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FineTuningJob)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withFinishedAt(...)
     *   ->withHyperparameters(...)
     *   ->withModel(...)
     *   ->withOrganizationID(...)
     *   ->withStatus(...)
     *   ->withTrainedTokens(...)
     *   ->withTrainingFile(...)
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
     * @param Hyperparameters|HyperparametersShape $hyperparameters
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        int $createdAt,
        ?int $finishedAt,
        Hyperparameters|array $hyperparameters,
        string $model,
        string $organizationID,
        Status|string $status,
        ?int $trainedTokens,
        string $trainingFile,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['finishedAt'] = $finishedAt;
        $self['hyperparameters'] = $hyperparameters;
        $self['model'] = $model;
        $self['organizationID'] = $organizationID;
        $self['status'] = $status;
        $self['trainedTokens'] = $trainedTokens;
        $self['trainingFile'] = $trainingFile;

        return $self;
    }

    /**
     * The name of the fine-tuned model that is being created.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The Unix timestamp (in seconds) for when the fine-tuning job was created.
     */
    public function withCreatedAt(int $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The Unix timestamp (in seconds) for when the fine-tuning job was finished. The value will be null if the fine-tuning job is still running.
     */
    public function withFinishedAt(?int $finishedAt): self
    {
        $self = clone $this;
        $self['finishedAt'] = $finishedAt;

        return $self;
    }

    /**
     * The hyperparameters used for the fine-tuning job.
     *
     * @param Hyperparameters|HyperparametersShape $hyperparameters
     */
    public function withHyperparameters(
        Hyperparameters|array $hyperparameters
    ): self {
        $self = clone $this;
        $self['hyperparameters'] = $hyperparameters;

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
     * The organization that owns the fine-tuning job.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    /**
     * The current status of the fine-tuning job.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The total number of billable tokens processed by this fine-tuning job. The value will be null if the fine-tuning job is still running.
     */
    public function withTrainedTokens(?int $trainedTokens): self
    {
        $self = clone $this;
        $self['trainedTokens'] = $trainedTokens;

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
}
