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
 *   status?: value-of<Status>|null,
 *   type?: value-of<Type>|null,
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
        $obj = new self;

        null !== $brandID && $obj['brandID'] = $brandID;
        null !== $campaignID && $obj['campaignID'] = $campaignID;
        null !== $createDate && $obj['createDate'] = $createDate;
        null !== $cspID && $obj['cspID'] = $cspID;
        null !== $description && $obj['description'] = $description;
        null !== $isTMobileRegistered && $obj['isTMobileRegistered'] = $isTMobileRegistered;
        null !== $status && $obj['status'] = $status;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Brand ID associated with the campaign.
     */
    public function withBrandID(string $brandID): self
    {
        $obj = clone $this;
        $obj['brandID'] = $brandID;

        return $obj;
    }

    /**
     * The ID of the campaign.
     */
    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj['campaignID'] = $campaignID;

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
        $obj['cspID'] = $cspID;

        return $obj;
    }

    /**
     * Description of the event.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

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

    /**
     * The status of the campaign.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
