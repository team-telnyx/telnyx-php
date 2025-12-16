<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent\Status;
use Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent\Type;

/**
 * @phpstan-type CampaignStatusUpdateWebhookEventShape = array{
 *   brandID?: string|null,
 *   campaignID?: string|null,
 *   createDate?: string|null,
 *   cspID?: string|null,
 *   description?: string|null,
 *   isTMobileRegistered?: bool|null,
 *   status?: null|Status|value-of<Status>,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class CampaignStatusUpdateWebhookEvent implements BaseModel
{
    /** @use SdkModel<CampaignStatusUpdateWebhookEventShape> */
    use SdkModel;

    /**
     * Brand ID associated with the campaign.
     */
    #[Optional('brandId')]
    public ?string $brandID;

    /**
     * The ID of the campaign.
     */
    #[Optional('campaignId')]
    public ?string $campaignID;

    /**
     * Unix timestamp when campaign was created.
     */
    #[Optional]
    public ?string $createDate;

    /**
     * Alphanumeric identifier of the CSP associated with this campaign.
     */
    #[Optional('cspId')]
    public ?string $cspID;

    /**
     * Description of the event.
     */
    #[Optional]
    public ?string $description;

    /**
     * Indicates whether the campaign is registered with T-Mobile.
     */
    #[Optional]
    public ?bool $isTMobileRegistered;

    /**
     * The status of the campaign.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $brandID = null,
        ?string $campaignID = null,
        ?string $createDate = null,
        ?string $cspID = null,
        ?string $description = null,
        ?bool $isTMobileRegistered = null,
        Status|string|null $status = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $brandID && $self['brandID'] = $brandID;
        null !== $campaignID && $self['campaignID'] = $campaignID;
        null !== $createDate && $self['createDate'] = $createDate;
        null !== $cspID && $self['cspID'] = $cspID;
        null !== $description && $self['description'] = $description;
        null !== $isTMobileRegistered && $self['isTMobileRegistered'] = $isTMobileRegistered;
        null !== $status && $self['status'] = $status;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Brand ID associated with the campaign.
     */
    public function withBrandID(string $brandID): self
    {
        $self = clone $this;
        $self['brandID'] = $brandID;

        return $self;
    }

    /**
     * The ID of the campaign.
     */
    public function withCampaignID(string $campaignID): self
    {
        $self = clone $this;
        $self['campaignID'] = $campaignID;

        return $self;
    }

    /**
     * Unix timestamp when campaign was created.
     */
    public function withCreateDate(string $createDate): self
    {
        $self = clone $this;
        $self['createDate'] = $createDate;

        return $self;
    }

    /**
     * Alphanumeric identifier of the CSP associated with this campaign.
     */
    public function withCspID(string $cspID): self
    {
        $self = clone $this;
        $self['cspID'] = $cspID;

        return $self;
    }

    /**
     * Description of the event.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Indicates whether the campaign is registered with T-Mobile.
     */
    public function withIsTMobileRegistered(bool $isTMobileRegistered): self
    {
        $self = clone $this;
        $self['isTMobileRegistered'] = $isTMobileRegistered;

        return $self;
    }

    /**
     * The status of the campaign.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
