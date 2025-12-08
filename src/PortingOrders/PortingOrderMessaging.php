<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderMessaging\MessagingPortStatus;

/**
 * Information about messaging porting process.
 *
 * @phpstan-type PortingOrderMessagingShape = array{
 *   enable_messaging?: bool|null,
 *   messaging_capable?: bool|null,
 *   messaging_port_completed?: bool|null,
 *   messaging_port_status?: value-of<MessagingPortStatus>|null,
 * }
 */
final class PortingOrderMessaging implements BaseModel
{
    /** @use SdkModel<PortingOrderMessagingShape> */
    use SdkModel;

    /**
     * Indicates whether Telnyx will port messaging capabilities from the losing carrier. If false, any messaging capabilities will stay with their current provider.
     */
    #[Optional]
    public ?bool $enable_messaging;

    /**
     * Indicates whether the porting order can also port messaging capabilities.
     */
    #[Optional]
    public ?bool $messaging_capable;

    /**
     * Indicates whether the messaging porting has been completed.
     */
    #[Optional]
    public ?bool $messaging_port_completed;

    /**
     * The current status of the messaging porting.
     *
     * @var value-of<MessagingPortStatus>|null $messaging_port_status
     */
    #[Optional(enum: MessagingPortStatus::class)]
    public ?string $messaging_port_status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param MessagingPortStatus|value-of<MessagingPortStatus> $messaging_port_status
     */
    public static function with(
        ?bool $enable_messaging = null,
        ?bool $messaging_capable = null,
        ?bool $messaging_port_completed = null,
        MessagingPortStatus|string|null $messaging_port_status = null,
    ): self {
        $obj = new self;

        null !== $enable_messaging && $obj['enable_messaging'] = $enable_messaging;
        null !== $messaging_capable && $obj['messaging_capable'] = $messaging_capable;
        null !== $messaging_port_completed && $obj['messaging_port_completed'] = $messaging_port_completed;
        null !== $messaging_port_status && $obj['messaging_port_status'] = $messaging_port_status;

        return $obj;
    }

    /**
     * Indicates whether Telnyx will port messaging capabilities from the losing carrier. If false, any messaging capabilities will stay with their current provider.
     */
    public function withEnableMessaging(bool $enableMessaging): self
    {
        $obj = clone $this;
        $obj['enable_messaging'] = $enableMessaging;

        return $obj;
    }

    /**
     * Indicates whether the porting order can also port messaging capabilities.
     */
    public function withMessagingCapable(bool $messagingCapable): self
    {
        $obj = clone $this;
        $obj['messaging_capable'] = $messagingCapable;

        return $obj;
    }

    /**
     * Indicates whether the messaging porting has been completed.
     */
    public function withMessagingPortCompleted(
        bool $messagingPortCompleted
    ): self {
        $obj = clone $this;
        $obj['messaging_port_completed'] = $messagingPortCompleted;

        return $obj;
    }

    /**
     * The current status of the messaging porting.
     *
     * @param MessagingPortStatus|value-of<MessagingPortStatus> $messagingPortStatus
     */
    public function withMessagingPortStatus(
        MessagingPortStatus|string $messagingPortStatus
    ): self {
        $obj = clone $this;
        $obj['messaging_port_status'] = $messagingPortStatus;

        return $obj;
    }
}
