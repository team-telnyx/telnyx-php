<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\PartnerCampaigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update campaign details by `campaignId`. **Please note:** Only webhook urls are editable.
 *
 * @see Telnyx\Services\Messaging10dlc\PartnerCampaignsService::update()
 *
 * @phpstan-type PartnerCampaignUpdateParamsShape = array{
 *   webhookFailoverURL?: string|null, webhookURL?: string|null
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
    #[Optional]
    public ?string $webhookFailoverURL;

    /**
     * Webhook to which campaign status updates are sent.
     */
    #[Optional]
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
        $self = new self;

        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Webhook failover to which campaign status updates are sent.
     */
    public function withWebhookFailoverURL(string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * Webhook to which campaign status updates are sent.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
