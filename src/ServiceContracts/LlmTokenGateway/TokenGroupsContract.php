<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\LlmTokenGateway;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\LlmTokenGateway\TokenGroups\BudgetDuration;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroup;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Retries;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type GuardrailsShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails
 * @phpstan-import-type RetriesShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Retries
 * @phpstan-import-type GuardrailsShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Guardrails as GuardrailsShape1
 * @phpstan-import-type RetriesShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Retries as RetriesShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TokenGroupsContract
{
    /**
     * @api
     *
     * @param list<string> $allowedModels Body param
     * @param string $name Body param
     * @param string $idempotencyKey Header param: 24h, scoped by account+method+path. Same key/body returns same outcome; changed body 409; in-progress 409 with Retry-After. Token-create replay returns 200 metadata WITHOUT secret.
     * @param bool $blocked Body param
     * @param Omitted|BudgetDuration|value-of<BudgetDuration>|null $budgetDuration Body param
     * @param int|Omitted|null $cacheTtl Body param
     * @param Omitted|array<string,list<string>>|null $fallbacks Body param: Per-group model fallbacks: primary alias -> ordered list of 1..3 other aliases. Every key and listed alias must be in allowed_models (a PATCH removing a referenced alias is 400); a chain never lists its own key; wildcards are rejected. Chains are one level deep (a step's own chain is not expanded). Fallback is attempted only for managed routes, only before the first provider event is forwarded, and only to steps the key may use; each attempt is reserved and recorded. {} and null both disable fallbacks.
     * @param Omitted|Guardrails|GuardrailsShape|null $guardrails Body param: Per-group guardrail policy. Missing actions default to ignore. profiles may be listed with both dlp actions ignore (staged, inactive) but a non-ignore dlp action requires at least one profile. streaming defaults to buffered when any response action is block and passthrough otherwise; passthrough with a response block is 400. Findings are codes and counts only; content is never stored. The stored form is echoed back canonicalised (all actions explicit, profiles sorted); {} is stored as an all-ignore policy, null disables.
     * @param float|Omitted|null $maxBudget body param: USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting
     * @param int|Omitted|null $maxParallelRequests Body param: Optional maximum concurrent reserved/dispatched cache misses across replicas. Null means no concurrency cap. Cache hits do not consume slots; unknown usage retains its budget hold without a slot.
     * @param list<string> $providerKeyIDs Body param
     * @param Omitted|Retries|RetriesShape|null $retries Body param: Per-group same-route retries. max_attempts counts the first try of each step (the primary and each fallback) and is the ceiling for the x-ltg-max-attempts request header. A step is retried only when its attempt definitely did no provider work (connection failure before dispatch, or 429/529) before the first provider event; an uncertain failure (timeout, 408/500/502/503/504) moves to the next fallback step instead. max_attempts x (1 + the longest fallback chain) must not exceed 8, else 400. The n-th retry waits retry_delay_ms (constant), retry_delay_ms*n (linear) or retry_delay_ms*2^(n-1) (exponential), at most 5 s and never past the request deadline, then jittered uniformly down to half that value so concurrent retries spread out; a provider Retry-After of at most 5 s is honoured and a longer one moves to the next step. request_timeout_ms applies to streaming requests only: it bounds each attempt's time to its first provider event and never applies after it. Non-stream requests keep the per-attempt hop and idle bounds (their headers arrive only with the finished completion). retry_delay_ms and backoff are floors for the request knobs. Each planned attempt is reserved (at most 8 per request); unused reservation is released at settlement. Managed routes only. The stored form is echoed back with defaults filled in; null disables retries.
     * @param int|Omitted|null $rpmLimit Body param
     * @param int|Omitted|null $tpmLimit Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $allowedModels,
        string $name,
        string $idempotencyKey,
        ?bool $blocked = null,
        Omitted|BudgetDuration|string|null $budgetDuration = Omitted::VALUE,
        int|Omitted|null $cacheTtl = Omitted::VALUE,
        Omitted|array|null $fallbacks = Omitted::VALUE,
        Omitted|Guardrails|array|null $guardrails = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        ?array $providerKeyIDs = null,
        Omitted|Retries|array|null $retries = Omitted::VALUE,
        int|Omitted|null $rpmLimit = Omitted::VALUE,
        int|Omitted|null $tpmLimit = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): TokenGroupResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TokenGroupResponse;

    /**
     * @api
     *
     * @param string $id Path param
     * @param string $idempotencyKey Header param: 24h, scoped by account+method+path. Same key/body returns same outcome; changed body 409; in-progress 409 with Retry-After. Token-create replay returns 200 metadata WITHOUT secret.
     * @param string $ifMatch Header param: Exact quoted resource-version ETag; an exact intermediary-weakened echo W/"n" is accepted. Wildcard, combined and malformed validators are rejected; stale 412; missing 428. HTTP field names are case-insensitive. Replayed idempotent result is checked first.
     * @param list<string> $allowedModels Body param
     * @param bool $blocked Body param
     * @param Omitted|BudgetDuration|value-of<BudgetDuration>|null $budgetDuration Body param
     * @param int|Omitted|null $cacheTtl Body param
     * @param Omitted|array<string,list<string>>|null $fallbacks Body param: Per-group model fallbacks: primary alias -> ordered list of 1..3 other aliases. Every key and listed alias must be in allowed_models (a PATCH removing a referenced alias is 400); a chain never lists its own key; wildcards are rejected. Chains are one level deep (a step's own chain is not expanded). Fallback is attempted only for managed routes, only before the first provider event is forwarded, and only to steps the key may use; each attempt is reserved and recorded. {} and null both disable fallbacks.
     * @param Omitted|\Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Guardrails|GuardrailsShape1|null $guardrails Body param: Per-group guardrail policy. Missing actions default to ignore. profiles may be listed with both dlp actions ignore (staged, inactive) but a non-ignore dlp action requires at least one profile. streaming defaults to buffered when any response action is block and passthrough otherwise; passthrough with a response block is 400. Findings are codes and counts only; content is never stored. The stored form is echoed back canonicalised (all actions explicit, profiles sorted); {} is stored as an all-ignore policy, null disables.
     * @param float|Omitted|null $maxBudget body param: USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting
     * @param int|Omitted|null $maxParallelRequests Body param: Optional maximum concurrent reserved/dispatched cache misses across replicas. Null means no concurrency cap. Cache hits do not consume slots; unknown usage retains its budget hold without a slot.
     * @param string $name Body param
     * @param list<string> $providerKeyIDs Body param
     * @param Omitted|\Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Retries|RetriesShape1|null $retries Body param: Per-group same-route retries. max_attempts counts the first try of each step (the primary and each fallback) and is the ceiling for the x-ltg-max-attempts request header. A step is retried only when its attempt definitely did no provider work (connection failure before dispatch, or 429/529) before the first provider event; an uncertain failure (timeout, 408/500/502/503/504) moves to the next fallback step instead. max_attempts x (1 + the longest fallback chain) must not exceed 8, else 400. The n-th retry waits retry_delay_ms (constant), retry_delay_ms*n (linear) or retry_delay_ms*2^(n-1) (exponential), at most 5 s and never past the request deadline, then jittered uniformly down to half that value so concurrent retries spread out; a provider Retry-After of at most 5 s is honoured and a longer one moves to the next step. request_timeout_ms applies to streaming requests only: it bounds each attempt's time to its first provider event and never applies after it. Non-stream requests keep the per-attempt hop and idle bounds (their headers arrive only with the finished completion). retry_delay_ms and backoff are floors for the request knobs. Each planned attempt is reserved (at most 8 per request); unused reservation is released at settlement. Managed routes only. The stored form is echoed back with defaults filled in; null disables retries.
     * @param int|Omitted|null $rpmLimit Body param
     * @param int|Omitted|null $tpmLimit Body param
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $idempotencyKey,
        string $ifMatch,
        ?array $allowedModels = null,
        ?bool $blocked = null,
        Omitted|BudgetDuration|string|null $budgetDuration = Omitted::VALUE,
        int|Omitted|null $cacheTtl = Omitted::VALUE,
        Omitted|array|null $fallbacks = Omitted::VALUE,
        Omitted|\Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Guardrails|array|null $guardrails = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        ?string $name = null,
        ?array $providerKeyIDs = null,
        Omitted|\Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Retries|array|null $retries = Omitted::VALUE,
        int|Omitted|null $rpmLimit = Omitted::VALUE,
        int|Omitted|null $tpmLimit = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): TokenGroupResponse;

    /**
     * @api
     *
     * @param string $pageSnapshot required after page 1; account/filter-bound 15-minute stable snapshot; expired/mismatch 409
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<TokenGroup>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        ?string $pageSnapshot = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $idempotencyKey 24h, scoped by account+method+path. Same key/body returns same outcome; changed body 409; in-progress 409 with Retry-After. Token-create replay returns 200 metadata WITHOUT secret.
     * @param string $ifMatch Exact quoted resource-version ETag; an exact intermediary-weakened echo W/"n" is accepted. Wildcard, combined and malformed validators are rejected; stale 412; missing 428. HTTP field names are case-insensitive. Replayed idempotent result is checked first.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        string $idempotencyKey,
        string $ifMatch,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
