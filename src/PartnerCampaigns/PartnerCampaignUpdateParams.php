<?php

declare(strict_types=1);

namespace Telnyx\PartnerCampaigns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update campaign details by `campaignId`. **Please note:** Only webhook urls are editable.
 *
 * @see Telnyx\PartnerCampaignsService::update()
 *
 * @phpstan-type PartnerCampaignUpdateParamsShape = array{
 *   webhookFailoverURL?: string, webhookURL?: string
 * }
 */
final class PartnerCampaignUpdateParams implements BaseModel
{
    /** @use SdkModel<PartnerCampaignUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Webhook failover to which campaign status updates are sent.
     */
    #[Api(optional: true)]
    public ?string $webhookFailoverURL;

    /**
     * Webhook to which campaign status updates are sent.
     */
    #[Api(optional: true)]
    public ?string $webhookURL;

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
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null
    ): self {
        $obj = new self;

        null !== $webhookFailoverURL && $obj->webhookFailoverURL = $webhookFailoverURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * Webhook failover to which campaign status updates are sent.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj->webhookFailoverURL = $webhookFailoverURL;

        return $obj;
    }

    /**
     * Webhook to which campaign status updates are sent.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
