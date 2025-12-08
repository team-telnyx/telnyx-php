<?php

declare(strict_types=1);

namespace Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Porting\Events\EventListResponse\Data\Payload\WebhookPortingOrderMessagingChangedPayload\Messaging\MessagingPortStatus;

/**
 * The messaging portability status of the porting order.
 *
 * @phpstan-type MessagingShape = array{
 *   enable_messaging?: bool|null,
 *   messaging_capable?: bool|null,
 *   messaging_port_completed?: bool|null,
 *   messaging_port_status?: value-of<MessagingPortStatus>|null,
 * }
 */
final class Messaging implements BaseModel
{
    /** @use SdkModel<MessagingShape> */
    use SdkModel;

    /**
     * Indicates whether Telnyx will port messaging capabilities from the losing carrier. If false, any messaging capabilities will stay with their current provider.
     */
    #[Optional]
    public ?bool $enable_messaging;

    /**
     * Indicates whether the porting order is messaging capable.
     */
    #[Optional]
    public ?bool $messaging_capable;

    /**
     * Indicates whether the messaging port is completed.
     */
    #[Optional]
    public ?bool $messaging_port_completed;

    /**
     * Indicates the messaging port status of the porting order.
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
     * Indicates whether the porting order is messaging capable.
     */
    public function withMessagingCapable(bool $messagingCapable): self
    {
        $obj = clone $this;
        $obj['messaging_capable'] = $messagingCapable;

        return $obj;
    }

    /**
     * Indicates whether the messaging port is completed.
     */
    public function withMessagingPortCompleted(
        bool $messagingPortCompleted
    ): self {
        $obj = clone $this;
        $obj['messaging_port_completed'] = $messagingPortCompleted;

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
        $obj['messaging_port_status'] = $messagingPortStatus;

        return $obj;
    }
}
