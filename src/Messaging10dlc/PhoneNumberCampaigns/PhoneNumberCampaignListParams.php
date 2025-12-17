<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\PhoneNumberCampaigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Filter;
use Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Sort;

/**
 * List phone number campaigns.
 *
 * @see Telnyx\Services\Messaging10dlc\PhoneNumberCampaignsService::list()
 *
 * @phpstan-import-type FilterShape from \Telnyx\Messaging10dlc\PhoneNumberCampaigns\PhoneNumberCampaignListParams\Filter
 *
 * @phpstan-type PhoneNumberCampaignListParamsShape = array{
 *   filter?: FilterShape|null,
 *   page?: int|null,
 *   recordsPerPage?: int|null,
 *   sort?: null|Sort|value-of<Sort>,
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
     * @param FilterShape $filter
     * @param Sort|value-of<Sort> $sort
     */
    public static function with(
        Filter|array|null $filter = null,
        ?int $page = null,
        ?int $recordsPerPage = null,
        Sort|string|null $sort = null,
    ): self {
        $self = new self;

        null !== $filter && $self['filter'] = $filter;
        null !== $page && $self['page'] = $page;
        null !== $recordsPerPage && $self['recordsPerPage'] = $recordsPerPage;
        null !== $sort && $self['sort'] = $sort;

        return $self;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[telnyx_campaign_id], filter[telnyx_brand_id], filter[tcr_campaign_id], filter[tcr_brand_id].
     *
     * @param FilterShape $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $self = clone $this;
        $self['filter'] = $filter;

        return $self;
    }

    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

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
}
