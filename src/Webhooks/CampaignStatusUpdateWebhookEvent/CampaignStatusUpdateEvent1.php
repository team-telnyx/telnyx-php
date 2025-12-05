<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CampaignStatusUpdateEvent1Shape = array{
 *   brandId?: string|null,
 *   campaignId?: string|null,
 *   createDate?: string|null,
 *   cspId?: string|null,
 *   isTMobileRegistered?: bool|null,
 * }
 */
final class CampaignStatusUpdateEvent1 implements BaseModel
{
    /** @use SdkModel<CampaignStatusUpdateEvent1Shape> */
    use SdkModel;

    /**
     * Brand ID associated with the campaign.
     */
    #[Api(optional: true)]
    public ?string $brandId;

    /**
     * The ID of the campaign.
     */
    #[Api(optional: true)]
    public ?string $campaignId;

    /**
     * Unix timestamp when campaign was created.
     */
    #[Api(optional: true)]
    public ?string $createDate;

    /**
     * Alphanumeric identifier of the CSP associated with this campaign.
     */
    #[Api(optional: true)]
    public ?string $cspId;

    /**
     * Indicates whether the campaign is registered with T-Mobile.
     */
    #[Api(optional: true)]
    public ?bool $isTMobileRegistered;

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
        ?string $brandId = null,
        ?string $campaignId = null,
        ?string $createDate = null,
        ?string $cspId = null,
        ?bool $isTMobileRegistered = null,
    ): self {
        $obj = new self;

        null !== $brandId && $obj['brandId'] = $brandId;
        null !== $campaignId && $obj['campaignId'] = $campaignId;
        null !== $createDate && $obj['createDate'] = $createDate;
        null !== $cspId && $obj['cspId'] = $cspId;
        null !== $isTMobileRegistered && $obj['isTMobileRegistered'] = $isTMobileRegistered;

        return $obj;
    }

    /**
     * Brand ID associated with the campaign.
     */
    public function withBrandID(string $brandID): self
    {
        $obj = clone $this;
        $obj['brandId'] = $brandID;

        return $obj;
    }

    /**
     * The ID of the campaign.
     */
    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj['campaignId'] = $campaignID;

        return $obj;
    }

    /**
     * Unix timestamp when campaign was created.
     */
    public function withCreateDate(string $createDate): self
    {
        $obj = clone $this;
        $obj['createDate'] = $createDate;

        return $obj;
    }

    /**
     * Alphanumeric identifier of the CSP associated with this campaign.
     */
    public function withCspID(string $cspID): self
    {
        $obj = clone $this;
        $obj['cspId'] = $cspID;

        return $obj;
    }

    /**
     * Indicates whether the campaign is registered with T-Mobile.
     */
    public function withIsTMobileRegistered(bool $isTMobileRegistered): self
    {
        $obj = clone $this;
        $obj['isTMobileRegistered'] = $isTMobileRegistered;

        return $obj;
    }
}
