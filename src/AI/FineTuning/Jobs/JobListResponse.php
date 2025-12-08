<?php

declare(strict_types=1);

namespace Telnyx\AI\FineTuning\Jobs;

use Telnyx\AI\FineTuning\Jobs\FineTuningJob\Hyperparameters;
use Telnyx\AI\FineTuning\Jobs\FineTuningJob\Status;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type JobListResponseShape = array{data: list<FineTuningJob>}
 */
final class JobListResponse implements BaseModel
{
    /** @use SdkModel<JobListResponseShape> */
    use SdkModel;

    /** @var list<FineTuningJob> $data */
    #[Required(list: FineTuningJob::class)]
    public array $data;

    /**
     * `new JobListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JobListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JobListResponse)->withData(...)
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
     * @param list<FineTuningJob|array{
     *   id: string,
     *   created_at: int,
     *   finished_at: int|null,
     *   hyperparameters: Hyperparameters,
     *   model: string,
     *   organization_id: string,
     *   status: value-of<Status>,
     *   trained_tokens: int|null,
     *   training_file: string,
     * }> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<FineTuningJob|array{
     *   id: string,
     *   created_at: int,
     *   finished_at: int|null,
     *   hyperparameters: Hyperparameters,
     *   model: string,
     *   organization_id: string,
     *   status: value-of<Status>,
     *   trained_tokens: int|null,
     *   training_file: string,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
