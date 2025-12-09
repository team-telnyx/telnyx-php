<?php

declare(strict_types=1);

namespace Telnyx\Reports\MdrUsageReports\MdrUsageReport;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ResultShape = array{
 *   carrierPassthroughFee?: string|null,
 *   connection?: string|null,
 *   cost?: string|null,
 *   currency?: string|null,
 *   delivered?: string|null,
 *   direction?: string|null,
 *   messageType?: string|null,
 *   parts?: string|null,
 *   product?: string|null,
 *   profileID?: string|null,
 *   received?: string|null,
 *   sent?: string|null,
 *   tags?: string|null,
 *   tnType?: string|null,
 * }
 */
final class Result implements BaseModel
{
    /** @use SdkModel<ResultShape> */
    use SdkModel;

    #[Optional('carrier_passthrough_fee')]
    public ?string $carrierPassthroughFee;

    #[Optional]
    public ?string $connection;

    #[Optional]
    public ?string $cost;

    #[Optional]
    public ?string $currency;

    #[Optional]
    public ?string $delivered;

    #[Optional]
    public ?string $direction;

    #[Optional('message_type')]
    public ?string $messageType;

    #[Optional]
    public ?string $parts;

    #[Optional]
    public ?string $product;

    #[Optional('profile_id')]
    public ?string $profileID;

    #[Optional]
    public ?string $received;

    #[Optional]
    public ?string $sent;

    #[Optional]
    public ?string $tags;

    #[Optional('tn_type')]
    public ?string $tnType;

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
        ?string $carrierPassthroughFee = null,
        ?string $connection = null,
        ?string $cost = null,
        ?string $currency = null,
        ?string $delivered = null,
        ?string $direction = null,
        ?string $messageType = null,
        ?string $parts = null,
        ?string $product = null,
        ?string $profileID = null,
        ?string $received = null,
        ?string $sent = null,
        ?string $tags = null,
        ?string $tnType = null,
    ): self {
        $self = new self;

        null !== $carrierPassthroughFee && $self['carrierPassthroughFee'] = $carrierPassthroughFee;
        null !== $connection && $self['connection'] = $connection;
        null !== $cost && $self['cost'] = $cost;
        null !== $currency && $self['currency'] = $currency;
        null !== $delivered && $self['delivered'] = $delivered;
        null !== $direction && $self['direction'] = $direction;
        null !== $messageType && $self['messageType'] = $messageType;
        null !== $parts && $self['parts'] = $parts;
        null !== $product && $self['product'] = $product;
        null !== $profileID && $self['profileID'] = $profileID;
        null !== $received && $self['received'] = $received;
        null !== $sent && $self['sent'] = $sent;
        null !== $tags && $self['tags'] = $tags;
        null !== $tnType && $self['tnType'] = $tnType;

        return $self;
    }

    public function withCarrierPassthroughFee(
        string $carrierPassthroughFee
    ): self {
        $self = clone $this;
        $self['carrierPassthroughFee'] = $carrierPassthroughFee;

        return $self;
    }

    public function withConnection(string $connection): self
    {
        $self = clone $this;
        $self['connection'] = $connection;

        return $self;
    }

    public function withCost(string $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    public function withDelivered(string $delivered): self
    {
        $self = clone $this;
        $self['delivered'] = $delivered;

        return $self;
    }

    public function withDirection(string $direction): self
    {
        $self = clone $this;
        $self['direction'] = $direction;

        return $self;
    }

    public function withMessageType(string $messageType): self
    {
        $self = clone $this;
        $self['messageType'] = $messageType;

        return $self;
    }

    public function withParts(string $parts): self
    {
        $self = clone $this;
        $self['parts'] = $parts;

        return $self;
    }

    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }

    public function withProfileID(string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    public function withReceived(string $received): self
    {
        $self = clone $this;
        $self['received'] = $received;

        return $self;
    }

    public function withSent(string $sent): self
    {
        $self = clone $this;
        $self['sent'] = $sent;

        return $self;
    }

    public function withTags(string $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    public function withTnType(string $tnType): self
    {
        $self = clone $this;
        $self['tnType'] = $tnType;

        return $self;
    }
}
