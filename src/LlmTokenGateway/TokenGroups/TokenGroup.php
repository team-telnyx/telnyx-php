<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Omitted;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroup\Guardrails;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroup\Retries;

/**
 * @phpstan-import-type GuardrailsShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroup\Guardrails
 * @phpstan-import-type RetriesShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroup\Retries
 *
 * @phpstan-type TokenGroupShape = array{
 *   id: string,
 *   allowedModels: list<string>,
 *   blocked: bool,
 *   budgetDuration: null|BudgetDuration|value-of<BudgetDuration>,
 *   budgetStartedAt: \DateTimeInterface|null,
 *   cacheTtl: int|null,
 *   createdAt: \DateTimeInterface,
 *   fallbacks: array<string,list<string>>|null,
 *   guardrails: null|Guardrails|GuardrailsShape,
 *   maxBudget: float|null,
 *   name: string,
 *   providerKeyIDs: list<string>,
 *   recordType: 'token_group',
 *   reservedSpend: float,
 *   resetsAt: \DateTimeInterface|null,
 *   retries: null|Retries|RetriesShape,
 *   rpmLimit: int|null,
 *   spend: float,
 *   tpmLimit: int|null,
 *   updatedAt: \DateTimeInterface,
 *   version: int,
 *   maxParallelRequests?: int|null,
 * }
 */
final class TokenGroup implements BaseModel
{
    /** @use SdkModel<TokenGroupShape> */
    use SdkModel;

    /** @var 'token_group' $recordType */
    #[Required('record_type')]
    public string $recordType = 'token_group';

    #[Required]
    public string $id;

    /** @var list<string> $allowedModels */
    #[Required('allowed_models', list: 'string')]
    public array $allowedModels;

    #[Required]
    public bool $blocked;

    /** @var value-of<BudgetDuration>|null $budgetDuration */
    #[Required('budget_duration', enum: BudgetDuration::class)]
    public ?string $budgetDuration;

    #[Required('budget_started_at')]
    public ?\DateTimeInterface $budgetStartedAt;

    #[Required('cache_ttl')]
    public ?int $cacheTtl;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    /**
     * Per-group model fallbacks: primary alias -> ordered list of 1..3 other aliases. Every key and listed alias must be in allowed_models (a PATCH removing a referenced alias is 400); a chain never lists its own key; wildcards are rejected. Chains are one level deep (a step's own chain is not expanded). Fallback is attempted only for managed routes, only before the first provider event is forwarded, and only to steps the key may use; each attempt is reserved and recorded. {} and null both disable fallbacks.
     *
     * @var array<string,list<string>>|null $fallbacks
     */
    #[Required(map: new ListOf('string'))]
    public ?array $fallbacks;

