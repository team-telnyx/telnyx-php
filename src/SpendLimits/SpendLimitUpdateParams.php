<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Replaces the value of the existing limit for the product and period. Send exactly one of `amount` and `unlimited: true`. The period's spend is checked at once: raising the limit above the spend lifts the period's block (`evaluation.released`), and lowering it below the spend blocks the product (`evaluation.blocked_now`). Returns 404 when no limit is set; create it instead.
 *
 * @see Telnyx\Services\SpendLimitsService::update()
 *
 * @phpstan-type SpendLimitUpdateParamsShape = array{
 *   amount: float,
 *   period?: null|SpendLimitPeriod|value-of<SpendLimitPeriod>,
 *   reason?: string|null,
 *   unlimited: bool,
 * }
 */
final class SpendLimitUpdateParams implements BaseModel
{
    /** @use SdkModel<SpendLimitUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Limit in USD. `0` blocks at the first cent of spend.
     */
    #[Required]
    public float $amount;

    /**
     * Limit period. Defaults to `daily`; send it explicitly.
     *
     * @var value-of<SpendLimitPeriod>|null $period
     */
    #[Optional(enum: SpendLimitPeriod::class)]
    public ?string $period;

    /**
     * Why the limit is set or changed, kept for audit.
     */
    #[Optional]
    public ?string $reason;

    /**
     * `true`: explicitly no cap.
     */
    #[Required]
    public bool $unlimited;

    /**
     * `new SpendLimitUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpendLimitUpdateParams::with(amount: ..., unlimited: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpendLimitUpdateParams)->withAmount(...)->withUnlimited(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SpendLimitPeriod|value-of<SpendLimitPeriod>|null $period
     */
    public static function with(
        float $amount,
        bool $unlimited,
        SpendLimitPeriod|string|null $period = null,
        ?string $reason = null,
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['unlimited'] = $unlimited;

        null !== $period && $self['period'] = $period;
        null !== $reason && $self['reason'] = $reason;

        return $self;
    }

    /**
     * Limit in USD. `0` blocks at the first cent of spend.
     */
    public function withAmount(float $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * Limit period. Defaults to `daily`; send it explicitly.
     *
     * @param SpendLimitPeriod|value-of<SpendLimitPeriod> $period
     */
    public function withPeriod(SpendLimitPeriod|string $period): self
    {
        $self = clone $this;
        $self['period'] = $period;

        return $self;
    }

    /**
     * Why the limit is set or changed, kept for audit.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * `true`: explicitly no cap.
     */
    public function withUnlimited(bool $unlimited): self
    {
        $self = clone $this;
        $self['unlimited'] = $unlimited;

        return $self;
    }
}
