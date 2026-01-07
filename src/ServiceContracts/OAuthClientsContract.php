<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface OAuthClientsContract
{
    /**
     * @api
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        array $allowedGrantTypes,
        array $allowedScopes,
        ClientType|string $clientType,
        string $name,
        ?string $logoUri = null,
        ?string $policyUri = null,
        array $redirectUris = [],
        bool $requirePkce = false,
        ?string $tosUri = null,
        RequestOptions|array|null $requestOptions = null,
    ): OAuthClientNewResponse;

    /**
     * @api
     *
     * @param string $id OAuth client ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): OAuthClientGetResponse;

    /**
     * @api
     *
     * @param string $id OAuth client ID
     * @param list<\Telnyx\OAuthClients\OAuthClientUpdateParams\AllowedGrantType|value-of<\Telnyx\OAuthClients\OAuthClientUpdateParams\AllowedGrantType>> $allowedGrantTypes List of allowed OAuth grant types
     * @param list<string> $allowedScopes List of allowed OAuth scopes
     * @param string $logoUri URL of the client logo
     * @param string $name The name of the OAuth client
     * @param string $policyUri URL of the client's privacy policy
     * @param list<string> $redirectUris List of redirect URIs
     * @param bool $requirePkce Whether PKCE (Proof Key for Code Exchange) is required for this client
     * @param string $tosUri URL of the client's terms of service
     * @param RequestOpts|null $requestOptions
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
        RequestOptions|array|null $requestOptions = null,
    ): OAuthClientUpdateResponse;

    /**
     * @api
     *
     * @param FilterAllowedGrantTypesContains|value-of<FilterAllowedGrantTypesContains> $filterAllowedGrantTypesContains Filter by allowed grant type
     * @param string $filterClientID Filter by client ID
     * @param FilterClientType|value-of<FilterClientType> $filterClientType Filter by client type
     * @param string $filterName Filter by exact client name
     * @param string $filterNameContains Filter by client name containing text
     * @param bool $filterVerified Filter by verification status
     * @param int $pageNumber Page number
     * @param int $pageSize Number of results per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<OAuthClient>
     *
     * @throws APIException
     */
    public function list(
        FilterAllowedGrantTypesContains|string|null $filterAllowedGrantTypesContains = null,
        ?string $filterClientID = null,
        FilterClientType|string|null $filterClientType = null,
        ?string $filterName = null,
        ?string $filterNameContains = null,
        ?bool $filterVerified = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id OAuth client ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