    /**
     * Per-group guardrail policy. Missing actions default to ignore. profiles may be listed with both dlp actions ignore (staged, inactive) but a non-ignore dlp action requires at least one profile. streaming defaults to buffered when any response action is block and passthrough otherwise; passthrough with a response block is 400. Findings are codes and counts only; content is never stored. The stored form is echoed back canonicalised (all actions explicit, profiles sorted); {} is stored as an all-ignore policy, null disables.
     */
    #[Required]
    public ?Guardrails $guardrails;

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Required('max_budget')]
    public ?float $maxBudget;

    #[Required]
    public string $name;

    /** @var list<string> $providerKeyIDs */
    #[Required('provider_key_ids', list: 'string')]
    public array $providerKeyIDs;

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Required('reserved_spend')]
    public float $reservedSpend;

    #[Required('resets_at')]
    public ?\DateTimeInterface $resetsAt;

    /**
     * Per-group same-route retries. max_attempts counts the first try of each step (the primary and each fallback) and is the ceiling for the x-ltg-max-attempts request header. A step is retried only when its attempt definitely did no provider work (connection failure before dispatch, or 429/529) before the first provider event; an uncertain failure (timeout, 408/500/502/503/504) moves to the next fallback step instead. max_attempts x (1 + the longest fallback chain) must not exceed 8, else 400. The n-th retry waits retry_delay_ms (constant), retry_delay_ms*n (linear) or retry_delay_ms*2^(n-1) (exponential), at most 5 s and never past the request deadline, then jittered uniformly down to half that value so concurrent retries spread out; a provider Retry-After of at most 5 s is honoured and a longer one moves to the next step. request_timeout_ms applies to streaming requests only: it bounds each attempt's time to its first provider event and never applies after it. Non-stream requests keep the per-attempt hop and idle bounds (their headers arrive only with the finished completion). retry_delay_ms and backoff are floors for the request knobs. Each planned attempt is reserved (at most 8 per request); unused reservation is released at settlement. Managed routes only. The stored form is echoed back with defaults filled in; null disables retries.
     */
    #[Required]
    public ?Retries $retries;

    #[Required('rpm_limit')]
    public ?int $rpmLimit;

    /**
     * USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting.
     */
    #[Required]
    public float $spend;

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
     * `new TokenGroup()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenGroup::with(
     *   id: ...,
     *   allowedModels: ...,
     *   blocked: ...,
     *   budgetDuration: ...,
     *   budgetStartedAt: ...,
     *   cacheTtl: ...,
     *   createdAt: ...,
     *   fallbacks: ...,
     *   guardrails: ...,
     *   maxBudget: ...,
     *   name: ...,
     *   providerKeyIDs: ...,
     *   reservedSpend: ...,
     *   resetsAt: ...,
     *   retries: ...,
     *   rpmLimit: ...,
     *   spend: ...,
     *   tpmLimit: ...,
     *   updatedAt: ...,
     *   version: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenGroup)
     *   ->withID(...)
     *   ->withAllowedModels(...)
     *   ->withBlocked(...)
     *   ->withBudgetDuration(...)
     *   ->withBudgetStartedAt(...)
     *   ->withCacheTtl(...)
     *   ->withCreatedAt(...)
     *   ->withFallbacks(...)
     *   ->withGuardrails(...)
     *   ->withMaxBudget(...)
     *   ->withName(...)
     *   ->withProviderKeyIDs(...)
     *   ->withReservedSpend(...)
     *   ->withResetsAt(...)
     *   ->withRetries(...)
     *   ->withRpmLimit(...)
     *   ->withSpend(...)
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
     * @param list<string> $allowedModels
     * @param BudgetDuration|value-of<BudgetDuration>|null $budgetDuration
     * @param array<string,list<string>>|null $fallbacks
     * @param Guardrails|GuardrailsShape|null $guardrails
     * @param list<string> $providerKeyIDs
     * @param Retries|RetriesShape|null $retries
     */
    public static function with(
        string $id,
        array $allowedModels,
        bool $blocked,
        BudgetDuration|string|null $budgetDuration,
        ?\DateTimeInterface $budgetStartedAt,
        ?int $cacheTtl,
        \DateTimeInterface $createdAt,
        ?array $fallbacks,
        Guardrails|array|null $guardrails,
        ?float $maxBudget,
        string $name,
        array $providerKeyIDs,
        float $reservedSpend,
        ?\DateTimeInterface $resetsAt,
        Retries|array|null $retries,
        ?int $rpmLimit,
        float $spend,
        ?int $tpmLimit,
        \DateTimeInterface $updatedAt,
        int $version,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['allowedModels'] = $allowedModels;
        $self['blocked'] = $blocked;
        $self['budgetDuration'] = $budgetDuration;
        $self['budgetStartedAt'] = $budgetStartedAt;
        $self['cacheTtl'] = $cacheTtl;
        $self['createdAt'] = $createdAt;
        $self['fallbacks'] = $fallbacks;
        $self['guardrails'] = $guardrails;
        $self['maxBudget'] = $maxBudget;
        $self['name'] = $name;
        $self['providerKeyIDs'] = $providerKeyIDs;
        $self['reservedSpend'] = $reservedSpend;
        $self['resetsAt'] = $resetsAt;
        $self['retries'] = $retries;
        $self['rpmLimit'] = $rpmLimit;
        $self['spend'] = $spend;
        $self['tpmLimit'] = $tpmLimit;
        $self['updatedAt'] = $updatedAt;
        $self['version'] = $version;

        Omitted::VALUE !== $maxParallelRequests && $self['maxParallelRequests'] = $maxParallelRequests;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param list<string> $allowedModels
     */
    public function withAllowedModels(array $allowedModels): self
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

    public function withCacheTtl(?int $cacheTtl): self
    {
        $self = clone $this;
        $self['cacheTtl'] = $cacheTtl;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Per-group model fallbacks: primary alias -> ordered list of 1..3 other aliases. Every key and listed alias must be in allowed_models (a PATCH removing a referenced alias is 400); a chain never lists its own key; wildcards are rejected. Chains are one level deep (a step's own chain is not expanded). Fallback is attempted only for managed routes, only before the first provider event is forwarded, and only to steps the key may use; each attempt is reserved and recorded. {} and null both disable fallbacks.
     *
     * @param array<string,list<string>>|null $fallbacks
     */
    public function withFallbacks(?array $fallbacks): self
    {
        $self = clone $this;
        $self['fallbacks'] = $fallbacks;

        return $self;
    }

    /**
     * Per-group guardrail policy. Missing actions default to ignore. profiles may be listed with both dlp actions ignore (staged, inactive) but a non-ignore dlp action requires at least one profile. streaming defaults to buffered when any response action is block and passthrough otherwise; passthrough with a response block is 400. Findings are codes and counts only; content is never stored. The stored form is echoed back canonicalised (all actions explicit, profiles sorted); {} is stored as an all-ignore policy, null disables.
     *
     * @param Guardrails|GuardrailsShape|null $guardrails
     */
    public function withGuardrails(Guardrails|array|null $guardrails): self
    {
        $self = clone $this;
        $self['guardrails'] = $guardrails;

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
     * @param list<string> $providerKeyIDs
     */
    public function withProviderKeyIDs(array $providerKeyIDs): self
    {
        $self = clone $this;
        $self['providerKeyIDs'] = $providerKeyIDs;

        return $self;
    }

    /**
     * @param 'token_group' $recordType
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

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
     * Per-group same-route retries. max_attempts counts the first try of each step (the primary and each fallback) and is the ceiling for the x-ltg-max-attempts request header. A step is retried only when its attempt definitely did no provider work (connection failure before dispatch, or 429/529) before the first provider event; an uncertain failure (timeout, 408/500/502/503/504) moves to the next fallback step instead. max_attempts x (1 + the longest fallback chain) must not exceed 8, else 400. The n-th retry waits retry_delay_ms (constant), retry_delay_ms*n (linear) or retry_delay_ms*2^(n-1) (exponential), at most 5 s and never past the request deadline, then jittered uniformly down to half that value so concurrent retries spread out; a provider Retry-After of at most 5 s is honoured and a longer one moves to the next step. request_timeout_ms applies to streaming requests only: it bounds each attempt's time to its first provider event and never applies after it. Non-stream requests keep the per-attempt hop and idle bounds (their headers arrive only with the finished completion). retry_delay_ms and backoff are floors for the request knobs. Each planned attempt is reserved (at most 8 per request); unused reservation is released at settlement. Managed routes only. The stored form is echoed back with defaults filled in; null disables retries.
     *
     * @param Retries|RetriesShape|null $retries
     */
    public function withRetries(Retries|array|null $retries): self
    {
        $self = clone $this;
        $self['retries'] = $retries;

        return $self;
    }

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
}
