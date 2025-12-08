<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent\Status;
use Telnyx\Webhooks\CampaignStatusUpdateWebhookEvent\Type;

/**
 * @phpstan-type CampaignStatusUpdateWebhookEventShape = array{
 *   brandId?: string|null,
 *   campaignId?: string|null,
 *   createDate?: string|null,
 *   cspId?: string|null,
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
     * Description of the event.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Indicates whether the campaign is registered with T-Mobile.
     */
    #[Api(optional: true)]
    public ?bool $isTMobileRegistered;

    /**
     * The status of the campaign.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /** @var value-of<Type>|null $type */
    #[Api(enum: Type::class, optional: true)]
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
        ?string $brandId = null,
        ?string $campaignId = null,
        ?string $createDate = null,
        ?string $cspId = null,
        ?string $description = null,
        ?bool $isTMobileRegistered = null,
        Status|string|null $status = null,
        Type|string|null $type = null,
    ): self {
        $obj = new self;

        null !== $brandId && $obj['brandId'] = $brandId;
        null !== $campaignId && $obj['campaignId'] = $campaignId;
        null !== $createDate && $obj['createDate'] = $createDate;
        null !== $cspId && $obj['cspId'] = $cspId;
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
