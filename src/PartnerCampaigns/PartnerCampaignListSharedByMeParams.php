<?php

declare(strict_types=1);

namespace Telnyx\PartnerCampaigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get all partner campaigns you have shared to Telnyx in a paginated fashion.
 *
 * This endpoint is currently limited to only returning shared campaigns that Telnyx
 * has accepted. In other words, shared but pending campaigns are currently omitted
 * from the response from this endpoint.
 *
 * @see Telnyx\Services\PartnerCampaignsService::listSharedByMe()
 *
 * @phpstan-type PartnerCampaignListSharedByMeParamsShape = array{
 *   page?: int, recordsPerPage?: int
 * }
 */
final class PartnerCampaignListSharedByMeParams implements BaseModel
{
    /** @use SdkModel<PartnerCampaignListSharedByMeParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The 1-indexed page number to get. The default value is `1`.
     */
    #[Optional]
    public ?int $page;

    /**
     * The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     */
    #[Optional]
    public ?int $recordsPerPage;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $page = null,
        ?int $recordsPerPage = null
    ): self {
        $self = new self;

        null !== $page && $self['page'] = $page;
        null !== $recordsPerPage && $self['recordsPerPage'] = $recordsPerPage;

        return $self;
    }

    /**
     * The 1-indexed page number to get. The default value is `1`.
     */
    public function withPage(int $page): self
    {
        $self = clone $this;
        $self['page'] = $page;

        return $self;
    }

    /**
     * The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     */
    public function withRecordsPerPage(int $recordsPerPage): self
    {
        $self = clone $this;
        $self['recordsPerPage'] = $recordsPerPage;

        return $self;
    }
}
