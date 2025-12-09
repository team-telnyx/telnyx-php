<?php

declare(strict_types=1);

namespace Telnyx\Brand;

use Telnyx\Brand\BrandListResponse\Record;
use Telnyx\Brand\BrandListResponse\Record\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

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
        $obj = new self;

        null !== $page && $obj['page'] = $page;
        null !== $records && $obj['records'] = $records;
        null !== $totalRecords && $obj['totalRecords'] = $totalRecords;

        return $obj;
    }

    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
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
        $obj = clone $this;
        $obj['records'] = $records;

        return $obj;
    }

    public function withTotalRecords(int $totalRecords): self
    {
        $obj = clone $this;
        $obj['totalRecords'] = $totalRecords;

        return $obj;
    }
}
