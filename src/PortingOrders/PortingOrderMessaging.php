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
 *   enableMessaging?: bool|null,
 *   messagingCapable?: bool|null,
 *   messagingPortCompleted?: bool|null,
 *   messagingPortStatus?: value-of<MessagingPortStatus>|null,
 * }
 */
final class PortingOrderMessaging implements BaseModel
{
    /** @use SdkModel<PortingOrderMessagingShape> */
    use SdkModel;

    /**
     * Indicates whether Telnyx will port messaging capabilities from the losing carrier. If false, any messaging capabilities will stay with their current provider.
     */
    #[Optional('enable_messaging')]
    public ?bool $enableMessaging;

    /**
     * Indicates whether the porting order can also port messaging capabilities.
     */
    #[Optional('messaging_capable')]
    public ?bool $messagingCapable;

    /**
     * Indicates whether the messaging porting has been completed.
     */
    #[Optional('messaging_port_completed')]
    public ?bool $messagingPortCompleted;

    /**
     * The current status of the messaging porting.
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
        $obj = new self;

        null !== $enableMessaging && $obj['enableMessaging'] = $enableMessaging;
        null !== $messagingCapable && $obj['messagingCapable'] = $messagingCapable;
        null !== $messagingPortCompleted && $obj['messagingPortCompleted'] = $messagingPortCompleted;
        null !== $messagingPortStatus && $obj['messagingPortStatus'] = $messagingPortStatus;

        return $obj;
    }

    /**
     * Indicates whether Telnyx will port messaging capabilities from the losing carrier. If false, any messaging capabilities will stay with their current provider.
     */
    public function withEnableMessaging(bool $enableMessaging): self
    {
        $obj = clone $this;
        $obj['enableMessaging'] = $enableMessaging;

        return $obj;
    }

    /**
     * Indicates whether the porting order can also port messaging capabilities.
     */
    public function withMessagingCapable(bool $messagingCapable): self
    {
        $obj = clone $this;
        $obj['messagingCapable'] = $messagingCapable;

        return $obj;
    }

    /**
     * Indicates whether the messaging porting has been completed.
     */
    public function withMessagingPortCompleted(
        bool $messagingPortCompleted
    ): self {
        $obj = clone $this;
        $obj['messagingPortCompleted'] = $messagingPortCompleted;

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
        $obj['messagingPortStatus'] = $messagingPortStatus;

        return $obj;
    }
}
