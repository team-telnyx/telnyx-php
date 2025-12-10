<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\PortingEventMessagingChangedPayload\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventListResponse\PortingEventMessagingChangedPayload\Payload\Messaging\MessagingPortStatus;

/**
 * The messaging portability status of the porting order.
 *
 * @phpstan-type MessagingShape = array{
 *   enableMessaging?: bool|null,
 *   messagingCapable?: bool|null,
 *   messagingPortCompleted?: bool|null,
 *   messagingPortStatus?: value-of<MessagingPortStatus>|null,
 * }
 */
final class Messaging implements BaseModel
{
    /** @use SdkModel<MessagingShape> */
    use SdkModel;

    /**
     * Indicates whether Telnyx will port messaging capabilities from the losing carrier. If false, any messaging capabilities will stay with their current provider.
     */
    #[Optional('enable_messaging')]
    public ?bool $enableMessaging;

    /**
     * Indicates whether the porting order is messaging capable.
     */
    #[Optional('messaging_capable')]
    public ?bool $messagingCapable;

    /**
     * Indicates whether the messaging port is completed.
     */
    #[Optional('messaging_port_completed')]
    public ?bool $messagingPortCompleted;

    /**
     * Indicates the messaging port status of the porting order.
     *
     * @var value-of<MessagingPortStatus>|null $messagingPortStatus
     */
    #[Optional('messaging_port_status', enum: MessagingPortStatus::class)]
    public ?string $messagingPortStatus;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MessagingPortStatus|value-of<MessagingPortStatus> $messagingPortStatus
     */
    public static function with(
        ?bool $enableMessaging = null,
        ?bool $messagingCapable = null,
        ?bool $messagingPortCompleted = null,
        MessagingPortStatus|string|null $messagingPortStatus = null,
    ): self {
        $self = new self;

        null !== $enableMessaging && $self['enableMessaging'] = $enableMessaging;
        null !== $messagingCapable && $self['messagingCapable'] = $messagingCapable;
        null !== $messagingPortCompleted && $self['messagingPortCompleted'] = $messagingPortCompleted;
        null !== $messagingPortStatus && $self['messagingPortStatus'] = $messagingPortStatus;

        return $self;
    }

    /**
     * Indicates whether Telnyx will port messaging capabilities from the losing carrier. If false, any messaging capabilities will stay with their current provider.
     */
    public function withEnableMessaging(bool $enableMessaging): self
    {
        $self = clone $this;
        $self['enableMessaging'] = $enableMessaging;

        return $self;
    }

    /**
     * Indicates whether the porting order is messaging capable.
     */
    public function withMessagingCapable(bool $messagingCapable): self
    {
        $self = clone $this;
        $self['messagingCapable'] = $messagingCapable;

        return $self;
    }

    /**
     * Indicates whether the messaging port is completed.
     */
    public function withMessagingPortCompleted(
        bool $messagingPortCompleted
    ): self {
        $self = clone $this;
        $self['messagingPortCompleted'] = $messagingPortCompleted;

        return $self;
    }

    /**
     * Indicates the messaging port status of the porting order.
     *
     * @param MessagingPortStatus|value-of<MessagingPortStatus> $messagingPortStatus
     */
    public function withMessagingPortStatus(
        MessagingPortStatus|string $messagingPortStatus
    ): self {
        $self = clone $this;
        $self['messagingPortStatus'] = $messagingPortStatus;

        return $self;
    }
}
