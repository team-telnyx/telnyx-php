<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload\Messaging;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload\Messaging\MessagingPortStatus;

/**
 * The webhook payload for the porting_order.messaging_changed event.
 *
 * @phpstan-type WebhookPortingOrderMessagingChangedPayloadShape = array{
 *   id?: string|null,
 *   customerReference?: string|null,
 *   messaging?: Messaging|null,
 *   supportKey?: string|null,
 * }
 */
final class WebhookPortingOrderMessagingChangedPayload implements BaseModel
{
    /** @use SdkModel<WebhookPortingOrderMessagingChangedPayloadShape> */
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
     * The messaging portability status of the porting order.
     */
    #[Optional]
    public ?Messaging $messaging;

    /**
     * Identifies the support key associated with the porting order.
     */
    #[Optional('support_key')]
    public ?string $supportKey;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Messaging|array{
     *   enableMessaging?: bool|null,
     *   messagingCapable?: bool|null,
     *   messagingPortCompleted?: bool|null,
     *   messagingPortStatus?: value-of<MessagingPortStatus>|null,
     * } $messaging
     */
    public static function with(
        ?string $id = null,
        ?string $customerReference = null,
        Messaging|array|null $messaging = null,
        ?string $supportKey = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $messaging && $obj['messaging'] = $messaging;
        null !== $supportKey && $obj['supportKey'] = $supportKey;

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
     * The messaging portability status of the porting order.
     *
     * @param Messaging|array{
     *   enableMessaging?: bool|null,
     *   messagingCapable?: bool|null,
     *   messagingPortCompleted?: bool|null,
     *   messagingPortStatus?: value-of<MessagingPortStatus>|null,
     * } $messaging
     */
    public function withMessaging(Messaging|array $messaging): self
    {
        $obj = clone $this;
        $obj['messaging'] = $messaging;

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
}
