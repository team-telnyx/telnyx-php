<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrderStatus;

/**
 * The webhook payload for the porting_order.status_changed event.
 *
 * @phpstan-type webhook_porting_order_status_changed_payload = array{
 *   id?: string|null,
 *   customerReference?: string|null,
 *   status?: PortingOrderStatus|null,
 *   supportKey?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   webhookURL?: string|null,
 * }
 */
final class WebhookPortingOrderStatusChangedPayload implements BaseModel
{
    /** @use SdkModel<webhook_porting_order_status_changed_payload> */
    use SdkModel;

    /**
     * Identifies the porting order that was moved.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Identifies the customer reference associated with the porting order.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Porting order status.
     */
    #[Api(optional: true)]
    public ?PortingOrderStatus $status;

    /**
     * Identifies the support key associated with the porting order.
     */
    #[Api('support_key', optional: true)]
    public ?string $supportKey;

    /**
     * ISO 8601 formatted date indicating when the porting order was moved.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The URL to send the webhook to.
     */
    #[Api('webhook_url', optional: true)]
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
        ?string $id = null,
        ?string $customerReference = null,
        ?PortingOrderStatus $status = null,
        ?string $supportKey = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $status && $obj->status = $status;
        null !== $supportKey && $obj->supportKey = $supportKey;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * Identifies the porting order that was moved.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Identifies the customer reference associated with the porting order.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Porting order status.
     */
    public function withStatus(PortingOrderStatus $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * Identifies the support key associated with the porting order.
     */
    public function withSupportKey(string $supportKey): self
    {
        $obj = clone $this;
        $obj->supportKey = $supportKey;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the porting order was moved.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * The URL to send the webhook to.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
