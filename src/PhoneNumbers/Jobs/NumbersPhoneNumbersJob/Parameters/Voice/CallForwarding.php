<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type CallForwardingShape = array{
 *   callForwardingEnabled?: bool|null,
 *   forwardingType?: string|null,
 *   forwardsTo?: string|null,
 * }
 */
final class CallForwarding implements BaseModel
{
    /** @use SdkModel<CallForwardingShape> */
    use SdkModel;

    /**
     * Saved call_forwarding_enabled setting.
     */
    #[Optional('call_forwarding_enabled', nullable: true)]
    public ?bool $callForwardingEnabled;

    /**
     * Saved forwarding_type setting.
     */
    #[Optional('forwarding_type', nullable: true)]
    public ?string $forwardingType;

    /**
     * Saved forwards_to setting.
     */
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
     */
    public static function with(
        bool|Omitted|null $callForwardingEnabled = Omitted::VALUE,
        string|Omitted|null $forwardingType = Omitted::VALUE,
        string|Omitted|null $forwardsTo = Omitted::VALUE,
    ): self {
        $self = new self;

        Omitted::VALUE !== $callForwardingEnabled && $self['callForwardingEnabled'] = $callForwardingEnabled;
        Omitted::VALUE !== $forwardingType && $self['forwardingType'] = $forwardingType;
        Omitted::VALUE !== $forwardsTo && $self['forwardsTo'] = $forwardsTo;

        return $self;
    }

    /**
     * Saved call_forwarding_enabled setting.
     */
    public function withCallForwardingEnabled(
        ?bool $callForwardingEnabled
    ): self {
        $self = clone $this;
        $self['callForwardingEnabled'] = $callForwardingEnabled;

        return $self;
    }

    /**
     * Saved forwarding_type setting.
     */
    public function withForwardingType(?string $forwardingType): self
    {
        $self = clone $this;
        $self['forwardingType'] = $forwardingType;

        return $self;
    }

    /**
     * Saved forwards_to setting.
     */
    public function withForwardsTo(?string $forwardsTo): self
    {
        $self = clone $this;
        $self['forwardsTo'] = $forwardsTo;

        return $self;
    }
}
