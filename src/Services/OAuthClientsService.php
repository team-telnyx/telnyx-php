<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\OAuthClients\OAuthClientCreateParams;
use Telnyx\OAuthClients\OAuthClientCreateParams\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClientCreateParams\ClientType;
use Telnyx\OAuthClients\OAuthClientGetResponse;
use Telnyx\OAuthClients\OAuthClientListParams;
use Telnyx\OAuthClients\OAuthClientListParams\FilterAllowedGrantTypesContains;
use Telnyx\OAuthClients\OAuthClientListParams\FilterClientType;
use Telnyx\OAuthClients\OAuthClientListResponse;
use Telnyx\OAuthClients\OAuthClientNewResponse;
use Telnyx\OAuthClients\OAuthClientUpdateParams;
use Telnyx\OAuthClients\OAuthClientUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OAuthClientsContract;

final class OAuthClientsService implements OAuthClientsContract
{
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
     *   allowed_grant_types: list<'client_credentials'|'authorization_code'|'refresh_token'|AllowedGrantType>,
     *   allowed_scopes: list<string>,
     *   client_type: 'public'|'confidential'|ClientType,
     *   name: string,
     *   logo_uri?: string,
     *   policy_uri?: string,
     *   redirect_uris?: list<string>,
     *   require_pkce?: bool,
     *   tos_uri?: string,
     * }|OAuthClientCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|OAuthClientCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientNewResponse {
        [$parsed, $options] = OAuthClientCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<OAuthClientNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'oauth_clients',
            body: (object) $parsed,
            options: $options,
            convert: OAuthClientNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a single OAuth client by ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OAuthClientGetResponse {
        /** @var BaseResponse<OAuthClientGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['oauth_clients/%1$s', $id],
            options: $requestOptions,
            convert: OAuthClientGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing OAuth client
     *
     * @param array{
     *   allowed_grant_types?: list<'client_credentials'|'authorization_code'|'refresh_token'|OAuthClientUpdateParams\AllowedGrantType>,
     *   allowed_scopes?: list<string>,
     *   logo_uri?: string,
     *   name?: string,
     *   policy_uri?: string,
     *   redirect_uris?: list<string>,
     *   require_pkce?: bool,
     *   tos_uri?: string,
     * }|OAuthClientUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|OAuthClientUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientUpdateResponse {
        [$parsed, $options] = OAuthClientUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<OAuthClientUpdateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['oauth_clients/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: OAuthClientUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of OAuth clients for the authenticated user
     *
     * @param array{
     *   filter_allowed_grant_types__contains_?: 'client_credentials'|'authorization_code'|'refresh_token'|FilterAllowedGrantTypesContains,
     *   filter_client_id_?: string,
     *   filter_client_type_?: 'confidential'|'public'|FilterClientType,
     *   filter_name_?: string,
     *   filter_name__contains_?: string,
     *   filter_verified_?: bool,
     *   page_number_?: int,
     *   page_size_?: int,
     * }|OAuthClientListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|OAuthClientListParams $params,
        ?RequestOptions $requestOptions = null
    ): OAuthClientListResponse {
        [$parsed, $options] = OAuthClientListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<OAuthClientListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'oauth_clients',
            query: $parsed,
            options: $options,
            convert: OAuthClientListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an OAuth client
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['oauth_clients/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
