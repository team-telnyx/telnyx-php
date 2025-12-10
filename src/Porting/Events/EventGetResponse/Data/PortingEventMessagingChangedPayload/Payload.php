<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\PortingEventMessagingChangedPayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventMessagingChangedPayload\Payload\Messaging;
use Telnyx\Porting\Events\EventGetResponse\Data\PortingEventMessagingChangedPayload\Payload\Messaging\MessagingPortStatus;

/**
 * The webhook payload for the porting_order.messaging_changed event.
 *
 * @phpstan-type PayloadShape = array{
 *   id?: string|null,
 *   customerReference?: string|null,
 *   messaging?: Messaging|null,
 *   supportKey?: string|null,
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
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $messaging && $self['messaging'] = $messaging;
        null !== $supportKey && $self['supportKey'] = $supportKey;

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
        $self = clone $this;
        $self['messaging'] = $messaging;

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
}
