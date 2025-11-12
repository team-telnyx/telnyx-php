<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Campaign\CampaignListParams\Sort;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a list of campaigns associated with a supplied `brandId`.
 *
 * @see Telnyx\CampaignService::list()
 *
 * @phpstan-type CampaignListParamsShape = array{
 *   brandId: string, page?: int, recordsPerPage?: int, sort?: Sort|value-of<Sort>
 * }
 */
final class CampaignListParams implements BaseModel
{
    /** @use SdkModel<CampaignListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $brandId;

    /**
     * The 1-indexed page number to get. The default value is `1`.
     */
    #[Api(optional: true)]
    public ?int $page;

    /**
     * The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
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

    /**
     * `new CampaignListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CampaignListParams::with(brandId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CampaignListParams)->withBrandID(...)
     * ```
     */
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
        string $brandId,
        ?int $page = null,
        ?int $recordsPerPage = null,
        Sort|string|null $sort = null,
    ): self {
        $obj = new self;

        $obj->brandId = $brandId;

        null !== $page && $obj->page = $page;
        null !== $recordsPerPage && $obj->recordsPerPage = $recordsPerPage;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    public function withBrandID(string $brandID): self
    {
        $obj = clone $this;
        $obj->brandId = $brandID;

        return $obj;
    }

    /**
     * The 1-indexed page number to get. The default value is `1`.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
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
}
