<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The webhook payload for the porting_order.deleted event.
 *
 * @phpstan-type WebhookPortingOrderDeletedPayloadShape = array{
 *   id?: string|null,
 *   customer_reference?: string|null,
 *   deleted_at?: \DateTimeInterface|null,
 * }
 */
final class WebhookPortingOrderDeletedPayload implements BaseModel
{
    /** @use SdkModel<WebhookPortingOrderDeletedPayloadShape> */
    use SdkModel;

    /**
     * Identifies the porting order that was deleted.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Identifies the customer reference associated with the porting order.
     */
    #[Api(optional: true)]
    public ?string $customer_reference;

    /**
     * ISO 8601 formatted date indicating when the porting order was deleted.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $deleted_at;

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
        ?\DateTimeInterface $deleted_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $customer_reference && $obj->customer_reference = $customer_reference;
        null !== $deleted_at && $obj->deleted_at = $deleted_at;

        return $obj;
    }

    /**
     * Identifies the porting order that was deleted.
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
     * ISO 8601 formatted date indicating when the porting order was deleted.
     */
    public function withDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $obj = clone $this;
        $obj->deleted_at = $deletedAt;

        return $obj;
    }
}
