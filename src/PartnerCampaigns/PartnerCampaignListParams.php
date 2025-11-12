<?php

declare(strict_types=1);

namespace Telnyx\PartnerCampaigns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PartnerCampaigns\PartnerCampaignListParams\Sort;

/**
 * Retrieve all partner campaigns you have shared to Telnyx in a paginated fashion.
 *
 * This endpoint is currently limited to only returning shared campaigns that Telnyx has accepted. In other words, shared but pending campaigns are currently omitted from the response from this endpoint.
 *
 * @see Telnyx\Services\PartnerCampaignsService::list()
 *
 * @phpstan-type PartnerCampaignListParamsShape = array{
 *   page?: int, recordsPerPage?: int, sort?: Sort|value-of<Sort>
 * }
 */
final class PartnerCampaignListParams implements BaseModel
{
    /** @use SdkModel<PartnerCampaignListParamsShape> */
    use SdkModel;
    use SdkParams;

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
        ?int $page = null,
        ?int $recordsPerPage = null,
        Sort|string|null $sort = null
    ): self {
        $obj = new self;

        null !== $page && $obj->page = $page;
        null !== $recordsPerPage && $obj->recordsPerPage = $recordsPerPage;
        null !== $sort && $obj['sort'] = $sort;

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
