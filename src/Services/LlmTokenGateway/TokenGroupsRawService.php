<?php

declare(strict_types=1);

namespace Telnyx\Services\LlmTokenGateway;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\LlmTokenGateway\TokenGroups\BudgetDuration;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroup;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Retries;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupDeleteParams;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupListParams;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupResponse;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\LlmTokenGateway\TokenGroupsRawContract;

/**
 * Manage and report AI Gateway usage.
 *
 * @phpstan-import-type GuardrailsShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails
 * @phpstan-import-type RetriesShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Retries
 * @phpstan-import-type GuardrailsShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Guardrails as GuardrailsShape1
 * @phpstan-import-type RetriesShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams\Retries as RetriesShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TokenGroupsRawService implements TokenGroupsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create gateway token group within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
     *
     * @param array{
     *   allowedModels: list<string>,
     *   name: string,
     *   idempotencyKey: string,
     *   blocked?: bool,
     *   budgetDuration?: BudgetDuration|value-of<BudgetDuration>|null,
     *   cacheTtl?: int|null,
     *   fallbacks?: array<string,list<string>>|null,
     *   guardrails?: Guardrails|GuardrailsShape|null,
     *   maxBudget?: float|null,
     *   maxParallelRequests?: int|null,
     *   providerKeyIDs?: list<string>,
     *   retries?: Retries|RetriesShape|null,
     *   rpmLimit?: int|null,
     *   tpmLimit?: int|null,
     * }|TokenGroupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenGroupResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TokenGroupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TokenGroupCreateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['idempotencyKey' => 'Idempotency-Key'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'llm_token_gateway/token_groups',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: TokenGroupResponse::class,
        );
    }

    /**
     * @api
     *
     * Get gateway token group within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenGroupResponse>
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
            path: ['llm_token_gateway/token_groups/%1$s', $id],
            options: $requestOptions,
            convert: TokenGroupResponse::class,
        );
    }

    /**
     * @api
     *
     * Update gateway token group within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response. Omitted fields are preserved. Null clears the optional concurrency, fallback and retry settings. A stale If-Match returns 412; read the resource again before updating.
     *
     * @param string $id Path param
     * @param array{
     *   idempotencyKey: string,
     *   ifMatch: string,
     *   allowedModels?: list<string>,
     *   blocked?: bool,
     *   budgetDuration?: BudgetDuration|value-of<BudgetDuration>|null,
     *   cacheTtl?: int|null,
     *   fallbacks?: array<string,list<string>>|null,
     *   guardrails?: TokenGroupUpdateParams\Guardrails|GuardrailsShape1|null,
     *   maxBudget?: float|null,
     *   maxParallelRequests?: int|null,
     *   name?: string,
     *   providerKeyIDs?: list<string>,
     *   retries?: TokenGroupUpdateParams\Retries|RetriesShape1|null,
     *   rpmLimit?: int|null,
     *   tpmLimit?: int|null,
     * }|TokenGroupUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenGroupResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TokenGroupUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TokenGroupUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = [
            'idempotencyKey' => 'Idempotency-Key', 'ifMatch' => 'If-Match',
        ];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['llm_token_gateway/token_groups/%1$s', $id],
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: TokenGroupResponse::class,
        );
    }

    /**
     * @api
     *
     * List gateway token groups within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int, pageSnapshot?: string
     * }|TokenGroupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TokenGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|TokenGroupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TokenGroupListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'llm_token_gateway/token_groups',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'pageSnapshot' => 'page[snapshot]',
                ],
            ),
            options: $options,
            convert: TokenGroup::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Revoke resource and its keys atomically; retain historical attribution, never detach into an ungoverned service key.
     *
     * @param array{
     *   idempotencyKey: string, ifMatch: string
     * }|TokenGroupDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|TokenGroupDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TokenGroupDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['llm_token_gateway/token_groups/%1$s', $id],
            headers: Util::array_transform_keys(
                $parsed,
                ['idempotencyKey' => 'Idempotency-Key', 'ifMatch' => 'If-Match'],
            ),
            options: $options,
            convert: null,
        );
    }
}
