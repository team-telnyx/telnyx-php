<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\FailedOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\PendingOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\PhoneNumber;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\Status;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\SuccessfulOperation;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob\Type;

/**
 * @phpstan-type JobListResponseShape = array{
 *   data?: list<PhoneNumbersJob>|null, meta?: PaginationMeta|null
 * }
 */
final class JobListResponse implements BaseModel
{
    /** @use SdkModel<JobListResponseShape> */
    use SdkModel;

    /** @var list<PhoneNumbersJob>|null $data */
    #[Optional(list: PhoneNumbersJob::class)]
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
     * @param list<PhoneNumbersJob|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failedOperations?: list<FailedOperation>|null,
     *   pendingOperations?: list<PendingOperation>|null,
     *   phoneNumbers?: list<PhoneNumber>|null,
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<PhoneNumbersJob|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failedOperations?: list<FailedOperation>|null,
     *   pendingOperations?: list<PendingOperation>|null,
     *   phoneNumbers?: list<PhoneNumber>|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   successfulOperations?: list<SuccessfulOperation>|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
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
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
