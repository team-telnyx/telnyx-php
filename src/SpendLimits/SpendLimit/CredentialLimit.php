<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits\SpendLimit;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpendLimits\SpendLimit\CredentialLimit\Limit;
use Telnyx\SpendLimits\SpendLimitBlock;

/**
 * The limit, spend and block state of one API key in the product and period.
 *
 * @phpstan-import-type SpendLimitBlockShape from \Telnyx\SpendLimits\SpendLimitBlock
 * @phpstan-import-type LimitShape from \Telnyx\SpendLimits\SpendLimit\CredentialLimit\Limit
 *
 * @phpstan-type CredentialLimitShape = array{
 *   block: null|SpendLimitBlock|SpendLimitBlockShape,
 *   blocked: bool,
 *   credentialID: string,
 *   limit: null|\Telnyx\SpendLimits\SpendLimit\CredentialLimit\Limit|LimitShape,
 *   spendError: string|null,
 *   spendUsd: string|null,
 *   exceedsTotal?: bool|null,
 * }
 */
final class CredentialLimit implements BaseModel
{
    /** @use SdkModel<CredentialLimitShape> */
    use SdkModel;

    /**
     * The active block of the period. `null` when the period is not blocked.
     */
    #[Required]
    public ?SpendLimitBlock $block;

    /**
     * This API key is blocked for the period.
     */
    #[Required]
    public bool $blocked;

    /**
     * Identifier of the API key as recorded on usage. Never the key's secret.
     */
    #[Required('credential_id')]
    public string $credentialID;

    /**
     * The limit of one API key. It always has an amount. `null` for an API key that is still blocked after its limit was removed.
     */
    #[Required]
    public ?Limit $limit;

    /**
     * Set when `spend_usd` is `null`.
     */
    #[Required('spend_error')]
    public ?string $spendError;

    /**
     * Spend in USD in the period made with exactly this API key, as a decimal string. Usage without an API key identifier, or with another one, counts only toward the total. `null` when it could not be read.
     */
    #[Required('spend_usd')]
    public ?string $spendUsd;

    /**
     * The API key's limit is above the period's total limit. Only a change by Telnyx support can cause it; the total limit still applies to the whole account. Lower the API key limit or raise the total.
     */
    #[Optional('exceeds_total')]
    public ?bool $exceedsTotal;

    /**
     * `new CredentialLimit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CredentialLimit::with(
     *   block: ...,
     *   blocked: ...,
     *   credentialID: ...,
     *   limit: ...,
     *   spendError: ...,
     *   spendUsd: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CredentialLimit)
     *   ->withBlock(...)
     *   ->withBlocked(...)
     *   ->withCredentialID(...)
     *   ->withLimit(...)
     *   ->withSpendError(...)
     *   ->withSpendUsd(...)
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
     * @param SpendLimitBlock|SpendLimitBlockShape|null $block
     * @param Limit|LimitShape|null $limit
     */
    public static function with(
        SpendLimitBlock|array|null $block,
        bool $blocked,
        string $credentialID,
        Limit|array|null $limit,
        ?string $spendError,
        ?string $spendUsd,
        ?bool $exceedsTotal = null,
    ): self {
        $self = new self;

        $self['block'] = $block;
        $self['blocked'] = $blocked;
        $self['credentialID'] = $credentialID;
        $self['limit'] = $limit;
        $self['spendError'] = $spendError;
        $self['spendUsd'] = $spendUsd;

        null !== $exceedsTotal && $self['exceedsTotal'] = $exceedsTotal;

        return $self;
    }

    /**
     * The active block of the period. `null` when the period is not blocked.
     *
     * @param SpendLimitBlock|SpendLimitBlockShape|null $block
     */
    public function withBlock(SpendLimitBlock|array|null $block): self
    {
        $self = clone $this;
        $self['block'] = $block;

        return $self;
    }

    /**
     * This API key is blocked for the period.
     */
    public function withBlocked(bool $blocked): self
    {
        $self = clone $this;
        $self['blocked'] = $blocked;

        return $self;
    }

    /**
     * Identifier of the API key as recorded on usage. Never the key's secret.
     */
    public function withCredentialID(string $credentialID): self
    {
        $self = clone $this;
        $self['credentialID'] = $credentialID;

        return $self;
    }

    /**
     * The limit of one API key. It always has an amount. `null` for an API key that is still blocked after its limit was removed.
     *
     * @param Limit|LimitShape|null $limit
     */
    public function withLimit(
        Limit|array|null $limit
    ): self {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * Set when `spend_usd` is `null`.
     */
    public function withSpendError(?string $spendError): self
    {
        $self = clone $this;
        $self['spendError'] = $spendError;

        return $self;
    }

    /**
     * Spend in USD in the period made with exactly this API key, as a decimal string. Usage without an API key identifier, or with another one, counts only toward the total. `null` when it could not be read.
     */
    public function withSpendUsd(?string $spendUsd): self
    {
        $self = clone $this;
        $self['spendUsd'] = $spendUsd;

        return $self;
    }

    /**
     * The API key's limit is above the period's total limit. Only a change by Telnyx support can cause it; the total limit still applies to the whole account. Lower the API key limit or raise the total.
     */
    public function withExceedsTotal(bool $exceedsTotal): self
    {
        $self = clone $this;
        $self['exceedsTotal'] = $exceedsTotal;

        return $self;
    }
}
