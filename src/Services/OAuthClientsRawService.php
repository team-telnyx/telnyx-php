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
     *   allowedGrantTypes: list<'client_credentials'|'authorization_code'|'refresh_token'|AllowedGrantType>,
     *   allowedScopes: list<string>,
     *   clientType: 'public'|'confidential'|ClientType,
     *   name: string,
     *   logoUri?: string,
     *   policyUri?: string,
     *   redirectUris?: list<string>,
     *   requirePkce?: bool,
     *   tosUri?: string,
     * }|OAuthClientCreateParams $params
     *
     * @return BaseResponse<OAuthClientNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|OAuthClientCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<OAuthClientGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *   allowedGrantTypes?: list<'client_credentials'|'authorization_code'|'refresh_token'|OAuthClientUpdateParams\AllowedGrantType>,
     *   allowedScopes?: list<string>,
     *   logoUri?: string,
     *   name?: string,
     *   policyUri?: string,
     *   redirectUris?: list<string>,
     *   requirePkce?: bool,
     *   tosUri?: string,
     * }|OAuthClientUpdateParams $params
     *
     * @return BaseResponse<OAuthClientUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|OAuthClientUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   filterAllowedGrantTypesContains?: 'client_credentials'|'authorization_code'|'refresh_token'|FilterAllowedGrantTypesContains,
     *   filterClientID?: string,
     *   filterClientType?: 'confidential'|'public'|FilterClientType,
     *   filterName?: string,
     *   filterNameContains?: string,
     *   filterVerified?: bool,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|OAuthClientListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<OAuthClient>>
     *
     * @throws APIException
     */
    public function list(
        array|OAuthClientListParams $params,
        ?RequestOptions $requestOptions = null
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
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
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
