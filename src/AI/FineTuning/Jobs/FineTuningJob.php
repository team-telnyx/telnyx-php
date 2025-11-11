<?php

declare(strict_types=1);

namespace Telnyx\AI\FineTuning\Jobs;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob\Hyperparameters;
use Telnyx\AI\FineTuning\Jobs\FineTuningJob\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * The `fine_tuning.job` object represents a fine-tuning job that has been created through the API.
 *
 * @phpstan-type FineTuningJobShape = array{
 *   id: string,
 *   created_at: int,
 *   finished_at: int|null,
 *   hyperparameters: Hyperparameters,
 *   model: string,
 *   organization_id: string,
 *   status: value-of<Status>,
 *   trained_tokens: int|null,
 *   training_file: string,
 * }
 */
final class FineTuningJob implements BaseModel, ResponseConverter
{
    /** @use SdkModel<FineTuningJobShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * The name of the fine-tuned model that is being created.
     */
    #[Api]
    public string $id;

    /**
     * The Unix timestamp (in seconds) for when the fine-tuning job was created.
     */
    #[Api]
    public int $created_at;

    /**
     * The Unix timestamp (in seconds) for when the fine-tuning job was finished. The value will be null if the fine-tuning job is still running.
     */
    #[Api]
    public ?int $finished_at;

    /**
     * The hyperparameters used for the fine-tuning job.
     */
    #[Api]
    public Hyperparameters $hyperparameters;

    /**
     * The base model that is being fine-tuned.
     */
    #[Api]
    public string $model;

    /**
     * The organization that owns the fine-tuning job.
     */
    #[Api]
    public string $organization_id;

    /**
     * The current status of the fine-tuning job.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    /**
     * The total number of billable tokens processed by this fine-tuning job. The value will be null if the fine-tuning job is still running.
     */
    #[Api]
    public ?int $trained_tokens;

    /**
     * The storage bucket or object used for training.
     */
    #[Api]
    public string $training_file;

    /**
     * `new FineTuningJob()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FineTuningJob::with(
     *   id: ...,
     *   created_at: ...,
     *   finished_at: ...,
     *   hyperparameters: ...,
     *   model: ...,
     *   organization_id: ...,
     *   status: ...,
     *   trained_tokens: ...,
     *   training_file: ...,
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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        string $id,
        int $created_at,
        ?int $finished_at,
        Hyperparameters $hyperparameters,
        string $model,
        string $organization_id,
        Status|string $status,
        ?int $trained_tokens,
        string $training_file,
    ): self {
        $obj = new self;

        $obj->id = $id;
        $obj->created_at = $created_at;
        $obj->finished_at = $finished_at;
        $obj->hyperparameters = $hyperparameters;
        $obj->model = $model;
        $obj->organization_id = $organization_id;
        $obj['status'] = $status;
        $obj->trained_tokens = $trained_tokens;
        $obj->training_file = $training_file;

        return $obj;
    }

    /**
     * The name of the fine-tuned model that is being created.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * The Unix timestamp (in seconds) for when the fine-tuning job was created.
     */
    public function withCreatedAt(int $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * The Unix timestamp (in seconds) for when the fine-tuning job was finished. The value will be null if the fine-tuning job is still running.
     */
    public function withFinishedAt(?int $finishedAt): self
    {
        $obj = clone $this;
        $obj->finished_at = $finishedAt;

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
     * The base model that is being fine-tuned.
     */
    public function withModel(string $model): self
    {
        $obj = clone $this;
        $obj->model = $model;

        return $obj;
    }

    /**
     * The organization that owns the fine-tuning job.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $obj = clone $this;
        $obj->organization_id = $organizationID;

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
        $obj->trained_tokens = $trainedTokens;

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
}
