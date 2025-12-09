<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams\CallForwarding\ForwardingType;

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
        $obj = new self;

        null !== $callForwardingEnabled && $obj['callForwardingEnabled'] = $callForwardingEnabled;
        null !== $forwardingType && $obj['forwardingType'] = $forwardingType;
        null !== $forwardsTo && $obj['forwardsTo'] = $forwardsTo;

        return $obj;
    }

    public function withCallForwardingEnabled(bool $callForwardingEnabled): self
    {
        $obj = clone $this;
        $obj['callForwardingEnabled'] = $callForwardingEnabled;

        return $obj;
    }

    /**
     * @param ForwardingType|value-of<ForwardingType>|null $forwardingType
     */
    public function withForwardingType(
        ForwardingType|string|null $forwardingType
    ): self {
        $obj = clone $this;
        $obj['forwardingType'] = $forwardingType;

        return $obj;
    }

    public function withForwardsTo(?string $forwardsTo): self
    {
        $obj = clone $this;
        $obj['forwardsTo'] = $forwardsTo;

        return $obj;
    }
}
