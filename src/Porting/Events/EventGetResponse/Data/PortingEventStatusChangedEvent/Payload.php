<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\PortingEventStatusChangedEvent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrderStatus;

/**
 * The webhook payload for the porting_order.status_changed event.
 *
 * @phpstan-import-type PortingOrderStatusShape from \Telnyx\PortingOrderStatus
 *
 * @phpstan-type PayloadShape = array{
 *   id?: string|null,
 *   customerReference?: string|null,
 *   status?: null|PortingOrderStatus|PortingOrderStatusShape,
 *   supportKey?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   webhookURL?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
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
     * @param PortingOrderStatus|PortingOrderStatusShape|null $status
     */
    public static function with(
        ?string $id = null,
        ?string $customerReference = null,
        PortingOrderStatus|array|null $status = null,
        ?string $supportKey = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $status && $self['status'] = $status;
        null !== $supportKey && $self['supportKey'] = $supportKey;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * Identifies the porting order that was moved.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Identifies the customer reference associated with the porting order.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Porting order status.
     *
     * @param PortingOrderStatus|PortingOrderStatusShape $status
     */
    public function withStatus(PortingOrderStatus|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Identifies the support key associated with the porting order.
     */
    public function withSupportKey(string $supportKey): self
    {
        $self = clone $this;
        $self['supportKey'] = $supportKey;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the porting order was moved.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The URL to send the webhook to.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
