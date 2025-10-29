<?php

declare(strict_types=1);

namespace Telnyx\AI\FineTuning\Jobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type JobListResponseShape = array{data: list<FineTuningJob>}
 */
final class JobListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<JobListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<FineTuningJob> $data */
    #[Api(list: FineTuningJob::class)]
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
     * @param list<FineTuningJob> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<FineTuningJob> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
