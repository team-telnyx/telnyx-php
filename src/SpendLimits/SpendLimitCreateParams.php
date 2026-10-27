<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Sets a limit for a product and period that has none. Send exactly one of `amount` and `unlimited: true`. The period's spend is checked at once: if it is already above the new limit, the product is blocked immediately (`evaluation.blocked_now`). Returns 409 when a limit already exists for the product and period; update it instead. With `credential_id`, the limit applies to that API key only: it needs an `amount`, and the period's API key limits cannot add up to more than the total limit when the total has an amount.
 *
 * @see Telnyx\Services\SpendLimitsService::create()
 *
 * @phpstan-type SpendLimitCreateParamsShape = array{
 *   amount: float,
 *   product: string,
 *   credentialID?: string|null,
 *   period?: null|SpendLimitPeriod|value-of<SpendLimitPeriod>,
 *   reason?: string|null,
 *   unlimited: bool,
 * }
 */
final class SpendLimitCreateParams implements BaseModel
{
    /** @use SdkModel<SpendLimitCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Limit in USD. `0` blocks at the first cent of spend.
     */
    #[Required]
    public float $amount;

    /**
     * Product to limit, as returned in `product` by the list operation.
     */
    #[Required]
    public string $product;

    /**
     * Optional. Identifier of one API key as recorded on usage, never the key's secret: the limit then applies to that key only. Absent or `null` sets the total limit. A blank value, or one with control characters, is refused; it never means the total limit. An API key limit always has an `amount`.
     */
    #[Optional('credential_id', nullable: true)]
    public ?string $credentialID;

    /**
     * `daily` is the current UTC day; `monthly` is the current UTC calendar month.
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
     * `new SpendLimitCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpendLimitCreateParams::with(amount: ..., product: ..., unlimited: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpendLimitCreateParams)
     *   ->withAmount(...)
     *   ->withProduct(...)
     *   ->withUnlimited(...)
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
        string $product,
        bool $unlimited,
        string|Omitted|null $credentialID = Omitted::VALUE,
        SpendLimitPeriod|string|null $period = null,
        ?string $reason = null,
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['product'] = $product;
        $self['unlimited'] = $unlimited;

        Omitted::VALUE !== $credentialID && $self['credentialID'] = $credentialID;
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
     * Product to limit, as returned in `product` by the list operation.
     */
    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }

    /**
     * Optional. Identifier of one API key as recorded on usage, never the key's secret: the limit then applies to that key only. Absent or `null` sets the total limit. A blank value, or one with control characters, is refused; it never means the total limit. An API key limit always has an `amount`.
     */
    public function withCredentialID(?string $credentialID): self
    {
        $self = clone $this;
        $self['credentialID'] = $credentialID;

        return $self;
    }

    /**
     * `daily` is the current UTC day; `monthly` is the current UTC calendar month.
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
