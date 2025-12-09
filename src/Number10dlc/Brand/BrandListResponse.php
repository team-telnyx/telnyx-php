<?php

declare(strict_types=1);

namespace Telnyx\Number10dlc\Brand;

use Telnyx\Brand\BrandIdentityStatus;
use Telnyx\Brand\EntityType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Number10dlc\Brand\BrandListResponse\Record;
use Telnyx\Number10dlc\Brand\BrandListResponse\Record\Status;

/**
 * @phpstan-type BrandListResponseShape = array{
 *   page?: int|null, records?: list<Record>|null, totalRecords?: int|null
 * }
 */
final class BrandListResponse implements BaseModel
{
    /** @use SdkModel<BrandListResponseShape> */
    use SdkModel;

    #[Optional]
    public ?int $page;

    /** @var list<Record>|null $records */
    #[Optional(list: Record::class)]
    public ?array $records;

    #[Optional]
    public ?int $totalRecords;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Record|array{
     *   assignedCampaingsCount?: int|null,
     *   brandID?: string|null,
     *   companyName?: string|null,
     *   createdAt?: string|null,
     *   displayName?: string|null,
     *   email?: string|null,
     *   entityType?: value-of<EntityType>|null,
     *   failureReasons?: string|null,
     *   identityStatus?: value-of<BrandIdentityStatus>|null,
     *   status?: value-of<Status>|null,
     *   tcrBrandID?: string|null,
     *   updatedAt?: string|null,
     *   website?: string|null,
     * }> $records
     */
    public static function with(
        ?int $page = null,
        ?array $records = null,
        ?int $totalRecords = null
    ): self {
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $records && $self['records'] = $records;
        null !== $totalRecords && $self['totalRecords'] = $totalRecords;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * @param list<Record|array{
     *   assignedCampaingsCount?: int|null,
     *   brandID?: string|null,
     *   companyName?: string|null,
     *   createdAt?: string|null,
     *   displayName?: string|null,
     *   email?: string|null,
     *   entityType?: value-of<EntityType>|null,
     *   failureReasons?: string|null,
     *   identityStatus?: value-of<BrandIdentityStatus>|null,
     *   status?: value-of<Status>|null,
     *   tcrBrandID?: string|null,
     *   updatedAt?: string|null,
     *   website?: string|null,
     * }> $records
     */
    public function withRecords(array $records): self
    {
        $self = clone $this;
        $self['records'] = $records;

        return $self;
    }

    public function withTotalRecords(int $totalRecords): self
    {
        $self = clone $this;
        $self['totalRecords'] = $totalRecords;

        return $self;
    }
}
