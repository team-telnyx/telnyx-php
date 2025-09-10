<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberCampaigns\PhoneNumberCampaignListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[telnyx_campaign_id], filter[telnyx_brand_id], filter[tcr_campaign_id], filter[tcr_brand_id].
 *
 * @phpstan-type filter_alias = array{
 *   tcrBrandID?: string|null,
 *   tcrCampaignID?: string|null,
 *   telnyxBrandID?: string|null,
 *   telnyxCampaignID?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter results by the TCR Brand id.
     */
    #[Api('tcr_brand_id', optional: true)]
    public ?string $tcrBrandID;

    /**
     * Filter results by the TCR Campaign id.
     */
    #[Api('tcr_campaign_id', optional: true)]
    public ?string $tcrCampaignID;

    /**
     * Filter results by the Telnyx Brand id.
     */
    #[Api('telnyx_brand_id', optional: true)]
    public ?string $telnyxBrandID;

    /**
     * Filter results by the Telnyx Campaign id.
     */
    #[Api('telnyx_campaign_id', optional: true)]
    public ?string $telnyxCampaignID;

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
        ?string $tcrBrandID = null,
        ?string $tcrCampaignID = null,
        ?string $telnyxBrandID = null,
        ?string $telnyxCampaignID = null,
    ): self {
        $obj = new self;

        null !== $tcrBrandID && $obj->tcrBrandID = $tcrBrandID;
        null !== $tcrCampaignID && $obj->tcrCampaignID = $tcrCampaignID;
        null !== $telnyxBrandID && $obj->telnyxBrandID = $telnyxBrandID;
        null !== $telnyxCampaignID && $obj->telnyxCampaignID = $telnyxCampaignID;

        return $obj;
    }

    /**
     * Filter results by the TCR Brand id.
     */
    public function withTcrBrandID(string $tcrBrandID): self
    {
        $obj = clone $this;
        $obj->tcrBrandID = $tcrBrandID;

        return $obj;
    }

    /**
     * Filter results by the TCR Campaign id.
     */
    public function withTcrCampaignID(string $tcrCampaignID): self
    {
        $obj = clone $this;
        $obj->tcrCampaignID = $tcrCampaignID;

        return $obj;
    }

    /**
     * Filter results by the Telnyx Brand id.
     */
    public function withTelnyxBrandID(string $telnyxBrandID): self
    {
        $obj = clone $this;
        $obj->telnyxBrandID = $telnyxBrandID;

        return $obj;
    }

    /**
     * Filter results by the Telnyx Campaign id.
     */
    public function withTelnyxCampaignID(string $telnyxCampaignID): self
    {
        $obj = clone $this;
        $obj->telnyxCampaignID = $telnyxCampaignID;

        return $obj;
    }
}
