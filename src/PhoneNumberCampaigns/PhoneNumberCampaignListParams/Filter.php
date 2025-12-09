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
 *   tcrBrandID?: string|null,
 *   tcrCampaignID?: string|null,
 *   telnyxBrandID?: string|null,
 *   telnyxCampaignID?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter results by the TCR Brand id.
     */
    #[Optional('tcr_brand_id')]
    public ?string $tcrBrandID;

    /**
     * Filter results by the TCR Campaign id.
     */
    #[Optional('tcr_campaign_id')]
    public ?string $tcrCampaignID;

    /**
     * Filter results by the Telnyx Brand id.
     */
    #[Optional('telnyx_brand_id')]
    public ?string $telnyxBrandID;

    /**
     * Filter results by the Telnyx Campaign id.
     */
    #[Optional('telnyx_campaign_id')]
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
        $self = new self;

        null !== $tcrBrandID && $self['tcrBrandID'] = $tcrBrandID;
        null !== $tcrCampaignID && $self['tcrCampaignID'] = $tcrCampaignID;
        null !== $telnyxBrandID && $self['telnyxBrandID'] = $telnyxBrandID;
        null !== $telnyxCampaignID && $self['telnyxCampaignID'] = $telnyxCampaignID;

        return $self;
    }

    /**
     * Filter results by the TCR Brand id.
     */
    public function withTcrBrandID(string $tcrBrandID): self
    {
        $self = clone $this;
        $self['tcrBrandID'] = $tcrBrandID;

        return $self;
    }

    /**
     * Filter results by the TCR Campaign id.
     */
    public function withTcrCampaignID(string $tcrCampaignID): self
    {
        $self = clone $this;
        $self['tcrCampaignID'] = $tcrCampaignID;

        return $self;
    }

    /**
     * Filter results by the Telnyx Brand id.
     */
    public function withTelnyxBrandID(string $telnyxBrandID): self
    {
        $self = clone $this;
        $self['telnyxBrandID'] = $telnyxBrandID;

        return $self;
    }

    /**
     * Filter results by the Telnyx Campaign id.
     */
    public function withTelnyxCampaignID(string $telnyxCampaignID): self
    {
        $self = clone $this;
        $self['telnyxCampaignID'] = $telnyxCampaignID;

        return $self;
    }
}
