<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voice\CallForwarding\ForwardingType;

/**
 * The call forwarding settings for a phone number.
 *
 * @phpstan-type CallForwardingShape = array{
 *   callForwardingEnabled?: bool|null,
 *   forwardingType?: value-of<ForwardingType>|null,
 *   forwardsTo?: string|null,
 * }
 */
final class CallForwarding implements BaseModel
{
    /** @use SdkModel<CallForwardingShape> */
    use SdkModel;

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    #[Optional('call_forwarding_enabled')]
    public ?bool $callForwardingEnabled;

    /**
     * Call forwarding type. 'forwards_to' must be set for this to have an effect.
     *
     * @var value-of<ForwardingType>|null $forwardingType
     */
    #[Optional('forwarding_type', enum: ForwardingType::class)]
    public ?string $forwardingType;

    /**
     * The phone number to which inbound calls to this number are forwarded. Inbound calls will not be forwarded if this field is left blank. If set, must be a +E.164-formatted phone number.
     */
    #[Optional('forwards_to')]
    public ?string $forwardsTo;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ForwardingType|value-of<ForwardingType> $forwardingType
     */
    public static function with(
        ?bool $callForwardingEnabled = null,
        ForwardingType|string|null $forwardingType = null,
        ?string $forwardsTo = null,
    ): self {
        $obj = new self;

        null !== $callForwardingEnabled && $obj['callForwardingEnabled'] = $callForwardingEnabled;
        null !== $forwardingType && $obj['forwardingType'] = $forwardingType;
        null !== $forwardsTo && $obj['forwardsTo'] = $forwardsTo;

        return $obj;
    }

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    public function withCallForwardingEnabled(bool $callForwardingEnabled): self
    {
        $obj = clone $this;
        $obj['callForwardingEnabled'] = $callForwardingEnabled;

        return $obj;
    }

    /**
     * Call forwarding type. 'forwards_to' must be set for this to have an effect.
     *
     * @param ForwardingType|value-of<ForwardingType> $forwardingType
     */
    public function withForwardingType(
        ForwardingType|string $forwardingType
    ): self {
        $obj = clone $this;
        $obj['forwardingType'] = $forwardingType;

        return $obj;
    }

    /**
     * The phone number to which inbound calls to this number are forwarded. Inbound calls will not be forwarded if this field is left blank. If set, must be a +E.164-formatted phone number.
     */
    public function withForwardsTo(string $forwardsTo): self
    {
        $obj = clone $this;
        $obj['forwardsTo'] = $forwardsTo;

        return $obj;
    }
}
