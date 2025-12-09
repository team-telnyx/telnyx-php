<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrdersExceptionType;
use Telnyx\PortingOrderStatus;
use Telnyx\PortingOrderStatus\Value;

/**
 * The webhook payload for the porting_order.status_changed event.
 *
 * @phpstan-type WebhookPortingOrderStatusChangedPayloadShape = array{
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
    /** @use SdkModel<WebhookPortingOrderStatusChangedPayloadShape> */
    use SdkModel;

    /**
     * Identifies the porting order that was moved.
     */
    #[Optional]
    public ?string $id;

    /**
     * Identifies the customer reference associated with the porting order.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Porting order status.
     */
    #[Optional]
    public ?PortingOrderStatus $status;

    /**
     * Identifies the support key associated with the porting order.
     */
    #[Optional('support_key')]
    public ?string $supportKey;

    /**
     * ISO 8601 formatted date indicating when the porting order was moved.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * The URL to send the webhook to.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrderStatus|array{
     *   details?: list<PortingOrdersExceptionType>|null, value?: value-of<Value>|null
     * } $status
     */
    public static function with(
        ?string $id = null,
        ?string $customerReference = null,
        PortingOrderStatus|array|null $status = null,
        ?string $supportKey = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $status && $obj['status'] = $status;
        null !== $supportKey && $obj['supportKey'] = $supportKey;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    /**
     * Identifies the porting order that was moved.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Identifies the customer reference associated with the porting order.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * Porting order status.
     *
     * @param PortingOrderStatus|array{
     *   details?: list<PortingOrdersExceptionType>|null, value?: value-of<Value>|null
     * } $status
     */
    public function withStatus(PortingOrderStatus|array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Identifies the support key associated with the porting order.
     */
    public function withSupportKey(string $supportKey): self
    {
        $obj = clone $this;
        $obj['supportKey'] = $supportKey;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the porting order was moved.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * The URL to send the webhook to.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
