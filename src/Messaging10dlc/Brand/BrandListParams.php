<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Brand;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging10dlc\Brand\BrandListParams\Sort;

/**
 * This endpoint is used to list all brands associated with your organization.
 *
 * @see Telnyx\Services\Messaging10dlc\BrandService::list()
 *
 * @phpstan-type BrandListParamsShape = array{
 *   brandID?: string|null,
 *   country?: string|null,
 *   displayName?: string|null,
 *   entityType?: string|null,
 *   page?: int|null,
 *   recordsPerPage?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
 *   state?: string|null,
 *   tcrBrandID?: string|null,
 * }
 */
final class BrandListParams implements BaseModel
{
    /** @use SdkModel<BrandListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter results by the Telnyx Brand id.
     */
    #[Optional]
    public ?string $brandID;

    #[Optional]
    public ?string $country;

    #[Optional]
    public ?string $displayName;

    #[Optional]
    public ?string $entityType;

    #[Optional]
    public ?int $page;

    /**
     * number of records per page. maximum of 500.
     */
    #[Optional]
    public ?int $recordsPerPage;

    /**
     * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
    public ?string $sort;

    #[Optional]
    public ?string $state;

    /**
     * Filter results by the TCR Brand id.
     */
    #[Optional]
    public ?string $tcrBrandID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Sort|value-of<Sort>|null $sort
     */
    public static function with(
        ?string $brandID = null,
        ?string $country = null,
        ?string $displayName = null,
        ?string $entityType = null,
        ?int $page = null,
        ?int $recordsPerPage = null,
        Sort|string|null $sort = null,
        ?string $state = null,
        ?string $tcrBrandID = null,
    ): self {
        $self = new self;

        null !== $brandID && $self['brandID'] = $brandID;
        null !== $country && $self['country'] = $country;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $entityType && $self['entityType'] = $entityType;
        null !== $page && $self['page'] = $page;
        null !== $recordsPerPage && $self['recordsPerPage'] = $recordsPerPage;
        null !== $sort && $self['sort'] = $sort;
        null !== $state && $self['state'] = $state;
        null !== $tcrBrandID && $self['tcrBrandID'] = $tcrBrandID;

        return $self;
    }

    /**
     * Filter results by the Telnyx Brand id.
     */
    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    public function withCountry(string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    public function withEntityType(string $entityType): self
    {
        $self = clone $this;
        $self['entityType'] = $entityType;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * number of records per page. maximum of 500.
     */
    public function withRecordsPerPage(int $recordsPerPage): self
    {
        $self = clone $this;
        $self['recordsPerPage'] = $recordsPerPage;

        return $self;
    }

    /**
     * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $self = clone $this;
        $self['sort'] = $sort;

        return $self;
    }

    public function withState(string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Filter results by the TCR Brand id.
     */
    public function withTcrBrandID(string $tcrBrandID): self
    {
        $self = clone $this;
        $self['tcrBrandID'] = $tcrBrandID;

        return $self;
    }
}
