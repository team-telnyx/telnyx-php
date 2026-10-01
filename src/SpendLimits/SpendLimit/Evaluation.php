<?php

declare(strict_types=1);

namespace Telnyx\SpendLimits\SpendLimit;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * What a create, update or delete did to the period at once. Only present in write responses.
 *
 * @phpstan-type EvaluationShape = array{
 *   blockedNow: bool,
 *   evaluationDeferred: bool,
 *   released: bool,
 *   spendUsd: string|null,
 *   stillBlockedOtherPeriod: bool,
 *   stillOverLimit: bool,
 *   note?: string|null,
 * }
 */
final class Evaluation implements BaseModel
{
    /** @use SdkModel<EvaluationShape> */
    use SdkModel;

    /**
     * The change blocked the product: the spend was already above the new limit.
     */
    #[Required('blocked_now')]
    public bool $blockedNow;

    /**
     * The spend could not be checked now. The change is saved and applied within a few minutes.
     */
    #[Required('evaluation_deferred')]
    public bool $evaluationDeferred;

    /**
     * The change lifted a block of this period.
     */
    #[Required]
    public bool $released;

    /**
     * Spend in USD used for the check, as a decimal string. `null` when the spend was not checked.
     */
    #[Required('spend_usd')]
    public ?string $spendUsd;

    /**
     * The other period has an active block, so the product stays blocked whatever this period's result.
     */
    #[Required('still_blocked_other_period')]
    public bool $stillBlockedOtherPeriod;

    /**
     * A block of this period remains because the spend is still above the new limit.
     */
    #[Required('still_over_limit')]
    public bool $stillOverLimit;

    /**
     * Additional information about the result, when there is any.
     */
    #[Optional]
    public ?string $note;

    /**
     * `new Evaluation()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Evaluation::with(
     *   blockedNow: ...,
     *   evaluationDeferred: ...,
     *   released: ...,
     *   spendUsd: ...,
     *   stillBlockedOtherPeriod: ...,
     *   stillOverLimit: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Evaluation)
     *   ->withBlockedNow(...)
     *   ->withEvaluationDeferred(...)
     *   ->withReleased(...)
     *   ->withSpendUsd(...)
     *   ->withStillBlockedOtherPeriod(...)
     *   ->withStillOverLimit(...)
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
     */
    public static function with(
        bool $blockedNow,
        bool $evaluationDeferred,
        bool $released,
        ?string $spendUsd,
        bool $stillBlockedOtherPeriod,
        bool $stillOverLimit,
        ?string $note = null,
    ): self {
        $self = new self;

        $self['blockedNow'] = $blockedNow;
        $self['evaluationDeferred'] = $evaluationDeferred;
        $self['released'] = $released;
        $self['spendUsd'] = $spendUsd;
        $self['stillBlockedOtherPeriod'] = $stillBlockedOtherPeriod;
        $self['stillOverLimit'] = $stillOverLimit;

        null !== $note && $self['note'] = $note;

        return $self;
    }

    /**
     * The change blocked the product: the spend was already above the new limit.
     */
    public function withBlockedNow(bool $blockedNow): self
    {
        $self = clone $this;
        $self['blockedNow'] = $blockedNow;

        return $self;
    }

    /**
     * The spend could not be checked now. The change is saved and applied within a few minutes.
     */
    public function withEvaluationDeferred(bool $evaluationDeferred): self
    {
        $self = clone $this;
        $self['evaluationDeferred'] = $evaluationDeferred;

        return $self;
    }

    /**
     * The change lifted a block of this period.
     */
    public function withReleased(bool $released): self
    {
        $self = clone $this;
        $self['released'] = $released;

        return $self;
    }

    /**
     * Spend in USD used for the check, as a decimal string. `null` when the spend was not checked.
     */
    public function withSpendUsd(?string $spendUsd): self
    {
        $self = clone $this;
        $self['spendUsd'] = $spendUsd;

        return $self;
    }

    /**
     * The other period has an active block, so the product stays blocked whatever this period's result.
     */
    public function withStillBlockedOtherPeriod(
        bool $stillBlockedOtherPeriod
    ): self {
        $self = clone $this;
        $self['stillBlockedOtherPeriod'] = $stillBlockedOtherPeriod;

        return $self;
    }

    /**
     * A block of this period remains because the spend is still above the new limit.
     */
    public function withStillOverLimit(bool $stillOverLimit): self
    {
        $self = clone $this;
        $self['stillOverLimit'] = $stillOverLimit;

        return $self;
    }

    /**
     * Additional information about the result, when there is any.
     */
    public function withNote(string $note): self
    {
        $self = clone $this;
        $self['note'] = $note;

        return $self;
    }
}
