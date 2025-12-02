<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\UnwrapWebhookEvent;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\UnwrapWebhookEvent\CampaignSuspendedEvent\Status;
use Telnyx\Webhooks\UnwrapWebhookEvent\CampaignSuspendedEvent\Type;

/**
 * @phpstan-type CampaignSuspendedEventShape = array{
 *   campaignId?: string|null,
 *   description?: string|null,
 *   status?: value-of<Status>|null,
 *   type?: value-of<Type>|null,
 * }
 */
final class CampaignSuspendedEvent implements BaseModel
{
    /** @use SdkModel<CampaignSuspendedEventShape> */
    use SdkModel;

    /**
     * The ID of the campaign.
     */
    #[Api(optional: true)]
    public ?string $campaignId;

    /**
     * Description of the event.
     */
    #[Api(optional: true)]
    public ?string $description;

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
        ?string $campaignId = null,
        ?string $description = null,
        Status|string|null $status = null,
        Type|string|null $type = null,
    ): self {
        $obj = new self;

        null !== $campaignId && $obj->campaignId = $campaignId;
        null !== $description && $obj->description = $description;
        null !== $status && $obj['status'] = $status;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * The ID of the campaign.
     */
    public function withCampaignID(string $campaignID): self
    {
        $obj = clone $this;
        $obj->campaignId = $campaignID;

        return $obj;
    }

    /**
     * Description of the event.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

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
