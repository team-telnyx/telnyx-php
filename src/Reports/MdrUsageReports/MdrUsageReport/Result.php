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
        $obj = new self;

        null !== $carrierPassthroughFee && $obj['carrierPassthroughFee'] = $carrierPassthroughFee;
        null !== $connection && $obj['connection'] = $connection;
        null !== $cost && $obj['cost'] = $cost;
        null !== $currency && $obj['currency'] = $currency;
        null !== $delivered && $obj['delivered'] = $delivered;
        null !== $direction && $obj['direction'] = $direction;
        null !== $messageType && $obj['messageType'] = $messageType;
        null !== $parts && $obj['parts'] = $parts;
        null !== $product && $obj['product'] = $product;
        null !== $profileID && $obj['profileID'] = $profileID;
        null !== $received && $obj['received'] = $received;
        null !== $sent && $obj['sent'] = $sent;
        null !== $tags && $obj['tags'] = $tags;
        null !== $tnType && $obj['tnType'] = $tnType;

        return $obj;
    }

    public function withCarrierPassthroughFee(
        string $carrierPassthroughFee
    ): self {
        $obj = clone $this;
        $obj['carrierPassthroughFee'] = $carrierPassthroughFee;

        return $obj;
    }

    public function withConnection(string $connection): self
    {
        $obj = clone $this;
        $obj['connection'] = $connection;

        return $obj;
    }

    public function withCost(string $cost): self
    {
        $obj = clone $this;
        $obj['cost'] = $cost;

        return $obj;
    }

    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    public function withDelivered(string $delivered): self
    {
        $obj = clone $this;
        $obj['delivered'] = $delivered;

        return $obj;
    }

    public function withDirection(string $direction): self
    {
        $obj = clone $this;
        $obj['direction'] = $direction;

        return $obj;
    }

    public function withMessageType(string $messageType): self
    {
        $obj = clone $this;
        $obj['messageType'] = $messageType;

        return $obj;
    }

    public function withParts(string $parts): self
    {
        $obj = clone $this;
        $obj['parts'] = $parts;

        return $obj;
    }

    public function withProduct(string $product): self
    {
        $obj = clone $this;
        $obj['product'] = $product;

        return $obj;
    }

    public function withProfileID(string $profileID): self
    {
        $obj = clone $this;
        $obj['profileID'] = $profileID;

        return $obj;
    }

    public function withReceived(string $received): self
    {
        $obj = clone $this;
        $obj['received'] = $received;

        return $obj;
    }

    public function withSent(string $sent): self
    {
        $obj = clone $this;
        $obj['sent'] = $sent;

        return $obj;
    }

    public function withTags(string $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    public function withTnType(string $tnType): self
    {
        $obj = clone $this;
        $obj['tnType'] = $tnType;

        return $obj;
    }
}
