<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\Campaign;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a campaign's properties by `campaignId`. **Please note:** only sample messages are editable.
 *
 * @see Telnyx\Services\Messaging10dlc\CampaignService::update()
 *
 * @phpstan-type CampaignUpdateParamsShape = array{
 *   autoRenewal?: bool,
 *   helpMessage?: string,
 *   messageFlow?: string,
 *   resellerID?: string,
 *   sample1?: string,
 *   sample2?: string,
 *   sample3?: string,
 *   sample4?: string,
 *   sample5?: string,
 *   webhookFailoverURL?: string,
 *   webhookURL?: string,
 * }
 */
final class CampaignUpdateParams implements BaseModel
{
    /** @use SdkModel<CampaignUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Help message of the campaign.
     */
    #[Optional]
    public ?bool $autoRenewal;

    /**
     * Help message of the campaign.
     */
    #[Optional]
    public ?string $helpMessage;

    /**
     * Message flow description.
     */
    #[Optional]
    public ?string $messageFlow;

    /**
     * Alphanumeric identifier of the reseller that you want to associate with this campaign.
     */
    #[Optional('resellerId')]
    public ?string $resellerID;

    /**
     * Message sample. Some campaign tiers require 1 or more message samples.
     */
    #[Optional]
    public ?string $sample1;

    /**
     * Message sample. Some campaign tiers require 2 or more message samples.
     */
    #[Optional]
    public ?string $sample2;

    /**
     * Message sample. Some campaign tiers require 3 or more message samples.
     */
    #[Optional]
    public ?string $sample3;

    /**
     * Message sample. Some campaign tiers require 4 or more message samples.
     */
    #[Optional]
    public ?string $sample4;

    /**
     * Message sample. Some campaign tiers require 5 or more message samples.
     */
    #[Optional]
    public ?string $sample5;

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
        ?bool $autoRenewal = null,
        ?string $helpMessage = null,
        ?string $messageFlow = null,
        ?string $resellerID = null,
        ?string $sample1 = null,
        ?string $sample2 = null,
        ?string $sample3 = null,
        ?string $sample4 = null,
        ?string $sample5 = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $autoRenewal && $self['autoRenewal'] = $autoRenewal;
        null !== $helpMessage && $self['helpMessage'] = $helpMessage;
        null !== $messageFlow && $self['messageFlow'] = $messageFlow;
        null !== $resellerID && $self['resellerID'] = $resellerID;
        null !== $sample1 && $self['sample1'] = $sample1;
        null !== $sample2 && $self['sample2'] = $sample2;
        null !== $sample3 && $self['sample3'] = $sample3;
        null !== $sample4 && $self['sample4'] = $sample4;
        null !== $sample5 && $self['sample5'] = $sample5;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Help message of the campaign.
     */
    public function withAutoRenewal(bool $autoRenewal): self
    {
        $self = clone $this;
        $self['autoRenewal'] = $autoRenewal;

        return $self;
    }

    /**
     * Help message of the campaign.
     */
    public function withHelpMessage(string $helpMessage): self
    {
        $self = clone $this;
        $self['helpMessage'] = $helpMessage;

        return $self;
    }

    /**
     * Message flow description.
     */
    public function withMessageFlow(string $messageFlow): self
    {
        $self = clone $this;
        $self['messageFlow'] = $messageFlow;

        return $self;
    }

    /**
     * Alphanumeric identifier of the reseller that you want to associate with this campaign.
     */
    public function withResellerID(string $resellerID): self
    {
        $self = clone $this;
        $self['resellerID'] = $resellerID;

        return $self;
    }

    /**
     * Message sample. Some campaign tiers require 1 or more message samples.
     */
    public function withSample1(string $sample1): self
    {
        $self = clone $this;
        $self['sample1'] = $sample1;

        return $self;
    }

    /**
     * Message sample. Some campaign tiers require 2 or more message samples.
     */
    public function withSample2(string $sample2): self
    {
        $self = clone $this;
        $self['sample2'] = $sample2;

        return $self;
    }

    /**
     * Message sample. Some campaign tiers require 3 or more message samples.
     */
    public function withSample3(string $sample3): self
    {
        $self = clone $this;
        $self['sample3'] = $sample3;

        return $self;
    }

    /**
     * Message sample. Some campaign tiers require 4 or more message samples.
     */
    public function withSample4(string $sample4): self
    {
        $self = clone $this;
        $self['sample4'] = $sample4;

        return $self;
    }

    /**
     * Message sample. Some campaign tiers require 5 or more message samples.
     */
    public function withSample5(string $sample5): self
    {
        $self = clone $this;
        $self['sample5'] = $sample5;

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
