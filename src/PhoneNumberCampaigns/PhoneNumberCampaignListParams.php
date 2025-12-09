<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberCampaigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Filter;
use Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Sort;

/**
 * Retrieve All Phone Number Campaigns.
 *
 * @see Telnyx\Services\PhoneNumberCampaignsService::list()
 *
 * @phpstan-type PhoneNumberCampaignListParamsShape = array{
 *   filter?: Filter|array{
 *     tcrBrandID?: string|null,
 *     tcrCampaignID?: string|null,
 *     telnyxBrandID?: string|null,
 *     telnyxCampaignID?: string|null,
 *   },
 *   page?: int,
 *   recordsPerPage?: int,
 *   sort?: Sort|value-of<Sort>,
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
    #[Optional]
    public ?Filter $filter;

    #[Optional]
    public ?int $page;

    #[Optional]
    public ?int $recordsPerPage;

    /**
     * Specifies the sort order for results. If not given, results are sorted by createdAt in descending order.
     *
     * @var value-of<Sort>|null $sort
     */
    #[Optional(enum: Sort::class)]
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
     * @param Filter|array{
     *   tcrBrandID?: string|null,
     *   tcrCampaignID?: string|null,
     *   telnyxBrandID?: string|null,
     *   telnyxCampaignID?: string|null,
     * } $filter
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $page = null,
        ?int $recordsPerPage = null,
        Sort|string|null $sort = null,
    ): self {
        $obj = new self;

        null !== $filter && $obj['filter'] = $filter;
        null !== $page && $obj['page'] = $page;
        null !== $recordsPerPage && $obj['recordsPerPage'] = $recordsPerPage;
        null !== $sort && $obj['sort'] = $sort;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[telnyx_campaign_id], filter[telnyx_brand_id], filter[tcr_campaign_id], filter[tcr_brand_id].
     *
     * @param Filter|array{
     *   tcrBrandID?: string|null,
     *   tcrCampaignID?: string|null,
     *   telnyxBrandID?: string|null,
     *   telnyxCampaignID?: string|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    public function withRecordsPerPage(int $recordsPerPage): self
    {
        $obj = clone $this;
        $obj['recordsPerPage'] = $recordsPerPage;

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
