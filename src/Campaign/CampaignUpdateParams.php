<?php

declare(strict_types=1);

namespace Telnyx\Campaign;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a campaign's properties by `campaignId`. **Please note:** only sample messages are editable.
 *
 * @see Telnyx\Campaign->update
 *
 * @phpstan-type CampaignUpdateParamsShape = array{
 *   autoRenewal?: bool,
 *   helpMessage?: string,
 *   messageFlow?: string,
 *   resellerId?: string,
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
    #[Api(optional: true)]
    public ?bool $autoRenewal;

    /**
     * Help message of the campaign.
     */
    #[Api(optional: true)]
    public ?string $helpMessage;

    /**
     * Message flow description.
     */
    #[Api(optional: true)]
    public ?string $messageFlow;

    /**
     * Alphanumeric identifier of the reseller that you want to associate with this campaign.
     */
    #[Api(optional: true)]
    public ?string $resellerId;

    /**
     * Message sample. Some campaign tiers require 1 or more message samples.
     */
    #[Api(optional: true)]
    public ?string $sample1;

    /**
     * Message sample. Some campaign tiers require 2 or more message samples.
     */
    #[Api(optional: true)]
    public ?string $sample2;

    /**
     * Message sample. Some campaign tiers require 3 or more message samples.
     */
    #[Api(optional: true)]
    public ?string $sample3;

    /**
     * Message sample. Some campaign tiers require 4 or more message samples.
     */
    #[Api(optional: true)]
    public ?string $sample4;

    /**
     * Message sample. Some campaign tiers require 5 or more message samples.
     */
    #[Api(optional: true)]
    public ?string $sample5;

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
        ?bool $autoRenewal = null,
        ?string $helpMessage = null,
        ?string $messageFlow = null,
        ?string $resellerId = null,
        ?string $sample1 = null,
        ?string $sample2 = null,
        ?string $sample3 = null,
        ?string $sample4 = null,
        ?string $sample5 = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        null !== $autoRenewal && $obj->autoRenewal = $autoRenewal;
        null !== $helpMessage && $obj->helpMessage = $helpMessage;
        null !== $messageFlow && $obj->messageFlow = $messageFlow;
        null !== $resellerId && $obj->resellerId = $resellerId;
        null !== $sample1 && $obj->sample1 = $sample1;
        null !== $sample2 && $obj->sample2 = $sample2;
        null !== $sample3 && $obj->sample3 = $sample3;
        null !== $sample4 && $obj->sample4 = $sample4;
        null !== $sample5 && $obj->sample5 = $sample5;
        null !== $webhookFailoverURL && $obj->webhookFailoverURL = $webhookFailoverURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * Help message of the campaign.
     */
    public function withAutoRenewal(bool $autoRenewal): self
    {
        $obj = clone $this;
        $obj->autoRenewal = $autoRenewal;

        return $obj;
    }

    /**
     * Help message of the campaign.
     */
    public function withHelpMessage(string $helpMessage): self
    {
        $obj = clone $this;
        $obj->helpMessage = $helpMessage;

        return $obj;
    }

    /**
     * Message flow description.
     */
    public function withMessageFlow(string $messageFlow): self
    {
        $obj = clone $this;
        $obj->messageFlow = $messageFlow;

        return $obj;
    }

    /**
     * Alphanumeric identifier of the reseller that you want to associate with this campaign.
     */
    public function withResellerID(string $resellerID): self
    {
        $obj = clone $this;
        $obj->resellerId = $resellerID;

        return $obj;
    }

    /**
     * Message sample. Some campaign tiers require 1 or more message samples.
     */
    public function withSample1(string $sample1): self
    {
        $obj = clone $this;
        $obj->sample1 = $sample1;

        return $obj;
    }

    /**
     * Message sample. Some campaign tiers require 2 or more message samples.
     */
    public function withSample2(string $sample2): self
    {
        $obj = clone $this;
        $obj->sample2 = $sample2;

        return $obj;
    }

    /**
     * Message sample. Some campaign tiers require 3 or more message samples.
     */
    public function withSample3(string $sample3): self
    {
        $obj = clone $this;
        $obj->sample3 = $sample3;

        return $obj;
    }

    /**
     * Message sample. Some campaign tiers require 4 or more message samples.
     */
    public function withSample4(string $sample4): self
    {
        $obj = clone $this;
        $obj->sample4 = $sample4;

        return $obj;
    }

    /**
     * Message sample. Some campaign tiers require 5 or more message samples.
     */
    public function withSample5(string $sample5): self
    {
        $obj = clone $this;
        $obj->sample5 = $sample5;

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
