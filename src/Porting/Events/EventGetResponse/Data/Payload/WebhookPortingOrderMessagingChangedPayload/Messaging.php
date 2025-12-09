<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventGetResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload\Messaging\MessagingPortStatus;

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
     * Indicates whether the porting order is messaging capable.
     */
    public function withMessagingCapable(bool $messagingCapable): self
    {
        $obj = clone $this;
        $obj['messagingCapable'] = $messagingCapable;

        return $obj;
    }

    /**
     * Indicates whether the messaging port is completed.
     */
    public function withMessagingPortCompleted(
        bool $messagingPortCompleted
    ): self {
        $obj = clone $this;
        $obj['messagingPortCompleted'] = $messagingPortCompleted;

        return $obj;
    }

    /**
     * Indicates the messaging port status of the porting order.
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
