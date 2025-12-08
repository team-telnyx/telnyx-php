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
     *   created_at?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failed_operations?: list<FailedOperation>|null,
     *   pending_operations?: list<PendingOperation>|null,
     *   phone_numbers?: list<PhoneNumber>|null,
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
     * @param list<PhoneNumbersJob|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   etc?: \DateTimeInterface|null,
     *   failed_operations?: list<FailedOperation>|null,
     *   pending_operations?: list<PendingOperation>|null,
     *   phone_numbers?: list<PhoneNumber>|null,
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
