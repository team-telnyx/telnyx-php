<?php

declare(strict_types=1);

namespace Telnyx\PartnerCampaigns;

use Telnyx\Core\Attributes\Api;
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
    #[Api(optional: true)]
    public ?int $page;

    /**
     * The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $page && $obj['page'] = $page;
        null !== $recordsPerPage && $obj['recordsPerPage'] = $recordsPerPage;

        return $obj;
    }

    /**
     * The 1-indexed page number to get. The default value is `1`.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj['page'] = $page;

        return $obj;
    }

    /**
     * The amount of records per page, limited to between 1 and 500 inclusive. The default value is `10`.
     */
    public function withRecordsPerPage(int $recordsPerPage): self
    {
        $obj = clone $this;
        $obj['recordsPerPage'] = $recordsPerPage;

        return $obj;
    }
}
