<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\LlmTokenGateway;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\LlmTokenGateway\TokenGroups\BudgetDuration;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKey;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TokenKeysContract
{
    /**
     * @api
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
    ): TokenKeyResponse;

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
    ): TokenKeyResponse;

    /**
     * @api
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
    ): TokenKeyResponse;

    /**
     * @api
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
