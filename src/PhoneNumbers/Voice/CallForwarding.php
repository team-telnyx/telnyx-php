<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Voice\CallForwarding\ForwardingType;

/**
 * The call forwarding settings for a phone number.
 *
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

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    #[Api(optional: true)]
    public ?bool $call_forwarding_enabled;

    /**
     * Call forwarding type. 'forwards_to' must be set for this to have an effect.
     *
     * @var value-of<ForwardingType>|null $forwarding_type
     */
    #[Api(enum: ForwardingType::class, optional: true)]
    public ?string $forwarding_type;

    /**
     * The phone number to which inbound calls to this number are forwarded. Inbound calls will not be forwarded if this field is left blank. If set, must be a +E.164-formatted phone number.
     */
    #[Api(optional: true)]
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
     * @param ForwardingType|value-of<ForwardingType> $forwarding_type
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

    /**
     * Indicates if call forwarding will be enabled for this number if forwards_to and forwarding_type are filled in. Defaults to true for backwards compatibility with APIV1 use of numbers endpoints.
     */
    public function withCallForwardingEnabled(bool $callForwardingEnabled): self
    {
        $obj = clone $this;
        $obj['call_forwarding_enabled'] = $callForwardingEnabled;

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
        $obj['forwarding_type'] = $forwardingType;

        return $obj;
    }

    /**
     * The phone number to which inbound calls to this number are forwarded. Inbound calls will not be forwarded if this field is left blank. If set, must be a +E.164-formatted phone number.
     */
    public function withForwardsTo(string $forwardsTo): self
    {
        $obj = clone $this;
        $obj['forwards_to'] = $forwardsTo;

        return $obj;
    }
}
