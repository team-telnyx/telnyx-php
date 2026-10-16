<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\Cost\UnionMember0;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BreakdownShape = array{cost?: string|null, product?: string|null}
 */
final class Breakdown implements BaseModel
{
    /** @use SdkModel<BreakdownShape> */
    use SdkModel;

    /**
     * Total cost for this product across the call, in the currency given by `cost.currency`.
     */
    #[Optional]
    public ?string $cost;

    /**
     * The Telnyx product the cost line belongs to (for example `ai-voice-assistant`, `inference`, `callcontrol-cdrs`, `siptrunking-cdrs`, `recording-cdrs`).
     */
    #[Optional]
    public ?string $product;

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
        ?string $cost = null,
        ?string $product = null
    ): self {
        $self = new self;

        null !== $cost && $self['cost'] = $cost;
        null !== $product && $self['product'] = $product;

        return $self;
    }

    /**
     * Total cost for this product across the call, in the currency given by `cost.currency`.
     */
    public function withCost(string $cost): self
    {
        $self = clone $this;
        $self['cost'] = $cost;

        return $self;
    }

    /**
     * The Telnyx product the cost line belongs to (for example `ai-voice-assistant`, `inference`, `callcontrol-cdrs`, `siptrunking-cdrs`, `recording-cdrs`).
     */
    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }
}
