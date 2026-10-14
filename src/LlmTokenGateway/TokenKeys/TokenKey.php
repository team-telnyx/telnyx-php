<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenKeys;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\LlmTokenGateway\TokenGroups\BudgetDuration;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKey\Provisioning;

/**
 * @phpstan-type TokenKeyShape = array{
 *   id: string,
 *   allowedModels: list<string>|null,
 *   blocked: bool,
 *   budgetDuration: null|BudgetDuration|value-of<BudgetDuration>,
 *   budgetStartedAt: \DateTimeInterface|null,
 *   createdAt: \DateTimeInterface,
 *   expiresAt: \DateTimeInterface|null,
 *   maxBudget: float|null,
 *   name: string,
 *   recordType: 'token_key',
 *   requiredEndUserID: bool,
 *   reservedSpend: float,
 *   resetsAt: \DateTimeInterface|null,
 *   rpmLimit: int|null,
 *   spend: float,
 *   tokenGroupID: string,
 *   tokenUserID: string|null,
 *   tpmLimit: int|null,
 *   updatedAt: \DateTimeInterface,
 *   version: int,
 *   maxParallelRequests?: int|null,
 *   provisioning?: null|Provisioning|value-of<Provisioning>,
 * }
 */
final class TokenKey implements BaseModel
{
    /** @use SdkModel<TokenKeyShape> */
    use SdkModel;

    /** @var 'token_key' $recordType */
    #[Required('record_type')]
    public string $recordType = 'token_key';

    #[Required]
    public string $id;

    /** @var list<string>|null $allowedModels */
    #[Required('allowed_models', list: 'string')]
    public ?array $allowedModels;

    #[Required]
    public bool $blocked;

    /** @var value-of<BudgetDuration>|null $budgetDuration */
    #[Required('budget_duration', enum: BudgetDuration::class)]
    public ?string $budgetDuration;

