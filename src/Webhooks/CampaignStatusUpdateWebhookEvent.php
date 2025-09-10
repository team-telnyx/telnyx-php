<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type campaign_status_update_webhook_event = array{
 *   brandID?: string|null,
 *   campaignID?: string|null,
 *   createDate?: string|null,
 *   cspID?: string|null,
 *   isTMobileRegistered?: bool|null,
 * }
 */
final class CampaignStatusUpdateWebhookEvent implements BaseModel
{
    /** @use SdkModel<campaign_status_update_webhook_event> */
    use SdkModel;

    /**
     * Brand ID associated with the campaign.
     */
    #[Api('brandId', optional: true)]
    public ?string $brandID;

    /**
     * The ID of the campaign.
     */
    #[Api('campaignId', optional: true)]
    public ?string $campaignID;

    /**
     * Unix timestamp when campaign was created.
     */
    #[Api(optional: true)]
    public ?string $createDate;

    /**
     * Alphanumeric identifier of the CSP associated with this campaign.
     */
    #[Api('cspId', optional: true)]
    public ?string $cspID;

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
        ?string $brandID = null,
        ?string $campaignID = null,
        ?string $createDate = null,
        ?string $cspID = null,
        ?bool $isTMobileRegistered = null,
    ): self {
        $obj = new self;

        null !== $brandID && $obj->brandID = $brandID;
        null !== $campaignID && $obj->campaignID = $campaignID;
        null !== $createDate && $obj->createDate = $createDate;
        null !== $cspID && $obj->cspID = $cspID;
        null !== $isTMobileRegistered && $obj->isTMobileRegistered = $isTMobileRegistered;

        return $obj;
    }

    /**
     * Brand ID associated with the campaign.
     */
    public function withBrandID(string $brandID): self
    {
        $obj = clone $this;
        $obj->brandID = $brandID;

        return $obj;
    }

    /**
     * The ID of the campaign.
     */
    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj->campaignID = $campaignID;

        return $obj;
    }

    /**
     * Unix timestamp when campaign was created.
     */
    public function withCreateDate(string $createDate): self
    {
        $obj = clone $this;
        $obj->createDate = $createDate;

        return $obj;
    }

    /**
     * Alphanumeric identifier of the CSP associated with this campaign.
     */
    public function withCspID(string $cspID): self
    {
        $obj = clone $this;
        $obj->cspID = $cspID;

        return $obj;
    }

    /**
     * Indicates whether the campaign is registered with T-Mobile.
     */
    public function withIsTMobileRegistered(bool $isTMobileRegistered): self
    {
        $obj = clone $this;
        $obj->isTMobileRegistered = $isTMobileRegistered;

        return $obj;
    }
}
