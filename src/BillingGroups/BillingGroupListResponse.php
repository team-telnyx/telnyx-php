<?php

declare(strict_types=1);

namespace Telnyx\BillingGroups;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\BillingGroups\BillingGroup\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BillingGroupListResponseShape = array{
 *   data?: list<BillingGroup>|null, meta?: PaginationMeta|null
 * }
 */
final class BillingGroupListResponse implements BaseModel
{
    /** @use SdkModel<BillingGroupListResponseShape> */
    use SdkModel;

    /** @var list<BillingGroup>|null $data */
    #[Optional(list: BillingGroup::class)]
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
     * @param list<BillingGroup|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organizationID?: string|null,
     *   recordType?: value-of<RecordType>|null,
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
     * @param list<BillingGroup|array{
     *   id?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   deletedAt?: \DateTimeInterface|null,
     *   name?: string|null,
     *   organizationID?: string|null,
     *   recordType?: value-of<RecordType>|null,
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
