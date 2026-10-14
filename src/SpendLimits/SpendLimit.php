<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SpendLimits\SpendLimit\Block;
use Telnyx\SpendLimits\SpendLimit\Evaluation;
use Telnyx\SpendLimits\SpendLimit\Limit;

/**
 * The spend limit, spend and block state of one product and period.
 *
 * @phpstan-import-type BlockShape from \Telnyx\SpendLimits\SpendLimit\Block
 * @phpstan-import-type LimitShape from \Telnyx\SpendLimits\SpendLimit\Limit
 * @phpstan-import-type EvaluationShape from \Telnyx\SpendLimits\SpendLimit\Evaluation
 *
 * @phpstan-type SpendLimitShape = array{
 *   block: null|Block|BlockShape,
 *   blocked: bool,
 *   effectiveLimitUsd: string|null,
 *   limit: null|Limit|LimitShape,
 *   period: SpendLimitPeriod|value-of<SpendLimitPeriod>,
 *   periodEnd: string,
 *   periodStart: string,
 *   product: string,
 *   productName: string,
 *   recordType: string,
 *   spendError: string|null,
 *   spendUsd: string|null,
 *   evaluation?: null|Evaluation|EvaluationShape,
 * }
 */
final class SpendLimit implements BaseModel
{
    /** @use SdkModel<SpendLimitShape> */
    use SdkModel;

    /**
     * The active block of the period. `null` when the period is not blocked.
     */
    #[Required]
    public ?Block $block;

    /**
     * The product is blocked for this period. Always `false` in write responses; list the limits to read the block state.
     */
    #[Required]
    public bool $blocked;

    /**
     * The limit in USD that is enforced, as a decimal string. `null` means unlimited.
     */
    #[Required('effective_limit_usd')]
    public ?string $effectiveLimitUsd;

    /**
     * The limit set on the account for the product and period, whoever set it. `null` when none is set.
     */
    #[Required]
    public ?Limit $limit;

    /**
     * `daily` is the current UTC day; `monthly` is the current UTC calendar month.
     *
     * @var value-of<SpendLimitPeriod> $period
     */
    #[Required(enum: SpendLimitPeriod::class)]
    public string $period;

    /**
     * Exclusive end of the current period, a UTC date.
     */
    #[Required('period_end')]
    public string $periodEnd;

    /**
     * First UTC day of the current period.
     */
    #[Required('period_start')]
    public string $periodStart;

    /**
     * Product the entry applies to.
     */
    #[Required]
    public string $product;

    /**
     * Display name of the product.
     */
    #[Required('product_name')]
    public string $productName;

    /**
     * Identifies the type of the resource.
     */
    #[Required('record_type')]
    public string $recordType;

    /**
     * Set when `spend_usd` is `null`.
     */
    #[Required('spend_error')]
    public ?string $spendError;

    /**
     * Spend in USD so far in the period, as a decimal string. It can lag actual usage by about a minute. `null` when it could not be read.
     */
    #[Required('spend_usd')]
    public ?string $spendUsd;

    /**
     * What a create, update or delete did to the period at once. Only present in write responses.
     */
    #[Optional]
    public ?Evaluation $evaluation;

    /**
     * `new SpendLimit()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SpendLimit::with(
     *   block: ...,
     *   blocked: ...,
     *   effectiveLimitUsd: ...,
     *   limit: ...,
     *   period: ...,
     *   periodEnd: ...,
     *   periodStart: ...,
     *   product: ...,
     *   productName: ...,
     *   recordType: ...,
     *   spendError: ...,
     *   spendUsd: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SpendLimit)
     *   ->withBlock(...)
     *   ->withBlocked(...)
     *   ->withEffectiveLimitUsd(...)
     *   ->withLimit(...)
     *   ->withPeriod(...)
     *   ->withPeriodEnd(...)
     *   ->withPeriodStart(...)
     *   ->withProduct(...)
     *   ->withProductName(...)
     *   ->withRecordType(...)
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
     * @param Block|BlockShape|null $block
     * @param Limit|LimitShape|null $limit
     * @param SpendLimitPeriod|value-of<SpendLimitPeriod> $period
     * @param Evaluation|EvaluationShape|null $evaluation
     */
    public static function with(
        Block|array|null $block,
        bool $blocked,
        ?string $effectiveLimitUsd,
        Limit|array|null $limit,
        string $periodEnd,
        string $periodStart,
        string $product,
        string $productName,
        string $recordType,
        ?string $spendError,
        ?string $spendUsd,
        SpendLimitPeriod|string $period = 'daily',
        Evaluation|array|null $evaluation = null,
    ): self {
        $self = new self;

        $self['block'] = $block;
        $self['blocked'] = $blocked;
        $self['effectiveLimitUsd'] = $effectiveLimitUsd;
        $self['limit'] = $limit;
        $self['period'] = $period;
        $self['periodEnd'] = $periodEnd;
        $self['periodStart'] = $periodStart;
        $self['product'] = $product;
        $self['productName'] = $productName;
        $self['recordType'] = $recordType;
        $self['spendError'] = $spendError;
        $self['spendUsd'] = $spendUsd;

        null !== $evaluation && $self['evaluation'] = $evaluation;

        return $self;
    }

    /**
     * The active block of the period. `null` when the period is not blocked.
     *
     * @param Block|BlockShape|null $block
     */
    public function withBlock(Block|array|null $block): self
    {
        $self = clone $this;
        $self['block'] = $block;

        return $self;
    }

    /**
     * The product is blocked for this period. Always `false` in write responses; list the limits to read the block state.
     */
    public function withBlocked(bool $blocked): self
    {
        $self = clone $this;
        $self['blocked'] = $blocked;

        return $self;
    }

    /**
     * The limit in USD that is enforced, as a decimal string. `null` means unlimited.
     */
    public function withEffectiveLimitUsd(?string $effectiveLimitUsd): self
    {
        $self = clone $this;
        $self['effectiveLimitUsd'] = $effectiveLimitUsd;

        return $self;
    }

    /**
     * The limit set on the account for the product and period, whoever set it. `null` when none is set.
     *
     * @param Limit|LimitShape|null $limit
     */
    public function withLimit(Limit|array|null $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

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
     * Exclusive end of the current period, a UTC date.
     */
    public function withPeriodEnd(string $periodEnd): self
    {
        $self = clone $this;
        $self['periodEnd'] = $periodEnd;

        return $self;
    }

    /**
     * First UTC day of the current period.
     */
    public function withPeriodStart(string $periodStart): self
    {
        $self = clone $this;
        $self['periodStart'] = $periodStart;

        return $self;
    }

    /**
     * Product the entry applies to.
     */
    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }

    /**
     * Display name of the product.
     */
    public function withProductName(string $productName): self
    {
        $self = clone $this;
        $self['productName'] = $productName;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

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
     * Spend in USD so far in the period, as a decimal string. It can lag actual usage by about a minute. `null` when it could not be read.
     */
    public function withSpendUsd(?string $spendUsd): self
    {
        $self = clone $this;
        $self['spendUsd'] = $spendUsd;

        return $self;
    }

    /**
     * What a create, update or delete did to the period at once. Only present in write responses.
     *
     * @param Evaluation|EvaluationShape $evaluation
     */
    public function withEvaluation(Evaluation|array $evaluation): self
    {
        $self = clone $this;
        $self['evaluation'] = $evaluation;

        return $self;
    }
}
