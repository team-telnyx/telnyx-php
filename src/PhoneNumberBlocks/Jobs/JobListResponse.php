<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PhoneNumberBlocks\Jobs\Job\FailedOperation;
use Telnyx\PhoneNumberBlocks\Jobs\Job\Status;
use Telnyx\PhoneNumberBlocks\Jobs\Job\SuccessfulOperation;
use Telnyx\PhoneNumberBlocks\Jobs\Job\Type;

/**
 * @phpstan-type JobListResponseShape = array{
 *   data?: list<Job>|null, meta?: PaginationMeta|null
 * }
 */
final class JobListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<JobListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Job>|null $data */
    #[Api(list: Job::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Job|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failed_operations?: list<FailedOperation>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   successful_operations?: list<SuccessfulOperation>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Job|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failed_operations?: list<FailedOperation>|null,
     *   record_type?: string|null,
     *   status?: value-of<Status>|null,
     *   successful_operations?: list<SuccessfulOperation>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
