<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Omitted;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Guardrails;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Retries;

/**
 * Update gateway token group within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response. Omitted fields are preserved. Null clears the optional concurrency, fallback and retry settings. A stale If-Match returns 412; read the resource again before updating.
 *
 * @see Telnyx\Services\LlmTokenGateway\TokenGroupsService::update()
 *
 * @phpstan-import-type GuardrailsShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Guardrails
 * @phpstan-import-type RetriesShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Retries
 *
 * @phpstan-type TokenGroupUpdateParamsShape = array{
 *   idempotencyKey: string,
 *   ifMatch: string,
 *   allowedModels?: list<string>|null,
 *   blocked?: bool|null,
 *   budgetDuration?: null|BudgetDuration|value-of<BudgetDuration>,
 *   cacheTtl?: int|null,
 *   fallbacks?: array<string,list<string>>|null,
 *   guardrails?: null|Guardrails|GuardrailsShape,
 *   maxBudget?: float|null,
 *   maxParallelRequests?: int|null,
 *   name?: string|null,
 *   providerKeyIDs?: list<string>|null,
 *   retries?: null|Retries|RetriesShape,
 *   rpmLimit?: int|null,
 *   tpmLimit?: int|null,
 * }
 */
final class TokenGroupUpdateParams implements BaseModel
{
    /** @use SdkModel<TokenGroupUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $idempotencyKey;

    #[Required]
    public string $ifMatch;

    /** @var list<string>|null $allowedModels */
    #[Optional('allowed_models', list: 'string')]
    public ?array $allowedModels;

    #[Optional]
    public ?bool $blocked;

    /** @var value-of<BudgetDuration>|null $budgetDuration */
    #[Optional('budget_duration', enum: BudgetDuration::class, nullable: true)]
    public ?string $budgetDuration;

    #[Optional('cache_ttl', nullable: true)]
    public ?int $cacheTtl;

    /**
     * Per-group model fallbacks: primary alias -> ordered list of 1..3 other aliases. Every key and listed alias must be in allowed_models (a PATCH removing a referenced alias is 400); a chain never lists its own key; wildcards are rejected. Chains are one level deep (a step's own chain is not expanded). Fallback is attempted only for managed routes, only before the first provider event is forwarded, and only to steps the key may use; each attempt is reserved and recorded. {} and null both disable fallbacks.
     *
     * @var array<string,list<string>>|null $fallbacks
     */
    #[Optional(map: new ListOf('string'), nullable: true)]
    public ?array $fallbacks;

    /**
     * Per-group guardrail policy. Missing actions default to ignore. profiles may be listed with both dlp actions ignore (staged, inactive) but a non-ignore dlp action requires at least one profile. streaming defaults to buffered when any response action is block and passthrough otherwise; passthrough with a response block is 400. Findings are codes and counts only; content is never stored. The stored form is echoed back canonicalised (all actions explicit, profiles sorted); {} is stored as an all-ignore policy, null disables.
     */
    #[Optional(nullable: true)]
    public ?Guardrails $guardrails;

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

    /** @var list<string>|null $providerKeyIDs */
    #[Optional('provider_key_ids', list: 'string')]
    public ?array $providerKeyIDs;

    /**
     * Per-group same-route retries. max_attempts counts the first try of each step (the primary and each fallback) and is the ceiling for the x-ltg-max-attempts request header. A step is retried only when its attempt definitely did no provider work (connection failure before dispatch, or 429/529) before the first provider event; an uncertain failure (timeout, 408/500/502/503/504) moves to the next fallback step instead. max_attempts x (1 + the longest fallback chain) must not exceed 8, else 400. The n-th retry waits retry_delay_ms (constant), retry_delay_ms*n (linear) or retry_delay_ms*2^(n-1) (exponential), at most 5 s and never past the request deadline, then jittered uniformly down to half that value so concurrent retries spread out; a provider Retry-After of at most 5 s is honoured and a longer one moves to the next step. request_timeout_ms applies to streaming requests only: it bounds each attempt's time to its first provider event and never applies after it. Non-stream requests keep the per-attempt hop and idle bounds (their headers arrive only with the finished completion). retry_delay_ms and backoff are floors for the request knobs. Each planned attempt is reserved (at most 8 per request); unused reservation is released at settlement. Managed routes only. The stored form is echoed back with defaults filled in; null disables retries.
     */
    #[Optional(nullable: true)]
    public ?Retries $retries;

    #[Optional('rpm_limit', nullable: true)]
    public ?int $rpmLimit;

    #[Optional('tpm_limit', nullable: true)]
    public ?int $tpmLimit;

    /**
     * `new TokenGroupUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenGroupUpdateParams::with(idempotencyKey: ..., ifMatch: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenGroupUpdateParams)->withIdempotencyKey(...)->withIfMatch(...)
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
     * @param Omitted|BudgetDuration|value-of<BudgetDuration>|null $budgetDuration
     * @param Omitted|array<string,list<string>>|null $fallbacks
     * @param Omitted|Guardrails|GuardrailsShape|null $guardrails
     * @param Omitted|Retries|RetriesShape|null $retries
     * @param list<string>|null $allowedModels
     * @param list<string>|null $providerKeyIDs
     */
    public static function with(
        string $idempotencyKey,
        string $ifMatch,
        Omitted|BudgetDuration|string|null $budgetDuration = Omitted::VALUE,
        int|Omitted|null $cacheTtl = Omitted::VALUE,
        Omitted|array|null $fallbacks = Omitted::VALUE,
        Omitted|Guardrails|array|null $guardrails = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        Omitted|Retries|array|null $retries = Omitted::VALUE,
        int|Omitted|null $rpmLimit = Omitted::VALUE,
        int|Omitted|null $tpmLimit = Omitted::VALUE,
        ?array $allowedModels = null,
        ?bool $blocked = null,
        ?string $name = null,
        ?array $providerKeyIDs = null,
    ): self {
        $self = new self;

        $self['idempotencyKey'] = $idempotencyKey;
        $self['ifMatch'] = $ifMatch;

        null !== $allowedModels && $self['allowedModels'] = $allowedModels;
        null !== $blocked && $self['blocked'] = $blocked;
        Omitted::VALUE !== $budgetDuration && $self['budgetDuration'] = $budgetDuration;
        Omitted::VALUE !== $cacheTtl && $self['cacheTtl'] = $cacheTtl;
        Omitted::VALUE !== $fallbacks && $self['fallbacks'] = $fallbacks;
        Omitted::VALUE !== $guardrails && $self['guardrails'] = $guardrails;
        Omitted::VALUE !== $maxBudget && $self['maxBudget'] = $maxBudget;
        Omitted::VALUE !== $maxParallelRequests && $self['maxParallelRequests'] = $maxParallelRequests;
        null !== $name && $self['name'] = $name;
        null !== $providerKeyIDs && $self['providerKeyIDs'] = $providerKeyIDs;
        Omitted::VALUE !== $retries && $self['retries'] = $retries;
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

    public function withCacheTtl(?int $cacheTtl): self
    {
        $self = clone $this;
        $self['cacheTtl'] = $cacheTtl;

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
     * @param list<string> $providerKeyIDs
     */
    public function withProviderKeyIDs(array $providerKeyIDs): self
    {
        $self = clone $this;
        $self['providerKeyIDs'] = $providerKeyIDs;

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

    public function withTpmLimit(?int $tpmLimit): self
    {
        $self = clone $this;
        $self['tpmLimit'] = $tpmLimit;

        return $self;
    }
}
