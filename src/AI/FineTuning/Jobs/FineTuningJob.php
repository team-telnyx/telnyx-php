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
 * @phpstan-type FineTuningJobShape = array{
 *   id: string,
 *   createdAt: int,
 *   finishedAt: int|null,
 *   hyperparameters: Hyperparameters,
 *   model: string,
 *   organizationID: string,
 *   status: value-of<Status>,
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
     * @param Hyperparameters|array{nEpochs: int} $hyperparameters
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
        $obj = new self;

        $obj['id'] = $id;
        $obj['createdAt'] = $createdAt;
        $obj['finishedAt'] = $finishedAt;
        $obj['hyperparameters'] = $hyperparameters;
        $obj['model'] = $model;
        $obj['organizationID'] = $organizationID;
        $obj['status'] = $status;
        $obj['trainedTokens'] = $trainedTokens;
        $obj['trainingFile'] = $trainingFile;

        return $obj;
    }

    /**
     * The name of the fine-tuned model that is being created.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The Unix timestamp (in seconds) for when the fine-tuning job was created.
     */
    public function withCreatedAt(int $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The Unix timestamp (in seconds) for when the fine-tuning job was finished. The value will be null if the fine-tuning job is still running.
     */
    public function withFinishedAt(?int $finishedAt): self
    {
        $obj = clone $this;
        $obj['finishedAt'] = $finishedAt;

        return $obj;
    }

    /**
     * The hyperparameters used for the fine-tuning job.
     *
     * @param Hyperparameters|array{nEpochs: int} $hyperparameters
     */
    public function withHyperparameters(
        Hyperparameters|array $hyperparameters
    ): self {
        $obj = clone $this;
        $obj['hyperparameters'] = $hyperparameters;

        return $obj;
    }

    /**
     * The base model that is being fine-tuned.
     */
    public function withModel(string $model): self
    {
        $obj = clone $this;
        $obj['model'] = $model;

        return $obj;
    }

    /**
     * The organization that owns the fine-tuning job.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj['organizationID'] = $organizationID;

        return $obj;
    }

    /**
     * The current status of the fine-tuning job.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * The total number of billable tokens processed by this fine-tuning job. The value will be null if the fine-tuning job is still running.
     */
    public function withTrainedTokens(?int $trainedTokens): self
    {
        $obj = clone $this;
        $obj['trainedTokens'] = $trainedTokens;

        return $obj;
    }

    /**
     * The storage bucket or object used for training.
     */
    public function withTrainingFile(string $trainingFile): self
    {
        $obj = clone $this;
        $obj['trainingFile'] = $trainingFile;

        return $obj;
    }
}
