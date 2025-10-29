<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberCampaigns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Filter;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Sort;

/**
 * Retrieve All Phone Number Campaigns.
 *
 * @see Telnyx\PhoneNumberCampaigns->list
 *
 * @phpstan-type PhoneNumberCampaignListParamsShape = array{
 *   filter?: Filter, page?: int, recordsPerPage?: int, sort?: Sort|value-of<Sort>
 * }
 */
final class PhoneNumberCampaignListParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberCampaignListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[telnyx_campaign_id], filter[telnyx_brand_id], filter[tcr_campaign_id], filter[tcr_brand_id].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    #[Api(optional: true)]
    public ?int $page;

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
        ?Filter $filter = null,
        ?int $page = null,
        ?int $recordsPerPage = null,
        Sort|string|null $sort = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj->filter = $filter;
        null !== $page && $obj->page = $page;
        null !== $recordsPerPage && $obj->recordsPerPage = $recordsPerPage;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[telnyx_campaign_id], filter[telnyx_brand_id], filter[tcr_campaign_id], filter[tcr_brand_id].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

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