    #[Required('budget_started_at')]
    public ?\DateTimeInterface $budgetStartedAt;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Required('max_budget')]
    public ?float $maxBudget;

    #[Required]
    public string $name;

    /**
     * Require a nonempty caller-asserted end-user ID; not proof of identity.
     */
    #[Required('required_end_user_id')]
    public bool $requiredEndUserID;

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Required('reserved_spend')]
    public float $reservedSpend;

    #[Required('resets_at')]
    public ?\DateTimeInterface $resetsAt;

    /**
     * Stored key limit; set to the maximum when the key was written without one (on a blocked key, null is kept until the key is unblocked).
     */
    #[Required('rpm_limit')]
    public ?int $rpmLimit;

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Required]
    public float $spend;

    #[Required('token_group_id')]
    public string $tokenGroupID;

    #[Required('token_user_id')]
    public ?string $tokenUserID;

    /**
     * Stored key limit; set to the maximum when the key was written without one (on a blocked key, null is kept until the key is unblocked).
     */
    #[Required('tpm_limit')]
    public ?int $tpmLimit;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    #[Required]
    public int $version;

    /**
     * Optional maximum concurrent reserved/dispatched cache misses across replicas. Null means no concurrency cap. Cache hits do not consume slots; unknown usage retains its budget hold without a slot.
     */
    #[Optional('max_parallel_requests', nullable: true)]
    public ?int $maxParallelRequests;

    /**
     * Provisioning state of the key's current policy. `pending`: retry readiness with bounded backoff (treat `unknown` the same). `inactive` and `unsupported` are terminal until the key, group, user or catalog changes. `unavailable` means provisioning is stuck and is retried slowly; surface it. Absent while the gateway runs in compatibility mode.
     *
     * @var value-of<Provisioning>|null $provisioning
     */
    #[Optional(enum: Provisioning::class)]
    public ?string $provisioning;

    /**
     * `new TokenKey()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenKey::with(
     *   id: ...,
     *   allowedModels: ...,
     *   blocked: ...,
     *   budgetDuration: ...,
     *   budgetStartedAt: ...,
     *   createdAt: ...,
     *   expiresAt: ...,
     *   maxBudget: ...,
     *   name: ...,
     *   requiredEndUserID: ...,
     *   reservedSpend: ...,
     *   resetsAt: ...,
     *   rpmLimit: ...,
     *   spend: ...,
     *   tokenGroupID: ...,
     *   tokenUserID: ...,
     *   tpmLimit: ...,
     *   updatedAt: ...,
     *   version: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenKey)
     *   ->withID(...)
     *   ->withAllowedModels(...)
     *   ->withBlocked(...)
     *   ->withBudgetDuration(...)
     *   ->withBudgetStartedAt(...)
     *   ->withCreatedAt(...)
     *   ->withExpiresAt(...)
     *   ->withMaxBudget(...)
     *   ->withName(...)
     *   ->withRequiredEndUserID(...)
     *   ->withReservedSpend(...)
     *   ->withResetsAt(...)
     *   ->withRpmLimit(...)
     *   ->withSpend(...)
     *   ->withTokenGroupID(...)
     *   ->withTokenUserID(...)
     *   ->withTpmLimit(...)
     *   ->withUpdatedAt(...)
     *   ->withVersion(...)
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
     * @param list<string>|null $allowedModels
     * @param BudgetDuration|value-of<BudgetDuration>|null $budgetDuration
     * @param Provisioning|value-of<Provisioning>|null $provisioning
     */
    public static function with(
        string $id,
        ?array $allowedModels,
        bool $blocked,
        BudgetDuration|string|null $budgetDuration,
        ?\DateTimeInterface $budgetStartedAt,
        \DateTimeInterface $createdAt,
        ?\DateTimeInterface $expiresAt,
        ?float $maxBudget,
        string $name,
        float $reservedSpend,
        ?\DateTimeInterface $resetsAt,
        ?int $rpmLimit,
        float $spend,
        string $tokenGroupID,
        ?string $tokenUserID,
        ?int $tpmLimit,
        \DateTimeInterface $updatedAt,
        int $version,
        bool $requiredEndUserID = false,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        Provisioning|string|null $provisioning = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['allowedModels'] = $allowedModels;
        $self['blocked'] = $blocked;
        $self['budgetDuration'] = $budgetDuration;
        $self['budgetStartedAt'] = $budgetStartedAt;
        $self['createdAt'] = $createdAt;
        $self['expiresAt'] = $expiresAt;
        $self['maxBudget'] = $maxBudget;
        $self['name'] = $name;
        $self['requiredEndUserID'] = $requiredEndUserID;
        $self['reservedSpend'] = $reservedSpend;
        $self['resetsAt'] = $resetsAt;
        $self['rpmLimit'] = $rpmLimit;
        $self['spend'] = $spend;
        $self['tokenGroupID'] = $tokenGroupID;
        $self['tokenUserID'] = $tokenUserID;
        $self['tpmLimit'] = $tpmLimit;
        $self['updatedAt'] = $updatedAt;
        $self['version'] = $version;

        Omitted::VALUE !== $maxParallelRequests && $self['maxParallelRequests'] = $maxParallelRequests;
        null !== $provisioning && $self['provisioning'] = $provisioning;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

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

    public function withBudgetStartedAt(
        ?\DateTimeInterface $budgetStartedAt
    ): self {
        $self = clone $this;
        $self['budgetStartedAt'] = $budgetStartedAt;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * @param 'token_key' $recordType
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

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
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    public function withReservedSpend(float $reservedSpend): self
    {
        $self = clone $this;
        $self['reservedSpend'] = $reservedSpend;

        return $self;
    }

    public function withResetsAt(?\DateTimeInterface $resetsAt): self
    {
        $self = clone $this;
        $self['resetsAt'] = $resetsAt;

        return $self;
    }

    /**
     * Stored key limit; set to the maximum when the key was written without one (on a blocked key, null is kept until the key is unblocked).
     */
    public function withRpmLimit(?int $rpmLimit): self
    {
        $self = clone $this;
        $self['rpmLimit'] = $rpmLimit;

        return $self;
    }

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    public function withSpend(float $spend): self
    {
        $self = clone $this;
        $self['spend'] = $spend;

        return $self;
    }

    public function withTokenGroupID(string $tokenGroupID): self
    {
        $self = clone $this;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }

    public function withTokenUserID(?string $tokenUserID): self
    {
        $self = clone $this;
        $self['tokenUserID'] = $tokenUserID;

        return $self;
    }

    /**
     * Stored key limit; set to the maximum when the key was written without one (on a blocked key, null is kept until the key is unblocked).
     */
    public function withTpmLimit(?int $tpmLimit): self
    {
        $self = clone $this;
        $self['tpmLimit'] = $tpmLimit;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withVersion(int $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

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
     * Provisioning state of the key's current policy. `pending`: retry readiness with bounded backoff (treat `unknown` the same). `inactive` and `unsupported` are terminal until the key, group, user or catalog changes. `unavailable` means provisioning is stuck and is retried slowly; surface it. Absent while the gateway runs in compatibility mode.
     *
     * @param Provisioning|value-of<Provisioning> $provisioning
     */
    public function withProvisioning(Provisioning|string $provisioning): self
    {
        $self = clone $this;
        $self['provisioning'] = $provisioning;

        return $self;
    }
}
