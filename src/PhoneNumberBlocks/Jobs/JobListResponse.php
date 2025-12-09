<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberBlocks\Jobs\Job\FailedOperation;
use Telnyx\PhoneNumberBlocks\Jobs\Job\Status;
use Telnyx\PhoneNumberBlocks\Jobs\Job\SuccessfulOperation;
use Telnyx\PhoneNumberBlocks\Jobs\Job\Type;

/**
 * @phpstan-type JobListResponseShape = array{
 *   data?: list<Job>|null, meta?: PaginationMeta|null
 * }
 */
final class JobListResponse implements BaseModel
{
    /** @use SdkModel<JobListResponseShape> */
    use SdkModel;

    /** @var list<Job>|null $data */
    #[Optional(list: Job::class)]
    public ?array $data;

    #[Optional]
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
     *   createdAt?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failedOperations?: list<FailedOperation>|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   successfulOperations?: list<SuccessfulOperation>|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Job|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failedOperations?: list<FailedOperation>|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   successfulOperations?: list<SuccessfulOperation>|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
