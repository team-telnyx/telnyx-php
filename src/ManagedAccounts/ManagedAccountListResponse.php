<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ManagedAccounts\ManagedAccountListResponse\Data;
use Telnyx\ManagedAccounts\ManagedAccountListResponse\Data\RecordType;

/**
 * @phpstan-type ManagedAccountListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class ManagedAccountListResponse implements BaseModel
{
    /** @use SdkModel<ManagedAccountListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<Data|array{
     *   id: string,
     *   apiUser: string,
     *   createdAt: string,
     *   email: string,
     *   managerAccountID: string,
     *   recordType: value-of<RecordType>,
     *   updatedAt: string,
     *   managedAccountAllowCustomPricing?: bool|null,
     *   organizationName?: string|null,
     *   rollupBilling?: bool|null,
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
     * @param list<Data|array{
     *   id: string,
     *   apiUser: string,
     *   createdAt: string,
     *   email: string,
     *   managerAccountID: string,
     *   recordType: value-of<RecordType>,
     *   updatedAt: string,
     *   managedAccountAllowCustomPricing?: bool|null,
     *   organizationName?: string|null,
     *   rollupBilling?: bool|null,
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
