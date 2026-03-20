<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallCostWebhookEvent\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CostPartShape = array{
 *   billedDurationSecs?: int|null,
 *   callPart?: string|null,
 *   cost?: string|null,
 *   currency?: string|null,
 *   rate?: string|null,
 * }
 */
final class CostPart implements BaseModel
{
    /** @use SdkModel<CostPartShape> */
    use SdkModel;

    /**
     * The billed duration in seconds for this part of the call.
     */
    #[Optional('billed_duration_secs')]
    public ?int $billedDurationSecs;

    /**
     * The product component this cost applies to. Values are determined by the billing system (e.g. sip-trunking, call-control, call-recording). Not a fixed set — new values may appear as products evolve.
     */
    #[Optional('call_part')]
    public ?string $callPart;

    /**
     * The cost for this part of the call.
     */
    #[Optional]
    public ?string $cost;

    /**
     * The currency of the cost.
     */
    #[Optional]
    public ?string $currency;

    /**
     * The per-minute rate applied.
     */
    #[Optional]
    public ?string $rate;

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
        ?int $billedDurationSecs = null,
        ?string $callPart = null,
        ?string $cost = null,
        ?string $currency = null,
        ?string $rate = null,
    ): self {
        $self = new self;

        null !== $billedDurationSecs && $self['billedDurationSecs'] = $billedDurationSecs;
        null !== $callPart && $self['callPart'] = $callPart;
        null !== $cost && $self['cost'] = $cost;
        null !== $currency && $self['currency'] = $currency;
        null !== $rate && $self['rate'] = $rate;

        return $self;
    }

    /**
     * The billed duration in seconds for this part of the call.
     */
    public function withBilledDurationSecs(int $billedDurationSecs): self
    {
        $self = clone $this;
        $self['billedDurationSecs'] = $billedDurationSecs;

        return $self;
    }

    /**
     * The product component this cost applies to. Values are determined by the billing system (e.g. sip-trunking, call-control, call-recording). Not a fixed set — new values may appear as products evolve.
     */
    public function withCallPart(string $callPart): self
    {
        $self = clone $this;
        $self['callPart'] = $callPart;

        return $self;
    }

    /**
     * The cost for this part of the call.
     */
    public function withCost(string $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * The currency of the cost.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * The per-minute rate applied.
     */
    public function withRate(string $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }
}
