<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
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
use Telnyx\OAuthClients\OAuthClientUpdateParams\AllowedGrantType as AllowedGrantType1;
use Telnyx\OAuthClients\OAuthClientUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OAuthClientsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param list<AllowedGrantType|value-of<AllowedGrantType>> $allowedGrantTypes List of allowed OAuth grant types
     * @param list<string> $allowedScopes List of allowed OAuth scopes
     * @param ClientType|value-of<ClientType> $clientType OAuth client type
     * @param string $name The name of the OAuth client
     * @param string $logoUri URL of the client logo
     * @param string $policyUri URL of the client's privacy policy
     * @param list<string> $redirectUris List of redirect URIs (required for authorization_code flow)
     * @param bool $requirePkce Whether PKCE (Proof Key for Code Exchange) is required for this client
     * @param string $tosUri URL of the client's terms of service
     *
     * @return OAuthClientNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $allowedGrantTypes,
        $allowedScopes,
        $clientType,
        $name,
        $logoUri = omit,
        $policyUri = omit,
        $redirectUris = omit,
        $requirePkce = omit,
        $tosUri = omit,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientNewResponse {
        $params = [
            'allowedGrantTypes' => $allowedGrantTypes,
            'allowedScopes' => $allowedScopes,
            'clientType' => $clientType,
            'name' => $name,
            'logoUri' => $logoUri,
            'policyUri' => $policyUri,
            'redirectUris' => $redirectUris,
            'requirePkce' => $requirePkce,
            'tosUri' => $tosUri,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthClientNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthClientNewResponse {
        [$parsed, $options] = OAuthClientCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @return OAuthClientGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OAuthClientGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return OAuthClientGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): OAuthClientGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param list<AllowedGrantType1|value-of<AllowedGrantType1>> $allowedGrantTypes List of allowed OAuth grant types
     * @param list<string> $allowedScopes List of allowed OAuth scopes
     * @param string $logoUri URL of the client logo
     * @param string $name The name of the OAuth client
     * @param string $policyUri URL of the client's privacy policy
     * @param list<string> $redirectUris List of redirect URIs
     * @param bool $requirePkce Whether PKCE (Proof Key for Code Exchange) is required for this client
     * @param string $tosUri URL of the client's terms of service
     *
     * @return OAuthClientUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $allowedGrantTypes = omit,
        $allowedScopes = omit,
        $logoUri = omit,
        $name = omit,
        $policyUri = omit,
        $redirectUris = omit,
        $requirePkce = omit,
        $tosUri = omit,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientUpdateResponse {
        $params = [
            'allowedGrantTypes' => $allowedGrantTypes,
            'allowedScopes' => $allowedScopes,
            'logoUri' => $logoUri,
            'name' => $name,
            'policyUri' => $policyUri,
            'redirectUris' => $redirectUris,
            'requirePkce' => $requirePkce,
            'tosUri' => $tosUri,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthClientUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthClientUpdateResponse {
        [$parsed, $options] = OAuthClientUpdateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     * @param FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains> $filterAllowedGrantTypesContains Filter by allowed grant type
     * @param string $filterClientID Filter by client ID
     * @param FilterClientType|value-of<FilterClientType> $filterClientType Filter by client type
     * @param string $filterName Filter by exact client name
     * @param string $filterNameContains Filter by client name containing text
     * @param bool $filterVerified Filter by verification status
     * @param int $pageNumber Page number
     * @param int $pageSize Number of results per page
     *
     * @return OAuthClientListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filterAllowedGrantTypesContains = omit,
        $filterClientID = omit,
        $filterClientType = omit,
        $filterName = omit,
        $filterNameContains = omit,
        $filterVerified = omit,
        $pageNumber = omit,
        $pageSize = omit,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientListResponse {
        $params = [
            'filterAllowedGrantTypesContains' => $filterAllowedGrantTypesContains,
            'filterClientID' => $filterClientID,
            'filterClientType' => $filterClientType,
            'filterName' => $filterName,
            'filterNameContains' => $filterNameContains,
            'filterVerified' => $filterVerified,
            'pageNumber' => $pageNumber,
            'pageSize' => $pageSize,
        ];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return OAuthClientListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): OAuthClientListResponse {
        [$parsed, $options] = OAuthClientListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'oauth_clients',
            query: $parsed,
            options: $options,
            convert: OAuthClientListResponse::class,
        );
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
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['oauth_clients/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
