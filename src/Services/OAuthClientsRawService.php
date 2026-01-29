<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\OAuthClients\OAuthClient;
use Telnyx\OAuthClients\OAuthClientCreateParams;
use Telnyx\OAuthClients\OAuthClientCreateParams\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClientCreateParams\ClientType;
use Telnyx\OAuthClients\OAuthClientGetResponse;
use Telnyx\OAuthClients\OAuthClientListParams;
use Telnyx\OAuthClients\OAuthClientListParams\FilterAllowedGrantTypesContains;
use Telnyx\OAuthClients\OAuthClientListParams\FilterClientType;
use Telnyx\OAuthClients\OAuthClientNewResponse;
use Telnyx\OAuthClients\OAuthClientUpdateParams;
use Telnyx\OAuthClients\OAuthClientUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OAuthClientsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class OAuthClientsRawService implements OAuthClientsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new OAuth client
     *
     * @param array{
     *   allowedGrantTypes: list<AllowedGrantType|value-of<AllowedGrantType>>,
     *   allowedScopes: list<string>,
     *   clientType: ClientType|value-of<ClientType>,
     *   name: string,
     *   logoUri?: string,
     *   policyUri?: string,
     *   redirectUris?: list<string>,
     *   requirePkce?: bool,
     *   tosUri?: string,
     * }|OAuthClientCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OAuthClientNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|OAuthClientCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthClientCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'oauth_clients',
            body: (object) $parsed,
            options: $options,
            convert: OAuthClientNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a single OAuth client by ID
     *
     * @param string $id OAuth client ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OAuthClientGetResponse>
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
            path: ['oauth_clients/%1$s', $id],
            options: $requestOptions,
            convert: OAuthClientGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update an existing OAuth client
     *
     * @param string $id OAuth client ID
     * @param array{
     *   allowedGrantTypes?: list<OAuthClientUpdateParams\AllowedGrantType|value-of<OAuthClientUpdateParams\AllowedGrantType>>,
     *   allowedScopes?: list<string>,
     *   logoUri?: string,
     *   name?: string,
     *   policyUri?: string,
     *   redirectUris?: list<string>,
     *   requirePkce?: bool,
     *   tosUri?: string,
     * }|OAuthClientUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<OAuthClientUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|OAuthClientUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthClientUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['oauth_clients/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: OAuthClientUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a paginated list of OAuth clients for the authenticated user
     *
     * @param array{
     *   filterAllowedGrantTypesContains?: FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains>,
     *   filterClientID?: string,
     *   filterClientType?: FilterClientType|value-of<FilterClientType>,
     *   filterName?: string,
     *   filterNameContains?: string,
     *   filterVerified?: bool,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|OAuthClientListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<OAuthClient>>
     *
     * @throws APIException
     */
    public function list(
        array|OAuthClientListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = OAuthClientListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'oauth_clients',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterAllowedGrantTypesContains' => 'filter[allowed_grant_types][contains]',
                    'filterClientID' => 'filter[client_id]',
                    'filterClientType' => 'filter[client_type]',
                    'filterName' => 'filter[name]',
                    'filterNameContains' => 'filter[name][contains]',
                    'filterVerified' => 'filter[verified]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: OAuthClient::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete an OAuth client
     *
     * @param string $id OAuth client ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['oauth_clients/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
