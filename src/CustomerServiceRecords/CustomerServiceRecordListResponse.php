<?php

declare(strict_types=1);

namespace Telnyx\CustomerServiceRecords;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Result;
use Telnyx\CustomerServiceRecords\CustomerServiceRecord\Status;

/**
 * @phpstan-type CustomerServiceRecordListResponseShape = array{
 *   data?: list<CustomerServiceRecord>|null, meta?: PaginationMeta|null
 * }
 */
final class CustomerServiceRecordListResponse implements BaseModel
{
    /** @use SdkModel<CustomerServiceRecordListResponseShape> */
    use SdkModel;

    /** @var list<CustomerServiceRecord>|null $data */
    #[Optional(list: CustomerServiceRecord::class)]
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
     * @param list<CustomerServiceRecord|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   errorMessage?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   result?: Result|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
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
     * @param list<CustomerServiceRecord|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   errorMessage?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   result?: Result|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
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
