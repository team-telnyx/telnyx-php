<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenKeys;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\LlmTokenGateway\TokenGroups\BudgetDuration;

/**
 * Update gateway token key within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response. Omitted fields are preserved. Null clears max_parallel_requests; null resets budget and rate limits to their maximum. A stale If-Match returns 412.
 *
 * @see Telnyx\Services\LlmTokenGateway\TokenKeysService::update()
 *
 * @phpstan-type TokenKeyUpdateParamsShape = array{
 *   idempotencyKey: string,
 *   ifMatch: string,
 *   allowedModels?: list<string>|null,
 *   blocked?: bool|null,
 *   budgetDuration?: null|BudgetDuration|value-of<BudgetDuration>,
 *   expiresAt?: \DateTimeInterface|null,
 *   maxBudget?: float|null,
 *   maxParallelRequests?: int|null,
 *   name?: string|null,
 *   requiredEndUserID?: bool|null,
 *   rpmLimit?: int|null,
 *   tpmLimit?: int|null,
 * }
 */
final class TokenKeyUpdateParams implements BaseModel
{
    /** @use SdkModel<TokenKeyUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $idempotencyKey;

    #[Required]
    public string $ifMatch;

    /** @var list<string>|null $allowedModels */
    #[Optional('allowed_models', list: 'string', nullable: true)]
    public ?array $allowedModels;

    #[Optional]
    public ?bool $blocked;

    /** @var value-of<BudgetDuration>|null $budgetDuration */
    #[Optional('budget_duration', enum: BudgetDuration::class, nullable: true)]
    public ?string $budgetDuration;

