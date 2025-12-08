<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[telnyx_campaign_id], filter[telnyx_brand_id], filter[tcr_campaign_id], filter[tcr_brand_id].
 *
 * @phpstan-type FilterShape = array{
 *   tcr_brand_id?: string|null,
 *   tcr_campaign_id?: string|null,
 *   telnyx_brand_id?: string|null,
 *   telnyx_campaign_id?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter results by the TCR Brand id.
     */
    #[Optional]
    public ?string $tcr_brand_id;

    /**
     * Filter results by the TCR Campaign id.
     */
    #[Optional]
    public ?string $tcr_campaign_id;

    /**
     * Filter results by the Telnyx Brand id.
     */
    #[Optional]
    public ?string $telnyx_brand_id;

    /**
     * Filter results by the Telnyx Campaign id.
     */
    #[Optional]
    public ?string $telnyx_campaign_id;

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
        ?string $tcr_brand_id = null,
        ?string $tcr_campaign_id = null,
        ?string $telnyx_brand_id = null,
        ?string $telnyx_campaign_id = null,
    ): self {
        $obj = new self;

        null !== $tcr_brand_id && $obj['tcr_brand_id'] = $tcr_brand_id;
        null !== $tcr_campaign_id && $obj['tcr_campaign_id'] = $tcr_campaign_id;
        null !== $telnyx_brand_id && $obj['telnyx_brand_id'] = $telnyx_brand_id;
        null !== $telnyx_campaign_id && $obj['telnyx_campaign_id'] = $telnyx_campaign_id;

        return $obj;
    }

    /**
     * Filter results by the TCR Brand id.
     */
    public function withTcrBrandID(string $tcrBrandID): self
    {
        $obj = clone $this;
        $obj['tcr_brand_id'] = $tcrBrandID;

        return $obj;
    }

    /**
     * Filter results by the TCR Campaign id.
     */
    public function withTcrCampaignID(string $tcrCampaignID): self
    {
        $obj = clone $this;
        $obj['tcr_campaign_id'] = $tcrCampaignID;

        return $obj;
    }

    /**
     * Filter results by the Telnyx Brand id.
     */
    public function withTelnyxBrandID(string $telnyxBrandID): self
    {
        $obj = clone $this;
        $obj['telnyx_brand_id'] = $telnyxBrandID;

        return $obj;
    }

    /**
     * Filter results by the Telnyx Campaign id.
     */
    public function withTelnyxCampaignID(string $telnyxCampaignID): self
    {
        $obj = clone $this;
        $obj['telnyx_campaign_id'] = $telnyxCampaignID;

        return $obj;
    }
}
