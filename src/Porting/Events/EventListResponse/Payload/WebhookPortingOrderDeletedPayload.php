<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The webhook payload for the porting_order.deleted event.
 *
 * @phpstan-type WebhookPortingOrderDeletedPayloadShape = array{
 *   id?: string|null,
 *   customerReference?: string|null,
 *   deletedAt?: \DateTimeInterface|null,
 * }
 */
final class WebhookPortingOrderDeletedPayload implements BaseModel
{
    /** @use SdkModel<WebhookPortingOrderDeletedPayloadShape> */
    use SdkModel;

    /**
     * Identifies the porting order that was deleted.
     */
    #[Optional]
    public ?string $id;

    /**
     * Identifies the customer reference associated with the porting order.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * ISO 8601 formatted date indicating when the porting order was deleted.
     */
    #[Optional('deleted_at')]
    public ?\DateTimeInterface $deletedAt;

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
        ?\DateTimeInterface $deletedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $deletedAt && $self['deletedAt'] = $deletedAt;

        return $self;
    }

    /**
     * Identifies the porting order that was deleted.
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
     * ISO 8601 formatted date indicating when the porting order was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $self = clone $this;
        $self['deletedAt'] = $deletedAt;

        return $self;
    }
}
