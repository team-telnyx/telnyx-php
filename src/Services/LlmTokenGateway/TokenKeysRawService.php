<?php

declare(strict_types=1);

namespace Telnyx\Services\LlmTokenGateway;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\LlmTokenGateway\TokenGroups\BudgetDuration;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKey;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyCreateParams;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyDeleteParams;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyListParams;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyResponse;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LlmTokenGateway\TokenKeysRawContract;

/**
 * Manage and report AI Gateway usage.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TokenKeysRawService implements TokenKeysRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create gateway token key within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response. The token secret is returned only on the original create response. A replay returns metadata without the secret. Provisioning is advisory; ready is not a guarantee of inference availability.
     *
     * @param array{
     *   name: string,
     *   tokenGroupID: string,
     *   idempotencyKey: string,
     *   allowedModels?: list<string>|null,
     *   blocked?: bool,
     *   budgetDuration?: BudgetDuration|value-of<BudgetDuration>|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   maxBudget?: float|null,
     *   maxParallelRequests?: int|null,
     *   requiredEndUserID?: bool,
     *   rpmLimit?: int|null,
     *   tokenUserID?: string|null,
     *   tpmLimit?: int|null,
     * }|TokenKeyCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenKeyResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TokenKeyCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TokenKeyCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'llm_token_gateway/token_keys',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: TokenKeyResponse::class,
        );
    }

    /**
     * @api
     *
     * Get gateway token key within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenKeyResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['llm_token_gateway/token_keys/%1$s', $id],
            options: $requestOptions,
            convert: TokenKeyResponse::class,
        );
    }

    /**
     * @api
     *
     * Update gateway token key within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response. Omitted fields are preserved. Null clears max_parallel_requests; null resets budget and rate limits to their maximum. A stale If-Match returns 412.
     *
     * @param string $id Path param
     * @param array{
     *   idempotencyKey: string,
     *   ifMatch: string,
     *   allowedModels?: list<string>|null,
     *   blocked?: bool,
     *   budgetDuration?: BudgetDuration|value-of<BudgetDuration>|null,
     *   expiresAt?: \DateTimeInterface|null,
     *   maxBudget?: float|null,
     *   maxParallelRequests?: int|null,
     *   name?: string,
     *   requiredEndUserID?: bool,
     *   rpmLimit?: int|null,
     *   tpmLimit?: int|null,
     * }|TokenKeyUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenKeyResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TokenKeyUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TokenKeyUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = [
            'idempotencyKey' => 'Idempotency-Key', 'ifMatch' => 'If-Match',
        ];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['llm_token_gateway/token_keys/%1$s', $id],
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: TokenKeyResponse::class,
        );
    }

    /**
     * @api
     *
     * List gateway token keys within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
     *
     * @param array{
     *   pageNumber?: int,
     *   pageSize?: int,
     *   pageSnapshot?: string,
     *   tokenGroupID?: string,
     *   tokenUserID?: string,
     * }|TokenKeyListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TokenKey>>
     *
     * @throws APIException
     */
    public function list(
        array|TokenKeyListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TokenKeyListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'llm_token_gateway/token_keys',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'pageSnapshot' => 'page[snapshot]',
                    'tokenGroupID' => 'token_group_id',
                    'tokenUserID' => 'token_user_id',
                ],
            ),
            options: $options,
            convert: TokenKey::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Revoke this token key. Acknowledged revocation blocks new admissions with the key; requests already admitted may complete. Historical usage attribution is retained. Other keys in the group are unchanged.
     *
     * @param array{
     *   idempotencyKey: string, ifMatch: string
     * }|TokenKeyDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|TokenKeyDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TokenKeyDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['llm_token_gateway/token_keys/%1$s', $id],
            headers: Util::array_transform_keys(
                $parsed,
                ['idempotencyKey' => 'Idempotency-Key', 'ifMatch' => 'If-Match'],
            ),
            options: $options,
            convert: null,
        );
    }
}
