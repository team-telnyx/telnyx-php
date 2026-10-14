<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits\SpendLimit;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpendLimits\SpendLimit\Limit\Origin;

/**
 * The limit set on the account for the product and period, whoever set it. `null` when none is set.
 *
 * @phpstan-type LimitShape = array{
 *   amount: string|null,
 *   origin: Origin|value-of<Origin>,
 *   unlimited: bool,
 *   updatedAt: \DateTimeInterface,
 * }
 */
final class Limit implements BaseModel
{
    /** @use SdkModel<LimitShape> */
    use SdkModel;

    /**
     * Limit in USD, as a decimal string. `null` when `unlimited` is true.
     */
    #[Required]
    public ?string $amount;

    /**
     * `self_service` when a user of the account set it, `operator` when Telnyx support did.
     *
     * @var value-of<Origin> $origin
     */
    #[Required(enum: Origin::class)]
    public string $origin;

    /**
     * True when the limit was set to explicitly no cap.
     */
    #[Required]
    public bool $unlimited;

    /**
     * When the limit was last set or changed.
     */
    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * `new Limit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Limit::with(amount: ..., origin: ..., unlimited: ..., updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Limit)
     *   ->withAmount(...)
     *   ->withOrigin(...)
     *   ->withUnlimited(...)
     *   ->withUpdatedAt(...)
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
     * @param Origin|value-of<Origin> $origin
     */
    public static function with(
        ?string $amount,
        Origin|string $origin,
        bool $unlimited,
        \DateTimeInterface $updatedAt,
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['origin'] = $origin;
        $self['unlimited'] = $unlimited;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Limit in USD, as a decimal string. `null` when `unlimited` is true.
     */
    public function withAmount(?string $amount): self
    {
        $self = clone $this;
        $self['amount'] = $amount;

        return $self;
    }

    /**
     * `self_service` when a user of the account set it, `operator` when Telnyx support did.
     *
     * @param Origin|value-of<Origin> $origin
     */
    public function withOrigin(Origin|string $origin): self
    {
        $self = clone $this;
        $self['origin'] = $origin;

        return $self;
    }

    /**
     * True when the limit was set to explicitly no cap.
     */
    public function withUnlimited(bool $unlimited): self
    {
        $self = clone $this;
        $self['unlimited'] = $unlimited;

        return $self;
    }

    /**
     * When the limit was last set or changed.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
