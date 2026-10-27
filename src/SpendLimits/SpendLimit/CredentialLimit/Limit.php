<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits\SpendLimit\CredentialLimit;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpendLimits\SpendLimit\CredentialLimit\Limit\Origin;

/**
 * The limit of one API key. It always has an amount. `null` for an API key that is still blocked after its limit was removed.
 *
 * @phpstan-type LimitShape = array{
 *   amount: string, origin: Origin|value-of<Origin>, updatedAt: \DateTimeInterface
 * }
 */
final class Limit implements BaseModel
{
    /** @use SdkModel<LimitShape> */
    use SdkModel;

    /**
     * Limit in USD, as a decimal string.
     */
    #[Required]
    public string $amount;

    /**
     * `self_service` when a user of the account set it, `operator` when Telnyx support did.
     *
     * @var value-of<Origin> $origin
     */
    #[Required(enum: Origin::class)]
    public string $origin;

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
     * Limit::with(amount: ..., origin: ..., updatedAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Limit)->withAmount(...)->withOrigin(...)->withUpdatedAt(...)
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
        string $amount,
        Origin|string $origin,
        \DateTimeInterface $updatedAt
    ): self {
        $self = new self;

        $self['amount'] = $amount;
        $self['origin'] = $origin;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Limit in USD, as a decimal string.
     */
    public function withAmount(string $amount): self
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
     * When the limit was last set or changed.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
