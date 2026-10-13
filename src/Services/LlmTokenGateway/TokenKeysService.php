<?php

declare(strict_types=1);

namespace Telnyx\Services\LlmTokenGateway;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\LlmTokenGateway\TokenGroups\BudgetDuration;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKey;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LlmTokenGateway\TokenKeysContract;

/**
 * Manage and report AI Gateway usage.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TokenKeysService implements TokenKeysContract
{
    /**
     * @api
     */
    public TokenKeysRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TokenKeysRawService($client);
    }

    /**
     * @api
     *
     * Create gateway token key within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response. The token secret is returned only on the original create response. A replay returns metadata without the secret. Provisioning is advisory; ready is not a guarantee of inference availability.
     *
     * @param string $name Body param
     * @param string $tokenGroupID Body param
     * @param string $idempotencyKey Header param: 24h, scoped by account+method+path. Same key/body returns same outcome; changed body 409; in-progress 409 with Retry-After. Token-create replay returns 200 metadata WITHOUT secret.
     * @param list<string>|Omitted|null $allowedModels Body param
     * @param bool $blocked Body param
     * @param Omitted|BudgetDuration|value-of<BudgetDuration>|null $budgetDuration Body param
     * @param \DateTimeInterface|Omitted|null $expiresAt Body param
     * @param float|Omitted|null $maxBudget body param: USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting
     * @param int|Omitted|null $maxParallelRequests Body param: Optional maximum concurrent reserved/dispatched cache misses across replicas. Null means no concurrency cap. Cache hits do not consume slots; unknown usage retains its budget hold without a slot.
     * @param bool $requiredEndUserID body param: Require a nonempty caller-asserted end-user ID; not proof of identity
     * @param int|Omitted|null $rpmLimit Body param: Omitted or null defaults to the maximum (6000) (on a blocked key, null is kept until the key is unblocked); a value below the minimum (1) or above the maximum is rejected with 400 limit_out_of_range; a malformed value (negative, wrong type or precision) is 400 invalid_request. Block the key (blocked: true) to deny it; blocking is always accepted.
     * @param string|Omitted|null $tokenUserID Body param
     * @param int|Omitted|null $tpmLimit Body param: Omitted or null defaults to the maximum (10000000) (on a blocked key, null is kept until the key is unblocked); a value below the minimum (1) or above the maximum is rejected with 400 limit_out_of_range; a malformed value (negative, wrong type or precision) is 400 invalid_request. Block the key (blocked: true) to deny it; blocking is always accepted.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        string $tokenGroupID,
        string $idempotencyKey,
        array|Omitted|null $allowedModels = Omitted::VALUE,
        ?bool $blocked = null,
        Omitted|BudgetDuration|string|null $budgetDuration = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $expiresAt = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        bool $requiredEndUserID = false,
        int|Omitted|null $rpmLimit = Omitted::VALUE,
        string|Omitted|null $tokenUserID = Omitted::VALUE,
        int|Omitted|null $tpmLimit = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): TokenKeyResponse {
        $params = array_filter(
            [
                'name' => $name,
                'tokenGroupID' => $tokenGroupID,
                'idempotencyKey' => $idempotencyKey,
                'allowedModels' => $allowedModels,
                'blocked' => $blocked ?? Omitted::VALUE,
                'budgetDuration' => $budgetDuration,
                'expiresAt' => $expiresAt,
                'maxBudget' => $maxBudget,
                'maxParallelRequests' => $maxParallelRequests,
                'requiredEndUserID' => $requiredEndUserID,
                'rpmLimit' => $rpmLimit,
                'tokenUserID' => $tokenUserID,
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
     * Get gateway token key within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TokenKeyResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update gateway token key within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response. Omitted fields are preserved. Null clears max_parallel_requests; null resets budget and rate limits to their maximum. A stale If-Match returns 412.
     *
     * @param string $id Path param
     * @param string $idempotencyKey Header param: 24h, scoped by account+method+path. Same key/body returns same outcome; changed body 409; in-progress 409 with Retry-After. Token-create replay returns 200 metadata WITHOUT secret.
     * @param string $ifMatch Header param: Exact quoted resource-version ETag; an exact intermediary-weakened echo W/"n" is accepted. Wildcard, combined and malformed validators are rejected; stale 412; missing 428. HTTP field names are case-insensitive. Replayed idempotent result is checked first.
     * @param list<string>|Omitted|null $allowedModels Body param
     * @param bool $blocked Body param
     * @param Omitted|BudgetDuration|value-of<BudgetDuration>|null $budgetDuration Body param
     * @param \DateTimeInterface|Omitted|null $expiresAt Body param
     * @param float|Omitted|null $maxBudget body param: USD, decimal precision at most 6 places; parse exactly to integer micro-USD, never binary float accounting
     * @param int|Omitted|null $maxParallelRequests Body param: Optional maximum concurrent reserved/dispatched cache misses across replicas. Null means no concurrency cap. Cache hits do not consume slots; unknown usage retains its budget hold without a slot.
     * @param string $name Body param
     * @param bool $requiredEndUserID Body param: Require a nonempty caller-asserted end-user ID; not proof of identity. Omission preserves the current requirement.
     * @param int|Omitted|null $rpmLimit Body param: Omitted or null defaults to the maximum (6000) (on a blocked key, null is kept until the key is unblocked); a value below the minimum (1) or above the maximum is rejected with 400 limit_out_of_range; a malformed value (negative, wrong type or precision) is 400 invalid_request. Block the key (blocked: true) to deny it; blocking is always accepted.
     * @param int|Omitted|null $tpmLimit Body param: Omitted or null defaults to the maximum (10000000) (on a blocked key, null is kept until the key is unblocked); a value below the minimum (1) or above the maximum is rejected with 400 limit_out_of_range; a malformed value (negative, wrong type or precision) is 400 invalid_request. Block the key (blocked: true) to deny it; blocking is always accepted.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $idempotencyKey,
        string $ifMatch,
        array|Omitted|null $allowedModels = Omitted::VALUE,
        ?bool $blocked = null,
        Omitted|BudgetDuration|string|null $budgetDuration = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $expiresAt = Omitted::VALUE,
        float|Omitted|null $maxBudget = Omitted::VALUE,
        int|Omitted|null $maxParallelRequests = Omitted::VALUE,
        ?string $name = null,
        ?bool $requiredEndUserID = null,
        int|Omitted|null $rpmLimit = Omitted::VALUE,
        int|Omitted|null $tpmLimit = Omitted::VALUE,
        RequestOptions|array|null $requestOptions = null,
    ): TokenKeyResponse {
        $params = array_filter(
            [
                'idempotencyKey' => $idempotencyKey,
                'ifMatch' => $ifMatch,
                'allowedModels' => $allowedModels,
                'blocked' => $blocked ?? Omitted::VALUE,
                'budgetDuration' => $budgetDuration,
                'expiresAt' => $expiresAt,
                'maxBudget' => $maxBudget,
                'maxParallelRequests' => $maxParallelRequests,
                'name' => $name ?? Omitted::VALUE,
                'requiredEndUserID' => $requiredEndUserID ?? Omitted::VALUE,
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
     * List gateway token keys within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
     *
     * @param string $pageSnapshot required after page 1; account/filter-bound 15-minute stable snapshot; expired/mismatch 409
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<TokenKey>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        ?string $pageSnapshot = null,
        ?string $tokenGroupID = null,
        ?string $tokenUserID = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'pageSnapshot' => $pageSnapshot ?? Omitted::VALUE,
                'tokenGroupID' => $tokenGroupID ?? Omitted::VALUE,
                'tokenUserID' => $tokenUserID ?? Omitted::VALUE,
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
     * Revoke this token key. Acknowledged revocation blocks new admissions with the key; requests already admitted may complete. Historical usage attribution is retained. Other keys in the group are unchanged.
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
