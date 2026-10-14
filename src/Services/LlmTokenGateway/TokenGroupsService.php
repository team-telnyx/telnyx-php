<?php

declare(strict_types=1);

namespace Telnyx\Services\LlmTokenGateway;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\LlmTokenGateway\TokenGroups\BudgetDuration;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroup;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Retries;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LlmTokenGateway\TokenGroupsContract;

/**
 * Manage and report AI Gateway usage.
 *
 * @phpstan-import-type GuardrailsShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails
 * @phpstan-import-type RetriesShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Retries
 * @phpstan-import-type GuardrailsShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Guardrails as GuardrailsShape1
 * @phpstan-import-type RetriesShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Retries as RetriesShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TokenGroupsService implements TokenGroupsContract
{
    /**
     * @api
     */
    public TokenGroupsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TokenGroupsRawService($client);
    }

    /**
     * @api
     *
     * Create gateway token group within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
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
    ): TokenGroupResponse {
        $params = array_filter(
            [
                'allowedModels' => $allowedModels,
                'name' => $name,
                'idempotencyKey' => $idempotencyKey,
                'blocked' => $blocked ?? Omitted::VALUE,
                'budgetDuration' => $budgetDuration,
                'cacheTtl' => $cacheTtl,
                'fallbacks' => $fallbacks,
                'guardrails' => $guardrails,
                'maxBudget' => $maxBudget,
                'maxParallelRequests' => $maxParallelRequests,
                'providerKeyIDs' => $providerKeyIDs ?? Omitted::VALUE,
                'retries' => $retries,
                'rpmLimit' => $rpmLimit,
                'tpmLimit' => $tpmLimit,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get gateway token group within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TokenGroupResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update gateway token group within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response. Omitted fields are preserved. Null clears the optional concurrency, fallback and retry settings. A stale If-Match returns 412; read the resource again before updating.
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
    ): TokenGroupResponse {
        $params = array_filter(
            [
                'idempotencyKey' => $idempotencyKey,
                'ifMatch' => $ifMatch,
                'allowedModels' => $allowedModels ?? Omitted::VALUE,
                'blocked' => $blocked ?? Omitted::VALUE,
                'budgetDuration' => $budgetDuration,
                'cacheTtl' => $cacheTtl,
                'fallbacks' => $fallbacks,
                'guardrails' => $guardrails,
                'maxBudget' => $maxBudget,
                'maxParallelRequests' => $maxParallelRequests,
                'name' => $name ?? Omitted::VALUE,
                'providerKeyIDs' => $providerKeyIDs ?? Omitted::VALUE,
                'retries' => $retries,
                'rpmLimit' => $rpmLimit,
                'tpmLimit' => $tpmLimit,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List gateway token groups within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
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
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'pageSnapshot' => $pageSnapshot ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Revoke resource and its keys atomically; retain historical attribution, never detach into an ungoverned service key.
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
    ): mixed {
        $params = ['idempotencyKey' => $idempotencyKey, 'ifMatch' => $ifMatch];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
