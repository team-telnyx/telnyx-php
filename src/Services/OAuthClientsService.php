<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\OAuthClients\OAuthClient;
use Telnyx\OAuthClients\OAuthClientCreateParams\AllowedGrantType;
use Telnyx\OAuthClients\OAuthClientCreateParams\ClientType;
use Telnyx\OAuthClients\OAuthClientGetResponse;
use Telnyx\OAuthClients\OAuthClientListParams\FilterAllowedGrantTypesContains;
use Telnyx\OAuthClients\OAuthClientListParams\FilterClientType;
use Telnyx\OAuthClients\OAuthClientNewResponse;
use Telnyx\OAuthClients\OAuthClientUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\OAuthClientsContract;

final class OAuthClientsService implements OAuthClientsContract
{
    /**
     * @api
     */
    public OAuthClientsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new OAuthClientsRawService($client);
    }

    /**
     * @api
     *
     * Create a new OAuth client
     *
     * @param list<'client_credentials'|'authorization_code'|'refresh_token'|AllowedGrantType> $allowedGrantTypes List of allowed OAuth grant types
     * @param list<string> $allowedScopes List of allowed OAuth scopes
     * @param 'public'|'confidential'|ClientType $clientType OAuth client type
     * @param string $name The name of the OAuth client
     * @param string $logoUri URL of the client logo
     * @param string $policyUri URL of the client's privacy policy
     * @param list<string> $redirectUris List of redirect URIs (required for authorization_code flow)
     * @param bool $requirePkce Whether PKCE (Proof Key for Code Exchange) is required for this client
     * @param string $tosUri URL of the client's terms of service
     *
     * @throws APIException
     */
    public function create(
        array $allowedGrantTypes,
        array $allowedScopes,
        string|ClientType $clientType,
        string $name,
        ?string $logoUri = null,
        ?string $policyUri = null,
        array $redirectUris = [],
        bool $requirePkce = false,
        ?string $tosUri = null,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientNewResponse {
        $params = Util::removeNulls(
            [
                'allowedGrantTypes' => $allowedGrantTypes,
                'allowedScopes' => $allowedScopes,
                'clientType' => $clientType,
                'name' => $name,
                'logoUri' => $logoUri,
                'policyUri' => $policyUri,
                'redirectUris' => $redirectUris,
                'requirePkce' => $requirePkce,
                'tosUri' => $tosUri,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a single OAuth client by ID
     *
     * @param string $id OAuth client ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): OAuthClientGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing OAuth client
     *
     * @param string $id OAuth client ID
     * @param list<'client_credentials'|'authorization_code'|'refresh_token'|\Telnyx\OAuthClients\OAuthClientUpdateParams\AllowedGrantType> $allowedGrantTypes List of allowed OAuth grant types
     * @param list<string> $allowedScopes List of allowed OAuth scopes
     * @param string $logoUri URL of the client logo
     * @param string $name The name of the OAuth client
     * @param string $policyUri URL of the client's privacy policy
     * @param list<string> $redirectUris List of redirect URIs
     * @param bool $requirePkce Whether PKCE (Proof Key for Code Exchange) is required for this client
     * @param string $tosUri URL of the client's terms of service
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?array $allowedGrantTypes = null,
        ?array $allowedScopes = null,
        ?string $logoUri = null,
        ?string $name = null,
        ?string $policyUri = null,
        ?array $redirectUris = null,
        ?bool $requirePkce = null,
        ?string $tosUri = null,
        ?RequestOptions $requestOptions = null,
    ): OAuthClientUpdateResponse {
        $params = Util::removeNulls(
            [
                'allowedGrantTypes' => $allowedGrantTypes,
                'allowedScopes' => $allowedScopes,
                'logoUri' => $logoUri,
                'name' => $name,
                'policyUri' => $policyUri,
                'redirectUris' => $redirectUris,
                'requirePkce' => $requirePkce,
                'tosUri' => $tosUri,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of OAuth clients for the authenticated user
     *
     * @param 'client_credentials'|'authorization_code'|'refresh_token'|FilterAllowedGrantTypesContains $filterAllowedGrantTypesContains Filter by allowed grant type
     * @param string $filterClientID Filter by client ID
     * @param 'confidential'|'public'|FilterClientType $filterClientType Filter by client type
     * @param string $filterName Filter by exact client name
     * @param string $filterNameContains Filter by client name containing text
     * @param bool $filterVerified Filter by verification status
     * @param int $pageNumber Page number
     * @param int $pageSize Number of results per page
     *
     * @return DefaultFlatPagination<OAuthClient>
     *
     * @throws APIException
     */
    public function list(
        string|FilterAllowedGrantTypesContains|null $filterAllowedGrantTypesContains = null,
        ?string $filterClientID = null,
        string|FilterClientType|null $filterClientType = null,
        ?string $filterName = null,
        ?string $filterNameContains = null,
        ?bool $filterVerified = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterAllowedGrantTypesContains' => $filterAllowedGrantTypesContains,
                'filterClientID' => $filterClientID,
                'filterClientType' => $filterClientType,
                'filterName' => $filterName,
                'filterNameContains' => $filterNameContains,
                'filterVerified' => $filterVerified,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an OAuth client
     *
     * @param string $id OAuth client ID
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
