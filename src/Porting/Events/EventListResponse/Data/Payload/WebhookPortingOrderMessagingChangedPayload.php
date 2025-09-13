<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Data\Payload;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload\Messaging;

/**
 * The webhook payload for the porting_order.messaging_changed event.
 *
 * @phpstan-type webhook_porting_order_messaging_changed_payload = array{
 *   id?: string,
 *   customerReference?: string,
 *   messaging?: Messaging,
 *   supportKey?: string,
 * }
 */
final class WebhookPortingOrderMessagingChangedPayload implements BaseModel
{
    /** @use SdkModel<webhook_porting_order_messaging_changed_payload> */
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
     * The messaging portability status of the porting order.
     */
    #[Api(optional: true)]
    public ?Messaging $messaging;

    /**
     * Identifies the support key associated with the porting order.
     */
    #[Api('support_key', optional: true)]
    public ?string $supportKey;

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
        ?Messaging $messaging = null,
        ?string $supportKey = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $messaging && $obj->messaging = $messaging;
        null !== $supportKey && $obj->supportKey = $supportKey;

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
     * The messaging portability status of the porting order.
     */
    public function withMessaging(Messaging $messaging): self
    {
        $obj = clone $this;
        $obj->messaging = $messaging;

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
}
