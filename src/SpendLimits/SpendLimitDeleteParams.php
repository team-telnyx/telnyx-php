<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Removes the limit for the product and period. For `inference`, which has no default limit, the product becomes unlimited for the period and the period's block is lifted (`evaluation.released`). The response carries `limit: null` and the `effective_limit_usd` that applies after the removal. Returns 404 when no limit is set. With the `credential_id` query parameter, the request removes that API key's limit for the period and lifts the key's block in that period at once. A block under the key's limit in the other period stays (`evaluation.still_blocked_other_period`). Removing the total limit leaves the API key limits in place.
 *
 * @see Telnyx\Services\SpendLimitsService::delete()
 *
 * @phpstan-type SpendLimitDeleteParamsShape = array{
 *   credentialID?: string|null,
 *   period?: null|SpendLimitPeriod|value-of<SpendLimitPeriod>,
 *   reason?: string|null,
 * }
 */
final class SpendLimitDeleteParams implements BaseModel
{
    /** @use SdkModel<SpendLimitDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifier of one API key as recorded on usage, never the key's secret, percent-encoded: the request is then about that key's limit. Absent means the total limit; present but blank is refused.
     */
    #[Optional]
    public ?string $credentialID;

    /**
     * Limit period. Defaults to `daily`; send it explicitly.
     *
     * @var value-of<SpendLimitPeriod>|null $period
     */
    #[Optional(enum: SpendLimitPeriod::class)]
    public ?string $period;

    /**
     * Why the limit is removed, kept for audit. At most 500 characters.
     */
    #[Optional]
    public ?string $reason;

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
        ?string $credentialID = null,
        SpendLimitPeriod|string|null $period = null,
        ?string $reason = null,
    ): self {
        $self = new self;

        null !== $credentialID && $self['credentialID'] = $credentialID;
        null !== $period && $self['period'] = $period;
        null !== $reason && $self['reason'] = $reason;

        return $self;
    }

    /**
     * Identifier of one API key as recorded on usage, never the key's secret, percent-encoded: the request is then about that key's limit. Absent means the total limit; present but blank is refused.
     */
    public function withCredentialID(string $credentialID): self
    {
        $self = clone $this;
        $self['credentialID'] = $credentialID;

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
     * Why the limit is removed, kept for audit. At most 500 characters.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }
}
