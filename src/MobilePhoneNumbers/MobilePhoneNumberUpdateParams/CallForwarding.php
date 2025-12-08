<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallForwarding\ForwardingType;

/**
 * @phpstan-type CallForwardingShape = array{
 *   call_forwarding_enabled?: bool|null,
 *   forwarding_type?: value-of<ForwardingType>|null,
 *   forwards_to?: string|null,
 * }
 */
final class CallForwarding implements BaseModel
{
    /** @use SdkModel<CallForwardingShape> */
    use SdkModel;

    #[Optional]
    public ?bool $call_forwarding_enabled;

    /** @var value-of<ForwardingType>|null $forwarding_type */
    #[Optional(enum: ForwardingType::class, nullable: true)]
    public ?string $forwarding_type;

    #[Optional(nullable: true)]
    public ?string $forwards_to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ForwardingType|value-of<ForwardingType>|null $forwarding_type
     */
    public static function with(
        ?bool $call_forwarding_enabled = null,
        ForwardingType|string|null $forwarding_type = null,
        ?string $forwards_to = null,
    ): self {
        $obj = new self;

        null !== $call_forwarding_enabled && $obj['call_forwarding_enabled'] = $call_forwarding_enabled;
        null !== $forwarding_type && $obj['forwarding_type'] = $forwarding_type;
        null !== $forwards_to && $obj['forwards_to'] = $forwards_to;

        return $obj;
    }

    public function withCallForwardingEnabled(bool $callForwardingEnabled): self
    {
        $obj = clone $this;
        $obj['call_forwarding_enabled'] = $callForwardingEnabled;

        return $obj;
    }

    /**
     * @param ForwardingType|value-of<ForwardingType>|null $forwardingType
     */
    public function withForwardingType(
        ForwardingType|string|null $forwardingType
    ): self {
        $obj = clone $this;
        $obj['forwarding_type'] = $forwardingType;

        return $obj;
    }

    public function withForwardsTo(?string $forwardsTo): self
    {
        $obj = clone $this;
        $obj['forwards_to'] = $forwardsTo;

        return $obj;
    }
}
