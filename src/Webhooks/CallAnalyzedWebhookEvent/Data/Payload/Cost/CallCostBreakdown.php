<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Cost;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Cost\CallCostBreakdown\Breakdown;

/**
 * The itemized cost of the call.
 *
 * @phpstan-import-type BreakdownShape from \Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Cost\CallCostBreakdown\Breakdown
 *
 * @phpstan-type CallCostBreakdownShape = array{
 *   breakdown?: list<Breakdown|BreakdownShape>|null,
 *   currency?: string|null,
 *   total?: string|null,
 * }
 */
final class CallCostBreakdown implements BaseModel
{
    /** @use SdkModel<CallCostBreakdownShape> */
    use SdkModel;

    /**
     * Cost lines grouped by product.
     *
     * @var list<Breakdown>|null $breakdown
     */
    #[Optional(list: Breakdown::class)]
    public ?array $breakdown;

    /**
     * The currency of the cost amounts.
     */
    #[Optional]
    public ?string $currency;

    /**
     * The total cost of the call, summed across every product in the breakdown.
     */
    #[Optional]
    public ?string $total;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Breakdown|BreakdownShape>|null $breakdown
     */
    public static function with(
        ?array $breakdown = null,
        ?string $currency = null,
        ?string $total = null
    ): self {
        $self = new self;

        null !== $breakdown && $self['breakdown'] = $breakdown;
        null !== $currency && $self['currency'] = $currency;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * Cost lines grouped by product.
     *
     * @param list<Breakdown|BreakdownShape> $breakdown
     */
    public function withBreakdown(array $breakdown): self
    {
        $self = clone $this;
        $self['breakdown'] = $breakdown;

        return $self;
    }

    /**
     * The currency of the cost amounts.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    /**
     * The total cost of the call, summed across every product in the breakdown.
     */
    public function withTotal(string $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
