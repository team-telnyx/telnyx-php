<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse\Data\CallForwarding\ForwardingType;

/**
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

    #[Optional('call_forwarding_enabled')]
    public ?bool $callForwardingEnabled;

    /** @var value-of<ForwardingType>|null $forwardingType */
    #[Optional('forwarding_type', enum: ForwardingType::class, nullable: true)]
    public ?string $forwardingType;

    #[Optional('forwards_to', nullable: true)]
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
     * @param ForwardingType|value-of<ForwardingType>|null $forwardingType
     */
    public static function with(
        ?bool $callForwardingEnabled = null,
        ForwardingType|string|null $forwardingType = null,
        ?string $forwardsTo = null,
    ): self {
        $self = new self;

        null !== $callForwardingEnabled && $self['callForwardingEnabled'] = $callForwardingEnabled;
        null !== $forwardingType && $self['forwardingType'] = $forwardingType;
        null !== $forwardsTo && $self['forwardsTo'] = $forwardsTo;

        return $self;
    }

    public function withCallForwardingEnabled(bool $callForwardingEnabled): self
    {
        $self = clone $this;
        $self['callForwardingEnabled'] = $callForwardingEnabled;

        return $self;
    }

    /**
     * @param ForwardingType|value-of<ForwardingType>|null $forwardingType
     */
    public function withForwardingType(
        ForwardingType|string|null $forwardingType
    ): self {
        $self = clone $this;
        $self['forwardingType'] = $forwardingType;

        return $self;
    }

    public function withForwardsTo(?string $forwardsTo): self
    {
        $self = clone $this;
        $self['forwardsTo'] = $forwardsTo;

        return $self;
    }
}
