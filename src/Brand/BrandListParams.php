<?php

declare(strict_types=1);

namespace Telnyx\Brand;

use Telnyx\Brand\BrandListParams\Sort;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This endpoint is used to list all brands associated with your organization.
 *
 * @see Telnyx\Services\BrandService::list()
 *
 * @phpstan-type BrandListParamsShape = array{
 *   brandId?: string,
 *   country?: string,
 *   displayName?: string,
 *   entityType?: string,
 *   page?: int,
 *   recordsPerPage?: int,
 *   sort?: Sort|value-of<Sort>,
 *   state?: string,
 *   tcrBrandId?: string,
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
    #[Api(optional: true)]
    public ?string $brandId;

    #[Api(optional: true)]
    public ?string $country;

    #[Api(optional: true)]
    public ?string $displayName;

    #[Api(optional: true)]
    public ?string $entityType;

    #[Api(optional: true)]
    public ?int $page;

    /**
     * number of records per page. maximum of 500.
     */
    #[Api(optional: true)]
    public ?int $recordsPerPage;

    /**
     * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Api(enum: Sort::class, optional: true)]
    public ?string $sort;

    #[Api(optional: true)]
    public ?string $state;

    /**
     * Filter results by the TCR Brand id.
     */
    #[Api(optional: true)]
    public ?string $tcrBrandId;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        ?string $brandId = null,
        ?string $country = null,
        ?string $displayName = null,
        ?string $entityType = null,
        ?int $page = null,
        ?int $recordsPerPage = null,
        Sort|string|null $sort = null,
        ?string $state = null,
        ?string $tcrBrandId = null,
    ): self {
        $obj = new self;

        null !== $brandId && $obj->brandId = $brandId;
        null !== $country && $obj->country = $country;
        null !== $displayName && $obj->displayName = $displayName;
        null !== $entityType && $obj->entityType = $entityType;
        null !== $page && $obj->page = $page;
        null !== $recordsPerPage && $obj->recordsPerPage = $recordsPerPage;
        null !== $sort && $obj['sort'] = $sort;
        null !== $state && $obj->state = $state;
        null !== $tcrBrandId && $obj->tcrBrandId = $tcrBrandId;

        return $obj;
    }

    /**
     * Filter results by the Telnyx Brand id.
     */
    public function withBrandID(string $brandID): self
    {
        $obj = clone $this;
        $obj->brandId = $brandID;

        return $obj;
    }

    public function withCountry(string $country): self
    {
        $obj = clone $this;
        $obj->country = $country;

        return $obj;
    }

    public function withDisplayName(string $displayName): self
    {
        $obj = clone $this;
        $obj->displayName = $displayName;

        return $obj;
    }

    public function withEntityType(string $entityType): self
    {
        $obj = clone $this;
        $obj->entityType = $entityType;

        return $obj;
    }

    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * number of records per page. maximum of 500.
     */
    public function withRecordsPerPage(int $recordsPerPage): self
    {
        $obj = clone $this;
        $obj->recordsPerPage = $recordsPerPage;

        return $obj;
    }

    /**
     * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @param Sort|value-of<Sort> $sort
     */
    public function withSort(Sort|string $sort): self
    {
        $obj = clone $this;
        $obj['sort'] = $sort;

        return $obj;
    }

    public function withState(string $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * Filter results by the TCR Brand id.
     */
    public function withTcrBrandID(string $tcrBrandID): self
    {
        $obj = clone $this;
        $obj->tcrBrandId = $tcrBrandID;

        return $obj;
    }
}
