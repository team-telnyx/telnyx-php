<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrderStatus;

/**
 * The webhook payload for the porting_order.status_changed event.
 *
 * @phpstan-type WebhookPortingOrderStatusChangedPayloadShape = array{
 *   id?: string|null,
 *   customer_reference?: string|null,
 *   status?: PortingOrderStatus|null,
 *   support_key?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 *   webhook_url?: string|null,
 * }
 */
final class WebhookPortingOrderStatusChangedPayload implements BaseModel
{
    /** @use SdkModel<WebhookPortingOrderStatusChangedPayloadShape> */
    use SdkModel;

    /**
     * Identifies the porting order that was moved.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Identifies the customer reference associated with the porting order.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * Porting order status.
     */
    #[Api(optional: true)]
    public ?PortingOrderStatus $status;

    /**
     * Identifies the support key associated with the porting order.
     */
    #[Api(optional: true)]
    public ?string $support_key;

    /**
     * ISO 8601 formatted date indicating when the porting order was moved.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    /**
     * The URL to send the webhook to.
     */
    #[Api(optional: true)]
    public ?string $webhook_url;

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
        ?string $customer_reference = null,
        ?PortingOrderStatus $status = null,
        ?string $support_key = null,
        ?\DateTimeInterface $updated_at = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $status && $obj->status = $status;
        null !== $support_key && $obj->support_key = $support_key;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $webhook_url && $obj->webhook_url = $webhook_url;

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
        $obj->customer_reference = $customerReference;

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
        $obj->support_key = $supportKey;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the porting order was moved.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    /**
     * The URL to send the webhook to.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhook_url = $webhookURL;

        return $obj;
    }
}