    #[Optional('expires_at', nullable: true)]
    public ?\DateTimeInterface $expiresAt;

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Optional('max_budget', nullable: true)]
    public ?float $maxBudget;

    /**
     * Optional maximum concurrent reserved/dispatched cache misses across replicas. Null means no concurrency cap. Cache hits do not consume slots; unknown usage retains its budget hold without a slot.
     */
    #[Optional('max_parallel_requests', nullable: true)]
    public ?int $maxParallelRequests;

    #[Optional]
    public ?string $name;

    /**
     * Require a nonempty caller-asserted end-user ID; not proof of identity. Omission preserves the current requirement.
     */
    #[Optional('required_end_user_id')]
    public ?bool $requiredEndUserID;

    /**
     * Omitted or null defaults to the maximum (6000) (on a blocked key, null is kept until the key is unblocked); a value below the minimum (1) or above the maximum is rejected with 400 limit_out_of_range; a malformed value (negative, wrong type or precision) is 400 invalid_request. Block the key (blocked: true) to deny it; blocking is always accepted.
     */
    #[Optional('rpm_limit', nullable: true)]
    public ?int $rpmLimit;

    /**
     * Omitted or null defaults to the maximum (10000000) (on a blocked key, null is kept until the key is unblocked); a value below the minimum (1) or above the maximum is rejected with 400 limit_out_of_range; a malformed value (negative, wrong type or precision) is 400 invalid_request. Block the key (blocked: true) to deny it; blocking is always accepted.
     */
    #[Optional('tpm_limit', nullable: true)]
    public ?int $tpmLimit;

    /**
     * `new TokenKeyUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenKeyUpdateParams::with(idempotencyKey: ..., ifMatch: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenKeyUpdateParams)->withIdempotencyKey(...)->withIfMatch(...)
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
     * @param list<string>|Omitted|null $allowedModels
     * @param Omitted|BudgetDuration|value-of<BudgetDuration>|null $budgetDuration
     */
    public static function with(
        string $idempotencyKey,
        string $ifMatch,
        array|Omitted|null $allowedModels = Omitted::VALUE,
        Omitted|BudgetDuration|string|null $budgetDuration = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $expiresAt = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        int|Omitted|null $rpmLimit = Omitted::VALUE,
        int|Omitted|null $tpmLimit = Omitted::VALUE,
        ?bool $blocked = null,
        ?string $name = null,
        ?bool $requiredEndUserID = null,
    ): self {
        $self = new self;

        $self['idempotencyKey'] = $idempotencyKey;
        $self['ifMatch'] = $ifMatch;

        Omitted::VALUE !== $allowedModels && $self['allowedModels'] = $allowedModels;
        null !== $blocked && $self['blocked'] = $blocked;
        Omitted::VALUE !== $budgetDuration && $self['budgetDuration'] = $budgetDuration;
        Omitted::VALUE !== $expiresAt && $self['expiresAt'] = $expiresAt;
        Omitted::VALUE !== $maxBudget && $self['maxBudget'] = $maxBudget;
        Omitted::VALUE !== $maxParallelRequests && $self['maxParallelRequests'] = $maxParallelRequests;
        null !== $name && $self['name'] = $name;
        null !== $requiredEndUserID && $self['requiredEndUserID'] = $requiredEndUserID;
        Omitted::VALUE !== $rpmLimit && $self['rpmLimit'] = $rpmLimit;
        Omitted::VALUE !== $tpmLimit && $self['tpmLimit'] = $tpmLimit;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    public function withIfMatch(string $ifMatch): self
    {
        $self = clone $this;
        $self['ifMatch'] = $ifMatch;

        return $self;
    }

    /**
     * @param list<string>|null $allowedModels
     */
    public function withAllowedModels(?array $allowedModels): self
    {
        $self = clone $this;
        $self['allowedModels'] = $allowedModels;

        return $self;
    }

    public function withBlocked(bool $blocked): self
    {
        $self = clone $this;
        $self['blocked'] = $blocked;

        return $self;
    }

    /**
     * @param BudgetDuration|value-of<BudgetDuration>|null $budgetDuration
     */
    public function withBudgetDuration(
        BudgetDuration|string|null $budgetDuration
    ): self {
        $self = clone $this;
        $self['budgetDuration'] = $budgetDuration;

        return $self;
    }

    public function withExpiresAt(?\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    public function withMaxBudget(?float $maxBudget): self
    {
        $self = clone $this;
        $self['maxBudget'] = $maxBudget;

        return $self;
    }

    /**
     * Optional maximum concurrent reserved/dispatched cache misses across replicas. Null means no concurrency cap. Cache hits do not consume slots; unknown usage retains its budget hold without a slot.
     */
    public function withMaxParallelRequests(?int $maxParallelRequests): self
    {
        $self = clone $this;
        $self['maxParallelRequests'] = $maxParallelRequests;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Require a nonempty caller-asserted end-user ID; not proof of identity. Omission preserves the current requirement.
     */
    public function withRequiredEndUserID(bool $requiredEndUserID): self
    {
        $self = clone $this;
        $self['requiredEndUserID'] = $requiredEndUserID;

        return $self;
    }

    /**
     * Omitted or null defaults to the maximum (6000) (on a blocked key, null is kept until the key is unblocked); a value below the minimum (1) or above the maximum is rejected with 400 limit_out_of_range; a malformed value (negative, wrong type or precision) is 400 invalid_request. Block the key (blocked: true) to deny it; blocking is always accepted.
     */
    public function withRpmLimit(?int $rpmLimit): self
    {
        $self = clone $this;
        $self['rpmLimit'] = $rpmLimit;

        return $self;
    }

    /**
     * Omitted or null defaults to the maximum (10000000) (on a blocked key, null is kept until the key is unblocked); a value below the minimum (1) or above the maximum is rejected with 400 limit_out_of_range; a malformed value (negative, wrong type or precision) is 400 invalid_request. Block the key (blocked: true) to deny it; blocking is always accepted.
     */
    public function withTpmLimit(?int $tpmLimit): self
    {
        $self = clone $this;
        $self['tpmLimit'] = $tpmLimit;

        return $self;
    }
}
