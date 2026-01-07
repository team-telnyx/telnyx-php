<?php

declare(strict_types=1);

namespace Telnyx\AI\FineTuning\Jobs;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type FineTuningJobShape from \Telnyx\AI\FineTuning\Jobs\FineTuningJob
 *
 * @phpstan-type JobListResponseShape = array{
 *   data: list<FineTuningJob|FineTuningJobShape>
 * }
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
     * @param list<FineTuningJob|FineTuningJobShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<FineTuningJob|FineTuningJobShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
