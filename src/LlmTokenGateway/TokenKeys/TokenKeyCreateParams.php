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
 * Create gateway token key within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response. The token secret is returned only on the original create response. A replay returns metadata without the secret. Provisioning is advisory; ready is not a guarantee of inference availability.
 *
 * @see Telnyx\Services\LlmTokenGateway\TokenKeysService::create()
 *
 * @phpstan-type TokenKeyCreateParamsShape = array{
 *   name: string,
 *   tokenGroupID: string,
 *   idempotencyKey: string,
 *   allowedModels?: list<string>|null,
 *   blocked?: bool|null,
 *   budgetDuration?: null|BudgetDuration|value-of<BudgetDuration>,
 *   expiresAt?: \DateTimeInterface|null,
 *   maxBudget?: float|null,
 *   maxParallelRequests?: int|null,
 *   requiredEndUserID?: bool|null,
 *   rpmLimit?: int|null,
 *   tokenUserID?: string|null,
 *   tpmLimit?: int|null,
 * }
 */
final class TokenKeyCreateParams implements BaseModel
{
    /** @use SdkModel<TokenKeyCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $name;

    #[Required('token_group_id')]
    public string $tokenGroupID;

    #[Required]
    public string $idempotencyKey;

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

    /**
     * Require a nonempty caller-asserted end-user ID; not proof of identity.
     */
    #[Optional('required_end_user_id')]
    public ?bool $requiredEndUserID;

    /**
     * Omitted or null defaults to the maximum (6000) (on a blocked key, null is kept until the key is unblocked); a value below the minimum (1) or above the maximum is rejected with 400 limit_out_of_range; a malformed value (negative, wrong type or precision) is 400 invalid_request. Block the key (blocked: true) to deny it; blocking is always accepted.
     */
    #[Optional('rpm_limit', nullable: true)]
    public ?int $rpmLimit;

    #[Optional('token_user_id', nullable: true)]
    public ?string $tokenUserID;

    /**
     * Omitted or null defaults to the maximum (10000000) (on a blocked key, null is kept until the key is unblocked); a value below the minimum (1) or above the maximum is rejected with 400 limit_out_of_range; a malformed value (negative, wrong type or precision) is 400 invalid_request. Block the key (blocked: true) to deny it; blocking is always accepted.
     */
    #[Optional('tpm_limit', nullable: true)]
    public ?int $tpmLimit;

    /**
     * `new TokenKeyCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenKeyCreateParams::with(name: ..., tokenGroupID: ..., idempotencyKey: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenKeyCreateParams)
     *   ->withName(...)
     *   ->withTokenGroupID(...)
     *   ->withIdempotencyKey(...)
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
        string $name,
        string $tokenGroupID,
        string $idempotencyKey,
        array|Omitted|null $allowedModels = Omitted::VALUE,
        Omitted|BudgetDuration|string|null $budgetDuration = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $expiresAt = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        int|Omitted|null $rpmLimit = Omitted::VALUE,
        string|Omitted|null $tokenUserID = Omitted::VALUE,
        int|Omitted|null $tpmLimit = Omitted::VALUE,
        ?bool $blocked = null,
        ?bool $requiredEndUserID = null,
    ): self {
        $self = new self;

        $self['name'] = $name;
        $self['tokenGroupID'] = $tokenGroupID;
        $self['idempotencyKey'] = $idempotencyKey;

        Omitted::VALUE !== $allowedModels && $self['allowedModels'] = $allowedModels;
        null !== $blocked && $self['blocked'] = $blocked;
        Omitted::VALUE !== $budgetDuration && $self['budgetDuration'] = $budgetDuration;
        Omitted::VALUE !== $expiresAt && $self['expiresAt'] = $expiresAt;
        Omitted::VALUE !== $maxBudget && $self['maxBudget'] = $maxBudget;
        Omitted::VALUE !== $maxParallelRequests && $self['maxParallelRequests'] = $maxParallelRequests;
        null !== $requiredEndUserID && $self['requiredEndUserID'] = $requiredEndUserID;
        Omitted::VALUE !== $rpmLimit && $self['rpmLimit'] = $rpmLimit;
        Omitted::VALUE !== $tokenUserID && $self['tokenUserID'] = $tokenUserID;
        Omitted::VALUE !== $tpmLimit && $self['tpmLimit'] = $tpmLimit;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withTokenGroupID(string $tokenGroupID): self
    {
        $self = clone $this;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

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

    /**
     * Require a nonempty caller-asserted end-user ID; not proof of identity.
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

    public function withTokenUserID(?string $tokenUserID): self
    {
        $self = clone $this;
        $self['tokenUserID'] = $tokenUserID;

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
